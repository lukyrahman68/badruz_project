@extends('layouts.back_end')
@section('main')
<style>
        select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
                <h4><a href="{{route('supplier.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">DATA SUPPLIER</span></h4>
            </div>
        </div>
    
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
                <li class="active">SUPPLIER</li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
          $('.datatable-ajax').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax" 		: "{{route('supplier.listSupplier')}}",
    
              "columns": [
                
                  {"data": 'no'},
                  {"data": 'nama'},
                  {"data": 'alamat'},
                  {"data": 'tlpn'},
                  {"data": 'email'},
                  {"data": 'created_at'},
                  {"data": 'action'},
              ]
          });
      });
      </script>
    <br>
    <div class="content">
        <div class="panel" style="background-color: transparent; border:0; box-shadow: none;">
                <a href="{{route('supplier.create')}}">
                    <button type="button" class="btn btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Create
                    </button>
                  </a>
        </div>
    
      
        
               
                <!-- /.box-header -->
               <div class="row">
                  <div class="col-md-12">
                    <table class="table datatable-ajax" id="example">
                      <colgroup>
                        <col>
                        <col width="180">
                        <col>
                        <col>
                        <col>
                      </colgroup>
            
                      <thead class="thead-dark">
                        <tr>
                      
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Telepon</th>
                          <th scope="col">Email</th>
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

@endsection