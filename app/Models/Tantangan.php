<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Tantangan extends Model
{

    protected $table = 'challenges';  // Table name in the database
    protected $fillable = [
        'no_tantangan',
        'title',
        'description',
        'details',
        'video_embed',
        'video_thumbnail',
        'tag',
        'duration',
        'poin_tantangan',
    ];

    // For automatic timestamp handling
    public $timestamps = true;
    public function bukti()
    {
        return $this->hasMany(BuktiTantangan::class, 'challenge_id');
    }
}
