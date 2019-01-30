<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxListStock(Request $request){
        // $data = $request->all();
        // $kategori = ($data['kategori'] ? $data['kategori'] : -1);
        $columns = array(

            0 => 'no',
            1 => 'nama',
            2 => 'jumlah',
            // 3 => 'action',
        );
        // $get_user = Sentinel::getUser();
        // $user = User::find($get_user->id);
        $totaldata = Barang::join('stocks','stocks.barang_id' ,'=','barangs.id')
        ->selectRaw('*, barangs.id as barang_id, stocks.jumlah as jumlah')->count();
    //
            $totalFiltered =$totaldata;
        //    dd($pelanggan);

        $limit = $request->input('length');
        $start = $request->input('start');
        // $order = $columns[$request->input('order.0.column')];
        $dir   = $request->input('order.0.dir');

        // DD($limit, $start , $order, $dir);
            $barang = Barang::join('stocks','stocks.barang_id' ,'=','barangs.id')
                                ->selectRaw('*, barangs.id as barang_id, stocks.jumlah as jumlah');
            if (empty($request->input('search.value'))) {
                $barang = $barang->offset($start)
                    ->limit($limit)
                    // ->orderBy($order, $dir)
                    ->get();
                    // dd($barang);
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
                    // ->orderBy($order, $dir)
                    ->get();
            }
            $data = array();
            if (!empty($barang)) {
                $no = 1;
            foreach ($barang as $r_aktif) {
               /*route('project.edit', $r_pendanaan->loan_id) .*/
                // $edit = "<a href='".route('barang.edit', $r_aktif->id)."' title='Detail Pinjaman' ><span class='icon-pencil'></span></a>";
                // $hapus = "<a href='".route('barang.hapus', $r_aktif->id)."'  title='Detail Pinjaman' ><span class='icon-trash'></span></a>";
                    $nestedData['no'] = $no;
                    // $nestedData['barangs.id'] = $r_aktif->barang_id;
                    $nestedData['nama'] = '<strong class="text-bold primary-text">'.$r_aktif->nama.'</strong>';
                    $nestedData['jumlah'] =$r_aktif->jumlah;
                    $nestedData['created_at'] = date('j M Y h:i a', strtotime($r_aktif->created_at));
                    // $nestedData['action'] = "";

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



    public function index()
    {
        // $pelanggan = Pelanggan::all();
        return view('stock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('stock.tambah',compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $stock = Stock::find($request->barang_id);
        if($stock){
            $stock_val = $stock->jumlah + $request->jumlah;
            $stock->update(['jumlah'=>$stock_val]);
        }else{
            Stock::create($request->all());
        }
        return redirect()->route('stock.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
