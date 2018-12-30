@extends('layouts.back_end')
@section('main')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                
                <h4><a href="{{route('pelanggan.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Tambah Data Pelanggan</span></h4>
            </div>
        </div>
    
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('pelanggan.index')}}"><i class="icon-home2 position-left"></i> Data Pelanggan</a></li>
                <li class="active">Tambah Data Pelangga</li>
            </ul>
        </div>
    </div>
    <div class="content">
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
         <form action="{{route('pelanggan.ubah', $pelanggan->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            
            
            <div class="row">
                <div class="col-md-6">
            <div class="form-group">
                <label for="nama">NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="naik" value="{{$pelanggan->nik}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$pelanggan->nama}}">
            </div>
            <div class="form-group">
                <label for="warna">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{$pelanggan->alamat}}">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                <option>Laki - Laki</option>
                <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jenis">Telepon</label>
                <input type="text" class="form-control" placeholder="Telepon" name="tlpn" value="{{$pelanggan->tlpn}}">
            </div>
            <div class="form-group">
                <label for="jenis">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email" value="{{$pelanggan->email}}">
            </div>
            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
                </div>
            </div>

            
        </form>
      </div>
    </div>
</div>
</div>

@endsection
