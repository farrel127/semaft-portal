<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            // Mengecek agar tidak error jika kolom ternyata sudah ada
            if (!Schema::hasColumn('aspirasis', 'status')) {
                $table->enum('status', ['Menunggu', 'Dibaca', 'Selesai'])->default('Menunggu');
            }
        });
    }

    public function down(): void
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            if (Schema::hasColumn('aspirasis', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};