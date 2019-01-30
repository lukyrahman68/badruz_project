<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use PDF;

class LaporanController extends Controller
{
    //
    public function penjualan(){
        $pelanggans=Pelanggan::join('penjualans','penjualans.pelanggans_id','=','pelanggans.id')
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                                ->join('barangs','barangs.id','=','transaksis.barangs_id')
                                ->selectRaw('pelanggans.nama as nama_pelanggan,barangs.harga_jual,penjualans.total_bayar,barangs.nama as nama_barang,transaksis.jml_beli,transaksis.created_at')
                                ->get();
        return view('laporan.penjualan',compact('pelanggans'));
        // return $pelanggans;
    }
    public function cetak(){
        $pelanggans = Pelanggan::join('penjualans','penjualans.pelanggans_id','=','pelanggans.id')
                            ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                            ->join('barangs','barangs.id','=','transaksis.barangs_id')
                            ->selectRaw('pelanggans.nama as nama_pelanggan,barangs.harga_jual,penjualans.total_bayar,barangs.nama as nama_barang,transaksis.jml_beli,transaksis.created_at')
                            ->get();
        // Send data to the view using loadView function of PDF facade
        $data = compact('pelanggans');
        $pdf = PDF::loadView('print.print', $data);
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->download('customers.pdf');
        $pdf->stream('customers.pdf',array("Attachment" => false));
    }
    public function filter(request $request){
        $pelanggans = Pelanggan::join('penjualans','penjualans.pelanggans_id','=','pelanggans.id')
                            ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                            ->join('barangs','barangs.id','=','transaksis.barangs_id')
                            ->whereBetween('transaksis.created_at', array($request->tgl_awal, $request->tgl_akhir))
                            ->selectRaw('pelanggans.nama as nama_pelanggan,barangs.harga_jual,penjualans.total_bayar,barangs.nama as nama_barang,transaksis.jml_beli,transaksis.created_at')
                            ->get();

        return view('laporan.penjualan',compact('pelanggans'));
    }
}
