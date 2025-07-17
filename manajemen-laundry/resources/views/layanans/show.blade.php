@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Layanan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $layanan->nama }}</h5>
            <p class="card-text"><strong>Harga per Kg:</strong> Rp{{ number_format($layanan->harga_per_kg, 0, ',', '.') }}</p>
            <p class="card-text"><strong>Estimasi Waktu:</strong> {{ $layanan->estimasi_waktu }}</p>
            <a href="{{ route('layanans.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection 