@extends('layouts.app')


  @section('content')
  <style media="screen">

  h1{
    color: darkblue;
    margin-left: 20pt;
    font-style: article;
  }
  .btn{
    margin-top:10pt;
    margin-bottom: 20pt;
    margin-left: 10pt;
    float:right;

  }
table{
padding-top: 20px;

}
 .isi{
    font-size: 20px;
 }
  </style>

<div ="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <h1>Input Realisasi Kerja</h1>
          <hr class="sidebar-divider">



<div class="card">
  <div class="card-header">
    <div class="col-lg-12">

<form class="" action="" method="post">
  <table class="table table-over" style="width:100%">
    <thead>
      <tbody>

             <tr>
                <th width="150">Nama Pegawai</th>
                <td>:</td>
             </tr>
             <tr>
                <th>Jabatan</th>
                <td>:</td>
             </tr>
             <tr>
                <th>level </th>
                <td>:</td>
             </tr>
             <tr>
                <th>Unit Kerja</th>
                <td>:</td>
             </tr>
            <th> Tahun </th>
             <td> <select name="Tahun_nilai" type="text" class="form-control" id="Level_nilai">
                   <option>-Pilih-</option>
                   <option>2021</option>
                   <option>2022</option>
                   <option>2023</option>
                   <option>2024</option>
                 </select> </td>

          </tbody>

    </thead>
  </table>


<!--Input modal-->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modal-realisasi">Masukkan Realisasi</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form method="POST" action="{{action([\App\Http\Controllers\KuadranController::class,'store'])}}">
          <div class="modal-body">
          {{csrf_field()}}

          <div class="form-group">
              <label for="kode_kuadran" class="col-form-label">Nama Kuadran:</label>
          </div>

          <div class="form-group">
            <label for="kode_kuadran" class="col-form-label">Nama KPI:</label>

          </div>

          <div class="form-group date">
            <label for="kode_kuadran" class="col-form-label">Parameter:</label>

          </div>

          <div class="form-group">
            <label for="kode_kuadran" class="col-form-label">Bobot:</label>

          </div>

          <div class="form-group">
            <label for="kode_kuadran" class="col-form-label">Tipe Penilaian:</label>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>

          </div>
        </form>


      </div>
    </div>
  </div>
<!-- End Input modal-->

  <table id="example" class="table table-striped table-bordered" style="width:100%">

        <thead>
              <tr>
                <th>No</th>
                <th>Kuadran</th>
                <th>KPI</th>
                <th>Satuan</th>
                <th>Tipe Penilaian</th>
                <th>Target Absolut</th>
                <th>Bobot</th>
                <th>Realisasi % </th>
                <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-center">
                      <a class="isi" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                  </td>
              </tr>
          </tbody>
          <tfoot>
              <tr>
                  <th>No</th>
                  <th>Kuadran</th>
                  <th>KPI</th>
                  <th>Satuan</th>
                  <th>Tipe Penilaian</th>
                  <th>Target Absolut</th>
                  <th>Bobot</th>
                  <th>Realisasi % </th>
                  <th>Aksi</th>
              </tr>
          </tfoot>
      </table>
      <button  type="button" class="btn btn-success" onclick="return confirm('Apakah anda yakin hasil KPI untuk disubmit ?')">Submit</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Save</button>
</form>




    </div>
  </div>
</div>

  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable( {
    } );
  } );
</script>


  @endsection
