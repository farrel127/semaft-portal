<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Karena ejaan bahasa Inggris dari command artisan tadi menjadi 'kegiatans'
    protected $table = 'kegiatans'; 
    protected $guarded = ['id'];

    // Relasi: Kegiatan ini diselenggarakan oleh himpunan apa?
    public function himpunan()
    {
        return $this->belongsTo(Himpunan::class);
    }
}