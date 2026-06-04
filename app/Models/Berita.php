<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Menyesuaikan nama tabel karena kita menggunakan bahasa Indonesia
    protected $table = 'berita';

    // Mengizinkan semua kolom diisi secara massal
    protected $guarded = ['id'];

    // Relasi: Berita ini ditulis oleh User siapa?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Berita ini milik Himpunan apa?
    public function himpunan()
    {
        return $this->belongsTo(Himpunan::class);
    }
}