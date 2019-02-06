<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Margin;

class MarginController extends Controller
{
    //
    public function index(){
        $margins = margin::all();
        $id = margin::whereRaw('id = (select max(`id`) from margin)')->first();
        return view('margin.index', compact('margins','id'));
    }
    public function update(request $request, $id){
        $margin = Margin::find($id);
        $margin->update($request->all());
        return Redirect()->back();
    }
    public function store(request $request){
        $margin = Margin::create($request->all());
        return redirect()->back();
    }
}
