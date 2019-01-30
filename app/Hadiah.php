<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    protected $fillable = [
        'id',
        'id_pelanggan',
        'jml_beli',
        'status',

    ];
}
