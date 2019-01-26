@extends('layouts.back_end')
@section('main')

    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">

                <h4><span class="text-semibold">Ubah Data User</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
               <li><a href="{{route('user.index')}}"><i class="icon-home2 position-left"></i> Data User</a></li>
                <li class="active">Ubah Data User</li>
            </ul>
        </div>
    </div>
    <div class="content">
  
<div class="col-xs-12 inner">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title" style="font-weight: bold"></h3>
        <form action="{{route('user.ubah',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                <label for="nama">Nama User</label>
                    <input type="text" class="form-control" placeholder="Nama" name="name" id="nama" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="warna">Email</label>
                <input type="text" class="form-control" placeholder="email" name="email" id="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="warna">Password</label>
                <input type="text" class="form-control" placeholder="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="warna">Role</label>
                <select name="role" class="form-control">
                <option value="{{$user->role}}" selected>{{$user->role}}</option>
                    <option value="karyawan">Karyawan</option>
                    <option value="manajer">Manajer</option>
                    <option value="pemilik">Pemilik</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
            <div class="pull-right">
                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
            </div>
                </div>
               
            </div>
        </form>
      </div>
    </div>
</div>

</div>
@endsection