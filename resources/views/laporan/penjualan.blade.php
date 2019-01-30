@extends('layouts.back_end')
@section('main')
    <br>
    <div class="container">
        <form action="{{route('laporan.filter')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-5" style="text-align: right;">Tanggal</div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="tgl_awal">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2" style="text-align: left;">SD</div>
                    <div class="col-md-6" style="text-align:left">
                        <input type="date" class="form-control" name="tgl_akhir">
                    </div>
                    <div class="col-md-4" style="text-align:left">
                        <input type="submit" class="btn btn-primary" value="Filter">
                    </div>
                </div>
            </div>
        </div>
        </form>
        <br>
        <div id="print_area" class="col-md-12">
            <?php $idx=1; ?>
            @foreach ($pelanggans as $pelanggan)
                {{-- @foreach ($pelanggans as $pelanggan)
                    if($pelanggan->nama==)
                @endforeach --}}
                <div style="background-color: #ffff;padding:1em;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Pelanggan</td>
                            <td>Nama Barang</td>
                            <td>Jumlah Beli</td>
                            <td>Harga Satuan</td>
                            <td>Tanggal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$pelanggan->nama_pelanggan}}</td>
                            <td>{{$pelanggan->nama_barang}}</td>
                            <td>{{$pelanggan->jml_beli}}</td>
                            <td>{{$pelanggan->harga_jual}}</td>
                            <td>{{$pelanggan->created_at}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total</td>
                            <td>{{$pelanggan->total_bayar}}</td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <br>
                <?php $idx++;?>
            @endforeach

    <a href="{{route('laporan.cetak')}}" id="cetak" class="btn btn-primary">Cetak</a>
        </div>
    </div>
    {{-- <script>
        $('#cetak').click(function(){
            console.log($('#print_area').text);
        });
    </script> --}}
@endsection
