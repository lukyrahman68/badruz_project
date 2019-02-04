@extends('layouts.back_end')
@section('main')
<style>
        select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">DATA BARANG</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
                <li class="active">BARANG</li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
          $('.datatable-ajax').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax" 		: "{{route('barang.listBarang')}}",
              "columns": [
                  {"data": 'nama'},
                  {"data": 'warna'},
                  {"data": 'jenis'},
                  {"data": 'satuan'},
                  {"data": 'harga_beli'},
                  {"data": 'harga_jual'},
                  {"data": 'jumlah'},
                  {"data": 'created_at'},
                  {"data": 'action'},
              ]
          });
      });
      </script>
    <div class="content">
        <div class="panel" style="background-color: transparent; border:0; box-shadow: none;">
                <a href="{{route('barang.create')}}">
                    <button type="button" class="btn btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Create
                    </button>
                  </a>
        </div>
               <div class="row">
                  <div class="col-md-12">
                    <table class="table datatable-ajax" id="example">
                      <thead class="thead-dark">
                        <tr>

                          <th scope="col">Nama</th>
                          <th scope="col">Warna</th>
                          <th scope="col">Jenis</th>
                          <th scope="col">Satuan</th>
                          <th scope="col">Harga Beli</th>
                          <th scope="col">Harga Jual</th>
                          <th scope="col">Jumlah Stock</th>
                          <th scope="col">Tanggal Daftar</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

              @if(Session::get('alert'))
              <script type="text/javascript">
                      $(window).load(function(){
                          $('#alertModal').modal('show');
                      });
              </script>
              @endif
              <style>
                  #datepickers-container{
                      z-index: 1100 !important;
                  }
              </style>
              @if(Session::get('alert'))
              <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-body">
                              @if(Session::get('alert') == 'error')
                                  @if(Session::get('link'))
                                      <center><p style="color: red" style="margin-top: 50px;">{{ Session::get('message') }} <a href="{{ Session::get('link') }}">{{ Session::get('linkLabel') }}</a></p></center>
                                  @else
                                      <center><p style="color: red" style="margin-top: 50px;">{{ Session::get('message') }}</p></center>
                                  @endif
                              @else
                                      <center><p>{{ Session::get('message') }}</p></center>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
              @endif
@endsection
