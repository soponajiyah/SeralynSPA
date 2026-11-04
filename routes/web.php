<?php

use Illuminate\Support\Facades\Route;

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