<?php

namespace App\Http\Controllers;
use App\Barang;
use Illuminate\Http\Request;
use Response;

class HppController extends Controller
{
    //
    public function index(){
        $barangs = Barang::all();
        return view('hpp.index', compact('barangs'));
    }
    public function cari($id){
        $barangs = Barang::find($id);
        return response()->json($barangs);
    }
}
