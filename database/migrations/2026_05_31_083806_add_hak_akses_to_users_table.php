<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom JSON untuk menyimpan checklist fitur
            if (!Schema::hasColumn('users', 'hak_akses')) {
                $table->json('hak_akses')->nullable()->after('role');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'hak_akses')) {
                $table->dropColumn('hak_akses');
            }
        });
    }
};