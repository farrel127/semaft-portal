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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique(); // Untuk URL yang rapi (SEO friendly)
            $table->text('konten');
            $table->string('gambar')->nullable(); // Foto sampul berita
            
            // Relasi ke tabel users (Siapa yang menulis)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Relasi ke tabel himpunan (Dari prodi mana)
            // Nullable agar Superadmin (yang tidak punya himpunan) juga bisa posting
            $table->foreignId('himpunan_id')->nullable()->constrained('himpunans')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
