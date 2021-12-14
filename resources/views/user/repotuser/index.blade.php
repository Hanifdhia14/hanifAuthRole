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
            <form class="example" action="" style="margin:auto;max-width:300px">
            <tr>
                <td >Tahun</td>
                <td >:</td>
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
                <td>Tipe Nilai</td>
                <td >:</td>
                <td><input type="text" placeholder="Tipe Nilai" name="search2"> </td>
                <td><button type="submit"><i class="fa fa-search"></i></button></td>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
