<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
    body{
    margin-top:10px;
    background:#eee;
}
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AKIO</title>
  <link rel="shortcut icon" href="{{ asset('logo_asdp.png') }}">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


</head>

<body onload="window.print();">
    <div class="container-fluid">
            <div class="col-md-100">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- Start .row -->
                            <div class="col-lg-6">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-logo"><img width="300" src="{{ asset('logo_asdp.png') }}" alt="Invoice logo"></div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-6">

                                <!-- col-lg-6 start here -->
                                <div class="invoice-from">
                                    <ul class="list-unstyled text-right">
                                        <li>PT. ASDP Indonesia Ferry (Persero) </li>
                                        <li>Jalan Jenderal Achmad Yani Kavling 52 A</li>
                                        <li>Jakarta, Indonesia 10510</li>
                                        <li>Telpon 021 4208911/13/15</li>
                                        <li>Email: corporate.secretary@indonesiaferry.co.id</li>
                                        <li>Websit: www.indonesiaferry.co.id</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="invoice-details mt25">

                                    <h2 style="text-align: center; font-style:italic; " > Monitoring Nilai Target Kerja KPI </h2>
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
                                                  <th>Divisi</th>
                                                 <td style="font-weight: bold">: {{ Auth::user()->divisi }}</td>
                                                 <td></td>
                                               </tr>
                                               <tr>
                                                <th>Jabatan</th>
                                                <td style="font-weight: bold">: {{ Auth::user()->jabatan }}</td>
                                                <td></td>
                                             </tr>
                                              </tbody>
                                        </thead>
                                      </table>
                                </div>

                                {{-- Ganerate Seluruh Laporan --}}

                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Kuadran</th>
                                                    <th>KPI</th>
                                                    <th>Deskripsi</th>
                                                    <th>Satuan</th>
                                                    <th>Formula</th>
                                                    <th>Tipe Nilai</th>
                                                    <th>Target Absolut</th>
                                                    <th>Bobot</th>
                                                    <th>Realisasi</th>
                                                    <th>Nilai Mutlak</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @php
                                                    $total = 0;
                                                    @endphp
                                                    @foreach ( $nilai_dta as $dta )
                                                <tr>
                                                    <td>{{$dta->kuadran}}</td>
                                                    <td>{{$dta->nama_kpi}}</td>
                                                    <td>{{$dta->description}}</td>
                                                    <td>{{$dta->satuan}}</td>
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
                                                        $total = $total + $nilai;
                                                    @endphp
                                                    {{ $nilai }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="8" class="text-right">Total Nilai:</th>
                                                    <th class="text-center" style="font-weight: bold">100</th>
                                                    <th class="text-center"> {{ $total }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                    {{-- Laporan Bulanan  --}}

                                    {{-- <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th >Kuadran</th>
                                                    <th >KPI</th>
                                                    <th >Description</th>
                                                    <th >Formula</th>
                                                    <th>Satuan</th>
                                                    <th>Bobot</th>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>5</th>
                                                    <th>6</th>
                                                    <th>7</th>
                                                    <th>8</th>
                                                    <th>9</th>
                                                    <th>10</th>
                                                    <th>11</th>
                                                    <th>12</th>
                                                    <th>Realisasi</th>
                                                    <th>Nilai Mutlak</th>
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
                                                    <td>10</td>
                                                    <td>10</td>
                                                    <td></td>
                                                    <td>20</td>
                                                    <td>30</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                   <th colspan="9" class="text-right">Total Nilai:</th>
                                                    <th class="text-center">@php
                                                        $total = array_sum($nilai);
                                                    @endphp
                                                    {{ $total }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> --}}

                        {{--  Laporan Quarter --}}

                                {{-- <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th >Kuadran</th>
                                                    <th >KPI</th>
                                                    <th >Description</th>
                                                    <th >Formula</th>
                                                    <th>Satuan</th>
                                                    <th>Bobot</th>
                                                    <th>Qt1</th>
                                                    <th>Qt2</th>
                                                    <th>Qt3</th>
                                                    <th>Qt4</th>
                                                    <th>Realisasi</th>
                                                    <th>Nilai Mutlak</th>
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
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                   <th colspan="9" class="text-right">Total Nilai:</th>
                                                    <th class="text-center">@php
                                                        $total = array_sum($nilai);
                                                    @endphp
                                                    {{ $total }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> --}}


                                {{-- Laporan Semester --}}

                                {{-- <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th >Kuadran</th>
                                                    <th >KPI</th>
                                                    <th >Description</th>
                                                    <th >Formula</th>
                                                    <th>Satuan</th>
                                                    <th>Bobot</th>
                                                    <th>Smt1</th>
                                                    <th>Smt2</th>
                                                    <th>Realisasi</th>
                                                    <th>Nilai Mutlak</th>
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

                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="9" class="text-right">Total Nilai:</th>
                                                    <th class="text-center">@php
                                                        $total = array_sum($nilai);
                                                    @endphp
                                                    {{ $total }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> --}}

                                 {{-- Laporan Tahun --}}

                                 {{-- <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th >Kuadran</th>
                                                    <th >KPI</th>
                                                    <th >Description</th>
                                                    <th >Formula</th>
                                                    <th>Satuan</th>
                                                    <th>Bobot</th>
                                                    <th>Tahun</th>
                                                    <th>Realisasi</th>
                                                    <th>Nilai Mutlak</th>
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

                                                </tr>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                             <th colspan="9" class="text-right">Total Nilai:</th>
                                                    <th class="text-center">@php
                                                        $total = array_sum($nilai);
                                                    @endphp
                                                    {{ $total }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div> --}}

                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    <td>
                                        <tr>
                                            <div style="width: 50%; text-align: right; float: right;"> Jakarta, <?php
                                                $tgl=date('l, d-m-Y');
                                                echo $tgl;
                                                ?></div><br>
                                            <div style="width: 50%; text-align: right; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
                                            <div style="width: 50%; text-align: right; float: right;">Wahyu Wibowo</div>
                                        </tr>

                                    </td>




                            </div>
                            <!-- col-lg-12 end here -->
                        </div>
                        <!-- End .row -->
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- col-lg-12 end here -->

        </div>
         <!-- Core plugin JavaScript-->
    <script src="sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="sbadmin2/vendor/chart.js/Chart.min.js"></script>

    <!-- Page DataTable -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
      </script>

    <!-- Datepicker custom scripts -->
    <script src="sbadmin2/js/demo/chart-area-demo.js"></script>
    <script src="sbadmin2/js/demo/chart-pie-demo.js"></script>
    <script src="/datepicker/js/" charset="utf-8"></script>
    <script>
    $(function() {
    $( "#kuadran","#kpi","#tgl_q1", "#tgl_q2", "#tgl_q3","#tgl_q4","#tgl_target_semester1", "#tgl_target_semester2","#tgl_target_tahun_unit" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
    });
    </script>
</body>
    </html>
