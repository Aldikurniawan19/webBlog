<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    /** @use HasFactory<\Database\Factories\ArtikelFactory> */

    protected $fillable = [
        'judul',
        'kategori_id',
        'konten',
        'status',
        'gambar_artikel',
        'slug',
    ];
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
