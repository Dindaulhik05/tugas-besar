<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BMRUser extends Model
{
    use HasFactory;
    protected $table = 'bmr_results';
    protected $fillable = [
        'jenis_kelamin', 'berat_badan', 'tinggi_badan', 'usia', 'tingkat_aktivitas', 'tujuan_kalori', 'bmr', 'tdee', 'target_kalori', 'user_id'
    ];
    
}
