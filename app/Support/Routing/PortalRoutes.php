<?php

namespace App\Support\Routing;
use Closure;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserHasRole;
/**
 * Class PortalRoutes
 *
 * Menyediakan definisi grup route terpusat untuk tiga jenis portal
 * dalam aplikasi Kantin Multi-Tenant:
 *
 * 1. Customer
 *    - Digunakan oleh pelanggan.
 *    - Bersifat publik/anonim.
 *
 * 2. Tenant
 *    - Digunakan oleh operator/pengelola tenant.
 *    - Membutuhkan autentikasi.
 *    - Membutuhkan email terverifikasi.
 *    - Membutuhkan role tenant.
 *
 * 3. Admin
 *    - Digunakan oleh pengelola/admin sistem.
 *    - Membutuhkan autentikasi.
 *    - Membutuhkan email terverifikasi.
 *    - Membutuhkan role admin.
 *
 * Tujuan utama class ini adalah memastikan semua route pada portal
 * yang sama menggunakan prefix, route name, dan middleware keamanan
 * yang konsisten.
 *
 * Class ini dapat digunakan oleh:
 * - routes/customer.php
 * - routes/tenant.php
 * - routes/admin.php
 * - route milik masing-masing module
 *
 * Dengan pendekatan ini, konfigurasi keamanan route tidak perlu
 * ditulis berulang-ulang pada setiap file route.
 */
final class PortalRoutes
{
    /**
     * Membuat grup route untuk portal CUSTOMER.
     *
     * Portal customer digunakan oleh pelanggan dan dapat diakses
     * tanpa login.
     *
     * Middleware:
     * - web
     *   Mengaktifkan fitur HTTP/session Laravel seperti session,
     *   cookie, dan CSRF protection.
     *
     * Prefix URL:
     * - kantin/{canteen}
     *
     * Contoh URL:
     * - /kantin/warung-makmur
     * - /kantin/warung-makmur/menu
     *
     * Prefix nama route:
     * - customer.
     *
     * Contoh nama route:
     * - customer.home
     * - customer.menu
     */
    public static function customer(Closure|string $routes): void
    {
        Route::middleware('web')
            ->prefix('kantin/{canteen}')
            ->name('customer.')
            ->group($routes);
    }

    /**
     * Membuat grup route untuk portal TENANT.
     *
     * Portal tenant digunakan oleh operator/pengelola sebuah tenant.
     * Karena merupakan area internal, pengguna harus login,
     * memiliki email yang telah diverifikasi, dan mempunyai role tenant.
     *
     * Middleware:
     * - web
     *   Mengaktifkan session, cookie, dan perlindungan CSRF.
     *
     * - auth
     *   Memastikan pengguna sudah login.
     *
     * - verified
     *   Memastikan email pengguna sudah terverifikasi.
     *
     * - role:tenant
     *   Membatasi akses hanya untuk pengguna dengan role tenant.
     *
     * Prefix URL:
     * - tenant/{tenant}
     *
     * Contoh URL:
     * - /tenant/warung-makmur/dashboard
     * - /tenant/warung-makmur/orders
     *
     * Prefix nama route:
     * - tenant.
     *
     * Contoh nama route:
     * - tenant.dashboard
     * - tenant.orders
     */
    public static function tenant(Closure|string $routes): void
    {
        Route::middleware([
            'web',
            'auth',
            'verified',
            'role:tenant',
        ])
            ->prefix('tenant/{tenant}')
            ->name('tenant.')
            ->group($routes);
    }

    /**
     * Membuat grup route untuk portal ADMIN.
     *
     * Portal admin digunakan oleh pengelola sistem untuk melakukan
     * pengelolaan aplikasi secara keseluruhan.
     *
     * Middleware:
     * - web
     *   Mengaktifkan session, cookie, dan CSRF protection.
     *
     * - auth
     *   Memastikan pengguna sudah login.
     *
     * - verified
     *   Memastikan email pengguna sudah terverifikasi.
     *
     * - role:admin
     *   Membatasi akses hanya untuk pengguna dengan role admin.
     *
     * Prefix URL:
     * - admin
     *
     * Contoh URL:
     * - /admin/dashboard
     * - /admin/users
     * - /admin/tenants
     *
     * Prefix nama route:
     * - admin.
     *
     * Contoh nama route:
     * - admin.dashboard
     * - admin.users
     * - admin.tenants
     */
    public static function admin(Closure|string $routes): void
    {
        Route::middleware([
            'web',
            'auth',
            'verified',
            'role:admin',
        ])
            ->prefix('admin')
            ->name('admin.')
            ->group($routes);
    }
}

