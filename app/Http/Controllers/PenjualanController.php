<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Penjualan;
use App\Pelanggan;
use App\Stock;
use App\Transaksi;
use Response;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    //
    public function index(){
        $barangs = Barang::all();
        $pelanggans = Pelanggan::all();
        return view('penjualan.index',compact('barangs','pelanggans'));
    }
    public function cari(request $request){
        $data = Barang::find($request->id);
        $stock = Stock::where('barang_id',$request->id)->first();
        return response()->json(array($data,$stock));
    }
    public function cari_pelanggan(request $request){
        $data = Pelanggan::find($request->id);
        return response()->json($data);
    }
    public function store(request $request){
        $penjualan = new Penjualan;
        $penjualan->user_id = Auth::user()->id;
        $penjualan->barang_id = $request->barang_id;
        $penjualan->jml_beli = $request->jml_beli;
        $penjualan->total_bayar = $request->total_bayar;
        $penjualan->save();
        // $transaksi = new Transaksi;
        // $transaksi->penjualans_id = $penjualan->id;
        // $transaksi->pelanggans_id = '1';
        // $transaksi->total = '1';


        // $stock = Stock::find($request->nama_brng);
        // $stock_kurang = $stock->jumlah - $request->jml_beli;
        // $stock->update(['jumlah'=>$stock_kurang]);
        $barang = Barang::find($penjualan->barang_id);
        return response()->json(array($penjualan,$barang));
    }
    public function cetak(){
        $now = Carbon::parse(now())->format('d-m-Y');
        $pdf = PDF::loadView('penjualan.invoice', compact('now'));
        return $pdf->stream("invoice.pdf",  array( 'Attachment'=>0 ));
    }
    public function pembayaran(request $request){
        $barangs_id = $request->barangs_id;
        $penjualans_id = $request->penjualans_id;
        $barangs = Barang::find($barangs_id);
        $penjualans_id = Penjualan::find($penjualans_id);
        // return view('penjualan.pembayaran',compact('barangs','penjualans'));
        return $barangs;
    }
}
