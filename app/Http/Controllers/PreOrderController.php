<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Penjualan;
use Carbon\Carbon;

class PreOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pelanggans = Pelanggan::where('penjualans.sisa_bayar','>','0')
                                ->join('penjualans','pelanggans.id','=','penjualans.pelanggans_id')
                                ->selectRaw('pelanggans.*,penjualans.*')
    //                             ->get();
    //     return view('preorder.index', compact('pelanggans'));
    // }
                                ->selectRaw('pelanggans.*,penjualans.*,penjualans.id as p_id')
                                ->get();
        return view('preorder.index', compact('pelanggans'));
    }
    public function updt($id){
        $now= Carbon::today()->format('d M Y');
        $penjualan=Penjualan::find($id);
        $penjualan->sts='3';
        $penjualan->sisa_bayar=0;
        $penjualan->save();
        $penjualans = Penjualan::where('penjualans.id','=',$id)
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.transakis_id')
                                ->join('barangs','barangs.id','=','transaksis.barangs_id')
                                ->join('pelanggans','pelanggans.id','=','penjualans.pelanggans_id')
                                ->selectRaw('pelanggans.nama as nama_pelanggan,barangs.nama,transaksis.jml_beli,penjualans.total_bayar,barangs.harga_jual')
                                // ->selectRaw('transaksis.*')
                                ->get();
        return view('preorder.invoice', compact('now','penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
