<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'id',
        'jenis_id',
        'nama',
        'alamat',
        'tlpn',
        'email',
    ];
}
