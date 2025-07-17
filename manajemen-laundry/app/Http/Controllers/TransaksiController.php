<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['pelanggan', 'layanan']);
        
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('pelanggan', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $transaksis = $query->orderBy('created_at', 'desc')->paginate(10);
        $statuses = ['Baru Masuk', 'Dalam Proses', 'Selesai', 'Sudah Diambil'];
        
        return view('transaksis.index', compact('transaksis', 'statuses'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        $layanans = Layanan::orderBy('nama')->get();
        
        return view('transaksis.create', compact('pelanggans', 'layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',
            'status' => 'required|in:Baru Masuk,Dalam Proses,Selesai,Sudah Diambil',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_masuk'
        ]);

        // Calculate total price
        $layanan = Layanan::find($request->layanan_id);
        $total_harga = $layanan->harga_per_kg * $request->berat;

        $transaksi = new Transaksi($request->all());
        $transaksi->total_harga = $total_harga;
        $transaksi->save();

        return redirect()->route('transaksis.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }



    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        $layanans = Layanan::orderBy('nama')->get();
        $statuses = ['Baru Masuk', 'Dalam Proses', 'Selesai', 'Sudah Diambil'];
        
        return view('transaksis.edit', compact('transaksi', 'pelanggans', 'layanans', 'statuses'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',
            'status' => 'required|in:Baru Masuk,Dalam Proses,Selesai,Sudah Diambil',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_masuk'
        ]);

        // Calculate total price
        $layanan = Layanan::find($request->layanan_id);
        $total_harga = $layanan->harga_per_kg * $request->berat;

        $transaksi->update($request->all());
        $transaksi->total_harga = $total_harga;
        $transaksi->save();

        return redirect()->route('transaksis.index')
            ->with('success', 'Data transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksis.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }

    public function updateStatus(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'status' => 'required|in:Baru Masuk,Dalam Proses,Selesai,Sudah Diambil'
        ]);

        $transaksi->status = $request->status;
        
        if ($request->status == 'Selesai' && !$transaksi->tanggal_selesai) {
            $transaksi->tanggal_selesai = now()->toDateString();
        }
        
        $transaksi->save();

        return redirect()->route('transaksis.index')
            ->with('success', 'Status transaksi berhasil diperbarui');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }
} 