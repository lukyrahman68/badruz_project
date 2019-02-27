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
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Total Transaksi</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $idx =1; ?>
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$pelanggan->nama}}</td>
                            <td>{{$pelanggan->jml}}</td>
                            @if ($pelanggan->hadiah)
                                <td>{{$pelanggan->hadiah}}</td>
                            @else
                            <td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-{{$pelanggan->id}}">Pilih</a></td>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="edit-{{$pelanggan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hadiah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form action="{{route('hadiah.store')}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Hadiah</label>
                                                    <input type="text" class="form-control" name="hadiah" placeholder="Hadiah">
                                                    <input type="hidden" class="form-control" name="pelanggan_id" value="{{$pelanggan->id}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
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
