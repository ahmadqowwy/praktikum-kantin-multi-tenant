{{-- 
    resources/views/components/button.blade.php

    Fungsi:
    - Tombol reusable untuk seluruh aplikasi.
    - Menghindari penulisan class tombol berulang-ulang.

    Contoh penggunaan:

    <x-button>
        Simpan
    </x-button>

    Atau:

    <x-button type="submit">
        Buat pesanan & bayar via QRIS
    </x-button>

    $attributes memungkinkan halaman pemanggil
    memberikan atribut tambahan seperti:
    - type
    - disabled
    - wire:click
    - class
--}}

@props([
    // Variant menentukan jenis visual tombol.
    'variant' => 'primary',
])

@php
    /*
     * Class dasar digunakan oleh semua tombol.
     *
     * min-h-11 = tinggi minimal sekitar 44px.
     * Ini sesuai kebutuhan touch target tenant pada mockup.
     */
    $baseClasses = 'inline-flex min-h-11 items-center justify-center rounded-lg px-4 py-2 text-sm font-semibold transition focus:outline-none focus:ring-2 disabled:cursor-not-allowed disabled:opacity-50';

    /*
     * Variant primary:
     * digunakan untuk aksi utama seperti Checkout,
     * Buat Pesanan, Simpan, dan sebagainya.
     */
    $variantClasses = match ($variant) {
        'secondary' => 'border border-gray-300 bg-white text-gray-900 hover:bg-gray-50',

        'danger' => 'bg-red-600 text-white hover:bg-red-700',

        'success' => 'bg-green-600 text-white hover:bg-green-700',

        // Default jika variant tidak dikenal.
        default => 'bg-red-600 text-white hover:bg-red-700',
    };
@endphp

<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' => $baseClasses . ' ' . $variantClasses,
    ]) }}
>
    {{-- $slot berisi tulisan/isi tombol dari halaman pemanggil. --}}
    {{ $slot }}
</button>