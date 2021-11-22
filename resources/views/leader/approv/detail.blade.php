@extends('layouts.app')


  @section('content')
  <div id="content-wrapper">

        <div class="container-fluid">
        <button  type="button" class="btn btn-primary"> <a href="{{url('leader.approv.index')}}" class="material-icons" style="color: white">arrow_back</a></button>
         <h1>Approval <small>{{ $nama_pegawai->nama }}</small></h1>
          <hr class="sidebar-divider">

        {{-- Modal Komen --}}
          <div class="modal fade" id="komenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Tambah Umpan Balik</h5>
                </div>
                <form action="" id="add_komen" method="GET" >\
                    {{ csrf_field() }}
                  <div class="modal-body">
                    <div class="form-group">
                      <textarea name="komen" class="form-control @error('Keterangan')is-invalid @enderror" id="komen" placeholder="Masukkan Umpan Balik"></textarea>
                      <input type="hidden" id="id_komen" name="id_komen">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
                </div>
              </div>
            </div>
          </div>
          {{-- End Modal Komen --}}

          {{-- Modal Approv --}}
          <div class="modal" id="approvModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Kofirmasi Approval</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin APPROV data ?</p>
                  <form action="" id="edit_approv" method="POST">
                      @csrf
                    <div hidden class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                <input type="hidden" id="id_set" name="id_set" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">YES</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
          {{-- End Modal Approv --}}

          {{-- Modal NOT Approv --}}
          <div class="modal" id="notapprovModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Kofirmasi Approval</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin NOT APPROV data ?</p>
                  <form action="" id="edit_notapprov" method="POST">
                      @csrf
                    <div hidden class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                <input type="hidden" id="id_notset" name="id_notset" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">YES</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
          {{-- Add Modal NOT Approv --}}

            <div class="card header">
                <table class="table table-striped table-bordered">
                    <thead>

                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kuadran</th>
                        <th scope="col">KPI</th>
                        <th scope="col">Tipe Penilaian</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Note</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pegawai as $dt )
                      <tr>
                        <th>{{$loop ->iteration}}</th>
                        <td>{{$dt->kuadran}}</td>
                        <td>{{$dt->nama_kpi}}</td>
                        <td>{{$dt->tipe_nilai}}</td>
                        <td>{{$dt->bobot}}</td>
                        <td>
                            <a href="#komenModal" data-komen="{{ $dt->id_settarget_kerja}}"> <i class="large material-icons" data-toggle="modal" data-target="#komenModal">comment</i></a>
                        </td>

                        <td style="color:white">
                        <a type="button" href="#notapprovModal" data-id_notset="{{ $dt->id_settarget_kerja}}" data-toggle="modal" data-target="#notapprovModal" class="btn btn-danger" ><i class="material-icons">clear</i></a>
                        <a type="button" href="#approvModal" data-id_set="{{ $dt->id_settarget_kerja}}" data-toggle="modal" data-target="#approvModal" class="btn btn-success" ><i class="material-icons">check</i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                        <th scope="col">No</th>
                        <th scope="col">Kuadran</th>
                        <th scope="col">KPI</th>
                        <th scope="col">Tipe Penilaian</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Note</th>
                        <th scope="col">Aksi</th>
                    </tfoot>
                  </table>
                </div>
        </div>
        <!-- /.container-fluid -->

      </div>
    {{-- Approv --}}
      <script>
          $(document).on('click','a[href="#approvModal"]', function(e){
              var id_set = $(this).data('id_set');
              $.ajax({
                headers:{'csrftoken':'{{csrf_token() }}'},
                url:'leader.approv.edit'+id_set,
                type:'GET',
                dataType:'json',
                success:function(data){
                    $('#id_set').val(data.id_settarget_kerja);
                    var url='{{ route("approv", ":id_settarget_kerja")}}';
                    url = url.replace(':id_settarget_kerja',id_set);
                    $('#edit_approv').attr('action',url);
                }
              });
          });
      </script>
     {{-- End Approv --}}


     {{-- Not Approv --}}
     <script>
        $(document).on('click','a[href="#notapprovModal"]', function(e){
            var id_notset = $(this).data('id_notset');
            $.ajax({
              headers:{'csrftoken':'{{csrf_token() }}'},
              url:'leader.approv.edit'+id_notset,
              type:'GET',
              dataType:'json',
              success:function(data){
                  $('#id_notset').val(data.id_settarget_kerja);
                  var url='{{ route("notapprov", ":id_settarget_kerja")}}';
                  url = url.replace(':id_settarget_kerja',id_notset);
                  $('#edit_notapprov').attr('action',url);
              }
            });
        });
    </script>
   {{-- End Not Approv --}}


   {{-- Add Komen --}}
     <script>
        $(document).on('click','a[href="#komenModal"]', function(e){
            var id_komen = $(this).data('id_komen');
            $.ajax({
              headers:{'csrftoken':'{{csrf_token() }}'},
              url:'leader.approv.komen'+id_komen,
              type:'GET',
              dataType:'json',
              success:function(data){
                  $('#id_komen').val(data.id_settarget_kerja);
                  var url='{{ route("komen", ":id_settarget_kerja")}}';
                  url = url.replace(':id_settarget_kerja',id_komen);
                  $('#add_komen').attr('action',url);
              }
            });
        });
    </script>
   {{-- End Add Komen --}}
  @endsection
