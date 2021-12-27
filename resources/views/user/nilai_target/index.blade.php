@extends('layouts.app')


  @section('content')
  <style media="screen">

  h1{
    color: darkblue;
    margin-left: 20pt;
    font-style: article;
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
            <td></td>
         </tr>
         <tr>
            <th>NIK</th>
            <td style="font-weight: bold">: {{ Auth::user()->nik_id }}</td>
            <td></td>
         </tr>
         <tr>
            <th>Jabatan</th>
            <td style="font-weight: bold">: {{ Auth::user()->jabatan }}</td>
            <td></td>
         </tr>
         <tr>
            <th>Divisi</th>
           <td style="font-weight: bold">: {{ Auth::user()->divisi }}</td>
           <td></td>
         </tr>
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
          </tbody>

    </thead>
  </table>



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
                  <td class="text-center">
                    <a href="#modalnilai{{$dta->id_settarget_kerja}}" data-id_nilai="{{ $dta->id_settarget_kerja}}" data-toggle="modal" data-target="#modalnilai{{$dta->id_settarget_kerja}}"><i class="material-icons">&#xE254;</i> </a>
                    <!--Input modal-->
                    <div id="modalnilai{{$dta->id_settarget_kerja}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h3 class="modal-title" id="modal-realisasi">Masukkan Realisasi</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="POST" action="{{ route('realisasi', $dta->id_settarget_kerja) }}" id="modal_nilai" >
                            <div class="modal-body">
                            @csrf

                            <table class="table table-over" style="width:100%">
                                <tbody>
                                    <tr>
                                        <th width="150">Nama Kuadran</th>
                                        <input type="hidden" name="id_kuadran" id="id_kuadran">
                                        <td style="font-weight: bold">
                                            <input disabled type="text" name="kuadran" id="kuadran" value="{{$dta->kuadran}}" placeholder=": " class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama KPI</th>
                                        <td style="font-weight: bold"><input disabled type="text" value="{{$dta->nama_kpi}}" name="nama_kpi" id="nama_kpi" placeholder=":" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Bobot</th>
                                    <td style="font-weight: bold"><input disabled type="text" value="{{$dta->bobot}}" name="bobot" id="bobot" placeholder=":" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Penilaian </th>
                                    <td style="font-weight: bold">
                                        <input disabled type="text" name="tipe_nilai" value="{{$dta->tipe_nilai}}" id="tipe_nilai" placeholder=":" class="form-control" oninput="show_periode"></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            @if ($dta->tipe_nilai === 'Bulanan' )
                                                {{-- Tipe Bulanan --}}
                                            <table style="justify-content: center" id="bulanan">
                                                <tr>
                                                    <td >Januari</td>
                                                    <td >:</td>
                                                    <td> <input type="text" placeholder="Januari" name="januari" class="form-control" id="januari" value="{{ $januari }}"> </td>
                                                    <td>Februari</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Februari" name="februari" class="form-control"  id="februari" value="{{ $februari }}"> </td>
                                                    <td >Maret</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Maret" name="maret" class="form-control"  id="maret" value="{{ $maret }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>April</td>
                                                    <td>:</td>
                                                    <td><input type="text" placeholder="April" name="april" class="form-control"  id="april" value="{{ $april }}"> </td>
                                                    <td>Mei</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Mei" name="mei" class="form-control"  id="mei" value="{{ $mei }}"> </td>
                                                    <td>Juni</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Juni" name="juni" class="form-control" id="juni" value="{{ $juni }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Juli</td>
                                                    <td>:</td>
                                                    <td><input type="text" placeholder="juli" name="juli" class="form-control"  id="juli" value="{{ $juli }}"> </td>
                                                    <td>Agustus</td>
                                                    <td>:</td>
                                                    <td><input type="text" placeholder="Agustus" name="agustus" class="form-control"  id="agustus" value="{{ $agustus }}"> </td>
                                                    <td>September</td>
                                                    <td>:</td>
                                                    <td><input type="text" placeholder="September" name="september" class="form-control" id="september" value="{{ $september }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Oktober</td>
                                                    <td>:</td>
                                                    <td><input type="text" placeholder="Oktober" name="oktober" class="form-control"  id="oktober" value="{{ $oktober }}"> </td>
                                                    <td>November</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="November" name="november" class="form-control"  id="november" value="{{ $november }}"> </td>
                                                    <td >Desember</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Desember" name="desember" class="form-control" id="desember" value="{{ $desember }}"> </td>
                                                </tr>
                                            </table>
                                        {{-- End Tipe Bulanan --}}

                                        @elseif ($dta->tipe_nilai === 'Quarter')
                                        {{-- Tipe Quarter--}}
                                            <table style="justify-content: center; width:100%"  id="quarter">
                                                <tr>
                                                    <td >Quarter1</td>
                                                    <td >:</td>
                                                    <td> <input type="text" placeholder="Quarter 1" name="quarter1" class="form-control" id="quarter1" value="{{ $quarter1 }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td>Quarter2</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Quarter 2" name="quarter2" class="form-control"  id="quarter2" value="{{ $quarter2 }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td >Quarter3</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Quarter 3" name="quarter3" class="form-control"  id="quarter3" value="{{ $quarter3 }}"> </td>
                                                </tr>
                                                <tr>
                                                    <td >Quarter4</td>
                                                    <td >:</td>
                                                    <td><input type="text" placeholder="Quarter 3" name="quarter4" class="form-control"  id="quarter4" value="{{ $quarter4 }}"> </td>
                                                </tr>
                                            </table>
                                        {{-- End Tipe Quarter--}}

                                        @elseif ($dta->tipe_nilai === 'Semester')
                                        {{-- Tipe Semester --}}
                                                <table style="justify-content: center" id="semester">
                                                    <tr>
                                                        <td >Semester 1</td>
                                                        <td >:</td>
                                                        <td> <input type="text" placeholder="Semester 1" name="semester1" class="form-control" id="semester1" value="{{ $semester1 }}"> </td>
                                                        <td>Semester 2</td>
                                                        <td >:</td>
                                                        <td><input type="text" placeholder="Semester 2" name="semester2" class="form-control"  id="semester2" value="{{ $semester2 }}"> </td>
                                                </table>
                                        {{-- Tipe Semester --}}

                                        @elseif ($dta->tipe_nilai === 'Tahunan')
                                        {{-- Tipe Tahun --}}
                                                    <table style="justify-content: center; width:100%" id="tahun">
                                                        <tr>
                                                            <td>Tahun </td>
                                                            <td >:</td>
                                                            <td> <input type="text" placeholder="Tahun" name="tahun1" class="form-control" id="tahun1" value="{{ $realbulan }}"> </td>
                                                    </table>
                                        {{-- Tipe Tahun --}}
                                        @endif
                                        </th>
                                        </tr>
                                    </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            </div>

                        </div>
                    </form>
                </div>
                 </div>
            </div>
                    <!-- End Input modal-->
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
      <a href="{{ route('user.nilai_target.submit',Auth::id()) }}" onclick="return confirm('Apakah Data Nilai Target Kerja Anda Akan Dikirim ke Atasan ?')"class="btn btn-success"> Submit</a>
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


  @endsection
