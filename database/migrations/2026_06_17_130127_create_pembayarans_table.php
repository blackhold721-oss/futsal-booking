<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
        $table->enum('metode_pembayaran', [
    'Transfer Bank',
    'QRIS',
    'Cash'
]);
        $table->string('bukti_transfer')->nullable(); // Path file gambar bukti transfer
        $table->integer('jumlah_bayar');
        $table->enum('status_pembayaran', ['Belum Lunas', 'Pending', 'Lunas', 'Ditolak'])->default('Belum Lunas');
        $table->timestamp('tanggal_bayar')->useCurrent();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
