<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $reservations = Reservation::with([
            'schedule.therapist',
            'schedule.room',
            'items.treatment',
            'payment',
        ])
        ->where('user_id', $user->user_id)
        ->latest()
        ->get();

        $reservasiMendatang = $reservations->filter(function ($reservation) {
            return in_array($reservation->status_reservasi, [
                'awaiting_payment',
                'pending_verification',
                'confirmed',
                'checked_in',
            ]);
        });

        $riwayatSelesai = $reservations->filter(function ($reservation) {
            return in_array($reservation->status_reservasi, [
                'completed',
                'cancelled',
                'rejected',
            ]);
        });

        return view('customer.dashboard', compact(
            'user',
            'reservasiMendatang',
            'riwayatSelesai'
        ));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:200'],

            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('users', 'email')
                    ->ignore($user->user_id, 'user_id'),
            ],

            'no_telepon' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string', 'max:255'],

            'foto_profil' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        if ($request->hasFile('foto_profil')) {
            $fotoLama = $user->foto_profil;

            $fotoBaru = $request->file('foto_profil')
                ->store('profile-photos', 'public');

            $validated['foto_profil'] = $fotoBaru;
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make(
                $validated['password']
            );
        } else {
            unset($validated['password']);
        }

        unset($validated['password_confirmation']);

        $user->update($validated);

        if (isset($fotoBaru) && !empty($fotoLama)) {
            Storage::disk('public')->delete($fotoLama);
        }

        return back()->with(
            'success',
            'Profile successfully updated!'
        );
    }

    public function uploadPaymentProof(Request $request, Reservation $reservation)
    {
        abort_unless(
            $reservation->user_id === Auth::user()->user_id,
            403
        );

        abort_unless(
            $reservation->status_reservasi === 'awaiting_payment',
            403
        );

        $request->validate([
            'proof_image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
        ]);

        $payment = $reservation->payment;

        if (!$payment) {
            return back()->withErrors([
                'payment' => 'Data pembayaran tidak ditemukan.',
            ]);
        }

        if ($payment->proof_image) {
            Storage::disk('public')->delete($payment->proof_image);
        }

        $path = $request->file('proof_image')
            ->store('payment-proofs', 'public');

        $payment->update([
            'proof_image' => $path,
            'payment_status' => 'pending_verification',
        ]);

        $reservation->update([
            'status_reservasi' => 'pending_verification',
        ]);

        return back()->with(
            'success',
            'Bukti pembayaran berhasil dikirim. Menunggu verifikasi admin.'
        );
    }

    public function cancelReservation(Reservation $reservation)
    {
        abort_unless(
            $reservation->user_id === Auth::user()->user_id,
            403
        );

        if (!in_array($reservation->status_reservasi, [
            'awaiting_payment',
            'pending_verification',
            'confirmed',
        ])) {
            return back()->withErrors([
                'reservation' => 'Reservasi ini tidak dapat dibatalkan.',
            ]);
        }

        $reservation->update([
            'status_reservasi' => 'cancelled',
        ]);

        $reservation->schedule()->update([
            'status' => 'available',
        ]);

        return back()->with(
            'success',
            'Reservasi berhasil dibatalkan.'
        );
    }
}
