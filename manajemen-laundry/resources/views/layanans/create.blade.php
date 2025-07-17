@extends('layouts.app')

@section('title', 'Tambah Layanan - Manajemen Laundry')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Tambah Layanan</h1>
            <a href="{{ route('layanans.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Layanan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('layanans.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       id="nama" name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga_per_kg" class="form-label">Harga per Kg <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('harga_per_kg') is-invalid @enderror" 
                                           id="harga_per_kg" name="harga_per_kg" value="{{ old('harga_per_kg') }}" 
                                           min="0" required>
                                </div>
                                @error('harga_per_kg')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="estimasi_waktu" class="form-label">Estimasi Waktu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('estimasi_waktu') is-invalid @enderror" 
                               id="estimasi_waktu" name="estimasi_waktu" value="{{ old('estimasi_waktu') }}" 
                               placeholder="Contoh: 2-3 hari, 1 hari" required>
                        @error('estimasi_waktu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('layanans.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 