<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $pembayarans = Pembayaran::with([
        'booking.lapangan'
    ])
    ->whereHas('booking', function ($query) {
        $query->where('user_id', auth()->id());
    })
    ->latest()
    ->get();

    return view(
        'user.pembayaran.index',
        compact('pembayarans')
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $bookings = Booking::where('user_id', auth()->id())
        ->where('status_booking', 'Menunggu Pembayaran')
        ->get();

    return view('user.pembayaran.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'metode_pembayaran' => 'required',
        'bukti_transfer' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $booking = Booking::findOrFail($request->booking_id);

    $namaFile = null;

    if ($request->hasFile('bukti_transfer')) {

        $namaFile = time().'_'.$request->file('bukti_transfer')->getClientOriginalName();

        $request->file('bukti_transfer')
            ->move(public_path('bukti_transfer'), $namaFile);
    }

    Pembayaran::create([
        'booking_id' => $booking->id,
        'metode_pembayaran' => $request->metode_pembayaran,
        'bukti_transfer' => $namaFile,
        'jumlah_bayar' => $booking->total_harga,
        'status_pembayaran' => 'Pending',
    ]);

    $booking->update([
        'status_booking' => 'Menunggu Verifikasi'
    ]);

    return redirect()
        ->route('booking.index')
        ->with('success', 'Bukti pembayaran berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $pembayaran = Pembayaran::with([
        'booking',
        'booking.lapangan'
    ])->findOrFail($id);

    return view(
        'user.pembayaran.show',
        compact('pembayaran')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
