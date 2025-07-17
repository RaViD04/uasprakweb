# Manajemen Laundry - Aplikasi Web CRUD Laravel

Aplikasi web untuk manajemen laundry yang dibangun menggunakan Laravel framework dengan fitur CRUD lengkap.

## 🚀 Fitur Utama

- **Dashboard** - Overview statistik dan transaksi terbaru
- **Manajemen Pelanggan** - CRUD data pelanggan dengan pencarian
- **Manajemen Layanan** - CRUD data layanan laundry
- **Manajemen Transaksi** - CRUD transaksi dengan perhitungan otomatis
- **Responsive Design** - Menggunakan Bootstrap 5
- **Validasi Input** - Form validation yang lengkap
- **Pencarian Data** - Fitur pencarian di setiap modul

## 📋 Struktur Database

### Tabel Pelanggan
- id (Primary Key)
- nama (VARCHAR 100)
- no_hp (VARCHAR 20)
- alamat (TEXT)
- catatan (TEXT)
- created_at, updated_at

### Tabel Layanan
- id (Primary Key)
- nama (VARCHAR 100)
- harga_per_kg (INT)
- estimasi_waktu (VARCHAR 50)
- created_at, updated_at

### Tabel Transaksi
- id (Primary Key)
- pelanggan_id (Foreign Key)
- layanan_id (Foreign Key)
- berat (FLOAT)
- total_harga (INT)
- status (ENUM: Baru Masuk, Dalam Proses, Selesai, Sudah Diambil)
- tanggal_masuk (DATE)
- tanggal_selesai (DATE)
- created_at, updated_at

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 10
- **Frontend**: Bootstrap 5, Bootstrap Icons
- **Database**: SQLite (default), MySQL/PostgreSQL (opsional)
- **Language**: PHP 8.1+

## 📦 Instalasi

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM (untuk asset compilation)

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd manajemen-laundry
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   - Edit file `.env`
   - Set `DB_CONNECTION=sqlite` untuk menggunakan SQLite
   - Atau set kredensial MySQL/PostgreSQL

5. **Jalankan migration dan seeder**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Compile assets (opsional)**
   ```bash
   npm run dev
   ```

7. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi**
   - Buka browser: `http://localhost:8000`
   - Login dengan:
     - Email: `admin@laundry.com`
     - Password: `password123`

## 📁 Struktur Folder

```
manajemen-laundry/
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/
│   │   ├── DashboardController.php
│   │   ├── PelangganController.php
│   │   ├── LayananController.php
│   │   └── TransaksiController.php
│   └── Models/
│       ├── Pelanggan.php
│       ├── Layanan.php
│       └── Transaksi.php
├── database/
│   ├── migrations/
│   │   ├── create_pelanggans_table.php
│   │   ├── create_layanans_table.php
│   │   └── create_transaksis_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php
│   │   └── sidebar.blade.php
│   ├── dashboard.blade.php
│   ├── pelanggans/
│   ├── layanans/
│   └── transaksis/
└── routes/
    └── web.php
```

## 🎯 Fitur Detail

### Dashboard
- Statistik total pelanggan, layanan, dan transaksi
- Overview status transaksi
- Daftar transaksi terbaru

### Manajemen Pelanggan
- Tambah, edit, hapus data pelanggan
- Pencarian berdasarkan nama, no HP, atau alamat
- Pagination data

### Manajemen Layanan
- Tambah, edit, hapus data layanan
- Set harga per kg dan estimasi waktu
- Pencarian berdasarkan nama layanan

### Manajemen Transaksi
- Tambah transaksi dengan perhitungan otomatis
- Update status transaksi
- Filter berdasarkan status
- Pencarian berdasarkan nama pelanggan

## 🔧 Konfigurasi Tambahan

### Database MySQL/PostgreSQL
Jika ingin menggunakan MySQL atau PostgreSQL, edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=manajemen_laundry
DB_USERNAME=root
DB_PASSWORD=
```

### Customization
- Edit file `resources/views/layouts/app.blade.php` untuk mengubah tema
- Modifikasi CSS di bagian `<style>` untuk custom styling
- Tambahkan fitur baru di controllers dan views

## 🚀 Deployment

### Production Setup
1. Set `APP_ENV=production` di `.env`
2. Set `APP_DEBUG=false`
3. Generate application key: `php artisan key:generate`
4. Clear cache: `php artisan config:cache`
5. Optimize autoloader: `composer install --optimize-autoloader --no-dev`

### Web Server Configuration
- Apache: Pastikan mod_rewrite enabled
- Nginx: Gunakan konfigurasi Laravel standard
- Set document root ke folder `public/`

## 📝 License

Project ini dibuat untuk keperluan pembelajaran dan dapat digunakan secara bebas.

## 🤝 Kontribusi

Silakan berkontribusi dengan:
1. Fork repository
2. Buat feature branch
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## 📞 Support

Untuk pertanyaan atau bantuan, silakan buat issue di repository ini.

---

**Dibuat dengan ❤️ menggunakan Laravel** 