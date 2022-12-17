<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';

    protected $fillable = [
        'pasien_id',
        'no_antrian'
    ];

    public function datapasien()
    {
        return $this->hasOne(DataPasien::class, 'id');
    }
}
