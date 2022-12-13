<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemset extends Model
{
    use HasFactory;

    protected $table = 'itemset';

    protected $fillable = [
        'tanggal',
        'item'
    ];
}
