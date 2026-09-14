<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return 'Halaman Login';
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })
        ->middleware('can:viewAdminDashboard')
        ->name('admin.dashboard');

    Route::get('/tenant/dashboard', function () {
        return view('tenant.dashboard');
    })->name('tenant.dashboard');
});
