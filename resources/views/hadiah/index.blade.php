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
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('stock.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Periode Penentuan Penerima Hadiah</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Periode Hadiah</li>
        </ul>
    </div>
</div>
{{-- <script type="text/javascript">
  $(document).ready(function () {
      $('.datatable-ajax').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax" 		: "{{route('stock.listStock')}}",

          "columns": [
              {"data": 'no'},
              {"data": 'nama'},
              {"data": 'jumlah'},
          ]
      });
  });
  </script> --}}
<br>
<div class="content">

           <div class="row">
              <div class="col-md-12">
            <form action="{{route('hadiah.cari')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="jenis">Tanggal Mulai</label>
                        <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd-mm-yyyy" name="mulai" placeholder="Tanggal Mulai">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="jenis">Tanggal Selesai</label>
                        <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd-mm-yyyy" name="selesai" placeholder="Tanggal Selesai">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <input type="submit" id="save" class="btn btn-primary" value="Proses">
                </div>
            </form>
                  
              </div>
            </div>
           
          </div>

@endsection

