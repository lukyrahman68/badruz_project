@extends('layouts.back_end')
@section('main')

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

<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4> <span class="text-semibold">Pencatatan Persediaan</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Pencatatan Persediaan</li>
        </ul>
    </div>
</div>
<div class="content">
<div class="table">
        <table class="table rendered" id="asset">
            <colgroup>
              <col width="8%">
              <col width="5%">
              <col width="30%">
              <col width="15%">
              <col width="15%">
              <col width="15%">
            </colgroup>
            <thead>
            <tr>
                <th rowspan="2">Tanggal</th>
                <th class="text-center" rowspan="2"></th>
                <th rowspan="2">Nama Barang</th>
                <th rowspan="2">Keterangan</th>
                <th colspan="3" style="width:10%;text-align:center;">PembelianBarang<br> (dari supplier)</th>
                <th colspan="3" style="text-align:center;">Penjualan Barang <br> (ke pelanggan)</th>
                <th colspan="3" style="text-align:center;">Persediaan Barang <br>(stock)</th>
            </tr>
            <tr>
                <th>Kuantitas</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Kuantitas</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>Kuantitas</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot style="visibility: hidden;">
                <tr>
                    <td colspan="3" style="white-space:nowrap;">GRAND TOTAL</td>
                    <td class="debetSum" id="ganddebet">0.00</td>
                    <td class="kreditSum" id="grandkredit">0.00</td>
                    <td class="debetTransSum" id="grandDebetTrans">0.00</td>
                    <td class="kreditTransSum" id="grandKreditTrans">0.00</td>
                    <td class="debetAkhirSum" id="grandDebetAkhir">0.00</td>
                    <td class="kreditAkhirSum" id="grandKreditAkhir">0.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection