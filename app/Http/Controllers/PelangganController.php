<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Media;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    //
    public function index(){
        return view('karyawan.pelanggan.index');
    }
    public function create(){
        return view('karyawan.pelanggan.tambah');
    }
    public function store(request $request){
        $input = $request->all();
        $user = Auth::user();
        $user_id = $user->id;
        if($ktp = $request->file('ktp')){
            $name_ktp = time() . $ktp->getClientOriginalName();
            $ktp->move('images',$name_ktp);
            $photo = Media::create(['id_pelanggan'=>$user_id, 'nama'=>$name_ktp, 'ket'=>"KTP"]);
        }
        if($kk = $request->file('kk')){
            $name_kk = time() . $kk->getClientOriginalName();
            $kk->move('images',$name_kk);
            $photo = Media::create(['id_pelanggan'=>$user_id, 'nama'=>$name_kk, 'ket'=>"KK"]);
        }
        foreach ($request->dp as $item_dp) {
            if($dp = $item_dp){
                $name_dp = time() . $dp->getClientOriginalName();
                $dp->move('images',$name_dp);
                $photo = Media::create(['id_pelanggan'=>$user_id, 'nama'=>$name_dp, 'ket'=>"Dokumen Pendukung"]);
            }
        };
        Pelanggan::create($input);
        return "oke";
    }
}
