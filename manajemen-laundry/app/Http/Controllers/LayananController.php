<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $query = Layanan::query();
        
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('estimasi_waktu', 'like', '%' . $request->search . '%');
        }
        
        $layanans = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('layanans.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga_per_kg' => 'required|integer|min:0',
            'estimasi_waktu' => 'required|string|max:50'
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanans.index')
            ->with('success', 'Layanan berhasil ditambahkan');
    }



    public function edit(Layanan $layanan)
    {
        return view('layanans.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'harga_per_kg' => 'required|integer|min:0',
            'estimasi_waktu' => 'required|string|max:50'
        ]);

        $layanan->update($request->all());

        return redirect()->route('layanans.index')
            ->with('success', 'Data layanan berhasil diperbarui');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('layanans.index')
            ->with('success', 'Layanan berhasil dihapus');
    }

    public function show(Layanan $layanan)
    {
        return view('layanans.show', compact('layanan'));
    }

} 