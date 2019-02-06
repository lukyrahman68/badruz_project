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
                   <li><i class="icon-home2 position-left active"></i> Penjualan</a> > Pembayaran</li>
                </ul>
            </div>

        </div>
    <div class="col-xs-12 inner input_box">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title" style="font-weight: bold"></h3>
            <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody><?php $total_brng=0; ?>
                        @foreach ($penjualans as $penjualan)
                        <?php $total = $penjualan->total_bayar;
                        $total_brng += $penjualan->jml_beli ?>
                        <tr>
                            <td>
                                {{$penjualan->nama}}
                            </td>
                            <td>
                                {{$penjualan->jml_beli}}
                            </td>
                            <td>
                                {{$penjualan->harga_jual}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold;border-top: solid">
                            <td>Total</td>
                            <td>{{$total_brng}}</td>
                            <td><span id="total">{{$total}}</span></td>
                        </tr>
                    </tfoot>
                </table>
                <form target="_blank" action="{{route('penjualan.pembayaran_create',$param->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="text" class="form-control" placeholder="Diskon" id="diskon">
                        {{-- <input type="hidden" class="form-control" placeholder="si" id="sisa" name="sisa"> --}}
                </div>
                <div class="form-group">
                    <label for="jenis">Pilih Pembayaran</label>
                    <select name="pembayaran" id="pembayaran" class="form-control">
                        <option value=""disabled selected>Pilih Pembayaran</option>
                        <option value="0">Tunai</option>
                        <option value="1">Pre-Order</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis">Bayar</label>
                    <input type="text" class="form-control" placeholder="Bayar" id="bayar">
                    <input type="hidden" class="form-control" placeholder="si" id="sisa" name="sisa">
                </div>
                <h3><span id="kembalian"></span></h3>
                <div class="form-group">

                    <input type="submit" id="save" class="btn btn-primary" value="Simpan">
                </div>
            </form>
          </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $(document).on('change','#bayar', function (e){
            var total = parseInt($('#bayar').val())-parseInt($('#total').html());
            var jenis_byr = $('#pembayaran').find(':selected').text();
            if(jenis_byr=="Pre-Order"){
                var total = parseInt($('#total').html())-parseInt($('#bayar').val());
                $('#kembalian').html('Sisa Yang Harus Dibayar Rp. '+total);
                $('#sisa').val(total);

            }else{
                var total = parseInt($('#bayar').val())-parseInt($('#total').html());
                $('#kembalian').html('Rp. '+total);
                $('#sisa').val('0');
            }
        });
        $('#save').click(function(){
            window.location.href = '/penjualan';
        });
    });
</script>
@endsection
