{{-- 
    Halaman percobaan Customer.

    Fungsi:
    - Memastikan layouts/customer.blade.php dapat digunakan.
    - Belum merupakan halaman final aplikasi.
    - Hanya untuk menguji Stage 4.
--}}

@extends('layouts.customer')

{{-- Judul browser. --}}
@section('title', 'Pilih Menu - Kantin Teknik')

{{-- Isi utama halaman. --}}
@section('content')

    {{-- Informasi sesi/meja seperti pada mockup. --}}
    <section class="rounded-xl border bg-white p-4 shadow-sm">

        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">
            Sesi Pemesanan Aktif
        </p>

        <h1 class="mt-1 text-xl font-bold">
            Selamat datang,
        </h1>

        <p class="mt-1 text-lg font-semibold">
            Meja 12 — Zona A
        </p>

        <p class="mt-2 text-sm text-gray-500">
            QR meja tervalidasi. Pilih tenant untuk mulai memesan.
        </p>

    </section>

    {{-- Contoh daftar tenant. --}}
    <section class="mt-5">

        <h2 class="mb-3 text-lg font-bold">
            Pilih Tenant
        </h2>

        <div class="space-y-3">

            {{-- Tenant pertama. --}}
            <article class="rounded-xl border bg-white p-4">

                <div class="flex items-start justify-between gap-3">

                    <div>
                        <h3 class="font-bold">
                            Warung Bu Rina
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Nasi & lauk rumahan
                        </p>

                        <div class="mt-2">
                            <x-status-badge status="buka" />
                        </div>
                    </div>

                    <span class="text-sm text-gray-500">
                        ± 8–12 mnt
                    </span>

                </div>

            </article>

            {{-- Tenant kedua. --}}
            <article class="rounded-xl border bg-white p-4">

                <div class="flex items-start justify-between gap-3">

                    <div>
                        <h3 class="font-bold">
                            Bakso Mas Yon
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Bakso & mie
                        </p>

                        <div class="mt-2">
                            <x-status-badge status="buka" />
                        </div>
                    </div>

                    <span class="text-sm text-gray-500">
                        ± 5–10 mnt
                    </span>

                </div>

            </article>

            {{-- Tenant ketiga. --}}
            <article class="rounded-xl border bg-white p-4">

                <div class="flex items-start justify-between gap-3">

                    <div>
                        <h3 class="font-bold">
                            Kopi Serambi
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Kopi & minuman
                        </p>

                        <div class="mt-2">
                            <x-status-badge status="buka" />
                        </div>
                    </div>

                    <span class="text-sm text-gray-500">
                        ± 3–6 mnt
                    </span>

                </div>

            </article>

        </div>

    </section>

@endsection