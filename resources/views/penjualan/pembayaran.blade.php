@extends('layouts.back_end')
@section('main')
<br>
<div class="content">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
            </tr>
            <tr>
                @foreach ($barangs as $barang)
                    <td>{{$barang->nama}}</td>
                    <td>{{$barang->harga_jual}}</td>
                @endforeach
            </tr>
        </table>
    </div>
</div>
@endsection
