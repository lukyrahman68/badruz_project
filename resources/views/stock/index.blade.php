@extends('layouts.back_end')
@section('main')

<style>
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('stock.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Stock Barang</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Stock Barang</li>
        </ul>
    </div>
</div>
<script type="text/javascript">
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
  </script>
<br>
<div class="content">

           <div class="row">
              <div class="col-md-12">
                <table class="table datatable-ajax" id="example">
                  {{-- <colgroup>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                  </colgroup>
         --}}
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID Barang</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jumlah Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>

@endsection

