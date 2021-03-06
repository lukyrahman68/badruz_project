<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Barang;
use App\Stock;
use App\Pencatatan;
use App\Pengadaan;
use App\Penjualan;
use App\Transaksi;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Margin;

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
    public function sendEmail(){
        return "oke";
    }
    public function stock(){
        $barangs = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                        ->selectRaw('barangs.*,stocks.jumlah')
                        ->orderBy('stocks.jumlah')
                        ->get();
        return view('pengadaan_barang.stock',compact('barangs'));
    }
    public function prosesPengadaan($id){
        $idB = $id;
        $get_data = Pengadaan::leftjoin('barangs','barangs.id','=','histori_pengadaans.barang_id')
                              ->leftjoin('suppliers','suppliers.id','=','histori_pengadaans.supplier_id')
                              ->where('histori_pengadaans.id', $idB)
                              ->selectRaw('*, histori_pengadaans.id as idp, suppliers.nama as nama_sup, barangs.nama as nm_bar, barangs.satuan as satu, barangs.id as idbarangs, histori_pengadaans.created_at as cret')
                              ->get();
        //dd($get_data[0]->idbarangs);
        $asd = $get_data[0]->idbarangs;
        $get_max = DB::select('SELECT *, max(jumlah) as max, avg(jml) as avg FROM (select penjualans.created_at, barangs_id, sum(jml_beli) as jumlah, jml_beli as jml from penjualans join transaksis on transaksis.transaksi_id = penjualans.transakis_id where barangs_id = '.$asd.' group by penjualans.created_at) as a group by barangs_id');
        //$get_max = DB::select('SELECT *, max(jumlah), avg(jml) FROM (select penjualans.created_at, barangs_id, sum(jml_beli) as jumlah, jml_beli as jml from penjualans join transaksis on transaksis.id = penjualans.transakis_id where barangs_id = '.$idB.' group by penjualans.created_at) as a group by barangs_id');
        $barang = Barang::findOrFail($asd);
        $stok = Stock::where('barang_id',$asd)->get();
        if(!isset($get_max[0])){
            $ss="";
            $rop="";
        }else{
            $ss = ($get_max[0]->max - $get_max[0]->avg)*$barang->leadtime;
            $rop = ($get_max[0]->avg * $barang->leadtime)+$ss;
        }
        //dd($get_data);
        //$qee = Penjualan::select('barangs_id')->where('transaksis.barangs_id','=',$idB)->join('transaksis','transaksis.id','=','penjualans.transakis_id')->get();
        //$asd=$get_data[0]->barang_id;

        // $qee = Penjualan::selectRaw('barangs_id, sum(jml_beli), avg(jml_beli)')->where('transaksis.barangs_id',$get_data[0]->barang_id)->join('transaksis','transaksis.id','=','penjualans.transakis_id')
        //                 ->groupBy('transaksis.barangs_id')->groupby('transaksis.created_at')->get();
        // dd($idB);
        // $get_data = Pengadaan::join('stocks','stocks.barang_id','=','barangs.id')
        //                     ->join('suppliers','suppliers.id','=','barangs.supplier_id')
        //                     ->join('jenis_barangs','jenis_barangs.id','=','suppliers.jenis_id')
        //                     ->where('histori_pengadaans','=',$idB)
        //                     ->selectRaw('*,barangs.id as id_bar, suppliers.id as sup_id, jenis_barangs.id as id_jen, jenis_barangs.nama as nama_jenis, stocks.jumlah,barangs.nama as nama_bar, suppliers.nama as nama_sup')
        //                     ->get();
        return view('pengadaan_barang.index',compact('get_data','rop','get_max','stok'));
    }

    public function safetystock($id){
        $idB = $id;
        $get_max = DB::select('SELECT *, max(jumlah) as max, avg(jml) as avg FROM (select penjualans.created_at, barangs_id, sum(jml_beli) as jumlah, jml_beli as jml from penjualans join transaksis on transaksis.transaksi_id = penjualans.transakis_id where barangs_id = '.$idB.' group by penjualans.created_at) as a group by barangs_id');
        //$get_max = DB::select('SELECT *, max(jumlah), avg(jml) FROM (select penjualans.created_at, barangs_id, sum(jml_beli) as jumlah, jml_beli as jml from penjualans join transaksis on transaksis.id = penjualans.transakis_id where barangs_id = '.$idB.' group by penjualans.created_at) as a group by barangs_id');
        $barang = Barang::findOrFail($id);
        if(!isset($get_max[0])){
            $ss="";
            $rop="";
        }else{
            $ss = ($get_max[0]->max - $get_max[0]->avg)*$barang->leadtime;
        $rop = ($get_max[0]->avg * $barang->leadtime)+$ss;
        }
        
        //dd($get_max);
        return view('barang.ss', compact('get_max','ss','rop'));
    }

    // public function edit($id){
    //     $engadaan = Pengadaan::findOrFail($id);
    //     return view('pengadaan.edit', compact('pengadaan'));
    // }

    public function edit(Request $request,$id){
        $idp = $id;

        $jml = $request->jml;
        $up = Pengadaan::where('histori_pengadaans.id',$idp)
                        ->update(['jml_order' => $jml, 'status' => 'Di Proses']);
        // $pengadaan = new Pengadaan;
        // $pengadaan->jml_order = $request->jml;
        // $pengadaan->barang_id = $request->id;
        // $pengadaan->jenis_id = $request->jen;
        // $pengadaan->supplier_id = $request->sup;
        // $pengadaan->satuan = $request->satuan;
        // $pengadaan->status = "Di Proses";
        $data = Pengadaan::leftjoin('barangs','barangs.id','=','histori_pengadaans.barang_id')
                                ->leftjoin('suppliers','suppliers.id','=','histori_pengadaans.supplier_id')
                                ->where('histori_pengadaans.id', $idp)
                                ->selectRaw('*,suppliers.email as mail, suppliers.nama as nama_sup, barangs.nama as nm_bar, barangs.satuan as satu, histori_pengadaans.created_at as cret')->get();
        foreach($data as $sup){
            $email = $sup->mail;
        }
        // dd($email);
            Mail::to($email)->send(new SendMail($data));
            return redirect('pengadaan/list');
    }
        public function list(){
        $pengadaan = Pengadaan::leftjoin('barangs','barangs.id','=','histori_pengadaans.barang_id')
                             ->leftjoin('suppliers','suppliers.id','=','histori_pengadaans.supplier_id')
                             ->where('status','<>','stock habis')
                             ->selectRaw('*, suppliers.nama as nama_sup, barangs.nama as nm_bar, barangs.satuan as satu, histori_pengadaans.created_at as cret')->get();
        return view('pengadaan_barang.list',compact('pengadaan'));
        }

        public function ajaxListStatus(Request $request){
        $columns = array(
            0 => 'no',
            1 => 'nama',
            2 => 'warna',
            3 => 'satuan',
            4 => 'supplier',
            5 => 'jml_order',
            6 => 'created_at',
            7 => 'status',
            8 => 'action',
            );
        $totaldata = Pengadaan::leftjoin('barangs','barangs.id','=','histori_pengadaans.barang_id')
                               ->leftjoin('suppliers','suppliers.id','=','histori_pengadaans.supplier_id')
                               ->where('histori_pengadaans.status','<>','stock habis')
                               ->selectRaw('*, suppliers.nama as nama_sup, barangs.nama as nm_bar, barangs.satuan as satu, histori_pengadaans.created_at as cret')
                               ->count();
        $totalFiltered =$totaldata;
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir   = $request->input('order.0.dir');

        $pengadaan = Pengadaan::leftjoin('barangs','barangs.id','=','histori_pengadaans.barang_id')
                            ->leftjoin('suppliers','suppliers.id','=','histori_pengadaans.supplier_id')
                            ->where('histori_pengadaans.status','<>','stock habis')
                            ->selectRaw('*, histori_pengadaans.id as idpe, suppliers.nama as nama_sup, barangs.nama as nm_bar, barangs.satuan as satu, histori_pengadaans.created_at as cret');
            if (empty($request->input('search.value'))) {
                $pengadaan = $pengadaan->offset($start)
                    ->limit($limit)
                    ->get();
            } else {
                $search = $request->input('search.value');
                $pengadaan = $pengadaan->where(function ($query) use ($search) {
                    $query->orWhere('barangs.nama', 'LIKE', "%{$search}%");
                    $query->orWhere('suppliers.nama', 'LIKE', "%{$search}%");
                    $query->orWhere('stocks.jumlah', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.warna', 'LIKE', "%{$search}%");
                    $query->orWhere('histori_pengadaans.jml_beli', 'LIKE', "%{$search}%");
                })
                    ->offset($start)
                    ->limit($limit)
                    ->get();
            }
            $data = array();
            if (!empty($pengadaan)) {
                $no = 1;
            foreach ($pengadaan as $r_aktif) {
                $status = $r_aktif->status;
                if($status == 'Diterima'){
                    $proses= "";
                }else{
                    $proses = "<a href='".route('pengadaan.ubahstatus', $r_aktif->idpe)."'><input type='submit' class='btn btn-primary' value='Ubah Status'></a>";

                }
                    $nestedData['no'] = $no;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nm_bar.'</strong>';
                    $nestedData['warna'] =$r_aktif->warna;
                    $nestedData['satuan'] =$r_aktif->satu;
                    $nestedData['supplier'] =$r_aktif->nama_sup;
                    $nestedData['jml_order'] ='<strong class="text-bold primary-text">'.$r_aktif->jml_order.'</strong>';
                    $nestedData['created_at'] = date('j M Y h:i a', strtotime($r_aktif->cret));
                    $nestedData['status'] = $r_aktif->status;
                    $nestedData['action'] = $proses;
                    $data[] = $nestedData;
                    $no++;
                }
        }else{
            $data="tidak ada pelanggan";
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totaldata),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        return json_encode($json_data);
dd($data);

    }

    public function changeStatus($id){
        $idp = $id;
        $pengadaan = Pengadaan::leftjoin('barangs','barangs.id','=','histori_pengadaans.barang_id')
        ->leftjoin('suppliers','suppliers.id','=','histori_pengadaans.supplier_id')
        ->where('histori_pengadaans.id',$idp)
        ->selectRaw('*, histori_pengadaans.id as idpe, suppliers.nama as nama_sup, barangs.nama as nm_bar, barangs.satuan as satu, histori_pengadaans.created_at as cret')
        ->get();

        return view('pengadaan_barang.change',compact('pengadaan'));
    }
    public function savestatus(Request $request,$id){
        $idpe = $id;

        $get_barang = Pengadaan::select('barang_id')
                                ->where('id', $idpe)->get();
        foreach($get_barang as $id){
            $get_id = $id->barang_id;
        }
        // $get_persediaan_awal = Stock::select('*')->where('barang_id',$get_id)->get();
        // foreach($get_persediaan_awal as $awal){
        //     $pencatatan = new Pencatatan;
        //     $pencatatan->barang_id = $awal->barang_id;
        //     $pencatatan->keterangan = 'Pembelian';
        //     $pencatatan->quantity = $awal->jumlah;
        //     $pencatatan->harga_satuan = $awal->harga_satuan;
        //     $pencatatan->total_harga = $awal->harga_total;
        //     $pencatatan->status = 'pembelian';

        //     $pengadaan->save();
        // }

        $jml_diterima = $request->jml_diterima;
        $harga = $request->harga;
        $cost = $request->cost;
        $total = $harga+$cost;
        $harga_satuan_pembelian = $total/$jml_diterima;

        //cari id barang dan jumlah stock untuk diubah

        $get_stock = Stock::select('jumlah','harga_satuan','harga_total')
                            ->where('barang_id',$get_id)->get();
        foreach($get_stock as $stock){
            $jml = $stock->jumlah;
            $satuan = $stock->harga_satuan;
            $hargatotal = $stock->harga_total;
        }
        $totalharga = $hargatotal+$total;
        $new_stock = $jml+$jml_diterima;
        $harga_satuan = $totalharga/$new_stock;

        // dd($new_stock, $harga_satuan, $totalharga);
        //update histori pengadaan
        $up = Pengadaan::where('histori_pengadaans.id',$idpe)
                        ->update(['jml_diterima' => $jml_diterima,
                        'harga_beli' => $harga,
                        'cost' => $cost,
                        'total_harga' => $total,
                        'harga_satuan' => $harga_satuan_pembelian,
                        'status' => 'Diterima']);

        //update stock
        $up_stock = Stock::where('barang_id',$get_id)
                        ->update(['jumlah'=>$new_stock,
                        'harga_satuan'=>$harga_satuan,
                        'harga_total'=>$totalharga]);

        $margin = Margin::first();
        $margininpercent = $margin->margin/100;
        $jml_margin = $harga_satuan*$margininpercent;
        $harga_jual = $harga_satuan+$jml_margin;

        $up_barang = Barang::where('id',$get_id)
                            ->update(['harga_beli' => $harga_satuan,'harga_jual' => $harga_jual]);

        return view('pengadaan_barang.list');
    }
    public function ajaxListStock(Request $request){
        $columns = array(
            0 => 'no',
            1 => 'nama',
            2 => 'warna',
            3 => 'supplier',
            4 => 'jumlah',
            5 => 'rop',
            6 => 'action',
        );
        $totaldata = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                          ->join('suppliers','suppliers.id','=','barangs.supplier_id')
        
                          ->selectRaw('*,barangs.nama as nm_bar, stocks.jumlah, barangs.id as id_bar,suppliers.id as id_sup, suppliers.jenis_id as id_jenis')
                          ->count();
        $totalFiltered =$totaldata;
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir   = $request->input('order.0.dir');

        $barang = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                         ->join('suppliers','suppliers.id','=','barangs.supplier_id')
        
                         ->selectRaw('*,barangs.nama as nm_bar,stocks.jumlah, suppliers.nama as nama_sup, barangs.id as id_bar,suppliers.id as id_sup, suppliers.jenis_id as id_jenis');
            if (empty($request->input('search.value'))) {
                $barang = $barang->offset($start)
                    ->limit($limit)
                    ->get();
            } else {
                $search = $request->input('search.value');
                $barang = $barang->where(function ($query) use ($search) {
                    $query->orWhere('barangs.id', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.nama', 'LIKE', "%{$search}%");
                    $query->orWhere('suppliers.nama', 'LIKE', "%{$search}%");
                    $query->orWhere('stocks.jumlah', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.warna', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.jenis', 'LIKE', "%{$search}%");
                })
                    ->offset($start)
                    ->limit($limit)
                    ->get();
            }
            $data = array();
            if (!empty($barang)) {
                $no = 1;

            foreach ($barang as $r_aktif) {
                //jika ada barang habis, insert ke history pengadaan
                // $query = Pengadaan::select('barang_id')->where('barang_id',$r_aktif->id_bar)->get();
                $q = Pengadaan::select('jml_order','barang_id','status')->where('barang_id',$r_aktif->id_bar)->get();
                foreach ($q as $jml) {
                    $jumlah = $jml->jml_order;
                    $barang = $jml->barang_id;
                    $sts = $jml->status;
                }
                if(count($q)==0){
                    $ins = new Pengadaan;
                    $ins->barang_id = $r_aktif->id_bar;
                    $ins->supplier_id = $r_aktif->id_sup;
                    $ins->status = 'Stock Habis';
                    if($ins->save()){
                        $proses = "<a href='".route('pengadaan.proses', $ins->id)."'><input type='submit' class='btn btn-primary' value='Proses'></a>";
                    };

                }elseif(count($q) != 0 && $sts != 'Stock Habis'){
                        $ins = new Pengadaan;
                        $ins->barang_id = $r_aktif->id_bar;
                        $ins->supplier_id = $r_aktif->id_sup;
                        $ins->status = 'Stock Habis';
                        if($ins->save()){
                        $proses = "<a href='".route('pengadaan.proses', $ins->id)."'><input type='submit' class='btn btn-primary' value='Proses'></a>";
                        };
                }else{
                    $q = Pengadaan::select('id')->where('barang_id',$r_aktif->id_bar)->first();
                    $proses = "<a href='".route('pengadaan.proses', $q->id)."'><input type='submit' class='btn btn-primary' value='Proses'></a>";
                }
                    //$qee = Penjualan::select('barangs_id')->where('transaksis.barangs_id','=',$r_aktif->id_bar)->join('transaksis','transaksis.id','=','penjualans.transakis_id')->get();
                    //$qee = Penjualan::selectRaw('barangs_id ,sum(jml_beli) as a')->join('transaksis','transaksis.id','=','penjualans.transakis_id')->groupBy('barangs_id')->get();
                    $nestedData['no'] = $no;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nm_bar.'</strong>';
                    $nestedData['warna'] =$r_aktif->warna;
                    $nestedData['supplier'] =$r_aktif->nama_sup;
                    $nestedData['jumlah'] ='<strong class="text-bold primary-text">'.$r_aktif->jumlah.'</strong>';
                    $nestedData['action'] = $proses;
                    $data[] = $nestedData;
                    $no++;
            }
        }else{
            $data="tidak ada pelanggan";
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totaldata),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        return json_encode($json_data);
dd($data);
    }

    public function Pencatatan(){
        return view('pencatatan.index');
    }
}
