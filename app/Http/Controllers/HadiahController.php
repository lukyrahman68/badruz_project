<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Hadiah;

class HadiahController extends Controller
{
    //
    public function index (){
        $pelanggans= Pelanggan::join('penjualans','penjualans.pelanggans_id','pelanggans.id')
                                ->leftjoin('hadiahs','hadiahs.pelanggans_id','pelanggans.id')
                                ->selectRaw('pelanggans.id, pelanggans.nama,SUM(penjualans.total_bayar) as jml, hadiahs.hadiah')
                                ->havingRaw('SUM(penjualans.total_bayar) >= 1000000')
                                ->groupBy('pelanggans.id', 'pelanggans.nama')
                                ->get();
        return view('hadiah.index', compact('pelanggans'));
    }
    public function store(request $request){
        $hadiah = new Hadiah;
        $hadiah->pelanggans_id = $request->pelanggan_id;
        $hadiah->hadiah = $request->hadiah;
        $hadiah->save();
        return redirect()->back();
    }
    public function view(){

        $hadiah = hadiah::join('pelanggans','pelanggans.id','hadiahs.pelanggans_id')
                        ->selectRaw('pelanggans.nama,hadiahs.hadiah')
                        ->get();
        return view('hadiah.data',compact('hadiah'));
    }
}
