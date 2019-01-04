<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    public $fillable = [
        'penjualans_id',
        'pelanggans_id',
        'total'
    ];
}
