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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('layouts.back_end');
});

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
    Route::get('pelanggan/ajaxListPelanggan', 'PelangganController@ajaxListPelanggan')->name('pelanggan.listPelanggan');
    Route::get('pelanggan/hapus/{id}', 'PelangganController@destroy')->name('pelanggan.hapus');
    Route::resource('pelanggan', 'PelangganController');

    Route::get('barang/ajaxListBarang', 'BarangController@ajaxListBarang')->name('barang.listBarang');
    Route::get('barang/hapus/{id}', 'BarangController@destroy')->name('barang.hapus');
    Route::resource('barang', 'BarangController');

    Route::get('supplier/ajaxListSupplier', 'SupplierController@ajaxListSupplier')->name('supplier.listSupplier');
    Route::get('supplier/hapus/{id}', 'SupplierController@destroy')->name('supplier.hapus');
    Route::resource('supplier', 'SupplierController');
    

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
