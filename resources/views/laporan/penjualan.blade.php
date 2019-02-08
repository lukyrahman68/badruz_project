@extends('layouts.back_end')
@section('main')
    <br>
    <div class="container">
        <form action="{{route('laporan.cetakpenjualan')}}" method="POST">
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
                        <input type="submit" class="btn btn-primary" value="Cetak">
                    </div>
                </div>
            </div>
        </div>
        </form>
        <br>
        <div id="print_area" class="col-md-12">
        </div>
    </div>
    
@endsection