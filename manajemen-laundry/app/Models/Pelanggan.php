<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'catatan'
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function getTotalTransaksiAttribute()
    {
        return $this->transaksis()->count();
    }

    public function getTotalSpentAttribute()
    {
        return $this->transaksis()->sum('total_harga');
    }
} 