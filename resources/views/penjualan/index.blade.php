@extends('layouts.back_end')
@section('main')
<br>
<div class="content">
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><a href="{{route('barang.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Penjualan</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><i class="icon-home2 position-left active"></i> Penjualan</a></li>
            </ul>
        </div>
    </div>
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('penjualan.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama Barang</label>
                <select name="nama_brng" id="nama_brng" class="form-control" >
                    @foreach ($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="warna">Harga</label>
                <input type="text" class="form-control" placeholder="Harga" name="harga" id="harga">
            </div>
           <div class="form-group">
                <label for="jenis">Jumlah Stock</label>
                <input type="text" class="form-control" placeholder="Jumlah Stock" name="jml_stock" id="jml_stock">
            </div>
           <div class="form-group">
                <label for="jenis">Jumlah Beli</label>
                <input type="text" class="form-control" placeholder="Jumlah Beli" name="jml_beli">
            </div>
           <div class="form-group">
                <button type="button" class="btn btn-sm btn-info" id="hitung">Hitung</button>
            </div>

           <div class="form-group" style="text-align: right">
                <h1><label for="" id="total_bayar"></label></h1>
                <input type="hidden" class="form-control" placeholder="Jumlah Beli" name="total_bayar_2" id="total_bayar_2">
            </div>
            <div class="pull-right">
                <input type="submit" id="simpan" value="Simpan" class="btn btn-sm btn-primary">
            </div>
                </div>
            </div>


        </form>
      </div>
    </div>
</div>
</div>
<script>
        $(document).ready( function () {
            $('#simpan').prop('disabled',true);
            $(document).on('change','#nama_brng',function (e){
                // $('input[name=harga]').val('');
                $.ajax({
                    type: 'get',
                    url: 'penjualan/barang/cari/',
                    data: {
                        'id': $('#nama_brng').val()
                    },
                    success: function(data) {
                        if ((data.errors)){
                            //show error disini
                        }
                        else {
                            $('input[name=harga]').val(data[0].harga_jual);
                            $('input[name=jml_stock]').val(data[1].jumlah);
                        }
                    },
                });
                $('#name').val('');
            });
            $('#hitung').click(function(){
                $total = $('input[name=harga]').val() * $('input[name=jml_beli]').val();
                $('#total_bayar').html('Rp. '+$total);
                $('#total_bayar_2').val($total);
                $('#simpan').prop('disabled',false);
            });
        });
    </script>
@endsection
