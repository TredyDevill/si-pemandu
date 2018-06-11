@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Laporan Bayi</h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body" >
    	<table id="example" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                  <th> No. </th>
                  <th>Nama Anak</th>
                  <th>Tgl. Lahir</th>
                  <th>BBL (Gram)</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Penimbangan Mei</th>
                  <th>Penimbangan Juni</th>
                  <th>Sirup Besi FE I Bln</th>
                  <th>Sirup Besi FE II Bln</th>
                  <th>VIT.A I Bln</th>
                  <th>VIT.A II Bln</th>
                  <th>Oralit Bln</th>
                  <th>BCG</th>
                  <th>DPT I</th>
                  <th>DPT II</th>
                  <th>DPT III</th>
                  <th>POLIO I</th>
                  <th>POLIO II</th>
                  <th>POLIO III</th>
                  <th>POLIO IV</th>
                  <th>Campak</th>
                  <th>HEPATITIS I</th>
                  <th>HEPATITIS II</th>
                  <th>HEPATITIS III</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($arrimun as $lap)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $lap->nama_anak }}</td>
                  <td>{{ $lap->ttl }}</td>
                  <td>{{ $lap->bbl }}</td>
                  <td>{{ $lap->nama_ayah }}</td>
                  <td>{{ $lap->nama_ibu }}</td>
                  <td>{{ $lap->mei }}</td>
                  <td>{{ $lap->juni }}</td>
                  <td>{{ $lap->sb_i }}</td>
                  <td>{{ $lap->sb_ii }}</td>
                  <td>{{ $lap->vita_i }}</td>
                  <td>{{ $lap->vita_ii }}</td>
                  <td>{{ $lap->oralit }}</td>
                  <td>{{ $lap->bcg }}</td>
                  <td>{{ $lap->dpt_i }}</td>
                  <td>{{ $lap->dpt_ii }}</td>
                  <td>{{ $lap->dpt_iii }}</td>
                  <td>{{ $lap->polio_i }}</td>
                  <td>{{ $lap->polio_ii }}</td>
                  <td>{{ $lap->polio_iii }}</td>
                  <td>{{ $lap->polio_iv }}</td>
                  <td>{{ $lap->campak }}</td>
                  <td>{{ $lap->hepatitis_i }}</td>
                  <td>{{ $lap->hepatitis_ii }}</td>
                  <td>{{ $lap->hepatitis_iii }}</td>
                </tr>
            @endforeach
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
