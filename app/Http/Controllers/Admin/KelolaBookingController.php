<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class KelolaBookingController extends Controller
{
    /**
     * Menampilkan seluruh booking
     */
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'lapangan',
            'jadwal'
        ])
        ->latest()
        ->get();

        return view(
            'admin.kelola-booking.index',
            compact('bookings')
        );
    }

    /**
     * Detail booking
     */
    public function show(string $id)
    {
        $booking = Booking::with([
            'user',
            'lapangan',
            'jadwal',
            'pembayaran'
        ])->findOrFail($id);

        return view(
            'admin.kelola-booking.show',
            compact('booking')
        );
    }

    /**
     * Hapus booking
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect()
            ->route('kelola-booking.index')
            ->with(
                'success',
                'Booking berhasil dihapus'
            );
    }
}