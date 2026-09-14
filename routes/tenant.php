<?php

// Mengimpor Route Facade Laravel.
use Illuminate\Support\Facades\Route;

// Semua route di dalam group ini membutuhkan:
// 1. auth     -> pengguna harus login.
// 2. verified -> email/akun pengguna harus sudah terverifikasi.
//
// Middleware ini hanya diterapkan pada route internal tenant,
// bukan pada halaman customer anonim.
Route::middleware(['auth', 'verified'])

    // Membatasi implicit model binding anak berdasarkan model induknya.
    // Ini penting ketika nanti kita memiliki route bertingkat,
    // misalnya /tenant/{tenant:slug}/menus/{menu}.
    ->scopeBindings()

    // Membuat group agar middleware dan konfigurasi di atas
    // berlaku untuk semua route tenant di dalamnya.
    ->group(function () {

        // {tenant:slug} berarti Laravel mencari Tenant
        // berdasarkan kolom "slug", bukan berdasarkan ID.
        //
        // Contoh URL:
        // /tenant/kantin-maju
        //
        // Nantinya parameter ini dapat di-bind ke model Tenant.
        Route::get('/tenant/{tenant:slug}', function ($tenant) {

            // Response sementara untuk menguji route.
            return 'Tenant: '.$tenant->name;

            // Memberikan nama route dengan prefix "tenant.".
        })->name('tenant.home');
    });
