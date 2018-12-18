@extends('layouts.back_end')
@section('main')
<br>
<div class="container">
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold">Responsive Hover Table</h3>
        <form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="NIK">NIK</label>
                <input type="text" class="form-control" placeholder="NIK" name="nik">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
            </div>
            <div class="form-group">
                <label for="JK">Jenis Kelamin</label>
                <input type="text" class="form-control" placeholder="Jenis Kelamin" name="jk">
            </div>
            <div class="form-group">
                <label for="TTL">TTL</label>
                <input type="text" class="form-control" placeholder="TTL" name="ttl">
            </div>
            <div class="form-group">
                <label for="Telphone">Telphone</label>
                <input type="text" class="form-control" placeholder="Telphone" name="tlpn">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
            <div class="card" style="padding:1em;border:1px solid #eee">
                <div class="card-body">
                    <div class="card-title"> Upload Photo</div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ktp">KTP</label>
                                <input type="file" class="form-control" name="ktp">
                            </div>
                            <div class="form-group">
                                <label for="kk">Kartu Keluarga</label>
                                <input type="file" class="form-control" name="kk">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dp">Dokumen Pendukung</label>
                                <input type="file" class="form-control" name="dp[]">
                            </div>
                            <div class="form-group">
                                <label for="dp">Dokumen Pendukung</label>
                                <input type="file" class="form-control" name="dp[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
        </form>
      </div>
    </div>
</div>
</div>

@endsection
