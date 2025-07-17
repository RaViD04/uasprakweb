<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Pelanggan routes
Route::resource('pelanggans', PelangganController::class);

// Layanan routes
Route::resource('layanans', LayananController::class);

// Transaksi routes
Route::resource('transaksis', TransaksiController::class);
Route::patch('transaksis/{transaksi}/status', [TransaksiController::class, 'updateStatus'])->name('transaksis.update-status');
