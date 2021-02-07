@extends('layouts.app')


  @section('content')
  <style media="screen">

  div.content{
    height: auto;
  }
  div.card{
    height: 50rem;

  }
  div.card-header{
    height: 50rem
  }
  h1{
    color: darkblue;
    margin-left: 20pt;
    font-style: article;
  }

form{
  width: 20%;
}
label{

}
  </style>

<div ="container-fluid">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <h1>Repot Nilai Kerja</h1>
          <hr class="sidebar-divider">



<div class="card">
  <div class="card-header">
    <div class="col-lg-12">


        <h2>Keterangan:</h2>
        <p>Repot hasil merupakan fasilitas yang dapat digunakan untuk melihat hasil key Performance Indocator pertahun. Selain dapat dilihat secara online, hasil studi ini juga dapat dicetak.</p>
        <form>
          <label for="tahun">Tahun:</label>
            <div class="input-group">
                <select class="form-control" type="text" class="" name="Tahun">
                  <option value="">== Pilih ==</option>
                  <option value="">2020</option>
                  <option value="">2021</option>
                  <option value="">2022</option>
                  <option value="">2023</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"> Cari</i>
                  </button>
                </div>
            </div>

        </form>




    </div>
  </div>
</div>

  </div>
</div>



  @endsection
