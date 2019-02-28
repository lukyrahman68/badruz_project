@extends('layouts.back_end')
@section('main')
<br>
<div class="content">
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                
                <h4><a href="{{route('barang.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Ubah Data Barang</span></h4>
            </div>
        </div>
    
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('barang.index')}}"><i class="icon-home2 position-left"></i> Data Barang</a></li>
                <li class="active">Safety Stock</li>
            </ul>
        </div>
    </div>
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
<<<<<<< HEAD
     

        {{$get_max[0]->jml}}
=======
        
        
        <br>
>>>>>>> 2175995fc2dbca7a17d9ced8365e7667ead4c061
            <div class="row">
                <div class="col-md-6">
                    <!--<div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama" value="">
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" class="form-control" placeholder="Warna" name="warna" value="">
            </div>
           <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" class="form-control" placeholder="Jenis" name="jenis" value="">
            </div>-->
            <div class="form-group">
                <label for="jenis">SS</label>
                <input type="text" class="form-control" placeholder="Belum Tersedia" name="jenis" value="@isset($ss){{$ss}}@endisset" disabled>
            </div>
            <div class="form-group">
                <label for="jenis">ROP</label>
                <input type="text" class="form-control" placeholder="Belum Tersedia" name="jenis" value="@isset($rop){{$rop}}@endisset" disabled>
            </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
</div>

@endsection
