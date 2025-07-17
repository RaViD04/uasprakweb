<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $totalLayanan = Layanan::count();
        $totalTransaksi = Transaksi::count();
        $transaksiBaru = Transaksi::where('status', 'Baru Masuk')->count();
        $transaksiProses = Transaksi::where('status', 'Dalam Proses')->count();
        $transaksiSelesai = Transaksi::where('status', 'Selesai')->count();
        
        $transaksiTerbaru = Transaksi::with(['pelanggan', 'layanan'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalPelanggan',
            'totalLayanan', 
            'totalTransaksi',
            'transaksiBaru',
            'transaksiProses',
            'transaksiSelesai',
            'transaksiTerbaru'
        ));
    }
} 