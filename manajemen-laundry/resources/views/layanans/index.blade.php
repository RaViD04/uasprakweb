@extends('layouts.app')

@section('title', 'Data Layanan - Manajemen Laundry')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Data Layanan</h1>
            <a href="{{ route('layanans.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Layanan
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <form method="GET" action="{{ route('layanans.index') }}" class="row g-3">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Cari nama layanan atau estimasi waktu..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('layanans.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if($layanans->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Nama Layanan</th>
                                    <th width="20%">Harga per Kg</th>
                                    <th width="20%">Estimasi Waktu</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($layanans as $index => $layanan)
                                <tr>
                                    <td>{{ $layanans->firstItem() + $index }}</td>
                                    <td>{{ $layanan->nama }}</td>
                                    <td>{{ $layanan->formatted_harga }}</td>
                                    <td>{{ $layanan->estimasi_waktu }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('layanans.edit', $layanan) }}" 
                                               class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('layanans.show', $layanan) }}" 
                                               class="btn btn-sm btn-info" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <form action="{{ route('layanans.destroy', $layanan) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
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
                        {{ $layanans->links() }}
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-list-check fa-3x text-muted"></i>
                        <p class="text-muted mt-2">Belum ada data layanan</p>
                        <a href="{{ route('layanans.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Layanan Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 