<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $supplier= Supplier::all();
        return view('supplier.index');
    }
    public function create(){
        return view('supplier.create');
    }
    public function ajaxListSupplier(Request $request){
        // $data = $request->all();
        // $kategori = ($data['kategori'] ? $data['kategori'] : -1);
        $columns = array(
           
           
            0 => 'nama',
            1 => 'alamat',
            2 => 'tlpn',
            3 => 'created_at',
            4 => 'action',
        );
        // $get_user = Sentinel::getUser();
        // $user = User::find($get_user->id);
        $totaldata = Supplier::select('*')->count();
    //    
            $totalFiltered =$totaldata;
        //    dd($pelanggan);
            
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        // DD($limit, $start , $order, $dir);
            $supplier = Supplier::select('*');
            if (empty($request->input('search.value'))) {
                $supplier = $supplier->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');
    
                $supplier = $supplier->where(function ($query) use ($search) {
                    $query->orWhere('id', 'LIKE', "%{$search}%");
                    $query->orWhere('nama', 'LIKE', "%{$search}%");
                    $query->orWhere('alamat', 'LIKE', "%{$search}%");
                    $query->orWhere('tlpn', 'LIKE', "%{$search}%");
                    $query->orWhere('created_at', 'LIKE', "%{$search}%");
               
                })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }
            $data = array();
            if (!empty($supplier)) {
                $no = 1;
            foreach ($supplier as $r_aktif) {
               /*route('project.edit', $r_pendanaan->loan_id) .*/
                $edit = "<a href='".route('supplier.edit', $r_aktif->id)."' title='Detail Pinjaman' ><span class='icon-pencil'></span></a>";
                $hapus = "<a href='".route('supplier.hapus', $r_aktif->id)."'  title='Detail Pinjaman' ><span class='icon-trash'></span></a>";
                    $nestedData['no'] =$no;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nama.'</strong>';
                    $nestedData['alamat'] = $r_aktif->alamat;
                    $nestedData['tlpn'] = $r_aktif->tlpn;
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
    $supplier = Supplier::create($request->all());
    return view('supplier.index');
}

public function edit($id){
    $supplier= Supplier::findOrFail($id);
    return view('supplier.edit', compact('supplier'));

}
public function ubah(Request $request,$id){
    $supplier = Supplier::findOrFail($id);
    $supplier->update($request->all());
    return view('supplier.index', compact('supplier'));

}
public function destroy($id){
    $supplier = Supplier::find($id);
    $supplier->delete();

    return redirect()->route('supplier.index')->with('success', 'Data deleted');
    
}
}
