<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasis';
    protected $guarded = ['id'];

    // Relasi: Aspirasi ini berasal dari Himpunan/Prodi mana?
    public function himpunan()
    {
        return $this->belongsTo(Himpunan::class);
    }
}  