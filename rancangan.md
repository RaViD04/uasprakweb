study kasus:
Saya ingin membuat mvp aplikasi web CRUD menggunakan Laravel dengan judul Manajemen Laundry. Waktu pembuatan aplikasi yaitu 2 minggu. Jumlah actor yaitu 1. Buatkan daftar alur kerja dan fitur yang harus saya buat beserta deskripsinya.

nama database :
manajemen_laundry

tabel pelanggan :
CREATE TABLE pelanggans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    alamat TEXT,
    catatan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

tabel layanan :
CREATE TABLE layanans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga_per_kg INT NOT NULL,
    estimasi_waktu VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

tabel transaksi :
CREATE TABLE transaksis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pelanggan_id INT NOT NULL,
    layanan_id INT NOT NULL,
    berat FLOAT NOT NULL,
    total_harga INT NOT NULL,
    status ENUM('Baru Masuk', 'Dalam Proses', 'Selesai', 'Sudah Diambil') DEFAULT 'Baru Masuk',
    tanggal_masuk DATE NOT NULL,
    tanggal_selesai DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (pelanggan_id) REFERENCES pelanggans(id) ON DELETE CASCADE,
    FOREIGN KEY (layanan_id) REFERENCES layanans(id) ON DELETE CASCADE
);

tabel user admin:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


susunan folder dan file : 
manajemen-laundry/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   ├── DashboardController.php
│   │   │   ├── PelangganController.php
│   │   │   ├── LayananController.php
│   │   │   └── TransaksiController.php
│   │   └── Middleware/
│   │
│   ├── Models/
│   │   ├── Pelanggan.php
│   │   ├── Layanan.php
│   │   └── Transaksi.php
│
├── database/
│   ├── migrations/
│   │   ├── xxxx_xx_xx_create_pelanggans_table.php
│   │   ├── xxxx_xx_xx_create_layanans_table.php
│   │   └── xxxx_xx_xx_create_transaksis_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php     ← Template utama
│   │   │   └── sidebar.blade.php ← Menu samping
│   │   ├── dashboard.blade.php
│   │   ├── pelanggans/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   ├── layanans/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   └── transaksis/
│   │       ├── index.blade.php
│   │       ├── create.blade.php
│   │       └── edit.blade.php
│
├── routes/
│   └── web.php      ← Semua route utama
│
├── public/
│   ├── css/
│   ├── js/
│   └── assets/      ← Tambahan gambar/logo
│
├── .env             ← Konfigurasi database & lainnya
├── composer.json
└── package.json

Fitur Minimum yang Wajib Ada:
Desain antarmuka responsif menggunakan framework CSS (Bootstrap atau Tailwind CSS)
Implementasi fungsi CRUD secara lengkap menggunakan Laravel
Fitur pencarian data
Validasi input pada form

Teknologi yang Digunakan:
Laravel (framework PHP)
Bootstrap atau Tailwind CSS (pilih salah satu)
MySQL (sebagai basis data)
Livewire atau Alpine.js (opsional, sesuai kebutuhan pengembangan)