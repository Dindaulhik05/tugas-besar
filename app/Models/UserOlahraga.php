<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOlahraga extends Model
{
    protected $table = 'user_olahraga';
    protected $fillable = [
        'user_id',
        'olahraga_id',
        'waktu_olahraga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Olahraga
    public function olahraga()
    {
        return $this->belongsTo(Olahraga::class);
    }
}
