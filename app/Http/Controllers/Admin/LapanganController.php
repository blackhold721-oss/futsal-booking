<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::latest()->get();

        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_lapangan' => 'required|max:100',
        'jenis_rumput' => 'required',
        'harga_per_jam' => 'required|numeric',
        'foto_lapangan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'deskripsi' => 'nullable',
        'status' => 'required',
    ]);

    $foto = null;

    if ($request->hasFile('foto_lapangan')) {
        $foto = $request->file('foto_lapangan')
            ->store('lapangan', 'public');
    }

    Lapangan::create([
        'nama_lapangan' => $request->nama_lapangan,
        'jenis_rumput' => $request->jenis_rumput,
        'harga_per_jam' => $request->harga_per_jam,
        'foto_lapangan' => $foto,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('lapangan.index')
        ->with('success', 'Data lapangan berhasil ditambahkan');
    }

    public function show(string $id)
    {
    $lapangan = Lapangan::findOrFail($id);

    return view('admin.lapangan.show', compact('lapangan'));

    }

    public function edit(string $id)
    {
         $lapangan = Lapangan::findOrFail($id);

    return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, string $id)
    {
         $lapangan = Lapangan::findOrFail($id);

    $request->validate([
        'nama_lapangan' => 'required',
        'jenis_rumput' => 'required',
        'harga_per_jam' => 'required|numeric',
        'status' => 'required',
    ]);

    $lapangan->update([
        'nama_lapangan' => $request->nama_lapangan,
        'jenis_rumput' => $request->jenis_rumput,
        'harga_per_jam' => $request->harga_per_jam,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('lapangan.index')
        ->with('success', 'Data lapangan berhasil diupdate');
    }

    public function destroy(string $id)
    {
            $lapangan = Lapangan::findOrFail($id);

    $lapangan->delete();

    return redirect()
        ->route('lapangan.index')
        ->with('success', 'Data lapangan berhasil dihapus');
    }
}