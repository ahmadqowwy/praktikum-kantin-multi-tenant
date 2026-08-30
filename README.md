# Kantin Multi-Tenant

Aplikasi kantin berbasis Laravel 13 yang dikembangkan sebagai project praktikum.

## Requirements

Pastikan komputer sudah memiliki:

* PHP 8.4 atau versi yang kompatibel dengan project
* Composer
* Node.js dan npm
* MySQL/MariaDB
* Git
* Laravel 13

### Environment yang digunakan

* Laravel: 13.x
* PHP: 8.4.x
* Database: MySQL/MariaDB
* Node.js: sesuai kebutuhan Vite
* Package manager PHP: Composer
* Package manager JavaScript: npm

## Setup

### 1. Clone repository

```bash
git clone https://github.com/ahmadqowwy/praktikum-kantin-multi-tenant.git
cd kantin-multi-tenant
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Install dependency JavaScript

```bash
npm install
```

### 4. Buat file environment

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Kemudian sesuaikan konfigurasi database pada `.env`.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Jalankan migration

```bash
php artisan migrate
```

Jika project memiliki data awal/seeder:

```bash
php artisan db:seed
```

### 7. Jalankan development server

Terminal pertama:

```bash
php artisan serve
```

Terminal kedua:

```bash
npm run dev
```

Kemudian buka alamat yang ditampilkan oleh Laravel pada browser.

## Run

Untuk menjalankan project dalam mode development:

```bash
php artisan serve
```

dan:

```bash
npm run dev
```

Untuk membuat asset production:

```bash
npm run build
```

## Test

Jalankan test Laravel:

```bash
php artisan test
```

Pemeriksaan format kode:

```bash
./vendor/bin/pint --test
```

Jika terdapat masalah format:

```bash
./vendor/bin/pint
```

Kemudian jalankan kembali:

```bash
./vendor/bin/pint --test
```

## Troubleshooting

### Database tidak ditemukan

Jika muncul:

```text
Unknown database
```

pastikan database sudah dibuat dan konfigurasi berikut pada `.env` sudah benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

Kemudian jalankan:

```bash
php artisan migrate
```

### Tidak dapat terhubung ke MySQL/MariaDB

Jika muncul:

```text
SQLSTATE[HY000]
```

atau:

```text
Connection refused
```

pastikan service MySQL/MariaDB sedang berjalan dan port database sesuai dengan `.env`.

### Dependency PHP bermasalah

Jalankan:

```bash
composer install
```

Jika dependency perlu diperbarui sesuai `composer.lock`, gunakan:

```bash
composer update
```

### Dependency JavaScript bermasalah

Jalankan:

```bash
npm install
```

Kemudian:

```bash
npm run build
```

### Test gagal

Jalankan:

```bash
php artisan test
```

Baca pesan error yang ditampilkan dan periksa konfigurasi environment, database, migration, serta dependency project.

### Pint gagal

Jalankan:

```bash
./vendor/bin/pint
```

Kemudian periksa kembali:

```bash
./vendor/bin/pint --test
```

## Quality Gate

Sebelum melakukan commit, pastikan perintah berikut berhasil:

```bash
php artisan test
```

```bash
./vendor/bin/pint --test
```

```bash
npm run build
```

Semua pemeriksaan harus selesai tanpa error.

## Development Notes

File `.env` berisi konfigurasi lokal dan tidak boleh di-commit ke repository.

File `.editorconfig` digunakan untuk menjaga konsistensi format file, termasuk line ending dan indentasi.

Dokumentasi berupa screenshot hasil pengujian dan halaman aplikasi disimpan pada jurnal praktikum apabila ukuran file terlalu besar untuk repository.
