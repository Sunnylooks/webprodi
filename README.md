# Web Prodi — Cara Menjalankan Proyek

Panduan singkat untuk menjalankan aplikasi Laravel ini secara lokal.

## Prasyarat

- PHP 8.2+ dan Composer
- MySQL/MariaDB
- Node.js 18+ (opsional, untuk mode pengembangan aset via Vite)

## Langkah Cepat

```bash
# 1) Instal dependensi PHP
composer install

# 2) Siapkan environment
php artisan key:generate

# 3) Konfigurasi database di file .env
# DB_DATABASE=webprodi
# DB_USERNAME=your_user
# DB_PASSWORD=your_password

# 4) Jalankan migrasi
php artisan migrate

# 5) (Opsional) Instal dependensi front-end & jalankan Vite
npm install
npm run dev   # atau npm run build untuk produksi

# 6) Jalankan server pengembangan
php artisan serve
```

Aplikasi akan tersedia di `http://127.0.0.1:8000`.

## Seeding Database

Gunakan salah satu opsi berikut untuk mengisi data awal:

```bash
# Mengisi data setelah migrasi
php artisan db:seed

# Atau: reset semua tabel lalu seeding
php artisan migrate:fresh --seed
```

**Data yang akan dibuat:**
- 1 Super Admin (admin@webprodi.test / admin123)
- 8 Kaprodi untuk setiap program (kaprodi.{slug}@webprodi.test / kaprodi123)
- 1 User Universitas (universitas@webprodi.test / universitas123)
- 8 Program studi (Informatika, Management, Akuntansi, dll)
- 9 Kategori untuk setiap program (SOP & Tata Kelola, Profil, Informasi, dll)
- Sample subpages untuk setiap kategori

**Seeder yang dijalankan:**
1. `CategorySeeder` - Membuat kategori untuk setiap program
2. `ProgramSeeder` - Membuat program studi dan sample pages
3. `DatabaseSeeder` - Membuat user accounts

Tips:
- Pastikan koneksi database di `.env` sudah benar sebelum menjalankan seeding.
- Anda bisa menambahkan atau mengubah seeder di `database/seeders` sesuai kebutuhan.

## Catatan

- Upload lampiran disimpan di `public/uploads` secara langsung, tidak perlu `storage:link`.
- Fitur admin membutuhkan login. Buat user admin di database atau sediakan proses seeding sesuai kebutuhan tim.
- Jika menggunakan Laragon/Valet/WAMP, Anda bisa menjalankan lewat web server bawaan dan mengarahkan root ke folder proyek.
