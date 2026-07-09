<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar booking milik user
     */
    public function index()
    {
        $bookings = Booking::with([
            'lapangan',
            'jadwal'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view('user.booking.index', compact('bookings'));
    }

    /**
     * Form booking
     */
    public function create()
    {
        $lapangans = Lapangan::where('status', 'Tersedia')->get();

        return view('user.booking.create', compact('lapangans'));
    }

    /**
     * Simpan booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id'  => 'required|exists:lapangans,id',
            'jadwal_id'    => 'required|exists:jadwals,id',
            'tanggal_main' => 'required|date',
        ]);

        $lapangan = Lapangan::findOrFail($request->lapangan_id);
        $jadwal = Jadwal::findOrFail($request->jadwal_id);

        // Cek apakah jadwal sudah dibooking pada tanggal yang sama
        $cekBooking = Booking::where('lapangan_id', $request->lapangan_id)
            ->where('jadwal_id', $request->jadwal_id)
            ->where('tanggal_main', $request->tanggal_main)
            ->where('status_booking', '!=', 'Dibatalkan')
            ->exists();

        if ($cekBooking) {
            return back()
                ->withInput()
                ->with('error', 'Jadwal tersebut sudah dibooking.');
        }

        $durasi = (
            strtotime($jadwal->jam_selesai)
            -
            strtotime($jadwal->jam_mulai)
        ) / 3600;

        $totalHarga = $durasi * $lapangan->harga_per_jam;

        Booking::create([
            'user_id'        => Auth::id(),
            'lapangan_id'    => $request->lapangan_id,
            'jadwal_id'      => $request->jadwal_id,
            'tanggal_main'   => $request->tanggal_main,
            'durasi'         => $durasi,
            'total_harga'    => $totalHarga,
            'status_booking' => 'Menunggu Pembayaran',
        ]);

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking berhasil dibuat.');
    }

    /**
     * Detail booking
     */
    public function show(string $id)
    {
        $booking = Booking::with([
            'lapangan',
            'jadwal',
            'pembayaran'
        ])->findOrFail($id);

        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        return view('user.booking.show', compact('booking'));
    }

    /**
     * Tidak digunakan
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Tidak digunakan
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Batalkan booking
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        if ($booking->status_booking == 'Disetujui') {
            return back()->with(
                'error',
                'Booking yang sudah disetujui tidak dapat dibatalkan.'
            );
        }

        $booking->update([
            'status_booking' => 'Dibatalkan'
        ]);

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
    public function getJadwal(Request $request)
{
    $lapanganId = $request->lapangan_id;
    $tanggal = $request->tanggal;

    $jadwalTerpakai = Booking::where(
            'lapangan_id',
            $lapanganId
        )
        ->where(
            'tanggal_main',
            $tanggal
        )
        ->where(
            'status_booking',
            '!=',
            'Dibatalkan'
        )
        ->pluck('jadwal_id');

    $jadwals = Jadwal::whereNotIn(
        'id',
        $jadwalTerpakai
    )->get();

    return response()->json($jadwals);
}
}