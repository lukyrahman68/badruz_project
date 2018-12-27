<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public function index(){
        // $barang = Barang::all();
        return view('barang.index');
    }
    
    public function create(){
        return view('barang.create');
    }

    public function ajaxListBarang(Request $request){
        // $data = $request->all();
        // $kategori = ($data['kategori'] ? $data['kategori'] : -1);
        $columns = array(           
            0 => 'nama',
            1 => 'jenis',
            2 => 'warna',
            3 => 'jumlah',
            4 => 'created_at',
            5 => 'action',
        );
        // $get_user = Sentinel::getUser();
        // $user = User::find($get_user->id);
        $totaldata = Barang::join('stocks','stocks.id_barang' ,'=','barangs.id')
                             ->selectRaw('*, barangs.id as id_barang, barangs.nama as nama_barang
                             , barangs.created_at as barang_created, stocks.jumlah as jumlah')->count();
    //    
            $totalFiltered =$totaldata;
        //    dd($pelanggan);
            
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        // DD($limit, $start , $order, $dir);
            $barang = Barang::join('stocks','stocks.id_barang' ,'=','barangs.id')
                                ->selectRaw('*,barangs.id as id_barang, barangs.nama as nama_barang
                                 , barangs.created_at as barang_created, stocks.jumlah as jumlah');
            if (empty($request->input('search.value'))) {
                $barang = $barang->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');
    
                $barang = $barang->where(function ($query) use ($search) {
                    $query->orWhere('barangs.id', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.nama', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.created_at', 'LIKE', "%{$search}%");
                    $query->orWhere('stocks.jumlah', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.warna', 'LIKE', "%{$search}%");
                    $query->orWhere('barangs.jenis', 'LIKE', "%{$search}%");
               
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
                $edit = "<a href='".route('barang.edit', $r_aktif->id)."' title='Detail Pinjaman' ><span class='icon-pencil'></span></a>";
                $hapus = "<a href='".route('barang.hapus', $r_aktif->id)."'  title='Detail Pinjaman' ><span class='icon-trash'></span></a>";
                    $nestedData['no'] = $no;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nama_barang.'</strong>';
                    $nestedData['warna'] =$r_aktif->warna;
                    $nestedData['jenis'] =$r_aktif->jenis;
                    $nestedData['jumlah'] =$r_aktif->jumlah;
                    $nestedData['created_at'] = date('j M Y h:i a', strtotime($r_aktif->barang_created));
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
    $simpan = Barang::create($request->all());
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
}  
