<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DetailPembayaranController extends Controller
{
    /**
     * Daftar seluruh pembayaran
     */
    public function index()
    {
        $pembayarans = Pembayaran::with([
            'booking.user',
            'booking.lapangan'
        ])
        ->latest()
        ->get();

        return view(
            'admin.detail-pembayaran.index',
            compact('pembayarans')
        );
    }

    /**
     * Detail pembayaran
     */
    public function show(string $id)
    {
        $pembayaran = Pembayaran::with([
            'booking.user',
            'booking.lapangan'
        ])
        ->findOrFail($id);

        return view(
            'admin.detail-pembayaran.show',
            compact('pembayaran')
        );
    }

    /**
     * Setujui pembayaran
     */
    public function setujui($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'status_pembayaran' => 'Lunas'
        ]);

        $pembayaran->booking->update([
            'status_booking' => 'Disetujui'
        ]);

        return redirect()
            ->route('detail-pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil disetujui'
            );
    }

    /**
     * Tolak pembayaran
     */
    public function tolak($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'status_pembayaran' => 'Ditolak'
        ]);

        $pembayaran->booking->update([
            'status_booking' => 'Dibatalkan'
        ]);

        return redirect()
            ->route('detail-pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil ditolak'
            );
    }

    /**
     * Tidak digunakan
     */
    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        abort(404);
    }

    public function update(Request $request, string $id)
    {
        abort(404);
    }

    public function destroy(string $id)
    {
        abort(404);
    }
}