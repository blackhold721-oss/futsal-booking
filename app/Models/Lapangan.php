<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lapangan',
        'jenis_rumput',
        'harga_per_jam',
        'foto_lapangan',
        'deskripsi',
        'status',
    ];

    // Relasi: Satu lapangan punya banyak slot jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    // Relasi: Satu lapangan bisa di-booking berkali-kali
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}