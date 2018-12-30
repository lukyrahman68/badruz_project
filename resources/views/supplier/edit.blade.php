@extends('layouts.back_end')
@section('main')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                
                <h4><a href="{{route('supplier.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Ubah Data Supplier</span></h4>
            </div>
        </div>
    
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('supplier.index')}}"><i class="icon-home2 position-left"></i> Data Supplier</a></li>
                <li class="active">Ubah Data Supplier</li>
            </ul>
        </div>
    </div>
    <div class="content">
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('supplier.ubah', $supplier->id)}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
<!-- 
            @csrf
            @method('PUT')  -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$supplier->nama}}">
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" class="form-control" placeholder="Warna" name="alamat" value="{{$supplier->alamat}}">
            </div>
           <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" class="form-control" placeholder="Jenis" name="tlpn" value="{{$supplier->tlpn}}">
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
