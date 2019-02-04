@extends('layouts.back_end')
@section('main')
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('stock.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Pelanggan Penerima Hadiah</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{route('hadiah.cari')}}"><i class="icon-home2 position-left"></i>Periode</a></li>
            <li class="active">Data Pelanggan</li>
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
{{$get_hadiah}}
           <div class="row">
              <div class="col-md-12">
                  <table>
                      <thead>
                          <th>
                            <tr>ID Pelanggan</tr>
                            <tr>Nama Pelanggan</tr>
                            <tr>Alamat</tr>
                            <tr>Telepon</tr>
                            <tr>Jumlah Pembelian</tr>
                            <tr>Action</tr>
                          </th>
                       </thead>
                       <tbody>
                           {{-- @foreach($get_hadiah as $val)
                        <th>
                        <tr>{{$val->id}}</tr>
                        <tr>{{$val->nama}}</tr>
                        <tr>{{$val->lamat}}</tr>
                        <tr>{{$val->tlpn}}</tr>
                        <tr>{{$val->jml}}</tr>
                        <tr>STATUS</tr>
                        </th>  
                        @endforeach      --}}
                       </tbody>
                      
                  </table>
              </div>
            </div>
           
          </div>

@endsection

