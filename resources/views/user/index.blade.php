@extends('layouts.back_end')
@section('main')

<style>
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('user.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Data User</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Data User</li>
        </ul>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
      $('.datatable-ajax').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax" 		: "{{route('user.listUser')}}",

          "columns": [
              {"data": 'id'},
              {"data": 'nama'},
              {"data": 'email'},
              {"data": 'role'},
              {"data": 'created_at'},
              {"data": 'action'},
          ]
      });
  });
  </script>
<br>
<div class="content">
    <div class="panel" style="background-color: transparent; border:0; box-shadow: none;">
            <a href="{{route('user.create')}}">
                <button type="button" class="btn btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Tambah User
                </button>
              </a>
    </div>
            <!-- /.box-header -->
           <div class="row">
              <div class="col-md-12">
                <table class="table datatable-ajax" id="example">        
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col">Tanggal Pendaftaran</th>
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

