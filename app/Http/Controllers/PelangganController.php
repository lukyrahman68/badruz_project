<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Pelanggan;
use App\Media;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    //
    public function index(){
        $pelanggan = Pelanggan::all();
        return view('karyawan.pelanggan.index', compact('pelanggan'));
    }
    public function create(){
        return view('karyawan.pelanggan.tambah');
    }
    public function store(request $request){
        $input = $request->all();
        $user = Auth::user();
        // $user_id = $user->id;
        // if(!empty($request->file('ktp') || $request->file('kk'))){
        //     if($ktp = $request->file('ktp')){
        //         $name_ktp = time() . $ktp->getClientOriginalName();
        //         $ktp->move('images',$name_ktp);
        //         $photo = Media::create(['id_pelanggan'=>$user_id, 'nama'=>$name_ktp, 'ket'=>"KTP"]);
        //     }
        //     if($kk = $request->file('kk')){
        //         $name_kk = time() . $kk->getClientOriginalName();
        //         $kk->move('images',$name_kk);
        //         $photo = Media::create(['id_pelanggan'=>$user_id, 'nama'=>$name_kk, 'ket'=>"KK"]);
        //     }
        // }else{
        //     Pelanggan::create($input);
        // }
        
        // foreach ($request->dp as $item_dp) {
        //     if($dp = $item_dp){
        //         $name_dp = time() . $dp->getClientOriginalName();
        //         $dp->move('images',$name_dp);
        //         $photo = Media::create(['id_pelanggan'=>$user_id, 'nama'=>$name_dp, 'ket'=>"Dokumen Pendukung"]);
        //     }
        // };
        // Pelanggan::create($input);
        // return "oke";
    }

    public function ajaxListPelanggan(Request $request){
        // $data = $request->all();
        // $kategori = ($data['kategori'] ? $data['kategori'] : -1);
        $columns = array(
           
            0 => 'nik',
            1 => 'nama',
            2 => 'alamat',
            3 => 'jk',
            4 => 'ttl',
            5 => 'tlpn',
            6 => 'email',
            7 => 'created_at',
            8 => 'action',
        );
        // $get_user = Sentinel::getUser();
        // $user = User::find($get_user->id);
        $totaldata = Pelanggan::select('*')->count();
    //    
            $totalFiltered =$totaldata;
        //    dd($pelanggan);
            
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        // DD($limit, $start , $order, $dir);
            $pelanggan = Pelanggan::select('*');
            if (empty($request->input('search.value'))) {
                $pelanggan = $pelanggan->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');
    
                $pelanggan = $pelanggan->where(function ($query) use ($search) {
                    $query->orWhere('nik', 'LIKE', "%{$search}%");
                    $query->orWhere('nama', 'LIKE', "%{$search}%");
                    $query->orWhere('alamat', 'LIKE', "%{$search}%");
                    $query->orWhere('jk', 'LIKE', "%{$search}%");
                    $query->orWhere('tlpn', 'LIKE', "%{$search}%");
               
                })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            }
            $data = array();
            if (!empty($pelanggan)) {
                $no=1;
            foreach ($pelanggan as $r_aktif) {
               /*route('project.edit', $r_pendanaan->loan_id) .*/
                $edit = "<a href='' title='Detail Pinjaman' ><span class='icon-pencil'></span></a>";
                $hapus = "<a href='".route('pelanggan.hapus', $r_aktif->id)."'  title='Detail Pinjaman' ><span class='icon-trash'></span></a>";
                $nestedData['no'] =$no;
                    $nestedData['nik'] =$r_aktif->nik;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nama.'</strong>';
                    $nestedData['alamat'] = $r_aktif->alamat;
                    $nestedData['jk'] = $r_aktif->jk;
                    $nestedData['ttl'] = $r_aktif->ttl;
                    $nestedData['tlp'] = $r_aktif->tlpn;
                    $nestedData['email'] = $r_aktif->email;
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


    public function destroy($id){
        

            $pelanggan = Pelanggan::find($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Data deleted');
        
    }
}
