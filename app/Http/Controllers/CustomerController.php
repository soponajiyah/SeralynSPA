<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\Reservation;
use Illuminate\Support\Facades\Storage;

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

        return view('customer.dashboard', compact(
            'user',
            'reservations'
        ));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],

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
}
