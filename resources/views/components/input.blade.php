{{-- 
    resources/views/components/input.blade.php

    Fungsi:
    - Input form reusable.
    - Digunakan untuk:
      - Nama customer
      - Nomor WhatsApp
      - Email
      - Kata sandi
      - Pencarian menu
      - Nominal penarikan
      - dan field lainnya.

    Contoh:

    <x-input
        name="name"
        type="text"
        placeholder="Nama Anda"
    />
--}}

@props([
    // Type input default adalah text.
    'type' => 'text',

    // Label opsional.
    'label' => null,

    // ID opsional.
    'id' => null,
])

@php
    /*
     * Jika id tidak diberikan, gunakan nama input.
     * Ini memudahkan hubungan antara label dan input.
     */
    $inputId = $id ?? $attributes->get('name');
@endphp

<div class="w-full">

    {{-- Label hanya ditampilkan jika diberikan. --}}
    @if ($label)
        <label
            for="{{ $inputId }}"
            class="mb-1.5 block text-sm font-medium text-gray-700"
        >
            {{ $label }}
        </label>
    @endif

    <input
        id="{{ $inputId }}"
        type="{{ $type }}"

        {{-- 
            merge() mempertahankan atribut dari pemanggil
            sekaligus memberikan class default.
        --}}
        {{ $attributes->merge([
            'class' => 'min-h-11 w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 outline-none placeholder:text-gray-400 focus:border-red-500 focus:ring-2 focus:ring-red-100',
        ]) }}
    >

</div>