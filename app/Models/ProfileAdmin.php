<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class ProfileAdmin extends Model
{

    protected $table = 'profiles_admin';
    protected $fillable = [
        'user_id', 'name', 'bio', 'profile_pict', 'phone', 'gender'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


