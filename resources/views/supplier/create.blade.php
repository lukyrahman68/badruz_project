@extends('layouts.back_end')
@section('main')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><a href="{{route('supplier.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Tambah Data Supplier</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('barang.index')}}"><i class="icon-home2 position-left"></i> Data Supplier</a></li>
                <li class="active">Tambah Data Supplier</li>
            </ul>
        </div>
    </div>
    <div class="content">
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('supplier.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
            <div class="form-group">
                <label for="warna">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
            </div>
            <div class="form-group">
                <label for="jenis">No Telepon</label>
                <input type="text" class="form-control" placeholder="No Telphone" name="tlpn">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis_id" id="jenis_id" class="form-control">
                    <option value="" selected disabled>Pilih Supplier</option>
                    @foreach ($jenis as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endforeach
                </select>
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
