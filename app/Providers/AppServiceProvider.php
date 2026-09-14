<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::define('viewAdminDashboard', function ($user) {
            return $user->role?->name === 'admin';
        });

        Gate::define('manageTenants', function ($user) {
            return $user->role?->name === 'admin';
        });

        Gate::define('manageTables', function ($user) {
            return $user->role?->name === 'admin';
        });

        Gate::define('manageWithdrawals', function ($user) {
            return $user->role?->name === 'admin';
        });

        Gate::define('viewAuditLogs', function ($user) {
            return $user->role?->name === 'admin';
        });
    }
}
