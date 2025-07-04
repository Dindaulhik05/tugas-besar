<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenukaranHadiah extends Model
{
    use HasFactory;
    protected $table ='penukaran_hadiah';
    protected $fillable = ['user_id', 'hadiah_id', 'name', 'email', 'phone', 'address', 'jml_tuka_poin', 'tanggal_penukaran'];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hadiah()
    {
        return $this->belongsTo(Hadiah::class);
    }
}
