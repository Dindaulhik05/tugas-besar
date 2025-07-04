<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProfileUser extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'nama',
        'berat_badan',
        'tinggi_badan',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
        'profile_picture',
        'total_points',
        'user_id', // Pastikan 'user_id' termasuk dalam fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
