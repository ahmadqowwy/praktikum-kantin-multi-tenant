<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Test Route
|--------------------------------------------------------------------------
|
| Route sementara untuk memastikan layout Customer Stage 4
| berhasil dirender oleh Laravel.
|
| Nanti route ini akan diganti/dihubungkan dengan
| halaman Customer yang sebenarnya.
|
*/

Route::get('/customer-test', function () {

    /*
     * view('customer-test') berarti Laravel mencari:
     *
     * resources/views/customer-test.blade.php
     */
    return view('customer-test');

})->name('customer.test');
