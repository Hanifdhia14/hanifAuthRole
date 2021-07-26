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

    <!-- Content Header (Page header) -->
        <h1>Akses <small>Create User</small></h1>
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

        <h2 class="modal-title" id="modal-tambah">Create User</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>

      <form method="POST" action="{{action([\App\Http\Controllers\Create_userController::class,'store'])}}">
        <div class="modal-body">
        {{csrf_field()}}

        <div class="form-group">
          <label for="nama" class="col-form-label">Nama:</label>
          <input name="nama"  type="text" class="form-control @error('nama')is-invalid @enderror" id="id" placeholder="Masukkan Nama" value="{{old('nama')}}">
          @error('nama')
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="email" class="col-form-label">Nama Email:</label>
          <input name="email"  type="text" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Masukkan email"  value="{{old('email')}}">
          @error('email')
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group date">
          <label for="role" class="col-form-label">Role:</label>
          <select name="role" type="text" class="form-control @error('role')is-invalid @enderror" id="role" placeholder="Masukkan Role" value="{{old('role')}}">
               <option>-Pilih-</option>
               <option>admin</option>
               <option>user</option>
               <option>leader</option>
          </select>
          @error('role')
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password" class="col-form-label">Password:</label>
          <input name="password" type="password" class="form-control @error('password')is-invalid @enderror " id="password" placeholder="Masukkan Password" value="{{old('password')}}">
          @error('password')
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Buat</button>
          <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>

        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Content Tambah modal -->


<!-- Content Edit modal -->
@foreach ($create_user as $crt)
  <div class="modal fade" id="edit{{$crt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="modal-edit">Edit Data Akses</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="{{action([\App\Http\Controllers\Create_userController::class,'edit'])}}" method="POST" id="editform">
          {{csrf_field()}}

        <div class="modal-body">
          <div class="form-group">
            <label for="nama" class="col-form-label">Kode Kuadran:</label>
            <input name="nama"  type="text" class="form-control" id ="nama" placeholder="Masukkan Kode" value="{{$crt->nama}}">
          </div>

          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input name="email"  type="text" class="form-control" id="email" placeholder="Masukkan Kuadran"value="{{$crt->email}}">
          </div>

          <div class="form-group">
            <label for="role" class="col-form-label">Role:</label>
            <input name="role" type="text" class="form-control" id="kuadran" placeholder="Masukkan Start Date" value="{{$crt->role}}">
          </div>

          <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input name="password" type="text" class="form-control" id="kuadran" placeholder="Masukkan End Date" value="{{$crt->password}}">
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ubah Data</button>
            <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
          </div>
        </form>

      </div>
    </div>
  </div>
  @endforeach
<!-- End Content Edit modal -->

  <table id="example" class="table table-striped table-bordered" style="width:100%;">
      <thead >
          <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Password</th>
              <th>Aksi</th>
          </tr>
      </thead>

      <tbody>
    @foreach ($create_user as $crt)
          <tr>
          <td>{{$loop-> iteration}}</td>
          <td>{{$crt ->nama}}</td>
          <td>{{$crt ->email}}</td>
          <td>{{$crt ->role}}</td>
          <td>{{$crt ->password}}</td>
          <td >
              <a data-toggle="modal" data-target="#edit{{$crt->id}}" data-whatever="@getbootstrap"><i class="material-icons">&#xE254;</i></a>
              <a href="create_user.index.destroy{{$crt->id }}" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')"><i class="material-icons">&#xE872;</i></a>
          </td>
        </tr>
    @endforeach

      </tbody>
      <tfoot>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Password</th>
            <th>Aksi</th>
          </tr>
      </tfoot>
  </table>

</div>



</div>



  @endsection
