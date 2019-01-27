@extends('layouts.back_end')
@section('main')

<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('pelanggan.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">PRE ORDER   </span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Pre-Order</li>
        </ul>
    </div>
</div>
<br>
<div class="content">
    <div class="panel" style="background-color: transparent; border:0; box-shadow: none;">
            <a href="{{route('pelanggan.create')}}">
                <button type="button" class="btn btn-success btn-labeled"><b><i class="icon-plus3"></i></b> Create
                </button>
              </a>
    </div>




            <!-- /.box-header -->
    <div class="row" style="">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Sisa Bayar</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{$pelanggan->nama}}</td>
                            <td>{{$pelanggan->sisa_bayar}}</td>
                            <td>{{$pelanggan->created_at}}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div
</div>
          <script type="text/javascript">
            $(document).ready(function () {

            });
          </script>
@endsection

