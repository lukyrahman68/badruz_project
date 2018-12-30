<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Penjualan;
use App\Stock;
use Response;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    //
    public function index(){
        $barangs = Barang::all();
        return view('penjualan.index',compact('barangs'));
    }
    public function cari(request $request){
        $data = Barang::find($request->id);
        $stock = Stock::where('barang_id',$request->id)->first();
        return response()->json(array($data,$stock));
    }
    public function store(request $request){
        $penjualan = new Penjualan;
        $penjualan->user_id = Auth::user()->id;
        $penjualan->barang_id = $request->nama_brng;
        $penjualan->jml_beli = $request->jml_beli;
        $penjualan->total_bayar = $request->total_bayar_2;
        $penjualan->save();

        $stock = Stock::find($request->nama_brng);
        $stock_kurang = $stock->jumlah - $request->jml_beli;
        $stock->update(['jumlah'=>$stock_kurang]);
        return redirect()->route('penjualan.index');

    }
}
