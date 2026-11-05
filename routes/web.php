<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

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
    return view('auth');
});

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



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');

});


Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {

    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

});


Route::middleware(['auth', 'role:admin'])->prefix('admin')
->name('admin.')
->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

});


Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
