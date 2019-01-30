<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Pelanggan;
use App\Hadiah;

class HadiahController extends Controller
{
    public function index()
    {
        // $pelanggan = Pelanggan::all();
        return view('hadiah.index');
    }

    public function cari(Request $request)
    {
        $data = $request->all();
        $mulai = $request->mulai;
        $selesai = $request->selesai;

       $get_hadiah = Penjualan::join('pelanggans','pelanggans.id','=','penjualans.pelanggans_id')
                                ->whereBetween('penjualans.created_at',[$mulai, $selesai])
                                ->selectRaw('pelanggans.id as pelanggans_id, pelanggans.nama as nama, pelanggans.alamat as alamat, pelanggans.tlpn as tlpn')
                                ->count('penjualans.pelanggans_id');
        
        return view('hadiah.list',compact('get_hadiah'));
    }
}
