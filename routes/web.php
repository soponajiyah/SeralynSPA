<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\ReservationController;

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


// AUTHENTICATION

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


// AVAILABLE SCHEDULE

Route::get(
    '/reservation/available-schedules',
    [ReservationController::class, 'availableSchedules']
)->name('reservation.available');


// CUSTOMER

Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/dashboard', [CustomerController::class, 'dashboard'])
            ->name('dashboard');

        Route::put('/profile', [CustomerController::class, 'updateProfile'])
            ->name('profile.update');

        Route::post(
            '/reservation/{reservation}/payment',
            [CustomerController::class, 'uploadPaymentProof']
        )->name('payment.upload');

        Route::patch(
            '/reservation/{reservation}/cancel',
            [CustomerController::class, 'cancelReservation']
        )->name('reservation.cancel');

        Route::post(
            '/reservation',
            [ReservationController::class, 'store']
        )->name('reservation.store');

    });


// ADMIN

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [AdminReservationController::class, 'dashboard']
        )->name('dashboard');

        Route::get(
            '/reservation/{reservation}',
            [AdminReservationController::class, 'show']
        )->name('reservation.show');

        Route::patch(
            '/reservation/{reservation}/verify',
            [AdminReservationController::class, 'verifyPayment']
        )->name('reservation.verify');

        Route::patch(
            '/reservation/{reservation}/checkin',
            [AdminReservationController::class, 'checkIn']
        )->name('reservation.checkin');

        Route::patch(
            '/reservation/{reservation}/checkout',
            [AdminReservationController::class, 'checkout']
        )->name('reservation.checkout');

        Route::patch(
            '/reservation/{reservation}/reject',
            [AdminReservationController::class, 'reject']
        )->name('reservation.reject');

        Route::get(
            '/schedule',
            [AdminReservationController::class, 'schedule']
        )->name('schedule');

    });


// LOGOUT

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
