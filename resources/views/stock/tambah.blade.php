@extends('layouts.back_end')
@section('main')
<br>
<div class="content">
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><span class="text-semibold">Tambah Stock</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('stock.index')}}"><i class="icon-home2 position-left"></i> Data Stock</a></li>
                <li class="active">Tambah Stock</li>
            </ul>
        </div>
    </div>
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('stock.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama Barang</label>
                <select name="barang_id" class="form-control">
                    @foreach ($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="warna">Jumlah</label>
                <input type="text" class="form-control" placeholder="Jumlah" name="jumlah" id="jumlah">
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
<script>
$("#jumlah").keypress(function(event) {
  if ( event.which == 45 || event.which == 189 ) {
      event.preventDefault();
   }
});
</script>
@endsection
