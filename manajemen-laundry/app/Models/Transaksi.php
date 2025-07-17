<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    
    protected $fillable = [
        'pelanggan_id',
        'layanan_id',
        'berat',
        'total_harga',
        'status',
        'tanggal_masuk',
        'tanggal_selesai'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_selesai' => 'date',
        'berat' => 'float',
        'total_harga' => 'integer'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function getFormattedTotalHargaAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }

    public function getFormattedBeratAttribute()
    {
        return $this->berat . ' kg';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Baru Masuk' => 'badge bg-primary',
            'Dalam Proses' => 'badge bg-warning',
            'Selesai' => 'badge bg-success',
            'Sudah Diambil' => 'badge bg-info'
        ];

        return $badges[$this->status] ?? 'badge bg-secondary';
    }
} 