```blade
{{-- 
    resources/views/layouts/tenant.blade.php

    Fungsi:
    - Layout untuk operator tenant / merchant.
    - Digunakan untuk:
      - Menu & Stok
      - KDS / antrean dapur
      - Laporan
      - Rekonsiliasi
      - Penarikan dana

    Mockup:
    - Target perangkat: tablet 10" landscape.
    - UI berbasis kartu.
    - Target tombol sentuh minimal 44px.
--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    {{-- Agar layout responsif di tablet maupun desktop. --}}
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Portal Tenant')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    {{-- 
        Wrapper utama.
        flex digunakan supaya sidebar dan konten berada berdampingan
        pada layar yang cukup besar.
    --}}
    <div class="min-h-screen lg:flex">

        {{-- 
            Sidebar.
            
            <details> dipakai supaya sidebar dapat dibuka/tutup
            tanpa membutuhkan library JavaScript tambahan.
        --}}
        <aside class="w-full border-b bg-white lg:min-h-screen lg:w-64 lg:border-b-0 lg:border-r">

            {{-- Header sidebar. --}}
            <div class="flex items-center justify-between px-4 py-4">

                <a
                    href="#"
                    class="font-bold tracking-wide text-gray-900"
                >
                    KANTIN TEKNIK
                </a>

                {{-- Tombol buka/tutup sidebar pada layar kecil. --}}
                <details class="relative lg:hidden">
                    <summary
                        class="flex min-h-11 min-w-11 cursor-pointer list-none items-center justify-center rounded-lg border bg-white"
                    >
                        ☰
                    </summary>

                    {{-- Menu mobile. --}}
                    <nav class="absolute right-0 z-20 mt-2 w-64 rounded-lg border bg-white p-3 shadow-lg">

                        {{-- Dashboard. --}}
                        @can('viewTenantDashboard')
                            <a
                                href="#"
                                class="block rounded-lg px-4 py-3 hover:bg-gray-100"
                            >
                                Ringkasan
                            </a>
                        @endcan

                        {{-- Menu tenant. --}}
                        @
```
