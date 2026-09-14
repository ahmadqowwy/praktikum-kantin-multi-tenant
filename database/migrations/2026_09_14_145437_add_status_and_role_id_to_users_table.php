<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom status dan role_id sudah tersedia di tabel users.
    }

    public function down(): void
    {
        // Tidak menghapus kolom karena kolom sudah ada sebelum migration ini.
    }
};
