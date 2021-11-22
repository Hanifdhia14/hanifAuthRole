@extends('layouts.app')


  @section('content')
  <div id="content-wrapper">

        <div class="container-fluid">

          <h1>Approval <small>KPI Staff</small></h1>
          <hr class="sidebar-divider">



            <div class="card header">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $nama_pegawai as $dt )
                  <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$dt->nama}}</td>
                    <td>{{$dt->jabatan}}</td>
                    <td>{{$dt->divisi}}</td>
                    <td style="color:white">
                        <a href="leader.approv.detail{{ $dt->id }}"> Detail</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Divisi</th>
                  <th scope="col">Aksi</th>
                </tfoot>
              </table>
            </div>
        </div>
        <!-- /.container-fluid -->

              <!-- Sticky Footer -->

      </div>
  @endsection
