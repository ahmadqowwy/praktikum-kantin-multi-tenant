{{-- 
    resources/views/components/status-badge.blade.php

    Fungsi:
    - Menampilkan status secara konsisten.
    - Warna status ditentukan dari nilai status.

    Contoh penggunaan:

    <x-status-badge status="tersedia" />

    <x-status-badge status="habis" />

    <x-status-badge status="siap" />
--}}

@props([
    // Status wajib/utama yang ingin ditampilkan.
    'status' => 'unknown',
])

@php

    /*
     * Normalisasi status menjadi huruf kecil.
     * Contoh:
     * "TERSEDIA" -> "tersedia"
     */
    $normalizedStatus = strtolower($status);

    /*
     * Set class berdasarkan status.
     *
     * Jika status belum kita kenal,
     * gunakan tampilan netral.
     */
    $statusClasses = match ($normalizedStatus) {

        // Status positif.
        'tersedia',
        'buka',
        'aktif',
        'siap',
        'dicairkan',
        'selesai',
        'terverifikasi'
            => 'bg-green-100 text-green-700',

        // Status proses / menunggu.
        'menunggu',
        'pending',
        'baru',
        'diproses',
        'dimasak',
        'terjadwal'
            => 'bg-yellow-100 text-yellow-700',

        // Status negatif / tidak tersedia.
        'habis',
        'tutup',
        'nonaktif',
        'ditolak',
        'kedaluwarsa',
            => 'bg-red-100 text-red-700',

        // Default untuk status yang belum didefinisikan.
        default
            => 'bg-gray-100 text-gray-700',
    };

@endphp

<span
    {{ $attributes->merge([
        'class' => 'inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold ' . $statusClasses,
    ]) }}
>
    {{-- 
        ucfirst membuat:
        "tersedia" -> "Tersedia"
    --}}
    {{ ucfirst($status) }}
</span>