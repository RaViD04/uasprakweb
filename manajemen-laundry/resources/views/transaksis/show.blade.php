@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Transaksi</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaksi #{{ $transaksi->id }}</h5>
            <p class="card-text"><strong>Pelanggan:</strong> {{ $transaksi->pelanggan->nama ?? '-' }}</p>
            <p class="card-text"><strong>Layanan:</strong> {{ $transaksi->layanan->nama ?? '-' }}</p>
            <p class="card-text"><strong>Berat:</strong> {{ $transaksi->berat }} kg</p>
            <p class="card-text"><strong>Total Harga:</strong> Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $transaksi->status }}</p>
            <p class="card-text"><strong>Tanggal Masuk:</strong> {{ $transaksi->tanggal_masuk }}</p>
            <p class="card-text"><strong>Tanggal Selesai:</strong> {{ $transaksi->tanggal_selesai ?? '-' }}</p>
            <a href="{{ route('transaksis.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection 