{{-- 
    resources/views/layouts/customer.blade.php

    Fungsi:
    - Menjadi layout utama untuk halaman pelanggan anonim.
    - Digunakan untuk halaman seperti:
      1. Scan / validasi QR meja
      2. Daftar tenant
      3. Daftar menu
      4. Keranjang
      5. Checkout
      6. Pembayaran
      7. Tracking pesanan

    Catatan:
    - Layout ini TIDAK menggunakan $auth->user().
    - Customer pada SRS adalah pengguna anonim tanpa akun.
    - Konten halaman anak akan dimasukkan melalui @yield('content').


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    {{-- Membuat tampilan mengikuti ukuran layar perangkat. --}}
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    {{-- Judul dapat diubah oleh halaman anak melalui @section('title'). --}}
    <title>
        @yield('title', 'Kantin Teknik')
    </title>

    {{-- 
        Vite memuat CSS dan JavaScript aplikasi Laravel.
        Jika project belum menggunakan Vite pada tahap ini,
        bagian ini dapat tetap dipertahankan untuk tahap berikutnya.
    --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    {{-- 
        Header customer.
        Mengikuti konsep mockup "KANTIN TEKNIK".
        Header dibuat sederhana supaya nyaman pada layar ponsel.
    --}}
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-4 py-3">

            {{-- Nama aplikasi / kantin. --}}
            <a
                href="/"
                class="font-bold tracking-wide text-gray-900"
            >
                KANTIN TEKNIK
            </a>

            {{-- 
                Bagian kanan dapat digunakan untuk informasi meja
                atau jumlah item keranjang pada tahap berikutnya.
            --}}
            @hasSection('header-action')
                <div>
                    @yield('header-action')
                </div>
            @endif

        </div>
    </header>

    {{-- 
        Konten utama.
        max-w-3xl menjaga tampilan agar tetap nyaman dibaca
        pada mobile maupun layar yang lebih besar.
    --}}
    <main class="mx-auto w-full max-w-3xl px-4 py-5">

        {{-- 
            Halaman seperti katalog, cart, checkout, dan tracking
            akan mengisi bagian ini.
        --}}
        @yield('content')

    </main>

    {{-- 
        Footer sederhana.
        Tidak menggunakan informasi user/auth karena customer anonim.
    --}}
    <footer class="mx-auto max-w-3xl px-4 py-6 text-center text-xs text-gray-500">
        Kantin Teknik · Sistem Aplikasi Kantin Multi-Tenant
    </footer>

</body>
</html>