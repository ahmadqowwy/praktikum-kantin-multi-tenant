```blade
{{--  
    resources/views/layouts/admin.blade.php 
 
    Fungsi: 
    - Layout khusus pengelola kantin / admin. 
    - Target perangkat: desktop. 
    - Digunakan untuk: 
      - Tenant & Komisi 
      - Meja & QR Code 
      - Pencairan Dana 
      - Jejak Audit 
 
    Catatan: 
    - Layout ini tidak menentukan data tabel. 
    - Halaman anak yang bertanggung jawab menyediakan tabel. 
    - Layout hanya menyediakan kerangka dan CSS helper responsif. 
--}} 
 
<!DOCTYPE html> 
<html lang="id"> 
 
<head> 
    <meta charset="UTF-8"> 
 
    {{-- Membuat layout tetap responsif jika dibuka dari layar lebih kecil. --}} 
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0" 
    > 
 
    <title> 
        @yield('title', 'Admin Kantin') 
    </title> 
 
    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head> 
 
<body class="min-h-screen bg-gray-100 text-gray-900"> 
 
    {{-- Wrapper utama admin. --}} 
    <div class="min-h-screen lg:flex"> 
 
        {{-- Sidebar admin. --}} 
        <aside class="w-full border-b bg-white lg:min-h-screen lg:w-64 lg:border-b-0 lg:border-r"> 
 
            {{-- Branding. --}} 
            <div class="border-b px-5 py-5"> 
                <div class="font-bold tracking-wide"> 
                    ADMIN KANTIN 
                </div> 
 
                <div class="mt-1 text-xs text-gray-500"> 
                    Kantin Teknik 
                </div> 
            </div> 
 
            {{-- Navigasi admin. --}} 
            <nav class="p-3"> 
 
                {{-- Menu Ringkasan hanya tampil jika user memiliki ability. --}} 
                @can('viewAdminDashboard')
                    <a 
                        href="#" 
                        class="mb-1 block rounded-lg px-4 py-3 hover:bg-gray-100" 
                    > 
                        Ringkasan 
                    </a> 
                @endcan
 
                {{-- Menu Tenant & Komisi. --}} 
                @can('manageTenants')
                    <a 
                        href="#" 
                        class="mb-1 block rounded-lg px-4 py-3 hover:bg-gray-100" 
                    > 
                        Tenant & Komisi 
                    </a> 
                @endcan
 
                {{-- Menu Meja & QR Code. --}} 
                @can('manageTables')
                    <a 
                        href="#" 
                        class="mb-1 block rounded-lg px-4 py-3 hover:bg-gray-100" 
                    > 
                        Meja & QR Code 
                    </a> 
                @endcan
 
                {{-- Menu Pencairan Dana. --}} 
                @can('manageWithdrawals')
                    <a 
                        href="#" 
                        class="mb-1 block rounded-lg px-4 py-3 hover:bg-gray-100" 
                    > 
                        Pencairan Dana 
                    </a> 
                @endcan
 
                {{-- Menu Jejak Audit. --}} 
                @can('viewAuditLogs')
                    <a 
                        href="#" 
                        class="mb-1 block rounded-lg px-4 py-3 hover:bg-gray-100" 
                    > 
                        Jejak Audit 
                    </a> 
                @endcan
 
            </nav> 
 
        </aside> 
 
        {{-- Konten utama admin. --}} 
        <div class="min-w-0 flex-1"> 
 
            {{-- Header admin. --}} 
            <header class="border-b bg-white"> 
                <div class="flex min-h-16 items-center justify-between px-4 lg:px-6"> 
 
                    <div> 
                        <h1 class="text-lg font-bold"> 
                            @yield('page-heading', 'Admin Kantin') 
                        </h1> 
                    </div> 
 
                    {{-- Informasi admin/operator. --}} 
                    @hasSection('header-action') 
                        <div> 
                            @yield('header-action') 
                        </div> 
                    @endif 
 
                </div> 
            </header> 
 
            {{--  
                Konten halaman. 
                max-width besar karena admin banyak menggunakan tabel. 
            --}} 
            <main class="w-full max-w-[1600px] p-4 lg:p-6"> 
 
                @yield('content') 
 
            </main> 
 
        </div> 
 
    </div> 
 
</body> 
</html>
```
