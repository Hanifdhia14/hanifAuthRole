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

<div class="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <h1>Data Karyawan <small></small></h1>
        <hr class="sidebar-divider">


          <div class="card-header">
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"> Tambah </button> --}}

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
              <h2 class="modal-title" id="exampleModalLabel">Tambah Employee</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form method="POST" action="{{action([\App\Http\Controllers\Data_karyawanController::class,'tambah'])}}">
            {{csrf_field()}}

            <div class="form-group">
              <label for="nik_id" class="col-form-label">NIK:</label>
              <input name="nik_id" type="text "class="form-control @error('nik_id')is-invalid @enderror" id="nik_id" placeholder="Masukkan NIK" value="{{old('nik_id')}}">
              @error('nik')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nama" class="col-form-label">Nama Lengkap:</label>
              <input name="nama"type="text" class="form-control @error('nama')is-invalid @enderror" id="nama" placeholder="Masukkan Nama Lengkap" value="{{old('nama')}}">
              @error('nama')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="jabatan" class="col-form-label">Jabatan:</label>
              <select name="jabatan" type="text" class="form-control @error('jabatan')is-invalid @enderror" id="jabatan" placeholder="Masukkan Jabatan" value="{{old('jabatan')}}">
                  	<option>-Pilih-</option>
                    <option>Vice President</option>
                    <option>Manager</option>
                    <option>Senior Analis</option>
                    <option>Fungsional</option>
                    <option>Staff</option>
                  </select>
              @error('jabatan')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            {{-- <div class="form-group">
              <label for="divisi" class="col-form-label">Divisi:</label>
              <input name="divisi"type="text" class="form-control @error('jabatan')is-invalid @enderror" id="divisi" placeholder="Masukkan Divisi" value="{{old('divisi')}}">
              @error('divisi')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div> --}}
            <div class="form-group">
                <label for="divisi" class="col-form-label">Divisi:</label>
                <select name="divisi" type="text" class="form-control @error('divisi')is-invalid @enderror" id="divisi" placeholder="Masukkan Divisi" value="{{old('divisi')}}">
                        <option>-Pilih-</option>
                      <option>Pengelolaan SDM</option>
                      <option>Pengembangan Organisasi & Kepemimpinan</option>
                      <option>Hukum</option>
                      <option>SPI</option>
                      <option>Manajemen Resiko & QA</option>
                      <option>Komersial</option>
                      <option>Operasional</option>
                      <option>Pelayanan</option>
                    </select>
                @error('divisi')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>

            <div class="form-group">
              <label for="direktorat" class="col-form-label">Direktorat:</label>
              <select name="direktorat" type="text" class="form-control @error('direktorat')is-invalid @enderror" id="direktorat" placeholder="Masukkan Direktorat" value="{{old('direktorat')}}">
                  	<option>-Pilih-</option>
                    <option>Komersial dan Pelayanan</option>
                    <option>Teknik dan Fasilitas</option>
                    <option> Perencanaan dan Pengembangan</option>
                    <option> SDM dan Layanan Korporasi</option>
                    <option>Keuangan, Teknologi Informasi, dan Manajemen Risiko</option>
                  </select>
              @error('direktorat')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="alamat" class="col-form-label">Alamat:</label>
              <input name="alamat" type="text" class="form-control @error('alamat')is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{old('alamat')}}">
              @error('alamat')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="email" class="col-form-label">E-Mail:</label>
              <input name="email"type="text" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Masukkan E-mail" value="{{old('email')}}">
              @error('email')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="no_tlp"class="col-form-label">No Tlp:</label>
              <input name="no_tlp"type="text" class="form-control @error('no_tlp')is-invalid @enderror" id="no_tlp" placeholder="Masukkan Nomer Tlp" value="{{old('no_tlp')}}">
              @error('no_tlp')
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

<!-- Content edit modal -->
  @foreach ($employee as $empl)
<div class="modal fade" id="editmodal{{$empl->nik_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLabel">Edit Employee</h2>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <form method="POST" action="{{action([\App\Http\Controllers\Data_karyawanController::class,'edit'])}}">
        {{csrf_field()}}

        <div class="form-group">
          <label for="nik_id" class="col-form-label">NIK:</label>
          <input name="nik_id" class="form-control @error('nik_id')is-invalid @enderror " id="nik_id" placeholder="Masukkan NIK" value="{{$empl->nik_id}}">
        </div>
        <div class="form-group">
          <label for="nama" class="col-form-label">Nama Lengkap:</label>
          <input name="nama"type="text" class="form-control @error('nama')is-invalid @enderror" id="nama" placeholder="Masukkan Nama Lengkap" value="{{$empl->nama}}">
        </div>

        <div class="form-group">
          <label for="jabatan" class="col-form-label">Jabatan:</label>
          <select name="jabatan" type="text" class="form-control @error('jabatan')is-invalid @enderror" id="jabatan" placeholder="Masukkan Jabatan">
                <option>{{$empl->jabatan}}</option>
                <option>Vice President</option>
                <option>Manager</option>
                <option>Senior Analis</option>
                <option>Fungsional</option>
                <option>Staff</option>
              </select>
        </div>
        <div class="form-group">
            <label for="divisi" class="col-form-label">Divisi:</label>
            <select name="divisi" type="text" class="form-control @error('divisi')is-invalid @enderror" id="divisi" placeholder="Masukkan Divisi" value="{{old('divisi')}}">
                 <option>{{$empl->divisi}}</option>
                  <option>Pengelolaan SDM</option>
                  <option>Pengembangan Organisasi & Kepemimpinan</option>
                  <option>Hukum</option>
                  <option>SPI</option>
                  <option>Manajemen Resiko & QA</option>
                  <option>Komersial</option>
                  <option>Operasional</option>
                  <option>Pelayanan</option>
                </select>
            @error('divisi')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

        <div class="form-group">
          <label for="direktorat" class="col-form-label">Direktorat:</label>
          <select name="direktorat" type="text" class="form-control @error('direktorat')is-invalid @enderror" id="direktorat" placeholder="Masukkan Direktorat">
              <option>{{$empl->direktorat}}</option>
              <option>Komersial dan Pelayanan</option>
              <option>Teknik dan Fasilitas</option>
              <option> Perencanaan dan Pengembangan</option>
              <option> SDM dan Layanan Korporasi</option>
              <option>Keuangan, Teknologi Informasi, dan Manajemen Risiko</option>
              </select>
        </div>

        <div class="form-group">
          <label for="alamat" class="col-form-label">Alamat:</label>
          <input name="alamat"type="text" class="form-control @error('alamat')is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" value="{{$empl->alamat}}">
        </div>

        <div class="form-group">
          <label for="email"class="col-form-label">Email:</label>
          <input name="email"type="text" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Masukkan Email" value="{{$empl->email}}">
        </div>

        <div class="form-group">
          <label for="no_tlp"class="col-form-label">No Tlp:</label>
          <input name="no_tlp"type="text" class="form-control @error('no_tlp')is-invalid @enderror" id="no_tlp" placeholder="Masukkan Nomer Tlp" value="{{$empl->no_tlp}}">
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
<!-- End Content edit modal -->
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th >No</th>
                <th >NIK</th>
                <th >Nama</th>
                <th >Jabatan</th>
                <th >Divisi</th>
                <th >Dirktorat</th>
                <th >Alamat</th>
                <th >Email</th>
                <th >No.Tlp</th>
                <th >Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($employee as $empl)
                <tr>
                  <th >{{$loop-> iteration}}</th>
                  <td >{{$empl->nik_id}}</td>
                  <td >{{$empl->nama}}</td>
                  <td >{{$empl->jabatan}}</td>
                  <td >{{$empl->divisi}}</td>
                  <td >{{$empl->direktorat}}</td>
                  <td >{{$empl->alamat}}</td>
                  <td >{{$empl->email}}</td>
                  <td >{{$empl->no_tlp}}</td>
                  <td >
                      <a data-toggle="modal" data-target="#editmodal{{$empl->nik_id}}" data-whatever="@getbootstrap"><i class="material-icons">&#xE254;</i></a>
                      <a href="employee.index.hapus{{$empl->nik_id }}" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')"><i class="material-icons">&#xE872;</i></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th >No</th>
                  <th >NIK</th>
                  <th >Nama</th>
                  <th >Jabatan</th>
                  <th >Divisi</th>
                  <th >Dirktorat</th>
                  <th >Alamat</th>
                  <th >Email</th>
                  <th >No.Tlp</th>
                  <th >Aksi</th>
                </tr>
              </tfoot>
            </table>

          </div>



  </div>
</div>

  @endsection
