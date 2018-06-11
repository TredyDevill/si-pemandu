@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Sasaran</h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body">
    	<table id="example" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Posyandu</th>
                  <th>Total Sasaran Anak</th>
                  <th>Total Sasaran Anak Baru</th>
                  <th>Total Laki-laki</th>
                  <th>Total Perempuan</th>
                  <th>Tanggal</th>
                  <th>Id Kader</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($sasarans as $sasaran)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $sasaran->nama_posyandu }}</td>
                  <td>{{ $sasaran->total_sasaran_anak }}</td>
                  <td>{{ $sasaran->total_sasaran_anak_baru }}</td>
                  <td>{{ $sasaran->total_laki_laki }}</td>
                  <td>{{ $sasaran->total_perempuan }}</td>
                  <td>{{ $sasaran->tgl }}</td>
                  <td>{{ $sasaran->id_kader }}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$sasaran->id_sasaran}}"><i class="fa fa-pencil-square-o"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$sasaran->id_sasaran}}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
           @endforeach
                </tbody>
              </table>
    </div>
</div>                

{{--==========================================================================================================================--}}
@foreach($sasarans as $sasaran)          
                  <div class="modal fade" id="modal-edit-{{$sasaran->id_sasaran}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header green-background-main-color">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" align="center">Ubah Data Kader {{$sasaran->id_sasaran}}</h4>
                            </div>
                              <div class="modal-body">
                              {!! Form::open(['action' => ['DatasasaranController@update', $sasaran->id_sasaran], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Posyandu</label>
                                    <input type="text" class="form-control" name="nama_posyandu" value="{{$sasaran->nama_posyandu}}">
                                  </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Total Sasaran Anak</label>
                                    <input type="textarea" class="form-control" name="total_sasaran_anak" value="{{$sasaran->total_sasaran_anak}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Total Sasaran Anak Baru</label>
                                    <input type="text" class="form-control" name="total_sasaran_anak_baru" value="{{$sasaran->total_sasaran_anak_baru}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Total Laki-Laki</label>
                                    <input type="text" class="form-control" name="total_laki_laki" value="{{$sasaran->total_laki_laki}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Total Perempuan</label>
                                    <input type="text" class="form-control" name="total_perempuan" value="{{$sasaran->total_perempuan}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="tgl" placeholder="01/20/2018" value="{{$sasaran->tgl}}">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Id Kader</label>
                                    <input type="text" class="form-control" name="id_kader" value="{{$sasaran->id_kader}}">
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
{{--==========================================================================================================================--}}       @foreach($sasarans as $sasaran)          
 
                  <div class="modal fade" id="modal-hapus-{{$sasaran->id_sasaran}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" align="center">HAPUS</h4>
                          </div>

                          <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Sasaran "{{$sasaran->nama_posyandu}}"?</p>
                          </div>

                          <div class="modal-footer">
                            <form action="/datasasaran/{{$sasaran->id_sasaran}}" method="post">
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

<section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Sasaran Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['action' => 'DatasasaranController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Posyandu</label>
                  <input type="text" class="form-control" name="nama_posyandu">
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Total Sasaran Anak</label>
                  <input type="text" class="form-control" name="total_sasaran_anak">
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Total Sasaran Anak Baru</label>
                  <input type="text" class="form-control" name="total_sasaran_anak_baru">
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Total Laki-laki</label>
                  <input type="text" class="form-control" name="total_laki_laki">
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Total Perempuan</label>
                  <input type="text" class="form-control" name="total_perempuan">
                </div>
              </div>
            </div>
              <!-- /.form-group -->
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Kader</label>
                    <input type="text" class="form-control" name="id_kader">
                  </div>
                </div>
              <!-- /.form-group -->
              </div>
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="tgl" placeholder="YYYY-MM-DD">
                    </div>
                </div>
              </div>
              <!-- /.form-group -->
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
