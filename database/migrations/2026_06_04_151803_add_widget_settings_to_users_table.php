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
       Schema::table('users', function (Blueprint $table) {
           $table->boolean('show_aspirasi')->default(true);
           $table->boolean('show_agenda')->default(true);
           $table->boolean('show_berita')->default(true);
           $table->boolean('show_himpunan')->default(true);
       });
   }

    /**
     * Reverse the migrations.
     */
    public function down(): void
   {
       Schema::table('users', function (Blueprint $table) {
           $table->dropColumn(['show_aspirasi', 'show_agenda', 'show_berita', 'show_himpunan']);
       });
   }
};
