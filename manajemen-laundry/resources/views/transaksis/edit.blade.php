@extends('layouts.app')

@section('title', 'Edit Transaksi - Manajemen Laundry')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Edit Transaksi</h1>
            <a href="{{ route('transaksis.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Transaksi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('transaksis.update', $transaksi) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pelanggan_id" class="form-label">Pelanggan <span class="text-danger">*</span></label>
                                <select class="form-select @error('pelanggan_id') is-invalid @enderror" 
                                        id="pelanggan_id" name="pelanggan_id" required>
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}" 
                                                {{ old('pelanggan_id', $transaksi->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                                            {{ $pelanggan->nama }} - {{ $pelanggan->no_hp }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pelanggan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="layanan_id" class="form-label">Layanan <span class="text-danger">*</span></label>
                                <select class="form-select @error('layanan_id') is-invalid @enderror" 
                                        id="layanan_id" name="layanan_id" required>
                                    <option value="">Pilih Layanan</option>
                                    @foreach($layanans as $layanan)
                                        <option value="{{ $layanan->id }}" 
                                                data-harga="{{ $layanan->harga_per_kg }}"
                                                {{ old('layanan_id', $transaksi->layanan_id) == $layanan->id ? 'selected' : '' }}>
                                            {{ $layanan->nama }} - {{ $layanan->formatted_harga }}/kg
                                        </option>
                                    @endforeach
                                </select>
                                @error('layanan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat (kg) <span class="text-danger">*</span></label>
                                <input type="number" step="0.1" class="form-control @error('berat') is-invalid @enderror" 
                                       id="berat" name="berat" value="{{ old('berat', $transaksi->berat) }}" min="0.1" required>
                                @error('berat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="total_harga" class="form-label">Total Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="total_harga" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" 
                                        id="status" name="status" required>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}" 
                                                {{ old('status', $transaksi->status) == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                                       id="tanggal_masuk" name="tanggal_masuk" 
                                       value="{{ old('tanggal_masuk', $transaksi->tanggal_masuk->format('Y-m-d')) }}" required>
                                @error('tanggal_masuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                                       id="tanggal_selesai" name="tanggal_selesai" 
                                       value="{{ old('tanggal_selesai', $transaksi->tanggal_selesai ? $transaksi->tanggal_selesai->format('Y-m-d') : '') }}">
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('transaksis.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const layananSelect = document.getElementById('layanan_id');
    const beratInput = document.getElementById('berat');
    const totalHargaInput = document.getElementById('total_harga');
    
    function calculateTotal() {
        const selectedOption = layananSelect.options[layananSelect.selectedIndex];
        const harga = selectedOption.dataset.harga || 0;
        const berat = beratInput.value || 0;
        const total = harga * berat;
        
        totalHargaInput.value = total.toLocaleString('id-ID');
    }
    
    layananSelect.addEventListener('change', calculateTotal);
    beratInput.addEventListener('input', calculateTotal);
    
    // Calculate on page load
    calculateTotal();
});
</script>
@endpush 