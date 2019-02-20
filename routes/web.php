<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pelanggan;
use App\Barang;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', 'PenjualanController@cetak')->name('invoice');

Route::get('/tes2', function () {
    return view('pemilik.index');
});
Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::get('/admin', function () {
    $user = Auth::user();
        if (!$user->is_owner) {
            return view('karyawan.index');
        } else {
            return view('pemilik.index');
        }
    });


    //pelanggan
    Route::get('pelanggan/ajaxListPelanggan', 'PelangganController@ajaxListPelanggan')->name('pelanggan.listPelanggan');
    Route::get('pelanggan/hapus/{id}', 'PelangganController@destroy')->name('pelanggan.hapus');
    Route::match(['put','pacth'],'pelanggan/ubah/{id}', 'PelangganController@ubah')->name('pelanggan.ubah');
    Route::get('pelanggan/edit/{id}', 'PelangganController@edit')->name('pelanggan.edit');
    Route::resource('pelanggan', 'PelangganController');

    //barang
    Route::get('barang/ajaxListBarang', 'BarangController@ajaxListBarang')->name('barang.listBarang');
    Route::get('barang/hapus/{id}', 'BarangController@destroy')->name('barang.hapus');
    Route::match(['put','pacth'],'barang/ubah/{id}', 'BarangController@ubah')->name('barang.ubah');
    Route::get('barang/edit/{id}', 'BarangController@edit')->name('barang.edit');
    Route::resource('barang', 'BarangController');

    //supplier
    Route::get('supplier/ajaxListSupplier', 'SupplierController@ajaxListSupplier')->name('supplier.listSupplier');
    Route::get('supplier/hapus/{id}', 'SupplierController@destroy')->name('supplier.hapus');
    Route::match(['put','pacth'],'supplier/ubah/{id}', 'SupplierController@ubah')->name('supplier.ubah');
    Route::get('supplier/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
    Route::resource('supplier', 'SupplierController');

    //stock
    Route::get('stock/ajaxListStock', 'StockController@ajaxListStock')->name('stock.listStock');
    Route::resource('stock', 'StockController');

    //pengadaan barang
    Route::get('pengadaan/ajaxListStock', 'PengadaanController@ajaxListStock')->name('pengadaan.listStock');
    Route::get('pengadaan', 'PengadaanController@index')->name('pengadaan.index');
    Route::get('pengadaan/edit/{id}', 'PengadaanController@edit')->name('pengadaan.edit');
    Route::get('pengadaan/stock', 'PengadaanController@stock')->name('pengadaan.stock');
    Route::get('pengadaan/list', 'PengadaanController@list')->name('pengadaan.list');
    Route::get('pengadaan/list/ajaxListStatus', 'PengadaanController@ajaxListStatus')->name('pengadaan.listStatus');
    Route::post('pengadaan/proses/edit/{id}', 'PengadaanController@edit')->name('pengadaan.edit');
    Route::get('pengadaan/proses/{id}', 'PengadaanController@prosesPengadaan')->name('pengadaan.proses');
    Route::post('pengadaan/proses/send_email', 'PengadaanController@sendEmail')->name('pengadaan.sendEmail');
    Route::get('pengadaan/proses/ubah/{id}', 'PengadaanController@changeStatus')->name('pengadaan.ubahstatus');
    Route::post('pengadaan/proses/savesatatus/{id}', 'PengadaanController@savestatus')->name('pengadaan.savestatus');
    //penjualan
    Route::resource('penjualan', 'PenjualanController');
    Route::post('penjualan/toko/beli', 'PenjualanController@lanjut')->name('penjualan.lanjut');
    Route::get('penjualan/barang/cari', 'PenjualanController@cari')->name('penjualan.cari');
    Route::get('penjualan/pelanggan/cari_pelanggan', 'PenjualanController@cari_pelanggan')->name('penjualan.cari_pelanggan');
    Route::post('penjualan/pembayaran/create', 'PenjualanController@pembayaran')->name('penjualan.pembayaran');
    Route::get('penjualan/pembayaran/index/{id}', 'PenjualanController@pembayaran_index')->name('penjualan.pembayaran_index');
    Route::PUT('penjualan/pembayaran/index/create/{id}', 'PenjualanController@pembayaran_create')->name('penjualan.pembayaran_create');
    Route::get('cek/rop', 'BarangController@cek_rop')->name('barang.cek_rop');

    //jenis
    Route::resource('jenis', 'JenisBarangController');

    //pencatatan Penjualan
    Route::get('pencatatan', 'PengadaanController@Pencatatan')->name('pecatatan.list');
    Route::get('pencatatan/AjaxPencatatan', 'PengadaanController@AjaxPencatatan')->name('pecatatan.Ajax');
 
    //hadiah
    // Route::get('hadiah/ajaxListHadiah','HadiahContoller@ajaxListHadiah')->name('hadiah.listHadiah');
    Route::post('hadiah/cari/periode', 'HadiahController@cari')->name('hadiah.cari');
    Route::resource('hadiah', 'HadiahController');



    //new user
    Route::get('user/ajaxListUser', 'UserController@ajaxListUser')->name('user.listUser');
    Route::get('user/hapus/{id}', 'UserController@destroy')->name('user.hapus');
    Route::post('user/ubah/{id}', 'UserController@ubah')->name('user.ubah');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::resource('user', 'UserController');

    // Route::get('bar-chart', 'ChartController@index');
    //pre-order
    Route::resource('preorder', 'PreOrderController');

    //new user
    Route::get('user/ajaxListUser', 'UserController@ajaxListUser')->name('user.listUser');
    Route::get('user/hapus/{id}', 'UserController@destroy')->name('user.hapus');
    Route::post('user/ubah/{id}', 'UserController@ubah')->name('user.ubah');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::resource('user', 'UserController');

    Route::get('bar-chart', 'ChartController@index');
    //pre-order
    Route::resource('preorder', 'PreOrderController');
    Route::get('preorder/updt/{id}', 'PreOrderController@updt')->name('preorder.updt');
    //chart
    Route::get('chart', 'ChartController@index')->name('chart.index');
    Route::get('chart2', function(){
        return view('chart.chart2');
    })->name('chart.index2');
    Route::post('cekchart', function (Request $request) {
        $a = $request->get('tgl1');
        $b = $request->get('tgl2');
        $chart = pelanggan::whereBetween('pelanggans.created_at', array($a.' 00:00:00', $b.' 23:59:59'))
        ->join('penjualans','penjualans.pelanggans_id','=','pelanggans.id')
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.id')
                                ->selectRaw('pelanggans.nama as nama_pelanggan , sum(jml_beli) as j')
                                ->groupBy('nama_pelanggan')
                                ->get();
        return view('chart.index',compact('chart'));
    })->name('cekchart');
    Route::post('cekchart2', function (Request $request) {
        $a = $request->get('tgl1');
        $b = $request->get('tgl2');
        $chart = pelanggan::whereBetween('pelanggans.created_at', array($a.' 00:00:00', $b.' 23:59:59'))
        ->join('penjualans','penjualans.pelanggans_id','=','pelanggans.id')
                                ->join('transaksis','transaksis.transaksi_id','=','penjualans.id')
                                ->selectRaw('pelanggans.nama as nama_pelanggan , sum(total_bayar) as j')
                                ->groupBy('nama_pelanggan')
                                ->get();
        return view('chart.index',compact('chart'));
    })->name('cekchart2');
    Route::post('cekchartbaranglaku', function (Request $request) {
        $a = $request->get('tgl1');
        $b = $request->get('tgl2');
        $chart = Barang::whereBetween('transaksis.created_at', array($a.' 00:00:00', $b.' 23:59:59'))
                                ->join('transaksis','transaksis.barangs_id','=','barangs.id')
                                ->selectRaw('barangs.nama as namabarang , sum(jml_beli) as j')
                                ->groupBy('namabarang')
                                ->get();
        return view('laporan.baranglaku',compact('chart'));
    })->name('cekchartbaranglaku');
    //laporan
    Route::get('laporanpengadaan', 'LaporanController@pengadaan')->name('laporanpengadaan');
    Route::get('laporanpenjualan', 'LaporanController@penjualan2')->name('laporanpenjualan');
    Route::get('laporanbaranglaku', 'LaporanController@baranglaku')->name('laporanbaranglaku');
    Route::get('laporan', 'LaporanController@penjualan')->name('laporan.penjualan');
    Route::post('laporan/filter', 'LaporanController@filter')->name('laporan.filter');
    //cetak
    Route::get('cetak/penjualan', 'LaporanController@cetak')->name('laporan.cetak');
    Route::post('cetak/penjualanpengadaan', 'LaporanController@cetakpengadaan')->name('laporan.cetakpengadaan');
    Route::post('cetak/laporanpenjualan', 'LaporanController@cetakpenjualan')->name('laporan.cetakpenjualan');
    Route::post('cetak/laporanbaranglaku', 'LaporanController@cetakbaranglaku')->name('laporan.cetakbaranglaku');
    //hpp
    Route::get('hpp', 'HppController@index')->name('hpp.index');
    Route::get('hpp/cari/{id}/barang', 'HppController@cari')->name('hpp.cari');

    //hadiah
    Route::get('hadiah', 'HadiahController@index')->name('hadiah.index');
    Route::post('hadiah/store', 'HadiahController@store')->name('hadiah.store');
    Route::get('hadiah/view/hadiah', 'HadiahController@view')->name('hadiah.view');

    //margin
    Route::resource('margin', 'MarginController');
});
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
