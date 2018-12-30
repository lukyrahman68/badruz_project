<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PengadaanController extends Controller
{
    //
    public function index(){
        //tanggal hari ini
        $date_before = Carbon::now();
        //tanggal 7 hari sebelum hari ini
        $date_before = Carbon::now()->subDays(7);
        //Lead Time
        $LT = 1;
        return view('pengadaan_barang.index');
    }
}
