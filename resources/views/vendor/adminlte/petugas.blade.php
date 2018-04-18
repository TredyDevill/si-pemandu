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
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat"><i class="fa fa-eye"></i></button>

                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil-square-o"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>



<div class="modal fade" id="modal-lihat">
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
                  <div class="col-xs-3">
                    <b>Nama Kader</b>
                  </div>
                  <div class="col-xs-9">
                    Gecko
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Alamat</b>
                  </div>
                  <div class="col-xs-9">
                    Firefox 1.0
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kelurahan</b>
                  </div>
                  <div class="col-xs-9">
                    Win 98+ / OSX.2+
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kecamatan</b>
                  </div>
                  <div class="col-xs-9">
                    1.7
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Email</b>
                  </div>
                  <div class="col-xs-9">
                    A
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Tanggal Bergabung</b>
                  </div>
                  <div class="col-xs-9">
                    4
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Data Kader</h4>
          </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kader</label>
                  <input type="text" class="form-control" id="nama">
                </div>
                   <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="textarea" class="form-control" id="alamat">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kelurahan</label>
                  <input type="text" class="form-control" id="kelurahan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Bergabung</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tanggal" placeholder="01/20/2018">
                  </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
                <div class="clearfix"></div>
              </div>
            </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modal-hapus">
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
          <form action="#" method="post">
            <input type="submit" class="btn btn-danger" name="submit" value="YA">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
          </form>
          
        </div>

      </div>
  </div>
</div> 

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
