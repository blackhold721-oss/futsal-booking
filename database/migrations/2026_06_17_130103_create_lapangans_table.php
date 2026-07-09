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
    Schema::create('lapangans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lapangan');
        $table->enum('jenis_rumput', ['Sintetis', 'Interlock', 'Vinyil', 'Semen']);
        $table->integer('harga_per_jam');
        $table->string('foto_lapangan')->nullable(); // Menyimpan nama/path file foto
        $table->text('deskripsi')->nullable();
        $table->enum('status', ['Tersedia', 'Perbaikan'])->default('Tersedia');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangans');
    }
};
