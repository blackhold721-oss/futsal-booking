<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with('lapangan')
            ->latest()
            ->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lapangans = Lapangan::all();

        return view('admin.jadwal.create', compact('lapangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Jadwal::create([
            'lapangan_id' => $request->lapangan_id,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwal::with('lapangan')
            ->findOrFail($id);

        return view('admin.jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $lapangans = Lapangan::all();

        return view('admin.jadwal.edit', compact(
            'jadwal',
            'lapangans'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'lapangan_id' => $request->lapangan_id,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}