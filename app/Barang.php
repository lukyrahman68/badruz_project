<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'id',
        'supplier_id',
        'nama',
        'warna',
        'jenis',
        'harga_beli',
        'harga_jual',
    ];
}
