<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Olahraga extends Model
{
    protected $table = 'olahraga';
    protected $fillable = [
        'nama', 'deskripsi', 'kategori', 'durasi', 'url_video', 'thumbnails'
    ];
}
