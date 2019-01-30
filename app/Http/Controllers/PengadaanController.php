<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Barang;
use App\Stock;

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
    public function stock(){
        $barangs = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                        ->selectRaw('barangs.*,stocks.jumlah')
                        ->orderBy('stocks.jumlah')
                        ->get();
        return view('pengadaan_barang.stock',compact('barangs'));
    }
}
