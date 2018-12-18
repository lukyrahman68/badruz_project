@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
    <a href="{{route('pelanggan.create')}}" class="btn btn-sm btn-primary">Tambah</a>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>
    
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
    
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Telphone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>45724522152</td>
                        <td>Luky</td>
                        <td>Laki-Laki</td>
                        <td>Jl Jakarta Perak</td>
                        <td>Jember</td>
                        <td>085746664326</td>
                        <td>lukyrahman68@gmail.com</td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>

@endsection