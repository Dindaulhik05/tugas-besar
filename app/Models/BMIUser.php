<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BMIUser extends Model
{
    use HasFactory;
    protected $table = 'bmi_results';
    protected $fillable = 
    ['user_id', 
    'berat',
    'tinggi',
    'jenis_kelamin',
    'usia',
    'bmi',
    'kategori',
    'berat_ideal',
    'saran'
    ];
}
