<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BuktiTantangan extends Model
{
    protected $table = 'challenge_submissions';
    protected $fillable = 
    ['user_id', 
    'challenge_id', 
    'file_path', 
    'status',
    'challenge_status', 
    'is_claimed',
    'name'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function challenge()
    {
        return $this->belongsTo(Tantangan::class, 'challenge_id');
    }
}
