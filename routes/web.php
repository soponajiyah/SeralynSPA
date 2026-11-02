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