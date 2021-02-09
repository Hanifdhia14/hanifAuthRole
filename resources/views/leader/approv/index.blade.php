@extends('layouts.app')


  @section('content')
  <div id="content-wrapper">

        <div class="container-fluid">

          <h1>Approval <small>KPI Staff</small></h1>
          <hr class="sidebar-divider">

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Tambah Keterangan</h5>

                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input name="Keterangan" type="text" class="form-control @error('Keterangan')is-invalid @enderror" id="Keterangan" placeholder="Masukkan Keterangan" >
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

            <div class="card header">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Note</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td> 22-10-2021 </td>
                    <td> <a href="#"> Dhia Eartha Hanif </a></td>
                    <td>Staff Kinerja Reward</td>
                    <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                      Noted
                    </button></td>
                    <td style=" text-align: center;">
                      <a type="button" class="btn btn-danger">Not Approval</a>
                      <a type="button" class="btn btn-success">Approval</a>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Note</th>
                  <th scope="col">Aksi</th>
                </tfoot>
              </table>
            </div>





        </div>
        <!-- /.container-fluid -->

              <!-- Sticky Footer -->

      </div>
  @endsection
