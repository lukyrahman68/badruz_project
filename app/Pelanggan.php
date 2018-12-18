<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $fillable = [
        'photo_ktp',
        'nik',
        'nama',
        'alamat',
        'jk',
        'ttl',
        'tlpn',
        'email'
    ];
}
