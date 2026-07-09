<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lapangan_id',
        'jadwal_id',
        'tanggal_main',
        'durasi',
        'total_harga',
        'status_booking',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Lapangan
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    // Relasi ke Pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}