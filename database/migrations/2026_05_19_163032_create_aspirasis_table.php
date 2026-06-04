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
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id();
            
            // Nama pengirim (Boleh kosong jika ingin Anonim)
            $table->string('nama_pengirim')->nullable();
            
            // Dari prodi mana keluhan ini berasal
            $table->foreignId('himpunan_id')->constrained('himpunans')->onDelete('cascade');
            
            // Isi pesan aspirasinya
            $table->text('pesan');
            
            // Status tindak lanjut dari admin SEMAFT
            $table->enum('status', ['Menunggu', 'Dibaca', 'Selesai'])->default('Menunggu');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
