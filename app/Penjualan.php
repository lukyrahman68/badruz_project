<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $fillable = [
        'user_id',
        'barang_id',
        'jml_beli',
        'total_bayar',
    ];
}
