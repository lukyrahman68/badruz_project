@extends('layouts.back_end')
@section('main')
<br>
<div class="content">
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><a href="{{route('barang.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Data Hadiah</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><i class="icon-home2 position-left active"></i> Data Hadiah</a></li>
            </ul>
        </div>

    </div>
    <div class="col-xs-12 inner input_box">
        <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="font-weight: bold"></h3>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Hadiah</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $idx =1; ?>
                    @foreach ($hadiah as $item)
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->hadiah}}</td>
                        </tr>
                        <?php $idx++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
