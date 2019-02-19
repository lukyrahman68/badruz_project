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
        $tempPel='';
        return view('penjualan.index',compact('barangs','pelanggans','tempPel'));
    }
    public function lanjut(request $request){
        $barangs = Barang::all();
        $pelanggan = Pelanggan::find($request->nama_pelanggan);
        $tempPel=$request->nama_pelanggan;
        return view('penjualan.index',compact('barangs','pelanggan','tempPel'));
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
        $input = $request->barang;
        $transaksi_id = Transaksi::max('transaksi_id');
        if($transaksi_id==null){
            $transaksi_id = '1';
        }else{
            $transaksi_id = $transaksi_id+1;
        }
        foreach ($input as $item) {
            $transaksi = new Transaksi;
            $transaksi->transaksi_id = $transaksi_id;
            $transaksi->barangs_id = $item['id'];
            $transaksi->jml_beli = $item['jml'];
            $transaksi->save();
        }
        $penjualan = new Penjualan;
        $penjualan->users_id = Auth::user()->id;
        $penjualan->pelanggans_id = $request->pelanggans_id;
        $penjualan->transakis_id = $transaksi_id;
        $penjualan->total_bayar = $request->total;
        $penjualan->save();
        return response()->json($penjualan);

    }
    public function pembayaran_index($id){
        $param = Penjualan::find($id);
        $penjualans = Penjualan::where('penjualans.id','=',$id)
                                ->where('penjualans.sts_bayar',0)
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                                ->join('barangs','barangs.id','=','transaksis.barangs_id')
                                ->selectRaw('penjualans.sts_bayar,barangs.nama,transaksis.jml_beli,penjualans.total_bayar,barangs.harga_jual')
                                // ->selectRaw('transaksis.*')
                                ->get();
        return view('penjualan.pembayaran',compact('penjualans','param'));
        // return $penjualan;

    }
    public function pembayaran_create(request $request, $id){
        $now= Carbon::today()->format('d M Y');

        // dd($request);
        $penjualan = Penjualan::find($id);
        $penjualan->diskon = $request->diskon;
        $barang = Penjualan::where('penjualans.id','=',$id)
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                                ->join('barangs','barangs.id','=','transaksis.barangs_id')
                                ->selectRaw('barangs.id,transaksis.jml_beli')
                                ->get();
        foreach ($barang as $item) {
            $bar_updt = Stock::where('barang_id','=',$item->id)->first();
            // return $bar_updt->jumlah;
            $new_stock = $bar_updt->jumlah-$item->jml_beli;
            $bar_updt->update(['jumlah'=>$new_stock]);
        }
        if($request->pembayaran=='0'){
            $penjualan->sts = 1;
            $penjualan->sisa_bayar = $request->sisa;
            $penjualan->sts_bayar = 1;
            $penjualan->update();
        }else{
            $penjualan->sts = 2;
            $penjualan->sisa_bayar = $request->sisa;
            $penjualan->sts_bayar = 2;
            $penjualan->update();
        }
        $penjualans = Penjualan::where('penjualans.id','=',$id)
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                                ->join('barangs','barangs.id','=','transaksis.barangs_id')
                                ->join('pelanggans','pelanggans.id','=','penjualans.pelanggans_id')
                                ->selectRaw('pelanggans.nama as nama_pelanggan,barangs.nama,transaksis.jml_beli,penjualans.total_bayar,barangs.harga_jual, penjualans.diskon')
                                // ->selectRaw('transaksis.*')
                                ->get();
        // Send data to the view using loadView function of PDF facade
        // $data = compact('now','penjualans');
        // $pdf = PDF::loadView('penjualan.invoice', $data);
        // $pdf->setPaper([0, 100, 450, 250], 'landscape');
        // $pdf->save(storage_path().'_filename.pdf');
        // return $pdf->download('customers.pdf');
        // $pdf->stream('customers.pdf',array("Attachment" => false));
        return view('penjualan.invoice',compact('now','penjualans'));


    }
}
