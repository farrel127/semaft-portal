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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel Himpunan (Siapa penyelenggaranya?)
            $table->foreignId('himpunan_id')->nullable()->constrained('himpunans')->onDelete('cascade');
            
            // Detail Acara
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai')->nullable();
            $table->string('lokasi'); // Contoh: GSG USB YPKP, Lab Komputer, dll.
            $table->string('gambar_poster')->nullable();
            
            // Status acara
            $table->enum('status', ['Akan Datang', 'Berlangsung', 'Selesai'])->default('Akan Datang');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
