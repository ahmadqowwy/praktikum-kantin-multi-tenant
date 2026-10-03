{{-- 
    Layout Customer / Pelanggan

    Fungsi:
    Layout utama untuk seluruh halaman pelanggan (customer).
    Layout ini menyediakan struktur tampilan yang konsisten,
    meliputi header, konten utama, footer, dan script Flux.

    Penggunaan:
    <x-layouts.customer title="Menu Kantin">
        ...
    </x-layouts.customer>

    Bagian $slot akan diisi oleh konten halaman yang menggunakan
    layout ini.
--}}

@props([
    // Judul halaman, dengan nilai default "Pelanggan"
    'title' => 'Pelanggan'
])

<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="antialiased"
>
<head>
    {{-- 
        Memuat bagian <head> dari partials.head.
        Biasanya berisi metadata, CSS, dan konfigurasi halaman.
    --}}
    @include('partials.head')
</head>

<body
    class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-zinc-950 dark:text-zinc-100"
>
    {{-- 
        Container utama halaman customer.
        max-w-md membatasi lebar tampilan agar sesuai
        dengan tampilan berbasis mobile.
    --}}
    <div class="mx-auto flex min-h-screen w-full max-w-md flex-col">

        {{-- 
            Header halaman.
            Menggunakan sticky agar tetap berada di bagian atas
            ketika halaman digulir.
        --}}
        <header
            class="sticky top-0 z-10 flex min-h-14 items-center gap-2
                   border-b border-zinc-200 bg-white/90 px-4 backdrop-blur
                   dark:border-zinc-800 dark:bg-zinc-900/90"
        >
            {{-- 
                Menampilkan judul halaman.
                Nilai berasal dari properti $title.
            --}}
            <span class="text-base font-semibold">
                {{ $title }}
            </span>

            {{-- 
                Menampilkan konten tambahan di sebelah kanan header
                jika variabel $headerRight tersedia.
            --}}
            @isset($headerRight)
                <div class="ms-auto">
                    {{ $headerRight }}
                </div>
            @endisset
        </header>

        {{-- 
            Konten utama halaman.

            $slot merupakan tempat konten dari halaman yang
            menggunakan layout ini akan ditampilkan.
        --}}
        <main class="flex-1 p-4">
            {{ $slot }}
        </main>

        {{-- 
            Footer halaman.
            Nama aplikasi diambil dari konfigurasi Laravel
            melalui config('app.name').
        --}}
        <footer
            class="border-t border-zinc-200 p-4 text-center text-xs
                   text-zinc-500 dark:border-zinc-800 dark:text-zinc-400"
        >
            {{ config('app.name') }}
        </footer>

    </div>

    {{-- 
        Memuat script Laravel Flux yang diperlukan
        untuk komponen interaktif.
    --}}
    @fluxScripts
</body>
</html>