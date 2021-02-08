@extends('layouts.app')


  @section('content')
  <style media="screen">

  h1{
    color: darkblue;
    margin-left: 20pt;
    font-style: article;
  }
  button{
    margin-top:10pt;
    margin-bottom: 20pt;
    margin-left: 50pt;

  }
table{
padding-top: 20px;

}
  </style>

<div ="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <h1>Document <small>Imput Jenis Document</small></h1>
          <hr class="sidebar-divider">

  <div class="card-header">

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah</button>

                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

    <!-- Content tambah modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Tambah Document</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{action([\App\Http\Controllers\DocumentController::class,'store'])}}">
                  {{csrf_field()}}

                  <div class="form-group">
                    <label for="kode_dcm" class="col-form-label">Kode Document:</label>
                    <input name="kode_dcm" type="text" class="form-control @error('kode_dcm')is-invalid @enderror" id="kode_dcm" placeholder="Masukkan Id" value="{{old('kode_dcm')}}">
                    @error('kode_dcm')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="document" class="col-form-label">Nama Document:</label>
                    <input name="document" type="text" class="form-control @error('document')is-invalid @enderror" id="document" placeholder="Masukkan document" value="{{old('document')}}">
                    @error('document')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    <!-- End Content Tambah modal -->

    <!-- Content Edit modal -->
        @foreach($document as $dc)
          <div class="modal fade" id="editModal-{{$dc->kode_dcm}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel"> Edit Document </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  <div class="modal-body">
                  <form method="POST" action="{{action([\App\Http\Controllers\DocumentController::class,'edit'])}}">
                    {{csrf_field()}}

                  <div class="form-group">
                    <label for="kode_dcm" class="col-form-label">Kode Document:</label>
                      <input name="kode_dcm" type="text" class="form-control @error('kode_dcm')is-invalid @enderror" id="kode_dcm"placeholder="Masukkan Id" value="{{$dc->kode_dcm}}">
                            @error('kode_dcm')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                  </div>

                    <div class="form-group">
                      <label for="document" class="col-form-label">Nama Document:</label>
                      <input name="document" type="text" class="form-control @error('id')is-invalid @enderror" id="document" placeholder="Masukkan document" value="{{$dc->document}}">
                              @error('document')
                                <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                    </div>

                    <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Ubah</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>

                </form>
              </div>
            </div>
          </div>
        </div>
    @endforeach
    <!-- End Content Edit modal -->

              <table id="example" class="table table-striped table-bordered" style="width:100%">

              <thead>
                <tr>
                  <th >No</th>
                  <th >Kode Document</th>
                  <th >Document</th>
                  <th >Aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach($document as $dc)
                <tr>
                  <th>{{$loop->iteration}}</th>
                  <td>{{$dc->kode_dcm}}</td>
                  <td>{{$dc->document}}</td>
                    <td>
                        <a data-toggle="modal" data-target="#editModal-{{$dc->kode_dcm}}" data-whatever="@getbootstrap"><i class="material-icons">&#xE254;</i></a>
                        <a href="document.index.destroy{{$dc->kode_dcm}}" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')" ><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Kode Document</th>
                      <th>Document</th>
                      <th>Aksi</th>
                  </tr>
              </tfoot>
            </table>

    </div>

</div>

  @endsection
