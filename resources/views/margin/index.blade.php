@extends('layouts.back_end')
@section('main')

<style>
    select[name="DataTables_Table_0_length"] {     margin-top: 8px;}
</style>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title"><h4><a href="{{route('margin.index')}}"><i class="icon-arrow-left52 position-left" style="color: #000;"></i></a> <span class="text-semibold">Data Margin</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            {{-- <li><a href="{{route('dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li> --}}
            <li class="active">Margin</li>
        </ul>
    </div>
</div>
<br>
<div class="content">
    <div class="panel" style="background-color: transparent; border:0; box-shadow: none;">
        @if (count($margins)>0)

            <button type="button" class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal_edit"><b><i class="icon-plus3"></i></b> Update
            </button>
          <!-- Modal -->
            <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Margin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('margin.update', $id->id)}}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="">Margin</label>
                        <input type="text" class="form-control" name="margin" placeholder="Margin" value="{{$id->margin}}">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        @else
            <button type="button" class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal_add"><b><i class="icon-plus3"></i></b> Create
            </button>
        <!-- Modal -->
            <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('margin.store')}}" method="post">
                    @csrf
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="">Margin</label>
                        <input type="text" class="form-control" name="margin" placeholder="Margin">
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
        @endif

    </div>




            <!-- /.box-header -->
           <div class="row">
              <div class="col-md-6">
                  <h3>Margin Saat Ini</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Margin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($margins)>0)
                        @foreach ($margins as $margin)
                            <tr>
                                <td>1</td>
                                <td>{{$margin->margin}} %</td>
                            </tr>
                        @endforeach
                        @else
                            <tr style="text-align: center">
                                <td colspan="2">Data Tidak Ditemukan</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
              </div>
            </div>

          </div>

@endsection

