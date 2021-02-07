@extends('layouts.app')


  @section('content')

    <style media="screen">

    h1{
      color: darkblue;
      margin-left: 20pt;
      font-style: article;
    }
    .btn{
      margin-top: 20pt;
      margin-right: 10pt;
      margin-bottom: 20pt;
    }

    </style>

  <div ="container-fluid">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
          <h1>Input Target Kerja</h1>
            <hr class="sidebar-divider">
  <div class="card">
    <div class="card-header">
      <div class="col-lg-12">
        <table class="table table-hover" style="width:100%">
          <thead>
            <tbody>

                   <tr>
                      <th width="150">Jabatan</th>
                      <td>:</td>
                   </tr>
                   <tr>
                      <th>Level</th>
                      <td>:</td>
                   </tr>
                   <tr>
                      <th>Unit Kerja </th>
                      <td>:</td>
                   </tr>
                   <tr>
                      <th>Wilayah</th>
                      <td>:</td>
                   </tr>
                  <th> Tahun </th>
                   <td> <select name="Tahun" type="text" class="form-control" id="Level">
                         <option>-Pilih-</option>
                         <option>2021</option>
                         <option>2022</option>
                         <option>2023</option>
                         <option>2024</option>
                       </select> </td>

                </tbody>

          </thead>
        </table>
            <div class="modal-body">
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                  + Add
                </button>
                <button type="button" class="btn btn-success" data-target="#staticBackdrop" onclick="return confirm('Apakah anda yakin ingin mengirim data ke Atasan ?')">Approval</button>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <!-- Tambah Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Tambah Target Kerja</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="POST" action="">
                      <div class="modal-body">
                      {{csrf_field()}}
                      <div class="modal-body">
                          <label for="kode_kuadran" class="col-form-label">Kuadran:</label>
                          <select type="text"  name="kode_kuadran" id="kode_kuadran" class="form-control">
                            <option value=""> ==  Pilih Kuadran== </option>
                          </select>
                      </div>

                      <div class="modal-body">
                          <label for="kode_kpi" class="col-form-label">KPI:</label>
                          <select type="text" name="kode_kpi" id="kode_kpi" class="form-control">
                            <option value=""> ==Pilih KPI== </option>
                          </select>
                      </div>

                      <div class="modal-body">
                          <label for="kode_satuan" class="col-form-label">Satuan:</label>
                          <select type="text" name="kode_satuan" id="kode_satuan" class="form-control">
                            <option value=""> ==Pilih Satuan== </option>
                          </select>
                      </div>

                      <div class="modal-body">
                          <label for="kode_dcm" class="col-form-label">Document:</label>
                          <select type="text" name="kode_dcm" id="kode_dcm" class="form-control">
                            <option value=""> ==Pilih Document== </option>
                          </select>
                      </div>

                      <div class="modal-body">
                          <label for="kode_nmax" class="col-form-label">Nilai Maksimal:</label>
                          <select type="text" name="kode_nmax" id="kode_nmax" class="form-control">
                            <option value=""> ==Pilih Nilai Maksimal==</option>

                          </select>
                       </div>


                    <div class="modal-body">
                      <label for="kode_nilai" class="col-form-label">Tipe Penilaian</label>
                      <select  name="kode_nilai" id="periode_nilai" class="form-control" value="" onchange="showperiode_nilai();">
                                 <option value="">== Pilih Tipe Nilai ==</option>
                                 <option value="Bulanan">Bulanan</option>
                                 <option value="Quarter">Quarter</option>
                                 <option value="Semester">Semester</option>
                                 <option value="Tahunan">Tahunan</option>
                      </select>
                    <div id="show_heading" style="display: none;">
                    <table class="table">
                    <tbody>
                    <tr>
                      <td >Januari</td>
                      <td >:</td>
                      <td> <input type="text" placeholder="Januari" name="target_01" class="form-control" id="target_01" value=""> </td>
                      <td>Februari</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Februari" name="target_02" class="form-control"  id="target_02" value=""> </td>
                      <td >Maret</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Maret" name="target_03" class="form-control"  id="target_03" value=""> </td>
                    </tr>

                    <tr>
                      <td>April</td>
                      <td>:</td>
                      <td><input type="text" placeholder="April" name="target_04" class="form-control"  id="target_04" value=""> </td>
                      <td>Mei</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Mei" name="target_05" class="form-control"  id="target_05" value=""> </td>
                      <td >Juni</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Juni" name="target_06" class="form-control" id="target_06" value=""> </td>
                    </tr>


                    <tr>
                      <td >Juli</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Juli" name="target_07" class="form-control"  id="target_07" value=""> </td>
                      <td>Agustus</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Agustus" name="target_08" class="form-control"  id="target_08" value=""> </td>
                      <td>September</td>
                      <td >:</td>
                      <td><input type="text" placeholder="September" name="target_09" class="form-control"  id="target_09" value=""> </td>
                    </tr>

                    <tr>
                      <td>Oktober</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Oktober" name="target_10" class="form-control"  id="target_10" value=""> </td>
                      <td>November</td>
                      <td>:</td>
                      <td><input type="text" placeholder="November" name="target_11" class="form-control"  id="target_11" value=""> </td>
                      <td>Desember</td>
                      <td >:</td>
                      <td><input type="text" placeholder="Desember" name="target_12" class="form-control"  id="target_12" value=""> </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>

                    <div id="show_heading2" style="display: none;">
                    <table class="table">
                    <tbody>
                    <tr>
                    <td> Nilai Quater 1</td>
                    <td>:</td>
                    <td ><input type="text" id="q1" placeholder="Target Absolut Q1" name="qtr1" class="form-control" value=""> </td>
                    <td><input type="date" data-provide="datepicker" name="tgl_target_q1" id="tgl_q1" class="form-control" value="" placeholder="Tanggal Q1"></td>
                    </tr>

                    <tr>
                    <td> Nilai Quater 2</td>
                    <td >:</td>
                    <td><input type="text" id="q2" placeholder="Target Absolut Q2" name="qtr2" class="form-control" value=""> </td>
                    <td><input type="date" data-provide="datepicker" name="tgl_target_q2" id="tgl_q2" class="form-control" value="" placeholder="Tanggal Q2"></td>
                    </tr>

                    <tr>
                    <td> Nilai Quater 3</td>
                    <td >:</td>
                    <td> <input type="text" id="q3" placeholder="Target Absolut Q3" name="qtr3" class="form-control" value=""> </td>
                    <td><input type="date" data-provide="datepicker" name="tgl_target_q3" id="tgl_q3" class="form-control" value="" placeholder="Tanggal Q3"></td>
                    </tr>

                    <tr>
                    <td> Nilai Quater 4</td>
                    <td>:</td>
                    <td> <input type="text" id="q4" placeholder="Target Absolut Q4" name="qtr4" class="form-control" value=""> </td>
                    <td><input type="date" data-provide="datepicker" name="tgl_target_q4" id="tgl_q4" class="form-control" value="" placeholder="Tanggal Absolut Q4"></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>

                    <div id="show_heading3" style="display: none;">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td> Nilai Semester 1</td>
                          <td>:</td>
                          <td> <input type="text" id="semester1" placeholder="Target Semester 1" name="target_semester1" class="form-control" value=""> </td>
                          <td> <input type="date" data-provide="datepicker" name="tgl_target_semester1" id="tgl_target_semester1" class="form-control" value="" placeholder="Tanggal Semester 1">
                          </td>
                        </tr>

                        <tr>
                          <td> Nilai Semester 2</td>
                          <td>:</td>
                          <td><input type="text" id="semester2" placeholder="Target Semester 2" name="target_semester2" class="form-control" value=""> </td>
                          <td><input type="date" data-provide="datepicker" name="tgl_target_semester2" id="tgl_target_semester2" class="form-control active" value="" placeholder="Tanggal Semester 2"></td>
                        </tr>

                      </tbody>
                    </table>
                    </div>

                    <div id="show_heading4" style="display: none;">
                    <table class="table">
                      <tbody>
                          <tr>
                                <td>Target Absolut Tahunan</td>
                                <td>:</td>
                                <td>  <input type="text" id="target_tahun_unit" placeholder="Target Absolut" name="target_tahun_unit" class="form-control"> </td>
                                <td><input type="date" data-provide="datepicker" name="tgl_target_tahun_unit" id="tgl_target_tahun_unit" class="form-control" value="" placeholder="Tanggal Target Absolut Tahunan"></td>
                          </tr>
                      </tbody>
                    </table>
                    </div>




                    </div>
                       <div class="modal-body">
                         <div class="form-group">
                           <label for="target_absolut" class="col-form-label">Target Absolut:</label>
                           <input name="target_absolut"type="text" class="form-control" id="target_absolut" placeholder="" value="">
                           @error('target_absolut')
                           <div class="invalid-feedback">{{$message}}</div>
                           @enderror
                         </div>
                       </div>

                      <div class="modal-body">
                        <div class="form-group">
                          <label for="bobot" class="col-form-label">Bobot:</label>
                          <input name="bobot"type="text" class="form-control" id="bobot" placeholder="" value="">
                          @error('bobot')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Add</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            <!--End Tambah Modal -->


<!--Edit Modal -->

<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Target Kerja</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="post" action="" id="editform">
  {{csrf_field()}}
      <div class="modal-body">
      <div class="modal-body">
          <label for="kode_kuadran" class="col-form-label">Kuadran:</label>
          <select type="text"  name="kode_kuadran" id="kode_kuadran" class="form-control">
            <option value=""> option>

          </select>
      </div>

      <div class="modal-body">
          <label for="kode_kpi" class="col-form-label">KPI:</label>
          <select type="text" name="kode_kpi" id="kode_kpi" class="form-control">
        <option value=""></option>

          </select>
      </div>

      <div class="modal-body">
          <label for="kode_satuan" class="col-form-label">Satuan:</label>
          <select type="text" name="kode_satuan" id="kode_satuan" class="form-control">
            <option value="">}}</option>

          </select>
      </div>

      <div class="modal-body">
          <label for="kode_dcm" class="col-form-label">Document:</label>
          <select type="text" name="kode_dcm" id="kode_dcm" class="form-control">
            <option value="">on>

          </select>
      </div>

      <div class="modal-body">
          <label for="kode_nmax" class="col-form-label">Nilai Maksimal:</label>
          <select type="text" name="kode_nmax" id="kode_nmax" class="form-control">
            <option value=""></option>

          </select>
       </div>


    <div class="modal-body">
      <label for="kode_nilai" class="col-form-label">Tipe Penilaian</label>
      <select  name="kode_nilai" id="editperiode_nilai" class="form-control" onchange="editshowperiode_nilai">
                 <option value="">}</option>
                 <option value="Bulanan">Bulanan</option>
                 <option value="Quarter">Quarter</option>
                 <option value="Semester">Semester</option>
                 <option value="Tahunan">Tahunan</option>
      </select>
    <div id="show_heading" style="display: none;">
    <table class="table">
    <tbody>
    <tr>
      <td >Januari</td>
      <td >:</td>
      <td> <input type="text" placeholder="Januari" name="target_01" class="form-control" id="target_01" value=""> </td>
      <td>Februari</td>
      <td >:</td>
      <td><input type="text" placeholder="Februari" name="target_02" class="form-control"  id="target_02" value=""> </td>
      <td >Maret</td>
      <td >:</td>
      <td><input type="text" placeholder="Maret" name="target_03" class="form-control"  id="target_03" value=""> </td>
    </tr>

    <tr>
      <td>April</td>
      <td>:</td>
      <td><input type="text" placeholder="April" name="target_04" class="form-control"  id="target_04" value=""> </td>
      <td>Mei</td>
      <td >:</td>
      <td><input type="text" placeholder="Mei" name="target_05" class="form-control"  id="target_05" value=""> </td>
      <td >Juni</td>
      <td >:</td>
      <td><input type="text" placeholder="Juni" name="target_06" class="form-control" id="target_06" value=""> </td>
    </tr>


    <tr>
      <td >Juli</td>
      <td >:</td>
      <td><input type="text" placeholder="Juli" name="target_07" class="form-control"  id="target_07" value=""> </td>
      <td>Agustus</td>
      <td >:</td>
      <td><input type="text" placeholder="Agustus" name="target_08" class="form-control"  id="target_08" value=""> </td>
      <td>September</td>
      <td >:</td>
      <td><input type="text" placeholder="September" name="target_09" class="form-control"  id="target_09" value=""> </td>
    </tr>

    <tr>
      <td>Oktober</td>
      <td >:</td>
      <td><input type="text" placeholder="Oktober" name="target_10" class="form-control"  id="target_10" value=""> </td>
      <td>November</td>
      <td>:</td>
      <td><input type="text" placeholder="November" name="target_11" class="form-control"  id="target_11" value=""> </td>
      <td>Desember</td>
      <td >:</td>
      <td><input type="text" placeholder="Desember" name="target_12" class="form-control"  id="target_12" value=""> </td>
    </tr>
    </tbody>
    </table>
    </div>

    <div id="show_heading2" style="display: none;">
    <table class="table">
    <tbody>
    <tr>
    <td> Nilai Quater 1</td>
    <td>:</td>
    <td ><input type="text" id="q1" placeholder="Target Absolut Q1" name="qtr1" class="form-control" value=""> </td>
    <td><input type="date" data-provide="datepicker" name="tgl_target_q1" id="tgl_q1" class="form-control" value="" placeholder="Tanggal Q1"></td>
    </tr>

    <tr>
    <td> Nilai Quater 2</td>
    <td >:</td>
    <td><input type="text" id="q2" placeholder="Target Absolut Q2" name="qtr2" class="form-control" value=""> </td>
    <td><input type="date" data-provide="datepicker" name="tgl_target_q2" id="tgl_q2" class="form-control" value="" placeholder="Tanggal Q2"></td>
    </tr>

    <tr>
    <td> Nilai Quater 3</td>
    <td >:</td>
    <td> <input type="text" id="q3" placeholder="Target Absolut Q3" name="qtr3" class="form-control" value=""> </td>
    <td><input type="date" data-provide="datepicker" name="tgl_target_q3" id="tgl_q3" class="form-control" value="" placeholder="Tanggal Q3"></td>
    </tr>

    <tr>
    <td> Nilai Quater 4</td>
    <td>:</td>
    <td> <input type="text" id="q4" placeholder="Target Absolut Q4" name="qtr4" class="form-control" value=""> </td>
    <td><input type="date" data-provide="datepicker" name="tgl_target_q4" id="tgl_q4" class="form-control" value="" placeholder="Tanggal Absolut Q4"></td>
    </tr>
    </tbody>
    </table>
    </div>

    <div id="show_heading3" style="display: none;">
    <table class="table">
      <tbody>
        <tr>
          <td> Nilai Semester 1</td>
          <td>:</td>
          <td> <input type="text" id="semester1" placeholder="Target Semester 1" name="target_semester1" class="form-control" value=""> </td>
          <td> <input type="date" data-provide="datepicker" name="tgl_target_semester1" id="tgl_target_semester1" class="form-control" value="" placeholder="Tanggal Semester 1">
          </td>
        </tr>

        <tr>
          <td> Nilai Semester 2</td>
          <td>:</td>
          <td><input type="text" id="semester2" placeholder="Target Semester 2" name="target_semester2" class="form-control" value=""> </td>
          <td><input type="date" data-provide="datepicker" name="tgl_target_semester2" id="tgl_target_semester2" class="form-control active" value="" placeholder="Tanggal Semester 2"></td>
        </tr>

      </tbody>
    </table>
    </div>

    <div id="show_heading4" style="display: none;">
    <table class="table">
      <tbody>
          <tr>
                <td>Target Absolut Tahunan</td>
                <td>:</td>
                <td>  <input type="text" id="target_tahun_unit" placeholder="Target Absolut" name="target_tahun_unit" class="form-control"> </td>
                <td><input type="date" data-provide="datepicker" name="tgl_target_tahun_unit" id="tgl_target_tahun_unit" class="form-control" value="" placeholder="Tanggal Target Absolut Tahunan"></td>
          </tr>
      </tbody>
    </table>
    </div>




    </div>
       <div class="modal-body">
         <div class="form-group">
           <label for="target_absolut" class="col-form-label">Target Absolut:</label>
           <input name="target_absolut"type="text" class="form-control" id="target_absolut" placeholder="" value="">
           @error('target_absolut')
           <div class="invalid-feedback">{{$message}}</div>
           @enderror
         </div>
       </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="bobot" class="col-form-label">Bobot:</label>
          <input name="bobot"type="text" class="form-control" id="bobot" placeholder="" value="">
          @error('bobot')
          <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>
      </div>

      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">change</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>

<!--End Edit Modal -->

        <table id="example" class="table table-striped table-bordered" style="width:100%">

              <thead>

                    <tr>
                      <th>No</th>
                      <th>Kuadran</th>
                      <th>KPI</th>
                      <th>Satuan</th>
                      <th>Document</th>
                      <th>nilai_maksimal</th>
                      <th>Tipe Penilaian</th>
                      <th>Target Absolut</th>
                      <th>Bobot</th>
                      <th>Status</th>
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
                        <td></td>
                        <td></td>
                        <td >
                              <a class="btn btn-primary" data-toggle="modal" data-target="#edit">edit</a>
                              <a href="" class="btn btn-danger" class="text-center" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')">delete</a>
                        </td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kuadran</th>
                        <th>KPI</th>
                        <th>Satuan</th>
                        <th>Document</th>
                        <th>nilai_maksimal</th>
                        <th>Tipe Penilaian</th>
                        <th>Target Absolut</th>
                        <th>Bobot</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>

            </table>

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

  <script>
  $(document).ready(function() {

    $('#show_heading').hide();
    $('#show_heading2').hide();
    $('#show_heading3').hide();
    $('#show_heading4').hide();

  });
  function showperiode_nilai(){
  test = document.getElementById('periode_nilai').value;
  if (test == "Bulanan")
    {
    $('#show_heading').show();
    $('#show_heading2').hide();
    $('#show_heading3').hide();
    $('#show_heading4').hide();
    } else if (test == "Quarter") {
    $('#show_heading2').show();
    $('#show_heading').hide();
    $('#show_heading3').hide();
    $('#show_heading4').hide();
    } else if (test == "Semester") {
    $('#show_heading3').show();
    $('#show_heading').hide();
    $('#show_heading2').hide();
    $('#show_heading4').hide();
    }else if (test == "Tahunan") {
    $('#show_heading4').show();
    $('#show_heading').hide();
    $('#show_heading3').hide();
    $('#show_heading2').hide();
    }

  }
  </script>


  <script>
  $(document).ready(function() {

    $('#show_heading').hide();
    $('#show_heading2').hide();
    $('#show_heading3').hide();
    $('#show_heading4').hide();

  });
  function editshowperiode_nilai(){
  test = document.getElementById('editperiode_nilai').value;
  if (test == "Bulanan")
    {
    $('#show_heading').show();
    $('#show_heading2').hide();
    $('#show_heading3').hide();
    $('#show_heading4').hide();
    } else if (test == "Quarter") {
    $('#show_heading2').show();
    $('#show_heading').hide();
    $('#show_heading3').hide();
    $('#show_heading4').hide();
    } else if (test == "Semester") {
    $('#show_heading3').show();
    $('#show_heading').hide();
    $('#show_heading2').hide();
    $('#show_heading4').hide();
    }else if (test == "Tahunan") {
    $('#show_heading4').show();
    $('#show_heading').hide();
    $('#show_heading3').hide();
    $('#show_heading2').hide();
    }

  }
  </script>




  @endsection
