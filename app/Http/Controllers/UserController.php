<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index(){
        // $user = User::all();
        return view('user.index', compact('user'));
    }
    public function create(){
        // $user= User::all();
        return view('user.create');
    }
    public function ajaxListUser(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'nama',
            2 => 'email',
            3 => 'role',
            4 => 'tgl',
            5 => 'action',
        );
        $totaldata = User::select('*')->count();
            $totalFiltered =$totaldata;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        // DD($limit, $start , $order, $dir);
            $user = User::select('*');
            if (empty($request->input('search.value'))) {
                $user = $user->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                $user = $barang->where(function ($query) use ($search) {
                    $query->orWhere('id', 'LIKE', "%{$search}%");
                    $query->orWhere('nama', 'LIKE', "%{$search}%");
                    $query->orWhere('created_at', 'LIKE', "%{$search}%");
                    $query->orWhere('email', 'LIKE', "%{$search}%");
                    $query->orWhere('role', 'LIKE', "%{$search}%");

                })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }
            $data = array();
            if (!empty($user)) {
                $no = 1;
            foreach ($user as $r_aktif) {
               /*route('project.edit', $r_pendanaan->loan_id) .*/
                $edit = "<a href='".route('user.edit', $r_aktif->id)."' title='Edit User' ><span class='icon-pencil'></span></a>";
                $hapus = "<a href='".route('user.hapus', $r_aktif->id)."'  title='Hapus User' ><span class='icon-trash'></span></a>";
                $nestedData['id'] =$r_aktif->id;
                $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->name.'</strong>';
                    $nestedData['email'] =$r_aktif->email;
                    $nestedData['role'] =$r_aktif->role;
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
        // $request['harga_jual'] = ($request->harga_beli * 0.5)+$request->harga_beli;
            $save = new User;
            $save->name= $request->name;
            $save->email= $request->email;
            $save->password= Hash::make($request->password);
            $save->role= $request->role;
            $save->is_owner = 0;
            if($save->save()){
                return redirect()->route('user.index');
            }
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    
    }
    public function ubah(Request $request,$id){
        // $user = User::findOrFail($id);
        // $user->update($request->all());
        // return view('user.index', compact('user'));
        // $user = User::findOrFail($id);
        $save = User::find($id);
        $save->name= $request->name;
        $save->email= $request->email;
        $save->password= Hash::make($request->password);
        $save->role= $request->role;
        $save->is_owner = 0;
    $save->update();
        return view('user.index', compact('user'));
    
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data deleted');
    }

   
}
