<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Data demo deterministik.
     * Password demo bersifat lokal (bukan secret produksi).
     */
    public function run(): void
    {
        // Buat role yang digunakan aplikasi.
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ]);

        $tenantRole = Role::firstOrCreate([
            'name' => 'tenant',
        ]);

        // User demo biasa.
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Akun demo per konteks.
        $demo = [
            [
                'name' => 'Admin Kantin',
                'email' => 'admin@kantin.test',
                'role_id' => $adminRole->id,
            ],
            [
                'name' => 'Operator Tenant',
                'email' => 'tenant@kantin.test',
                'role_id' => $tenantRole->id,
            ],
        ];

        foreach ($demo as $row) {
            User::firstOrNew([
                'email' => $row['email'],
            ])
                ->forceFill([
                    'name' => $row['name'],
                    'role_id' => $row['role_id'],
                    'status' => 'active',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ])
                ->save();
        }
    }
}