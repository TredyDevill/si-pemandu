@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Kader</h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body">
    	<table id="example" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                  <th>Nama Kader</th>
                  <th>Alamat</th>
                  <th>Username</th>
                  <th>No. Hp</th>
                  <th>Email</th>
                  <th>Tempat Tugas</th>
                  <th>Tgl Lahir</th>
                  <th>Tgl Bergabung</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($kaders as $kader)
                <tr>
                  <td>{{ $kader->nama_admin }}</td>
                  <td>{{ $kader->alamat }}</td>
                  <td>{{ $kader->username }}</td>
                  <td>{{ $kader->no_hp }}</td>
                  <td>{{ $kader->email }}</td>
                  <td>{{ $kader->bio }}</td>
                  <td>{{ $kader->tgl_lahir }}</td>
                  <td>{{  $kader->tgl_join}}</td>
                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$kader->id_kader}}"><i class="fa fa-eye"></i></button>

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$kader->id_kader}}"><i class="fa fa-pencil-square-o"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$kader->id_kader}}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
           @endforeach
                </tbody>
              </table>
    </div>
</div>                
{{--==========================================================================================================================--}}       @foreach($kaders as $kader)          
                  <div class="modal fade" id="modal-lihat-{{$kader->id_kader}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header green-background-main-color">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" align="center">Lihat</h4>
                            </div>
                              <div class="modal-body overflow-hidden">
                                <div class="row">
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Nama Kader</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->nama_admin }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Alamat</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->alamat }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Username</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->username }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>No Hp</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->no_hp }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Email</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->email }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Tempat Bertugas</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->bio }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Tanggal Lahir</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->tgl_lahir }}
                                    </div>
                                  </div>
                                  <div class="col-xs-12 box-table">
                                    <div class="col-xs-5">
                                      <b>Tanggal Bergabung</b>
                                    </div>
                                    <div class="col-xs-7">
                                      {{ $kader->tgl_join }}
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                  </div>
           @endforeach                     
{{--==========================================================================================================================--}}
@foreach($kaders as $kader)          
                  <div class="modal fade" id="modal-edit-{{$kader->id_kader}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header green-background-main-color">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" align="center">Ubah Data Kader {{$kader->id_kader}}</h4>
                            </div>
                              <div class="modal-body">
                              {!! Form::open(['action' => ['PetugasController@update', $kader->id_kader], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kader</label>
                                    <input type="text" class="form-control" name="nama_admin" value="{{$kader->nama_admin}}">
                                  </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="textarea" class="form-control" name="alamat" value="{{$kader->alamat}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{$kader->username}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="password" value="{{$kader->password}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">No Hp</label>
                                    <input type="text" class="form-control" name="no_hp" value="{{$kader->no_hp}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$kader->email}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tempat Bertugas</label>
                                    <input type="text" class="form-control" name="bio" value="{{$kader->bio}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="tgl_lahir" placeholder="01/20/2018" value="{{$kader->tgl_lahir}}">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Bergabung</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="tgl_join" placeholder="01/20/2018" value="{{$kader->tgl_join}}">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                  {{Form::hidden('_method', 'PUT')}}
                                  <button type="submit" class="btn btn-info btn-fill pull-right">Edit</button>
                                  <div class="clearfix"></div>
                                  </div>
                              {!! Form::close() !!}
                              
                              </div>
                        </div>
                    </div>
                  </div>
@endforeach                  
{{--==========================================================================================================================--}}       @foreach($kaders as $kader)          
 
                  <div class="modal fade" id="modal-hapus-{{$kader->id_kader}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" align="center">HAPUS</h4>
                          </div>

                          <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Kader?</p>
                          </div>

                          <div class="modal-footer">
                            <form action="/petugas/{{$kader->id_kader}}" method="post">
                              <input type="submit" class="btn btn-danger" name="submit" value="YA">
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                            </form>
                            
                          </div>

                        </div>
                    </div>
                  </div> 
 @endforeach           


<!-- Tambah Petugas -->
<section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Petugas Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['action' => 'PetugasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="nama_admin">
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" class="form-control" name="alamat">
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Bergabung</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="tgl_join" placeholder="YYYY-MM-DD">
                    </div>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Hp</label>
                  <input type="text" class="form-control" name="no_hp">
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="tgl_lahir" placeholder="YYYY-MM-DD">
                    </div>
                </div>
              </div>
            </div>
              <!-- /.form-group -->
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Bertugas</label>
                    <input type="text" class="form-control" name="bio" placeholder="ex: Kader Posyandu Cempaka">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <center><input type="submit" class="btn btn-primary" value="Tambah"></center>
          </div>
          <!-- /.row -->
          {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
      </div>
</section>





@endsection
