<?php

// Mengimpor Route Facade Laravel.
use Illuminate\Support\Facades\Route;

// Route admin merupakan route internal.
// Karena itu pengguna harus login dan akun harus terverifikasi.
Route::middleware(['auth', 'verified'])

    // Semua route admin yang dimasukkan ke group ini
    // akan menggunakan middleware di atas.
    ->group(function () {

        // Route GET untuk halaman utama admin.
        Route::get('/admin', function () {

            // Response sementara untuk memastikan route bekerja.
            // Nantinya dapat diganti dengan Controller/Livewire.
            return 'Admin Home';

            // Nama route menggunakan prefix "admin."
            // agar konteks admin mudah dikenali.
        })->name('admin.home');
    });
