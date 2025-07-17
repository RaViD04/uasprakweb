<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';
    
    protected $fillable = [
        'nama',
        'harga_per_kg',
        'estimasi_waktu'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function getTotalTransaksiAttribute()
    {
        return $this->transaksis()->count();
    }

    public function getTotalPendapatanAttribute()
    {
        return $this->transaksis()->sum('total_harga');
    }

    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga_per_kg, 0, ',', '.');
    }
} 