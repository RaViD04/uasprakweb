@extends('layouts.app')

@section('title', 'Data Transaksi - Manajemen Laundry')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Data Transaksi</h1>
            <a href="{{ route('transaksis.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Transaksi
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <form method="GET" action="{{ route('transaksis.index') }}" class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Cari nama pelanggan..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                        <a href="{{ route('transaksis.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if($transaksis->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Pelanggan</th>
                                    <th width="15%">Layanan</th>
                                    <th width="10%">Berat</th>
                                    <th width="15%">Total</th>
                                    <th width="15%">Status</th>
                                    <th width="10%">Tanggal</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $index => $transaksi)
                                <tr>
                                    <td>{{ $transaksis->firstItem() + $index }}</td>
                                    <td>{{ $transaksi->pelanggan->nama }}</td>
                                    <td>{{ $transaksi->layanan->nama }}</td>
                                    <td>{{ $transaksi->formatted_berat }}</td>
                                    <td>{{ $transaksi->formatted_total_harga }}</td>
                                    <td>
                                        <span class="{{ $transaksi->status_badge }}">
                                            {{ $transaksi->status }}
                                        </span>
                                    </td>
                                    <td>{{ $transaksi->tanggal_masuk->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('transaksis.edit', $transaksi) }}" 
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('transaksis.show', $transaksi) }}" 
                                               class="btn btn-sm btn-info" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('transaksis.destroy', $transaksi) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $transaksis->links() }}
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-receipt fa-3x text-muted"></i>
                        <p class="text-muted mt-2">Belum ada data transaksi</p>
                        <a href="{{ route('transaksis.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Transaksi Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 