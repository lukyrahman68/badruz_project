@extends('layouts.back_end')
@section('main')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><span class="text-semibold">Buat User Baru</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('user.index')}}"><i class="icon-home2 position-left"></i> Data User</a></li>
                <li class="active">Tambah User</li>
            </ul>
        </div>
    </div>
    <div class="content">
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Nama User</label>
                <input type="text" class="form-control" placeholder="Nama" name="name" id="nama">
            </div>
            <div class="form-group">
                <label for="nama">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat">
            </div>
            <div class="form-group">
                <label for="nama">Jenis Kelamin</label>
                <select name="jk" class="form-control">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Telephon</label>
                <input type="text" class="form-control" placeholder="Telepon" name="tlpn" id="tlpn">
            </div>
            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
                </div>
                <div class="col-md-6">
            <div class="form-group">
                <label for="warna">Email</label>
                <input type="text" class="form-control" placeholder="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="warna">Password</label>
                <input type="text" class="form-control" placeholder="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="warna">Role</label>
                <select name="role" class="form-control">
                    <option value="karyawan">Karyawan</option>
                    <option value="manajer">Manajer</option>
                    <option value="pemilik">Pemilik</option>
                    <option value="super_admin">Super admin</option>
                </select>
            </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
</div>
@endsection