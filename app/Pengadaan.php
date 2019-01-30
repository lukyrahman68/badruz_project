<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    protected $fillable = [
        'id',
        'barang_id',
        'jenis_id',
        'supplier_id',
        'jml_order',
        'satuan',
        'status',
    ];
    protected $table= 'histori_pengadaans';
}
