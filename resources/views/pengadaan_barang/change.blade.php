@extends('layouts.back_end')
@section('main')
<link href="<?php echo asset('vendor/air-datepicker/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css">
<script src="<?php echo asset('vendor/air-datepicker/js/datepicker.min.js') ?>"></script>
<script src="<?php echo asset('vendor/air-datepicker/js/i18n/datepicker.en.js') ?>"></script>
<style>
	#datepickers-container{
		z-index: 1100 !important;
	}
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
 <style type="text/css">
    .datepicker>div {
             display: block;
    }
</style>
{{-- {{$pengadaan}} --}}
@foreach($pengadaan as $data)
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4> <span class="text-semibold">Pengadaan Barang</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Pengadaan Barang</li>
        </ul>
    </div>
</div>
<div class="content">
<H4>Data Order </H4>
        <table class="table datatable-ajax" id="example" style="background-color:#eee">
                <thead class="thead-dark" style="background-color:#ddd">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Jumlah beli</th>
                    <th scope="col">Tanggal Order</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>{{$data->nm_bar}}</th>
                        <th>{{$data->warna}}</th>
                        <th>{{$data->satu}}</th>
                        <th>{{$data->nama_sup}}</th>
                        <th>{{$data->jml_order}}</th>
                        <th>{{$data->cret}}</th>
               </tbody>
              </table>
              <br><br>
              <H4>Aktualisasi Data Barang Diterima</H4>
              <BR>
           <div class="row">
            <div class="col-md-12">
            <form action="{{route('pengadaan.savestatus', $data->idpe)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis">Jumlah Barang Diterima</label>
                    <input type="text" class="form-control" name="jml_diterima" id="jml_diterima">
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis">Harga Pembelian</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis">Biaya Kirim</label>
                        <input type="text" class="form-control" name="cost" id="cost">
                        </div>
                </div>  
                <div class="form-group col-md-12 pull-right">
                        <input type="submit" id="save" class="btn btn-primary" style="float:right" value="Proses">
                    </div>                
              </div>
           </div>
            </form>
            </div>
            @endforeach
          </div>

@endsection

