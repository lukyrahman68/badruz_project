@extends('layouts.back_end')
@section('main')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><a href="{{route('barang.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Tambah Data Barang</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('barang.index')}}"><i class="icon-home2 position-left"></i> Data Barang</a></li>
                <li class="active">Tambah Data Barang</li>
            </ul>
        </div>
    </div>
    <div class="content">
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
            <div class="form-group">
                <label for="warna">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value="" disabled selected>Pilih Supplier</option>
                    @foreach ($supplier as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" class="form-control" placeholder="Warna" name="warna">
            </div>
           {{-- <div class="form-group">
                <label for="jenis">Harga Beli</label>
                <input type="text" class="form-control" placeholder="Harga Beli" name="harga_beli">
            </div> --}}
                <div class="form-group">
                    <label for="jenis">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control">
                        <option value="liter">Liter</option>
                        <option value="pasang">Pasang</option>
                        <option value="meter">Meter</option>
                        <option value="lembar">Lembar</option>
                        <option value="pcs">Pcs</option>
                        <option value="biji">Biji</option>
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
