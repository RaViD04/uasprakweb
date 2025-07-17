@extends('layouts.app')

@section('title', 'Data Pelanggan - Manajemen Laundry')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Data Pelanggan</h1>
            <a href="{{ route('pelanggans.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Pelanggan
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <form method="GET" action="{{ route('pelanggans.index') }}" class="row g-3">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Cari nama, no HP, atau alamat..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('pelanggans.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if($pelanggans->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">No HP</th>
                                    <th width="25%">Alamat</th>
                                    <th width="20%">Catatan</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggans as $index => $pelanggan)
                                <tr>
                                    <td>{{ $pelanggans->firstItem() + $index }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->no_hp }}</td>
                                    <td>{{ $pelanggan->alamat ?? '-' }}</td>
                                    <td>{{ $pelanggan->catatan ?? '-' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('pelanggans.edit', $pelanggan) }}" 
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('pelanggans.show', $pelanggan) }}" 
                                               class="btn btn-sm btn-info" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('pelanggans.destroy', $pelanggan) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
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
                        {{ $pelanggans->links() }}
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-people fa-3x text-muted"></i>
                        <p class="text-muted mt-2">Belum ada data pelanggan</p>
                        <a href="{{ route('pelanggans.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Pelanggan Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 