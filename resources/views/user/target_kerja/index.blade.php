@extends('layouts.app')


  @section('content')

    <style media="screen">

  h1{     color: darkblue;
          margin-left: 20pt;
          font-style: article;
        }
    table{
      padding-top: 20px;

    }
    .btn{
      margin-top: 0pt;
      margin-right: 10pt;
      margin-bottom: 10pt;
    }

    </style>

<div class ="container-fluid">
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
          <h1>Setting Target Kerja</h1>
            <hr class="sidebar-divider">
  <div class="card">
    <div class="card-header">
      <div class="col-lg-12">
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

            <div class="modal-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
        <div id="tabel">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"> + Add </button>
                <a href="{{ route('user.target_kerja.apply',Auth::id()) }}" onclick="return confirm('Apakah anda yakin ingin mengirim data ?')"class="btn btn-success"> + Apply</a>
                <thead>
                        <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Kuadran</th>
                        <th>KPI</th>
                        <th>Tipe Nilai</th>
                        <th>Target Absolut</th>
                        <th>Bobot</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($set_target as $set)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$set->tahun}}</td>
                            <td>{{$set->kuadran}}</td>
                            <td>{{$set->nama_kpi}}</td>
                            <td>{{$set->tipe_nilai}}</td>
                            <td>{{$set->target_absolut}}</td>
                            <td>{{$set->bobot}}</td>
                            @if ($set->status === 0)
                            {{-- Berlum Terkirim --}}
                            <td style="text-align: center"> <span class="btn btn-secondary"> Unsent</span> </td>
                            @elseif ($set->status === 1)
                            {{-- Dikirim (Panding) --}}
                            <td style="text-align: center"> <span class="btn btn-primary"> Pending</span></td>
                            @elseif ($set->status === 2)
                            {{-- Ditolak --}}
                            <td style="text-align: center"> <span class="btn btn-danger">Rejected</span></td>
                            @elseif ($set->status === 3)
                            {{-- Diterima --}}
                            <td style="text-align: center"> <span class="btn btn-success">Accepted</span></td>
                            @elseif ($set->status === 4)
                            {{-- Laporan Diterima --}}
                            <td style="text-align: center"> <span class="btn btn-success">Accepted</span></td>
                            @endif

                            <td>
                                @if ($set->status !=3)
                                <a href="" data-toggle="modal" data-target="#komen"> <i class="material-icons">comment</i></a>
                                @elseif ($set->status === 2 or $set->status === 3)
                                <a data-toggle="modal" data-target="#edit-{{$set->id_settarget_kerja}}" ><i class="material-icons">&#xE254;</i></a>
                                <a href="{{ route('user.target_kerja.delete', $set->id_settarget_kerja) }}" onclick="return confirm('Apakah anda yakin ingin mengapus data ?')"><i class="material-icons">&#xE872;</i></a>
                                @endif

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Kuadran</th>
                            <th>KPI</th>
                            <th>Tipe Nilai</th>
                            <th>Target Absolut</th>
                            <th>Bobot</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
            </table>
        </div>
        {{-- Modal Comment --}}
        <div class="modal" tabindex="-1" role="dialog" id="komen">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Umpan Balik</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
              </div>
            </div>
          </div>

        {{-- End Modal Comment --}}


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
                    <form method="POST" action="{{action([\App\Http\Controllers\Target_kerjaController::class,'store'])}}">
                      <div class="modal-body">
                      {{csrf_field()}}

                      <div class="modal-body">
                        <label for="tahun" class="col-form-label">Tahun:</label>
                        <input type="text" placeholder="Masukkan Tahun" name="tahun" class="form-control @error('tahun')is-invalid @enderror"value="">
                    </div>

                      <div class="modal-body">
                          <label for="id_kuadran" class="col-form-label">Kuadran:</label>
                          <input hidden type="text" placeholder="" name="id_employee" class="form-control"value="{{ Auth::user() -> id}}">
                          <select type="text"  name="id_kuadran" id="id_kuadran" class="form-control">
                            <option value=""> ==  Pilih Kuadran== </option>
                            @foreach($kuadrans as $kdr)
                              <option value="{{$kdr->id_kuadran}}">{{$kdr->kuadran}}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="modal-body">
                          <label for="id_kpi" class="col-form-label">KPI:</label>
                          <select type="text" name="id_kpi" id="id_kpi" class="form-control @error('id_kpi')
                          @enderror">
                            <option value=""> ==Pilih KPI== </option>
                            @foreach($kpis as $item)
                              <option value="{{$item->id_kpi}}">{{$item->nama_kpi}}</option>
                            @endforeach
                          </select>
                      </div>

                    <div class="modal-body">
                      <label for="tipe_nilai" class="col-form-label">Tipe Penilaian</label>
                      <select  name="tipe_nilai" id="periode_nilai" class="form-control @error('tipe_nilai')
                      @enderror" value="" onchange="showperiode_nilai();">
                                 <option value="">== Pilih Tipe Nilai ==</option>
                                 <option value="Bulanan">Bulanan</option>
                                 <option value="Quarter">Quarter</option>
                                 <option value="Semester">Semester</option>
                                 <option value="Tahunan">Tahunan</option>
                      </select>

                    </div>
                       <div class="modal-body">
                         <div class="form-group">
                           <label for="target_absolut" class="col-form-label">Target Absolut:</label>
                           <input name="target_absolut"type="text" class="form-control @error('target_absolut')@enderror" id="target_absolut" placeholder="Masukkan Target Absolut" value="">
                           @error('target_absolut')
                           <div class="invalid-feedback">{{$message}}</div>
                           @enderror
                         </div>
                       </div>

                      <div class="modal-body">
                        <div class="form-group">
                          <label for="bobot" class="col-form-label">Bobot:</label>
                          <input name="bobot"type="number" max="100" class="form-control @error('bobot')
                          @enderror" id="bobot" placeholder="Masukkan Bobot" value="">
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
                @foreach($set_target as $set)
            <div class="modal fade" id="edit-{{$set->id_settarget_kerja}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Target Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="post" action="user.target_kerja.index.edit{{ $set->id_settarget_kerja }}" id="editform">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group">
                    <label for="tahun" class="col-form-label">Tahun:</label>
                    <input name="tahun"type="text" class="form-control" id="tahun" placeholder="" value="{{$set->tahun}}">
                    @error('tahun')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                </div>
                <div class="modal-body">
                    <label for="id_kuadran" class="col-form-label">Kuadran:</label>
                    <input  hidden type="text" placeholder="" name="id_employee" class="form-control" value="{{ $item -> id_employee}}">
                    <select type="text"  name="id_kuadran" id="id_kuadran" class="form-control">
                        <option value="{{ $set->id_kuadran }}"> {{$set->kuadran}} </option>
                        @foreach($kuadrans as $kdr)
                        <option value="{{$kdr->id_kuadran}}">{{$kdr->kuadran}}</option>
                        @endforeach
                    </select>
                </div>

                    <div class="modal-body">
                        <label for="id_kpi" class="col-form-label">KPI:</label>
                        <select type="text" name="id_kpi" id="id_kpi" class="form-control">
                        <option value="{{ $set->id_kpi }}">{{$set->nama_kpi}} </option>
                            @foreach($kpis as $item)
                            <option value="{{$item->id_kpi}}">{{$item->nama_kpi}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="modal-body">
                    <label for="tipe_nilai" class="col-form-label">Tipe Penilaian</label>
                    <select  name="tipe_nilai" id="edit_nilai" class="form-control" onchange="editperiode_nilai();">
                                <option value="{{$set->tipe_nilai}}">{{$set->tipe_nilai}}</option>
                                <option value="Bulanan">Bulanan</option>
                                <option value="Quarter">Quarter</option>
                                <option value="Semester">Semester</option>
                                <option value="Tahunan">Tahunan</option>
                    </select>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="target_absolut" class="col-form-label">Target Absolut:</label>
                        <input name="target_absolut"type="text" class="form-control" id="target_absolut" placeholder="" value="{{$set->target_absolut}}">
                        @error('target_absolut')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                        <label for="bobot" class="col-form-label">Bobot:</label>
                        <input name="bobot"type="text" class="form-control" id="bobot" placeholder="" value="{{$set->bobot}}">
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
                @endforeach
                <!--End Edit Modal -->
        </div>
    </div>
</div>

<!-- Data Tabel Boostrap  -->
  <script type="text/javascript">
  $(document).ready(function() {
  $('#example').DataTable( {
      } );
    } );
  </script>
<!-- End Data Tabel Boostrap  -->
    @endsection
