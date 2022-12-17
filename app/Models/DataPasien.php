<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    protected $table = 'datapasien';

    protected $guarded = [];

    public function antrian()
    {
        return $this->hasOne(Antrian::class, 'pasien_id');
    }

    public function resep()
    {
        return $this->hasOne(ResepObat::class, 'pasien_id');
    }

    public function keluhan()
    {
        return $this->hasOne(Keluhan::class, 'pasien_id');
    }
}
