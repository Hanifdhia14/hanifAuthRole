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
 .field{
     justify-content: center;
 }
  </style>

<div class="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <h1>Input Realisasi Kerja</h1>
          <hr class="sidebar-divider">



<div class="card">
  <div class="card-header">
    <div class="col-lg-12">

<form class="" action="" method="post"></form>
  <table class="table table-over" style="width:100%">
    <thead>
      <tbody>

        <tr>
            <th width="150">Nama Pegawai</th>
            <td style="font-weight: bold">: {{ Auth::user()->nama }}</td>
         </tr>
         <tr>
            <th>NIK</th>
            <td style="font-weight: bold">: {{ Auth::user()->nik_id }}</td>
         </tr>
         <tr>
            <th>Jabatan</th>
            <td style="font-weight: bold">: {{ Auth::user()->jabatan }}</td>
         </tr>
         <tr>
            <th>Divisi</th>
           <td style="font-weight: bold">: {{ Auth::user()->divisi }}</td>
         </tr>
            <th> Tahun </th>
             <td class="categoryFilter">
                <select class="form-control">
                    <option selected="selected"> Pilih Tahun</option>
                        <?php
                        for($i=date('Y'); $i>=date('Y')-3; $i-=1){
                        echo"<option value='$i'> $i </option>";
                        }
                        ?>
                 </select>
            </td>

          </tbody>

    </thead>
  </table>


<!--Input modal-->
  <div id="modalnilai" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modal-realisasi">Masukkan Realisasi</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form method="POST" action="" id="modal_nilai">
          <div class="modal-body">
          @csrf

          <table class="table table-over" style="width:100%">
            <thead>
              <tbody>
                <tr>
                    <th width="150">Nama Kuadran</th>
                    <input type="hidden" name="id_kuadran" id="id_kuadran">
                    <td style="font-weight: bold">
                        <input disabled type="text" name="kuadran" id="kuadran" class="form-control">
                    </td>

                 </tr>
                 <tr>
                    <th>Nama KPI</th>
                    <td style="font-weight: bold"><input disabled type="text" name="nama_kpi" id="nama_kpi" placeholder=":" class="form-control"> </td>
                 </tr>
                 <tr>
                    <th>Bobot</th>
                   <td style="font-weight: bold"><input disabled type="text" name="bobot" id="bobot" placeholder=":" class="form-control"> </td>
                 </tr>
                 <tr>
                    <th>Tipe Penilaian </th>
                   <td style="font-weight: bold">
                    <input disabled type="text" name="tipe_nilai" id="tipe_nilai" placeholder=":" class="form-control" oninput="show_periode"> </td>
                 </tr>
                  </tbody>

                {{-- Tipe Bulanan  --}}
                <table style="justify-content: center" id="bulanan">
                    <tr>
                        <td >Januari</td>
                        <td >:</td>
                        <td> <input type="text" placeholder="Januari" name="januari" class="form-control" id="januari"> </td>
                        <td>Februari</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Februari" name="februari" class="form-control"  id="februari"> </td>
                        <td >Maret</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Maret" name="maret" class="form-control"  id="maret"> </td>
                      </tr>
                      <tr>
                        <td>April</td>
                        <td>:</td>
                        <td><input type="text" placeholder="April" name="april" class="form-control"  id="april"> </td>
                        <td>Mei</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Mei" name="mei" class="form-control"  id="mei"> </td>
                        <td>Juni</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Juni" name="juni" class="form-control" id="juni"> </td>
                      </tr>
                      <tr>
                        <td>Juli</td>
                        <td>:</td>
                        <td><input type="text" placeholder="juli" name="juli" class="form-control"  id="juli"> </td>
                        <td>Agustus</td>
                        <td>:</td>
                        <td><input type="text" placeholder="Agustus" name="agustus" class="form-control"  id="agustus"> </td>
                        <td>September</td>
                        <td>:</td>
                        <td><input type="text" placeholder="September" name="september" class="form-control" id="september"> </td>
                      </tr>
                      <tr>
                        <td>Oktober</td>
                        <td>:</td>
                        <td><input type="text" placeholder="Oktober" name="oktober" class="form-control"  id="oktober"> </td>
                        <td>November</td>
                        <td >:</td>
                        <td><input type="text" placeholder="November" name="november" class="form-control"  id="november"> </td>
                        <td >Desember</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Desember" name="desember" class="form-control" id="desember"> </td>
                      </tr>
                </table>
                {{-- End Tipe Bulanan --}}

             {{-- Tipe Quarter--}}
                <table style="justify-content: center" id="quarter">
                    <tr>
                        <td >Quarter1</td>
                        <td >:</td>
                        <td> <input type="text" placeholder="Quarter 1" name="quarter1" class="form-control" id="quarter1"> </td>
                        <td>Quarter2</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Quarter 2" name="quarter2" class="form-control"  id="quarter2"> </td>
                        <td >Quarter3</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Quarter 3" name="quarter3" class="form-control"  id="quarter3"> </td>
                        <td >Quarter4</td>
                        <td >:</td>
                        <td><input type="text" placeholder="Quarter 3" name="quarter4" class="form-control"  id="quarter4"> </td>
                      </tr>
                </table>
            {{-- End Tipe Quarter--}}
            {{-- Tipe Semester --}}
                    <table style="justify-content: center" id="semester">
                        <tr>
                            <td >Semester 1</td>
                            <td >:</td>
                            <td> <input type="text" placeholder="Semester 1" name="semester1" class="form-control" id="semester1"> </td>
                            <td>Semester 2</td>
                            <td >:</td>
                            <td><input type="text" placeholder="Semester 2" name="semester2" class="form-control"  id="semester2"> </td>
                    </table>
            {{-- Tipe Semester --}}

            {{-- Tipe Tahun --}}
                        <table style="justify-content: center" id="tahun">
                            <tr>
                                <td>Tahun </td>
                                <td >:</td>
                                <td> <input type="text" placeholder="Tahun" name="tahun1" class="form-control" id="tahun1"> </td>
                        </table>
             {{-- Tipe Tahun --}}

            </thead>
          </table>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
                <th>Formula</th>
                <th>Tipe Penilaian</th>
                <th>Target Absolut</th>
                <th>Bobot</th>
                <th>Realisasi % </th>
                <th>Nilai Mutlak</th>
                <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ( $nilai_dta as $dta )
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$dta->kuadran}}</td>
                  <td>{{$dta->nama_kpi}}</td>
                  <td>{{$dta->rumus}}</td>
                  <td>{{$dta->tipe_nilai}}</td>
                  <td>{{$dta->target_absolut}}</td>
                  <td>{{$dta->bobot}}</td>
                  <td>
                      @if ($dta->tipe_nilai === 'Bulanan' && $dta->rumus === 'Penjumlahan')
                      @php
                        $januari = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('januari');
                        $februari = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('februari');
                        $maret = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('maret');
                        $april = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('april');
                        $mei = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('mei');
                        $juni = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('juni');
                        $juli = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('juli');
                        $agustus = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('agustus');
                        $september = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('september');
                        $oktober = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('oktober');
                        $november = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('november');
                        $desember = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('desember');
                        $realbulan = $januari + $februari + $maret + $april + $mei + $juni + $juli + $agustus + $september + $oktober + $november + $desember;
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Bulanan' && $dta->rumus === 'Rata-Rata')
                      @php
                        $januari = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('januari');
                        $februari = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('februari');
                        $maret = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('maret');
                        $april = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('april');
                        $mei = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('mei');
                        $juni = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('juni');
                        $juli = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('juli');
                        $agustus = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('agustus');
                        $september = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('september');
                        $oktober = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('oktober');
                        $november = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('november');
                        $desember = DB::table('tbl_bulanan')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('desember');
                        $realbulan = ($januari + $februari + $maret + $april + $mei + $juni + $juli + $agustus + $september + $oktober + $november + $desember)/12;
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Semester' && $dta->rumus === 'Penjumlahan')
                      @php
                        $semester1 = DB::table('tbl_semester')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('semester1');
                        $semester2 = DB::table('tbl_semester')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('semester2');
                        $realbulan = $semester1 + $semester2;
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Semester' && $dta->rumus === 'Rata-Rata')
                      @php
                        $semester1 = DB::table('tbl_semester')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('semester1');
                        $semester2 = DB::table('tbl_semester')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('semester2');
                        $realbulan = ($semester1 + $semester2)/2;
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Quarter' && $dta->rumus === 'Penjumlahan')
                      @php
                        $quarter1 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter1');
                        $quarter2 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter2');
                        $quarter3 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter3');
                        $quarter4 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter4');
                        $realbulan = $quarter1 + $quarter2 + $quarter3 + $quarter4;
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Quarter' && $dta->rumus === 'Rata-Rata')
                      @php
                        $quarter1 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter1');
                        $quarter2 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter2');
                        $quarter3 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter3');
                        $quarter4 = DB::table('tbl_quarter')->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('quarter4');
                        $realbulan = ($quarter1 + $quarter2 + $quarter3 + $quarter4)/4;
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Tahunan' && $dta->rumus === 'Penjumlahan')
                      @php
                        $realbulan = DB::table('tbl_tahunan')
                        ->where('id_settarget_kerja', $dta->id_settarget_kerja)->sum('nilai_tahun');
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @elseif ($dta->tipe_nilai === 'Tahunan' && $dta->rumus === 'Rata-Rata')
                      @php
                        $realbulan = DB::table('tbl_tahunan')
                        ->where('id_settarget_kerja', $dta->id_settarget_kerja)->avg('nilai_tahun');
                        if($realbulan >= 120)
                            {
                                $realbulan = 105;
                            }
                      @endphp
                      {{ $realbulan }}
                      @endif
                  </td>
                  <td>@php
                      $bobot = $dta->bobot;
                      $nilai = $bobot * ($realbulan/100);
                  @endphp
                  {{ $nilai }}
                  </td>
                  <td class="text-center">
                    <a href="#modalnilai" data-id_nilai="{{ $dta->id_settarget_kerja}}" data-toggle="modal" data-target="#modalnilai"><i class="material-icons">&#xE254;</i> </a>
                  </td>
              </tr>
              @endforeach
          </tbody>

          <tfoot>
              <tr>
                  <th>No</th>
                  <th>Kuadran</th>
                  <th>KPI</th>
                  <th>Formula</th>
                  <th>Tipe Penilaian</th>
                  <th>Target Absolut</th>
                  <th>Bobot</th>
                  <th>Realisasi % </th>
                  <th>Nilai Mutlak</th>
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

    {{-- Data Table --}}
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        } );
    } );
    </script>
    {{-- End Data Table --}}

    {{-- Dropdown Table --}}

    <script>
        $(document).on('click','a[href="#modalnilai"]', function(e){
            var idnilai = $(this).data('id_nilai');
            $.ajax({
              headers:{'csrftoken':'{{csrf_token() }}'},
              url:'user.nilai_target'+idnilai,
              type:'GET',
              dataType:'json',
              success:function(data){
                  $('#kuadran').val(data.kuadran);
                  $('#nama_kpi').val(data.nama_kpi);
                  $('#bobot').val(data.bobot);
                  $('#tipe_nilai').val(data.tipe_nilai);
                  $()
                  if(data.tipe_nilai === "Bulanan")
                  {
                    $('#bulanan').show();
                    $('#quarter').hide();
                    $('#semester').hide();
                    $('#tahun').hide();
                    } else if (data.tipe_nilai == "Quarter") {
                    $('#quarter').show();
                    $('#bulanan').hide();
                    $('#semester').hide();
                    $('#tahun').hide();
                    } else if (data.tipe_nilai == "Semester") {
                    $('#semester').show();
                    $('#bulanan').hide();
                    $('#quarter').hide();
                    $('#tahun').hide();
                    }else if (data.tipe_nilai == "Tahunan") {
                    $('#tahun').show();
                    $('#bulanan').hide();
                    $('#semester').hide();
                    $('#quarter').hide();
                    }
                    $('#januari').val(data.januari);
                    $('#februari').val(data.februari);
                    $('#maret').val(data.maret);
                    $('#april').val(data.april);
                    $('#mei').val(data.mei);
                    $('#juni').val(data.juni);
                    $('#juli').val(data.juli);
                    $('#agustus').val(data.agustus);
                    $('#september').val(data.september);
                    $('#oktober').val(data.oktober);
                    $('#november').val(data.november);
                    $('#desember').val(data.desember);
                    $('#quarter1').val(data.quarter1);
                    $('#quarter2').val(data.quarter2);
                    $('#quarter3').val(data.quarter3);
                    $('#quarter4').val(data.quarter4);
                    $('#semester1').val(data.semester1);
                    $('#semester2').val(data.semester2);
                    $('#tahun1').val(data.nilai_tahun);
                  var url='{{ route("realisasi", ":id_settarget_kerja")}}';
                  url = url.replace(':id_settarget_kerja',idnilai);
                  $('#modal_nilai').attr('action',url);
              }
            });
        });
    </script>


    {{-- End Dropdown Table --}}

  @endsection
