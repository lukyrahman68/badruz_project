<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $fillable = [
        'id',
        'barang_id',
        'supplier_id',
        'jml_order',
        'jml_diterima',
        'harga_beli',
        'cost',
        'status',
    ];
    protected $table= 'histori_pengadaans';
}
