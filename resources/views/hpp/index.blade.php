@extends('layouts.back_end')
@section('main')
<br>
<div class="content">
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><a href="{{route('barang.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Jenis</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><i class="icon-home2 position-left active"></i> Jenis</a></li>
            </ul>
        </div>

    </div>
    <div class="col-xs-12 inner input_box">
        <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="font-weight: bold"></h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="">Nama Barang</label>
                <select class="form-group select2" name="barang_id" id="barang_id">
                    @foreach ($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Harga Barang</label>
                <input type="text" class="form-control" disabled name="harga_barang">
            </div>
            <a href="#" class="btn btn-primary pull-right">Hitung HPP</a>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    $('#barang_id').on('change', function (){
        {{-- alert($(this).val()); --}}
        $.ajax({
            type: 'get',
            url: '/hpp/cari/'+$(this).val()+'/barang',
            data: {
            },
            success: function(data) {
                if ((data.errors)){
                    //show error disini
                }
                else {
                    $('input[name=harga_barang]').val(data.harga_beli);

                }
            },
        });
    });
@endsection
