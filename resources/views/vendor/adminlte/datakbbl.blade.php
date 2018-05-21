@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Kesehatan Bayi Baru Lahir</h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body" >
    	<table id="example" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                  <th> No. </th>
                  <th>Nama Anak</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Tanggal Lahir</th>
                  <th>Umur</th>
                  <th>Berat Badan Lahir</th>
                  <th>Panjang Badan Lahit</th>
                  <th>Tempat Lahir</th>
                  <th>Cara Persalinan</th>
                  <th>Kesimpulan KBBL</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Bro</td>
                  <td> 4</td>
                  <td>X</td>
                  <td>3</td>
                  <td> 4</td>
                  <td> 4</td>
                  <td>Trident</td>
                  <td> 4</td>
                  <td>X</td>
                  <td> 4</td>
                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat"><i class="fa fa-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>superman</td>
                  <td>super</td>
                  <td>man</td>
                  <td> 4</td>
                  <td>7</td>
                  <td> 4</td>
                  <td>Trident</td>
                  <td>super</td>
                  <td>man</td>
                  <td> 4</td>
                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat"><i class="fa fa-eye"></i></button>
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
                </tbody>
              </table>
    </div>
</div>



<!-- <div class="modal fade" id="modal-lihat">
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
</div>  -->






@endsection
