{{-- 
    resources/views/components/empty-state.blade.php

    Fungsi:
    - Tampilan standar ketika sebuah halaman tidak mempunyai data.

    Contoh:

    <x-empty-state
        title="Belum ada pesanan"
        description="Pesanan baru akan muncul di sini."
    />

    Isi tambahan dapat diberikan melalui $slot.
--}}

@props([
    // Judul utama empty state.
    'title' => 'Belum ada data',

    // Penjelasan tambahan.
    'description' => 'Data belum tersedia.',
])

<div
    {{ $attributes->merge([
        'class' => 'rounded-xl border border-dashed border-gray-300 bg-white px-6 py-10 text-center',
    ]) }}
>

    {{-- Icon sederhana menggunakan karakter, sehingga tidak perlu library icon. --}}
    <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-xl">
        —
    </div>

    {{-- Judul empty state. --}}
    <h2 class="text-base font-semibold text-gray-900">
        {{ $title }}
    </h2>

    {{-- Deskripsi empty state. --}}
    <p class="mx-auto mt-1 max-w-md text-sm text-gray-500">
        {{ $description }}
    </p>

    {{-- 
        $slot bersifat opsional.
        Misalnya dapat berisi tombol "Tambah menu".
    --}}
    @if ($slot->isNotEmpty())
        <div class="mt-4">
            {{ $slot }}
        </div>
    @endif

</div>