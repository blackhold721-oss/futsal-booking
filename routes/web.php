<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LapanganController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\PembayaranController;
use App\Http\Controllers\Admin\DetailPembayaranController;
use App\Http\Controllers\Admin\KelolaBookingController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Lapangan;
use App\Models\Jadwal;
use App\Models\Booking;
use App\Models\Pembayaran;
use App\Models\User;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/dashboard', function () {

        $userId = auth()->id();

        $lapangans = Lapangan::where(
            'status',
            'Tersedia'
        )->take(4)->get();

        return view('dashboard', [
            'totalBooking' => Booking::where('user_id', $userId)->count(),
            'bookingBayar' => Booking::where('user_id', $userId)
                ->where('status_booking', 'Menunggu Pembayaran')
                ->count(),

            'bookingVerifikasi' => Booking::where('user_id', $userId)
                ->where('status_booking', 'Menunggu Verifikasi')
                ->count(),

            'bookingDisetujui' => Booking::where('user_id', $userId)
                ->where('status_booking', 'Disetujui')
                ->count(),

            'bookingDibatalkan' => Booking::where('user_id', $userId)
                ->where('status_booking', 'Dibatalkan')
                ->count(),

            'bookingTerbaru' => Booking::with([
                'lapangan',
                'jadwal'
            ])
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get(),

            'lapangans' => $lapangans
        ]);

    })
    ->middleware(['verified'])
    ->name('dashboard');

    // BOOKING
    Route::resource(
        'booking',
        BookingController::class
    )->names('user.booking');

    // PEMBAYARAN
    Route::resource(
        'pembayaran',
        PembayaranController::class
    )->names('user.pembayaran');

    Route::get(
        '/get-jadwal',
        [BookingController::class, 'getJadwal']
    )->name('booking.getJadwal');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('/admin/dashboard', function () {

$totalLapangan = Lapangan::count();

$totalJadwal = Jadwal::count();

$totalBooking = Booking::count();

$totalUser = User::count();

$totalPembayaran = Pembayaran::where(
    'status_pembayaran',
    'Lunas'
)->count();

$totalPendapatan = Pembayaran::where(
    'status_pembayaran',
    'Lunas'
)->sum('jumlah_bayar');

$bookingTerbaru = Booking::with([
    'user',
    'lapangan',
    'jadwal'
])
->latest()
->take(5)
->get();

$lapangans = Lapangan::all();

return view('admin.dashboard', compact(
    'totalLapangan',
    'totalJadwal',
    'totalBooking',
    'totalUser',
    'totalPembayaran',
    'totalPendapatan',
    'bookingTerbaru',
    'lapangans'
));

})->name('admin.dashboard');

    Route::resource('lapangan', LapanganController::class);
    Route::resource('jadwal', JadwalController::class);
     Route::get(
        'detail-pembayaran',
        [DetailPembayaranController::class, 'index']
    )->name('detail-pembayaran.index');

    Route::get(
        'detail-pembayaran/{id}',
        [DetailPembayaranController::class, 'show']
    )->name('detail-pembayaran.show');

    Route::put(
        'detail-pembayaran/{id}/setujui',
        [DetailPembayaranController::class, 'setujui']
    )->name('detail-pembayaran.setujui');

    Route::put(
        'detail-pembayaran/{id}/tolak',
        [DetailPembayaranController::class, 'tolak']
    )->name('detail-pembayaran.tolak');
    Route::resource('kelola-booking', KelolaBookingController::class);
    Route::get(
    '/laporan-booking',
    [LaporanController::class, 'index']
)->name('laporan-booking.index');
Route::get(
    '/laporan-booking/pdf',
    [LaporanController::class, 'pdf']
)->name('laporan-booking.pdf');
    Route::resource('user-management', UserController::class);
});


// Route bawaan Breeze untuk profile silakan biarkan tetap ada
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
