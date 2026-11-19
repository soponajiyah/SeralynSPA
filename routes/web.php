<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Models\User;
use App\Models\Reservation;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/treatments', function () {
    return view('treatments');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/detail-treatment', function () {
    return view('detail-treatment');
});

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/account', function () {
    return redirect()->route('login');
});


Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:5,1')
        ->name('register.process');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
        ->name('password.request');

    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
        ->name('password.email');
        
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])
        ->name('password.reset');

    Route::post('/reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.update');

});

// ==============================
// CUSTOMER
// ==============================

Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/dashboard', [CustomerController::class, 'dashboard'])
            ->name('dashboard');

        Route::put('/profile', [CustomerController::class, 'updateProfile'])
            ->name('profile.update');

    });


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {

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

            $reservasiTerbaru = Reservation::with([
                'user',
                'schedule.therapist',
                'schedule.room',
                'items.treatment',
            ])
                ->latest()
                ->take(8)
                ->get();

            return view('admin.dashboard', compact(
                'totalCustomer',
                'totalReservasi',
                'reservasiPending',
                'reservasiSelesai',
                'reservasiTerbaru'
            ));

        })->name('dashboard');

    });

// ==============================
// LOGOUT
// ==============================

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
