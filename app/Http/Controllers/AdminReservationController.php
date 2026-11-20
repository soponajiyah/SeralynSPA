<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminReservationController extends Controller
{
    public function dashboard(Request $request)
    {
        $periode = (int) $request->query('periode', 7);

        if (!in_array($periode, [7, 30])) {
            $periode = 7;
        }

        $query = Reservation::with([
            'user',
            'schedule.therapist',
            'schedule.room',
            'items.treatment',
            'payment',
        ]);

        if ($request->filled('q')) {
            $keyword = $request->q;

            $query->where(function ($q) use ($keyword) {
                $q->where('kode_reservasi', 'like', "%{$keyword}%")
                    ->orWhereHas('user', function ($userQuery) use ($keyword) {
                        $userQuery->where('nama', 'like', "%{$keyword}%");
                    });
            });
        }

        $query->whereDate(
            'created_at',
            '>=',
            now()->subDays($periode)->toDateString()
        );

        $reservasiTerbaru = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalCustomer = User::where('role', 'customer')->count();

        $totalReservasi = Reservation::count();

        $reservasiPending = Reservation::whereIn(
            'status_reservasi',
            ['awaiting_payment', 'pending_verification']
        )->count();

        $reservasiSelesai = Reservation::where(
            'status_reservasi',
            'completed'
        )->count();

        $reservasiBaru = Reservation::where(
            'status_reservasi',
            'pending_verification'
        )->count();

        return view('admin.dashboard', compact(
            'totalCustomer',
            'totalReservasi',
            'reservasiPending',
            'reservasiSelesai',
            'reservasiBaru',
            'reservasiTerbaru',
            'periode'
        ));
    }

    public function show(Reservation $reservation)
    {
        $reservation->load([
            'user',
            'schedule.therapist',
            'schedule.room',
            'items.treatment',
            'payment',
        ]);

        return view('admin.reservation-detail', compact('reservation'));
    }

    public function verifyPayment(Reservation $reservation)
    {
        if (
            !$reservation->payment ||
            $reservation->payment->payment_status !== 'pending_verification'
        ) {
            return back()->withErrors([
                'payment' => 'Pembayaran belum siap diverifikasi.',
            ]);
        }

        DB::transaction(function () use ($reservation) {
            $reservation->payment->update([
                'payment_status' => 'verified',
                'verified_by' => Auth::user()->user_id,
                'verified_at' => now(),
            ]);

            $reservation->update([
                'status_reservasi' => 'confirmed',
            ]);
        });

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi. Reservasi dikonfirmasi.'
        );
    }

    public function checkIn(Reservation $reservation)
    {
        if ($reservation->status_reservasi !== 'confirmed') {
            return back()->withErrors([
                'reservation' => 'Hanya reservasi yang sudah dikonfirmasi yang dapat check-in.',
            ]);
        }

        $reservation->update([
            'status_reservasi' => 'checked_in',
        ]);

        return back()->with('success', 'Customer berhasil check-in.');
    }

    public function checkout(Reservation $reservation)
    {
        if ($reservation->status_reservasi !== 'checked_in') {
            return back()->withErrors([
                'reservation' => 'Customer belum melakukan check-in.',
            ]);
        }

        DB::transaction(function () use ($reservation) {
            $reservation->update([
                'status_reservasi' => 'completed',
            ]);

            $reservation->schedule()->update([
                'status' => 'completed',
            ]);
        });

        return back()->with('success', 'Reservasi berhasil diselesaikan.');
    }

    public function reject(Reservation $reservation)
    {
        if (in_array($reservation->status_reservasi, [
            'checked_in',
            'completed',
            'cancelled',
        ])) {
            return back()->withErrors([
                'reservation' => 'Reservasi ini tidak dapat ditolak.',
            ]);
        }

        DB::transaction(function () use ($reservation) {
            $reservation->update([
                'status_reservasi' => 'rejected',
            ]);

            $reservation->schedule()->update([
                'status' => 'available',
            ]);
        });

        return back()->with('success', 'Reservasi berhasil ditolak.');
    }

    public function schedule(Request $request)
    {
        $query = Schedule::with([
            'therapist',
            'room',
            'reservations.user',
        ]);

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        } else {
            $query->whereDate('tanggal', '>=', today());
        }

        $schedules = $query
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->paginate(15)
            ->withQueryString();

        return view('admin.schedule', compact('schedules'));
    }
}
