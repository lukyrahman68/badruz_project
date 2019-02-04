@extends('layouts.back_end')
@section('main')
<style>
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>

<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><a href="{{route('stock.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">List Proses Pengadaan Barang</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li class="active">List Proses Pengadaan Barang</li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.datatable-ajax').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax" 		: "{{route('pengadaan.listStatus')}}",

            "columns": [
                {"data": 'no'},
                {"data": 'nama'},
                {"data": 'warna'},
                {"data": 'satuan'},
                {"data": 'supplier'},
                {"data": 'jml_order'},
                {"data": 'created_at'},
                {"data": 'status'},
                {"data": 'action'},
            ]
        });
    });
    </script>
<div class="content">
    <div class="row">
        <div class="col-md-12">
          <table class="table datatable-ajax" id="example">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">warna</th>
                <th scope="col">Satuan</th>
                <th scope="col">supplier</th>
                <th scope="col">jumlah beli</th>
                <th scope="col">Tanggal Order</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
           </tbody>
          </table>
        </div>
      </div>
           

@endsection

