<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    protected $fillable = [
        'barang_id',
        'keterangan',
        'quantity',
        'harga_satuan',
        'harga_total',
        'status',
    ];
}
