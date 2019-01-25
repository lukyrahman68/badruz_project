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
<div class="col-xs-12 inner input_box">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
            @csrf
            @if ($tempPel)
            <div class="breadcrumb-line container">
                <h3>{{$pelanggan->nama}}</h3>
                <input type="hidden" name="pelanggans_id" id="pelanggans_id" value="{{$pelanggan->id}}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama Barang</label>
                <select name="nama_brng" id="nama_brng" class="form-control" >
                    <option value="" disabled selected>Pilih Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{$barang->id}}">{{$barang->nama}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="warna">Harga</label>
                    <input type="text" class="form-control" placeholder="Harga" name="harga" id="harga" disabled>
                </div>
               <div class="form-group">
                    <label for="jenis">Jumlah Stock</label>
                    <input type="text" class="form-control" placeholder="Jumlah Stock" name="jml_stock" id="jml_stock" disabled>
                </div>

                <hr>
               <div class="form-group">
                   <div class="row">
                   <div class="col-md-4">
                        <label for="jenis">Jumlah Beli</label>
                   </div>
                   <div class="col-md-4" >
                        <input type="text" class="form-control" placeholder="Jumlah Beli" name="jml_beli" id="jml_beli">
                   </div>
                   <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-info" id="hitung">Hitung</button>
                   </div>
                </div>
                </div>
                <div class="form-group" style="text-align: right">
                        <h1><label for="" id="total_bayar"></label></h1>
                        <input type="hidden" class="form-control" placeholder="Jumlah Beli" name="total_bayar_2" id="total_bayar_2">
                    </div>
                <div style="display: none" id="tampil">
               <div class="form-group">
                   <div class="row">
                       <div class="col-md-4">
                            <label for="bayar">Harga Bayar</label>
                       </div>
                       <div class="col-md-4">
                            {{-- <input type="text" class="form-control" placeholder="Harga Bayar" name="bayar" id="bayar"> --}}
                       </div>
                       <div class="col-md-4">
                           <button type="button" id="btn_bayar" class="btn btn-primary">Bayar</button>
                       </div>
                   </div>


                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                    <input type="text" class="form-control" placeholder="Kembalian" name="kembalian" id="kembalian" disabled>
                </div>
                </div>


                <div class="pull-right">
                    <input type="button" id="simpan" value="Tambah" class="btn btn-sm btn-primary">
                </div>
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('penjualan.pembayaran')}}" method="get">
                            @csrf
                        <table class="table" id="keranjang">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah Beli</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Total Bayar</th>
                                    <th><span id="tot_bayar"></span></th>
                                </tr>
                            </tfoot>
                        </table><br>
                        {{-- <input type="text" id="tot_barang"> --}}
                        <input type="button" id="bayar_lanjut" class="btn btn-primary btn-sm" value="Bayar">
                    </form>
                    </div>
                </div>
            @else
            <form action="{{route('penjualan.lanjut')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama pelanggan</label>
                    <select name="nama_pelanggan" id="nama_pelanggan" class="form-control" >
                        <option value="" disabled selected>Pilih Pelanggan</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{$pelanggan->id}}">{{$pelanggan->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis">Alamat</label>
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" disabled>
                </div>
                <div class="form-group">
                    <label for="jenis">No HP</label>
                    <input type="text" class="form-control" placeholder="No HP" name="tlpn" disabled>
                </div>
                <input type="submit" class="btn btn-primary" value="Selanjutnya">
            </form>
            @endif

      </div>

    </div>
</div>
{{-- <a href="{{route('invoice')}}" target="_blank" > click me to pdf </a> --}}
</div>
<script>
        $(document).ready( function () {
            $('#simpan').prop('disabled',true);
            $(document).on('change','#nama_brng',function (e){
                // $('input[name=harga]').val('');
                $.ajax({
                    type: 'get',
                    url: '/penjualan/barang/cari/',
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
            $(document).on('change','#nama_pelanggan',function (e){
                // $('input[name=harga]').val('');
                $.ajax({
                    type: 'get',
                    url: 'penjualan/pelanggan/cari_pelanggan',
                    data: {
                        'id': $('#nama_pelanggan').val()
                    },
                    success: function(data) {
                        if ((data.errors)){
                            //show error disini
                        }
                        else {
                            $('input[name=alamat]').val(data.alamat);
                            $('input[name=tlpn]').val(data.tlpn);
                        }
                    },
                });
                $('#name').val('');
            });
            $(document).on('click','#simpan',function (e){
                if($('#tot_bayar').text()==''){
                    $('#tot_bayar').text($('input[name=total_bayar_2]').val());
                }else{
                    $total = parseInt($('#tot_bayar').text())+parseInt($('input[name=total_bayar_2]').val());
                    $('#tot_bayar').text($total);
                }

                $('#keranjang').append('<tr><td style="display:none">'+$('#nama_brng').val()+'</td><td>'+ $('#nama_brng :selected').text()+'</td><td>'+  $('input[name=harga]').val() +'</td><td>'+ $('input[name=jml_beli]').val()+'</td><td>'+ $('input[name=total_bayar_2]').val()+'</td></tr>');
                $(".input_box").find(':input').each(function() {
                    switch(this.type) {
                        case 'password':
                        case 'text':
                        case 'textarea':
                        case 'file':
                        case 'select-one':
                        case 'select-multiple':
                        case 'date':
                        case 'number':
                        case 'tel':
                        case 'email':
                            jQuery(this).val('');
                            break;
                        case 'checkbox':
                        case 'radio':
                            this.checked = false;
                            break;
                    }
                });
                $('#total_bayar').text('');
            });
            $(document).on('click','#bayar_lanjut',function (e){
                var keranjang=new Object();
                var keranjangArray=new Array();
                var jsonString;
                $('#keranjang tbody tr').each(function() {

                    if (!this.rowIndex) return; // skip first row
                    keranjang.id = this.cells[0].innerHTML;
                    keranjang.jml = this.cells[3].innerHTML;
                    keranjangArray.push(keranjang);
                    keranjang=new Object();



                });
                console.log(keranjangArray);
                $.ajax({
                    type: 'post',
                    url: '/penjualan/pembayaran/create',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'barang': keranjangArray,
                        'pelanggans_id': $('input[name=pelanggans_id').val(),
                        'total': $('#tot_bayar').text(),
                    },
                    success: function(data) {
                        if ((data.errors)){
                            //show error disini
                        }
                        else {
                            window.location = "/penjualan/pembayaran/index/" + data.id;
                        }
                    },
                });
            });
            // $(document).on('click','#simpan',function (e){
            //     // $('input[name=harga]').val('');
            //     $.ajax({
            //         type: 'post',
            //         url: 'penjualan/',
            //         data: {
            //             '_token': $('input[name=_token]').val(),
            //             'barang_id': $('#nama_brng').val(),
            //             'jml_beli': $('#jml_beli').val(),
            //             'total_bayar': $('#total_bayar_2').val()
            //         },
            //         success: function(data) {
            //             if ((data.errors)){
            //                 //show error disini
            //             }
            //             else {
            //                 $('#keranjang').append('<tr><td>'+ data[1].nama +'<input type="hidden" value="'+data[1].id+'" name="barangs_id" id="barangs_id"></td><td>'+ data[0].jml_beli +'<input type="hidden" value="'+data[0].id+'"name="penjualans_id" id="penjualans_id"></td></tr>');
            //             }
            //         },
            //     });
            //         $(".input_box").find(':input').each(function() {
            //         switch(this.type) {
            //             case 'password':
            //             case 'text':
            //             case 'textarea':
            //             case 'file':
            //             case 'select-one':
            //             case 'select-multiple':
            //             case 'date':
            //             case 'number':
            //             case 'tel':
            //             case 'email':
            //                 jQuery(this).val('');
            //                 break;
            //             case 'checkbox':
            //             case 'radio':
            //                 this.checked = false;
            //                 break;
            //         }
            //     });
            // });
            $('#hitung').click(function(){
                $total = $('input[name=harga]').val() * $('input[name=jml_beli]').val();
                $('#total_bayar').html('Rp. '+$total);
                $('#total_bayar_2').val($total);
                $('#simpan').prop('disabled',false);
                // $('#tampil').css('display','block');

            });
            $('#btn_bayar').click(function(){
                $total =  $('#total_bayar_2').val();
                $kembalian = $('#bayar').val()-$total;
                $('#kembalian').val($kembalian);
            });

        });
    </script>
@endsection
