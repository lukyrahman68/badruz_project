<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Barang;
use App\Stock;
use App\Pengadaan;

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
                        ->where('stocks.jumlah','<=',200)
                        ->selectRaw('barangs.*,stocks.jumlah')
                        ->get();
        return view('pengadaan_barang.stock',compact('barangs'));
    }

    public function prosesPengadaan($id){
        $idB = $id;
        // dd($idB);
        $get_data = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                            ->join('suppliers','suppliers.id','=','barangs.supplier_id')
                            ->join('jenis_barangs','jenis_barangs.id','=','suppliers.jenis_id')
                            ->where('barangs.id','=',$idB)
                            ->selectRaw('*,barangs.id as id_bar, suppliers.id as sup_id, jenis_barangs.id as id_jen, jenis_barangs.nama as nama_jenis, stocks.jumlah,barangs.nama as nama_bar, suppliers.nama as nama_sup')
                            ->get();
                            
        return view('pengadaan_barang.index',compact('get_data'));

    }

    public function save(Request $request){
        $pengadaan = new Pengadaan;
        $pengadaan->jml_order = $request->jml;
        $pengadaan->barang_id = $request->id;
        $pengadaan->jenis_id = $request->jen;
        $pengadaan->supplier_id = $request->sup;
        $pengadaan->satuan = $request->satuan;
        $pengadaan->status = "Di Proses";

        if($pengadaan->save()){
            return view('pengadaan_barang.list')->with(['pengadaan'=> $pengadaan]);
        }else{
            return "error";
        }

    }
    public function ajaxListStock(Request $request){
       
        $columns = array(
            
            0 => 'no',
            1 => 'nama',
            2 => 'warna',
            3 => 'jenis',
            4 => 'supplier',
            5 => 'jumlah',
            6 => 'action',
        );
        $totaldata = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                            ->join('suppliers','suppliers.id','=','barangs.supplier_id')
                            ->where('stocks.jumlah','<=',200)
                            ->selectRaw('*,stocks.jumlah as jumlah, suppliers.nama as nama_sup')
                            ->count();
            $totalFiltered =$totaldata;

        $limit = $request->input('length');
        $start = $request->input('start');
        $dir   = $request->input('order.0.dir');

            $barang = Barang::join('stocks','stocks.barang_id','=','barangs.id')
                            ->join('suppliers','suppliers.id','=','barangs.supplier_id')
                            ->where('stocks.jumlah','<=',200)
                            ->selectRaw('*,stocks.jumlah as jumlah, suppliers.nama as nama_sup');
            if (empty($request->input('search.value'))) {
                $barang = $barang->offset($start)
                    ->limit($limit)
                    ->get();
                    // dd($barang);
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
                // $edit = "<a href='".route('barang.edit', $r_aktif->id)."' title='Detail Pinjaman' ><span class='icon-pencil'></span></a>";
                // $hapus = "<a href='".route('barang.hapus', $r_aktif->id)."'  title='Detail Pinjaman' ><span class='icon-trash'></span></a>";
                   $proses = "<a href='".route('pengadaan.proses', $r_aktif->id)."'><input type='submit' class='btn btn-primary' value='Proses'></a>";
                    $nestedData['no'] = $no;
                    // $nestedData['barangs.id'] = $r_aktif->barang_id;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nama.'</strong>';
                    $nestedData['warna'] =$r_aktif->warna;
                    $nestedData['jenis'] =$r_aktif->jenis;
                    $nestedData['supplier'] =$r_aktif->nama_sup;
                    $nestedData['jumlah'] ='<strong class="text-bold primary-text">'.$r_aktif->jumlah.'</strong>';
                    // $nestedData['created_at'] = date('j M Y h:i a', strtotime($r_aktif->created_at));
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

   
}
