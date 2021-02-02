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
        <h1>Tipe Penilaian <small>Imput Tipe Penilaian</small></h1>
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
          <h2 class="modal-title" id="exampleModalLabel">Tipe Penilaian </h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

      <div class="modal-body">
      <form method="POST" action="{{action([\App\Http\Controllers\TipepenilaianController::class,'store'])}}">
        {{csrf_field()}}

            <div class="form-group">
              <label for="kode_nilai" class="col-form-label">Kode Nilai:</label>
              <input name="kode_nilai"type="text" class="form-control @error('kode_nilai')is-invalid @enderror" id="kode_nilai" placeholder="Masukkan Id" value="{{old('kode_nilai')}}">
              @error('kode_nilai')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="tipe_penilaian" class="col-form-label">Tipe Penilaian:</label>
              <input name="tipe_penilaian"type="text" class="form-control @error('tipe_penilaian')is-invalid @enderror" id="tipe_penilaian" placeholder="Masukkan Tipe Penilaian" value="{{old('id')}}" >
              @error('tipe_penilaian')
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
      @foreach ($tipe_penilaian as $tp)
      <div class="modal fade" id="editModal-{{$tp->kode_nilai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLabel">Edit Tipe Penilaian </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>


      <form method="POST" action="{{action([\App\Http\Controllers\TipepenilaianController::class,'edit'])}}" method="POST" id="editform">
      {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
              <label for="kode_nilai" class="col-form-label">Kode Nilai:</label>
              <input name="kode_nilai"type="text" class="form-control @error('kode_nilai')is-invalid @enderror" id="kode_nilai" placeholder="Masukkan Id" value="{{$tp->kode_nilai}}">
              @error('kode_nilai')
              <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="tipe_penilaian" class="col-form-label">Tipe Penilaian:</label>
              <input name="tipe_penilaian"type="text" class="form-control @error('tipe_penilaian')is-invalid @enderror" id="tipe_penilaian" placeholder="Masukkan Tipe Penilaian" value="{{$tp->tipe_penilaian}}">
              @error('tipe_penilaian')
              <div class="invalid-feedback">{{$message}}</div>
              @enderror
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Buat</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </form>

      </div>
    </div>
  </div>
      @endforeach
      <!-- End Content Edit modal -->


      <table id="example" class="table table-striped table-bordered" style="width:100%">

      <thead>
      <tr>
        <th >No</th>
        <th >kode_nilai</th>
        <th >Tipe Penilaian</th>
        <th >Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($tipe_penilaian as $tp)
      <tr>
        <th >{{$loop->iteration}}</th>
        <td >{{$tp->kode_nilai}}</td>
        <td >{{$tp->tipe_penilaian}}</td>
        <td >
            <a href="" class="btn btn-primary"data-toggle="modal" data-target="#editModal-{{$tp->kode_nilai}}" data-whatever="@getbootstrap">Edit</a>
            <a href="tipe_penilaian.index.destroy{{$tp->kode_nilai }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')">Delete</a>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th >No</th>
        <th >kode_nilai</th>
        <th >Tipe Penilaian</th>
        <th >Aksi</th>
      </tr>
      </tfoot>
      </table>





      </div>


  </div>
</div>

  @endsection
