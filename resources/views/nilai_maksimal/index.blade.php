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
        <h1>Nilai Maksimal <small>Imput Nilai Maksimal</small></h1>
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
          <h2 class="modal-title" id="exampleModalLabel">Tambah Nilai Maksimal</h2>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{action([\App\Http\Controllers\NilaimaksimalController::class,'store'])}}">
        {{csrf_field()}}

        <div class="form-group">
          <label for="kode_nmax" class="col-form-label">Kode Nmax:</label>
          <input name="kode_nmax" type="text" class="form-control @error('kode_nmax')is-invalid @enderror" id="kode_nmax" placeholder="Masukkan Kode Nmax" value="{{old('kode_nmax')}}">
          @error('kode_nmax')
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="nilai_maksimal" class="col-form-label">Nilai Maksimal:</label>
          <input name="nilai_maksimal" type="text" class="form-control @error('nilai_maksimal')is-invalid @enderror" id="nilai_maksimal"placeholder="Masukkan Nilai Maksimal" value="{{old('id')}}">
          @error('nilai_maksimal')
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
      <!-- Content End tambah modal -->

      <!-- Content Edit modal -->
      @foreach($nilai_maksimal as $nmax)
      <div class="modal fade" id="editModal-{{$nmax->kode_nmax}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <h2 class="modal-title" id="exampleModalLabel"> Edit Nilai Maksimal </h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{action([\App\Http\Controllers\NilaimaksimalController::class,'edit'])}}">
      {{csrf_field()}}

      <div class="form-group">
        <label for="kode_nmax" class="col-form-label">Kode Nmax:</label>
      <input name="kode_nmax" type="text" class="form-control @error('kode_nmax')is-invalid @enderror" id="kode_nmax" placeholder="Masukkan Id"value="{{$nmax->kode_nmax}}" >
      </div>

      <div class="form-group">
                    <label for="nilai_maksimal" class="col-form-label">Nilai Maksimal:</label>
        <input name="nilai_maksimal" type="text" class="form-control @error('nilai_maksimal')is-invalid @enderror" id="nilai_maksimal"placeholder="Masukkan Nilai Maksimal" value="{{$nmax->nilai_maksimal}}">
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
      @endforeach


      <!-- Content End Edit modal -->
      <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
      <tr>
        <th >No</th>
        <th >Kode Nmax</th>
        <th >Nilai Maksimal</th>
        <th >Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($nilai_maksimal as $nmax)
      <tr>
        <th>{{$loop-> iteration}}</th>
        <td>{{$nmax->kode_nmax}}</td>
        <td >{{$nmax->nilai_maksimal}}</td>
        <td >
            <a href="" class="btn btn-primary"data-toggle="modal" data-target="#editModal-{{$nmax->kode_nmax}}" data-whatever="@getbootstrap">Edit</a>
            <a href="nilai_maksimal.index.destroy{{$nmax->kode_nmax}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')">Delete</a>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
          <tr>
              <th>No</th>
              <th>Kode Nmax</th>
              <th>Nilai Maksimal</th>
              <th>Aksi</th>
          </tr>
      </tfoot>
      </table>




      </div>



  </div>


</div>

  @endsection
