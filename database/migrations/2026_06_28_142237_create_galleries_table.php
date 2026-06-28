<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('galleries', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('gambar'); // Untuk menyimpan path/nama file gambar
        $table->string('kategori'); // Misalnya: 'Monthly Recap', 'Logo & Bisnis', 'Kegiatan'
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
