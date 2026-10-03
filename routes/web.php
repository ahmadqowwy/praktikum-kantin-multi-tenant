<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return 'Halaman Login';
})->name('login');

Route::get('/tenant/dashboard', function () {
    abort(404);
})->middleware('auth');

