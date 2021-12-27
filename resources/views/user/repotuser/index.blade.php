@extends('layouts.app')


  @section('content')
  <style media="screen">

  h1{
    color: darkblue;
    margin-left: 20pt;
    font-style: article;
  }

form{
  width: 20%;
}
button{
margin: 10pt;

}
  </style>

<div class="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <h1>Repot Nilai Kerja</h1>
          <hr class="sidebar-divider">



<div class="card">
  <div class="card-header">
    <div class="col-lg-12">


        <h2>Keterangan:</h2>
        <p>Repot hasil merupakan fasilitas yang dapat digunakan untuk melihat hasil key Performance Indocator pertahun. Selain dapat dilihat secara online, hasil studi ini juga dapat dicetak.</p>


        <table style="justify-content: center" id="laporan">
            <form>
                <tr>
                    <th> Tahun </th>
                     <td class="categoryFilter">
                        <select class="form-control" name="tahun" required>
                            <option value=""> Pilih Tahun</option>
                                <?php
                                for($i=date('Y'); $i>=date('Y')-3; $i-=1){
                                ?>
                                <option <?php if(isset($_GET['tahun'])) { echo $i==$_GET['tahun']?"selected":""; } ?> value='<?php echo $i; ?>'><?php echo $i; ?></option>";
                                <?php
                                }
                                ?>
                         </select>
                         <td>
                             <button type="submit" class="btn btn-primary" style="">Lihat</button>
                        </td>
                    </td>
                </tr>
            </form>
        </table>

        <button id="button" type="button" class="btn btn-danger"> Create PDF </button>

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
                    <td style="font-weight: bold">
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
                        %
                    </td>
                    <td>@php
                        $bobot = $dta->bobot;
                        $nilai = $bobot * ($realbulan/100);
                    @endphp
                    {{ $nilai }}
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


  @endsection
