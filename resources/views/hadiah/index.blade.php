@extends('layouts.back_end')
@section('main')
<<<<<<< HEAD
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
                            <td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Pilih</a></td>
                            <!-- Modal -->
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
=======
<link href="<?php echo asset('vendor/air-datepicker/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css">
<script src="<?php echo asset('vendor/air-datepicker/js/datepicker.min.js') ?>"></script>
<script src="<?php echo asset('vendor/air-datepicker/js/i18n/datepicker.en.js') ?>"></script>
<style>
	#datepickers-container{
		z-index: 1100 !important;
	}
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
 <style type="text/css">
    .datepicker>div {
             display: block;
    }
</style>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            {{-- <h4><a href="{{!empty(\URL::previous())?\URL::previous():route('dashboard')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">User</span></h4> --}}
            <h4><a href="{{route('stock.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Periode Penentuan Penerima Hadiah</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Periode Hadiah</li>
        </ul>
    </div>
</div>
{{-- <script type="text/javascript">
  $(document).ready(function () {
      $('.datatable-ajax').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax" 		: "{{route('stock.listStock')}}",

          "columns": [
              {"data": 'no'},
              {"data": 'nama'},
              {"data": 'jumlah'},
          ]
      });
  });
  </script> --}}
<br>
<div class="content">

           <div class="row">
              <div class="col-md-12">
            <form action="{{route('hadiah.cari')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="jenis">Tanggal Mulai</label>
                        <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd-mm-yyyy" name="mulai" placeholder="Tanggal Mulai">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="jenis">Tanggal Selesai</label>
                        <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd-mm-yyyy" name="selesai" placeholder="Tanggal Selesai">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <input type="submit" id="save" class="btn btn-primary" value="Proses">
                </div>
            </form>
                  
              </div>
            </div>
           
          </div>

@endsection

>>>>>>> origin
