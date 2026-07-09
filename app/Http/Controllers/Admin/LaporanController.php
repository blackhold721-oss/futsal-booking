<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with([
            'user',
            'lapangan',
            'jadwal'
        ]);

        if ($request->tanggal) {

            $query->whereDate(
                'tanggal_main',
                $request->tanggal
            );
        }

        $bookings = $query
            ->latest()
            ->get();

        return view(
            'admin.laporan.index',
            compact('bookings')
        );
    }

    public function pdf()
    {
        $bookings = Booking::with([
            'user',
            'lapangan',
            'jadwal'
        ])
        ->latest()
        ->get();

        $pdf = Pdf::loadView(
            'admin.laporan.pdf',
            compact('bookings')
        );

        return $pdf->stream('laporan-booking.pdf');

        // Jika ingin langsung download:
        // return $pdf->download('laporan-booking.pdf');
    }
}