@extends('layouts.back_end')
@section('main')

<style>
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('stock.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Stock Habis</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Stock Habis</li>
        </ul>
    </div>
<<<<<<< HEAD
    <div class="col-xs-12 inner input_box">
        <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="font-weight: bold"></h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>Warna</td>
                        <td>Stock</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr {{($barang->jumlah<=200)?'style=background-color:yellow':''}}>
                        <td>{{$barang->nama}}</td>
                        <td>{{$barang->warna}}</td>
                        <td>{{$barang->jumlah}}</td>
=======
</div>
<script type="text/javascript">
  $(document).ready(function () {
      $('.datatable-ajax').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax" 		: "{{route('pengadaan.listStock')}}",

          "columns": [
              {"data": 'no'},
              {"data": 'nama'},
              {"data": 'warna'},
              {"data": 'supplier'},
              {"data": 'jumlah'},
              {"data": 'action'},
          ]
      });
  });
  </script>
<br>
<div class="content">

           <div class="row">
              <div class="col-md-12">
                <table class="table datatable-ajax" id="example">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Warna</th>
                      <th scope="col">supplier</th>
                      <th scope="col">Sisa Stock</th>
                      <th scope="col">Action</th>
>>>>>>> origin
                    </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>

@endsection

