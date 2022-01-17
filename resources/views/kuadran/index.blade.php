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


  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
        <h1> Kuadran <small> Input Data Kuadran</small> </h1>
        <hr class="sidebar-divider">

    <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Tambah</button>
        <!-- Search form -->
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

                <h2 class="modal-title" id="modal-tambah">Tambah Kuadran</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form method="POST" action="{{action([\App\Http\Controllers\KuadranController::class,'tambah'])}}">
                <div class="modal-body">
                {{csrf_field()}}

                <div class="form-group">
                  <label for="kode_kuadran" class="col-form-label">Kode Kuadran:</label>
                  <input name="kode_kuadran"  type="text" class="form-control @error('Kode_kuadran')is-invalid @enderror" id="id" placeholder="Masukkan kode" value="{{old('kode_kuadran')}}">
                  @error('Kode_kuadran')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="Kuadran" class="col-form-label">Nama Kuadran:</label>
                  <input name="kuadran"  type="text" class="form-control @error('kuadran')is-invalid @enderror" id="kuadran" placeholder="Masukkan Kuadran"  value="{{old('kuadran')}}">
                  @error('kuadran')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

                <div class="form-group date">
                  <label for="start_date" class="col-form-label">Start Date:</label>
                  <input name="start_date" type="date" class="form-control" id="kuadran"placeholder="Masukkan End Date" value="{{old('end_date')}}">
                </div>

                <div class="form-group">
                  <label for="end_date" class="col-form-label">End Date:</label>
                  <input name="end_date" type="date" class="form-control @error('end_date')is-invalid @enderror " id="kuadran" placeholder="Masukkan End Date" value="{{old('end_date')}}">
                  @error('end_date')
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

  <!-- Content edit modal -->
    @foreach ($kuadran as $kdr)
      <div class="modal fade" id="edit-{{$kdr->id_kuadran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="modal-edit">Edit Kuadran</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="kuadran.index.edit{{$kdr->id_kuadran}}" method="POST" id="editform">
              {{csrf_field()}}

            <div class="modal-body">
              <div class="form-group">
                <label for="kode_kuadran" class="col-form-label">Kode Kuadran:</label>
                <input name="kode_kuadran"  type="text" class="form-control" id ="kode_kuadran" placeholder="Masukkan Kode" value="{{$kdr->kode_kuadran}}">
              </div>

              <div class="form-group">
                <label for="kuadran" class="col-form-label">Nama Kuadran:</label>
                <input name="kuadran"  type="text" class="form-control" id="kuadran" placeholder="Masukkan Kuadran"value="{{$kdr->kuadran}}">
              </div>

              <div class="form-group">
                <label for="start_date" class="col-form-label">Start Date:</label>
                <input name="start_date" type="date" class="form-control" id="kuadran" placeholder="Masukkan Start Date" value="{{$kdr->start_date}}">
              </div>

              <div class="form-group" data-provide="datepicker">
                <label for="end_date" class="col-form-label">End Date:</label>
                <input name="end_date" type="date" class="form-control" id="kuadran" placeholder="Masukkan End Date" value="{{$kdr->end_date}}">
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
  <!-- End Content edit modal -->

        <!-- Content table data -->
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Kuadran</th>
              <th>Kuadran</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($kuadran as $kdr)
            <tr>
              <td>{{$loop-> iteration}}</th>
              <td>{{$kdr ->kode_kuadran}}</td>
              <td>{{$kdr ->kuadran}}</td>
              <td>{{$kdr ->start_date}}</td>
              <td>{{$kdr ->end_date}}</td>
              <td>
                <a aria-hidden="true" data-toggle="modal" data-target="#edit-{{$kdr->id_kuadran}}"> <i class="material-icons">&#xE254;</i> </a>
                <a href="kuadran.index.hapus{{$kdr->id_kuadran}}" aria-hidden="true" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')"><i class="material-icons">&#xE872;</i></a>
              </td>

            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kode Kuadran</th>
              <th>Kuadran</th>
              <th>Start date</th>
              <th>End date</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
    </div>

  </div>

@endsection
