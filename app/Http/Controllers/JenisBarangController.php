<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisBarang;

class JenisBarangController extends Controller
{
    //
    public function index(){
        $jenis=JenisBarang::all();
        return view('jenis.index',compact('jenis'));
    }
    public function store(request $request){
        $jenis=JenisBarang::create($request->all());
        return redirect()->route('jenis.index');
    }

    public function update(request $request,$id){
        $jenis=JenisBarang::find($id);
        $jenis->update($request->all());
        return redirect()->route('jenis.index');
    }
    public function destroy($id){
        $jenis=JenisBarang::find($id);
        $jenis->delete();
        return redirect()->route('jenis.index');
    }
}
