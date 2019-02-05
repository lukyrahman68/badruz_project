<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Supplier;
use App\Stock;

class BarangController extends Controller
{
    public function index(){
        // $barang = Barang::all();
        return view('barang.index');
    }

    public function create(){
        $supplier=Supplier::all();
        return view('barang.create',compact('supplier'));
    }

    public function ajaxListBarang(Request $request){
        // $data = $request->all();
        // $kategori = ($data['kategori'] ? $data['kategori'] : -1);
        $columns = array(
            0 => 'barangs.nama',
            1 => 'jenis',
            2 => 'warna',
            3 => 'satuan',
            4 => 'harga_beli',
            // 5 => 'harga_jual',
            5 => 'jumlah',
            6 => 'created_at',
            7 => 'action',
        );
        // $get_user = Sentinel::getUser();
        // $user = User::find($get_user->id);
        $totaldata = Barang::leftjoin('suppliers','suppliers.id','=','barangs.supplier_id')
        ->leftjoin('jenis_barangs','jenis_barangs.id','=','suppliers.jenis_id')
        ->leftjoin('stocks','stocks.barang_id','=','barangs.id')
        ->selectRaw('*,barangs.nama as namabar, stocks.jumlah as jumlah, barangs.id as idb, jenis_barangs.nama as jenisbar')->count();
    //
            $totalFiltered =$totaldata;
        //    dd($pelanggan);

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        // DD($limit, $start , $order, $dir);
            $barang = Barang::leftjoin('suppliers','suppliers.id','=','barangs.supplier_id')
                            ->leftjoin('jenis_barangs','jenis_barangs.id','=','suppliers.jenis_id')
                            ->leftjoin('stocks','stocks.barang_id','=','barangs.id')
                            ->selectRaw('*,barangs.nama as namabar, stocks.jumlah as jumlah, barangs.id as idb, jenis_barangs.nama as jenisbar');
            if (empty($request->input('search.value'))) {
                $barang = $barang->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                $barang = $barang->where(function ($query) use ($search) {
                    $query->orWhere('id', 'LIKE', "%{$search}%");
                    $query->orWhere('nama', 'LIKE', "%{$search}%");
                    $query->orWhere('created_at', 'LIKE', "%{$search}%");
                    $query->orWhere('warna', 'LIKE', "%{$search}%");
                    $query->orWhere('jenis', 'LIKE', "%{$search}%");

                })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }
            $data = array();
            if (!empty($barang)) {
                $no = 1;
            foreach ($barang as $r_aktif) {
               /*route('project.edit', $r_pendanaan->loan_id) .*/
                $edit = "<a href='".route('barang.edit', $r_aktif->idb)."' title='Detail Pinjaman' ><span class='icon-pencil'></span></a>";
                $hapus = "<a href='".route('barang.hapus', $r_aktif->idb)."'  title='Detail Pinjaman' ><span class='icon-trash'></span></a>";
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->namabar.'</strong>';
                    $nestedData['warna'] =$r_aktif->warna;
                    $nestedData['jenis'] =$r_aktif->jenisbar;
                    $nestedData['satuan'] =$r_aktif->satuan;
                    $nestedData['harga_beli'] =$r_aktif->harga_beli;
                    // $nestedData['harga_jual'] =$r_aktif->harga_jual;
                    $nestedData['jumlah'] =$r_aktif->jumlah;
                    $nestedData['created_at'] = date('j M Y h:i a', strtotime($r_aktif->created_at));
                    $nestedData['action'] = "$edit &emsp;$hapus";;

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

public function store(Request $request){
    // // $request['harga_jual'] = ($request->harga_beli * 0.5)+$request->harga_beli;
    // $simpan = Barang::create($request->all());
    // return view('barang.index');
    $save = new Barang;
    $save->supplier_id = $request->supplier_id;
    $save->nama = $request->nama;
    $save->satuan = $request->satuan;
    $save->warna = $request->warna;
    if($save->save()){
        $idbarang = $save->id;

        $stock = new Stock;
        $stock->barang_id= $idbarang;
        $stock->jumlah = 0;
        $stock->harga_satuan = 0;
        $stock->harga_total = 0;

        $stock->save();
    }
    return view('barang.index');
}

public function edit($id){
    $barang = Barang::findOrFail($id);
    return view('barang.edit', compact('barang'));

}
public function ubah(Request $request,$id){
    $barang = Barang::findOrFail($id);
    $barang->update($request->all());
    return view('barang.index', compact('barang'));

}
    public function destroy($id){


        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data deleted');
}
    public function cek_rop(){
        $barang = Barang::where('stocks.jumlah','<=','200')
                        ->join('stocks','stocks.barang_id','=','barangs.id')
                        // ->groupBy('barangs.id')
                        ->count();
        return response()->json($barang);
    }
}
