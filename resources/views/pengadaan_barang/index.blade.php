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
{{-- {{$get_data}} --}}
@foreach($get_data as $data)
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
<br>
<div class="content">
           <div class="row">
              <div class="col-md-6">
<<<<<<< HEAD
              
=======
>>>>>>> 2175995fc2dbca7a17d9ced8365e7667ead4c061
            <form action="{{route('pengadaan.edit', $data->idp)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="jenis">Nama Barang</label>
                    <input type="text" class="form-control" value="{{$data->nm_bar}}" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="jenis">Warna</label>
                        <input type="text" class="form-control" value="{{$data->warna}}" disabled>
                        </div>
                </div>
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="jenis">Supplier</label>
                        <input type="text" class="form-control" value="{{$data->nama_sup}}" disabled>
                        </div>
                </div>
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="jenis">Email Supplier</label>
                        <input type="text" class="form-control" value="{{$data->email}}" disabled>
                        </div>
                </div>                  
              </div>
              <div class="col-md-6">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="jenis">Jumlah Beli</label>
                            <input type="text" class="form-control" name="jml">
                            </div>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" id="save" class="btn btn-primary" value="Proses">
                    </div>
                <input type="hidden" name="id" value="{{$data->id_bar}}">
                <input type="hidden" name="sup" value="{{$data->sup_id}}">
                <input type="hidden" name="jen" value="{{$data->id_jen}}">
              </div>
            </form>
            </div>
            @endforeach
          </div>

@endsection

