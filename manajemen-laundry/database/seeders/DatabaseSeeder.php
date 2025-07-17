<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin Laundry',
            'email' => 'admin@laundry.com',
            'password' => bcrypt('password123'),
        ]);

        // Create sample customers
        Pelanggan::create([
            'nama' => 'John Doe',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'catatan' => 'Pelanggan tetap'
        ]);

        Pelanggan::create([
            'nama' => 'Jane Smith',
            'no_hp' => '081234567891',
            'alamat' => 'Jl. Sample No. 456, Bandung',
            'catatan' => 'Suka pakaian halus'
        ]);

        // Create sample services
        Layanan::create([
            'nama' => 'Cuci Reguler',
            'harga_per_kg' => 8000,
            'estimasi_waktu' => '2-3 hari'
        ]);

        Layanan::create([
            'nama' => 'Cuci Express',
            'harga_per_kg' => 15000,
            'estimasi_waktu' => '1 hari'
        ]);

        Layanan::create([
            'nama' => 'Cuci Premium',
            'harga_per_kg' => 12000,
            'estimasi_waktu' => '2 hari'
        ]);

        // Create sample transactions
        Transaksi::create([
            'pelanggan_id' => 1,
            'layanan_id' => 1,
            'berat' => 2.5,
            'total_harga' => 20000,
            'status' => 'Selesai',
            'tanggal_masuk' => now()->subDays(5),
            'tanggal_selesai' => now()->subDays(2)
        ]);

        Transaksi::create([
            'pelanggan_id' => 2,
            'layanan_id' => 2,
            'berat' => 1.8,
            'total_harga' => 27000,
            'status' => 'Dalam Proses',
            'tanggal_masuk' => now()->subDays(1)
        ]);
    }
}
