@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pelanggan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama }}</h5>
            <p class="card-text"><strong>No HP:</strong> {{ $pelanggan->no_hp }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p class="card-text"><strong>Catatan:</strong> {{ $pelanggan->catatan }}</p>
            <a href="{{ route('pelanggans.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection 