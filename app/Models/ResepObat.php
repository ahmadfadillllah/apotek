<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;

    protected $table = 'resepobat';

    protected $fillable = [
        'pasien_id',
        'dataobat_id',
        'pemakaian'
    ];

    public function datapasien()
    {
        return $this->hasOne(DataPasien::class, 'id');
    }

    public function dataobat()
    {
        return $this->hasOne(DataObat::class, 'id');
    }
}
