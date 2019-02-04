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
        'harga_beli',
        'harga_jual',
        'satuan',
    ];
}
