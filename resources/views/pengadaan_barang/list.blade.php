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

<br>
<div class="content">
   
           

@endsection

