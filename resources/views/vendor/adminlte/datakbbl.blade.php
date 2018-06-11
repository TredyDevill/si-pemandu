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
                  <th>Panjang Badan Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Cara Persalinan</th>
                  <th>Kesimpulan KBBL</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($kbbls as $kbbl)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $kbbl->nama_anak }}</td>
                  <td>{{ $kbbl->nama_ayah }}</td>
                  <td>{{ $kbbl->nama_ibu }}</td>
                  <td>{{ $kbbl->ttl }}</td>
                  <td>{{ $kbbl->umur }}</td>
                  <td>{{ $kbbl->berat_badan }}</td>
                  <td>{{ $kbbl->panjang_badan }}</td>
                  <td>{{ $kbbl->tempat_lahir }}</td>
                  <td>{{ $kbbl->cara_persalinan }}</td>
                  <td>{{ $kbbl->kesimpulan_kbbl }}</td>
                  <td style="white-space: nowrap;" align="center"> 
                    <!-- <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-lihat-{{$kbbl->id_kbbl}}"><i class="fa fa-eye"></i></button> -->
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$kbbl->id_kbbl}}"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$kbbl->id_kbbl}}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>


<!-- @foreach($kbbls as $kbbl)
<div class="modal fade" id="modal-lihat-{{$kbbl->id_kbbl}}">
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
                    <b>Nama Anak</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->nama_anak}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Nama Ayah</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->nama_ayah}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Nama Ibu</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->nama_ibu}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Tanggal Lahir</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->ttl}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Umur</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->umur}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Berat Badan</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->berat_badan}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Panjang Badan Lahir</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->panjang_badan}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Tempat Lahir</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->tempat_lahir}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Cara Persalinan</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->cara_persalinan}}
                  </div>
                </div>
                <div class="col-xs-12 box-table">
                  <div class="col-xs-3">
                    <b>Kesimpulan KBBL</b>
                  </div>
                  <div class="col-xs-9">
                    {{$kbbl->kesimpulan_kbbl}}
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>
</div>
@endforeach -->
<!-- =================================================================================================================== -->
@foreach($kbbls as $kbbl)
<div class="modal fade" id="modal-edit-{{$kbbl->id_kbbl}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Data KBBL</h4>
          </div>
            <div class="modal-body">
              {!! Form::open(['action' => ['KbblController@update', $kbbl->id_kbbl], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Anak</label>
                  <input type="text" class="form-control" name="nama_anak" value="{{$kbbl->nama_anak}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ayah</label>
                  <input type="text" class="form-control" name="nama_ayah" value="{{$kbbl->nama_ayah}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ibu</label>
                  <input type="text" class="form-control" name="nama_ibu" value="{{$kbbl->nama_ibu}}">
                </div>
                   <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="textarea" class="form-control" name="ttl" value="{{$kbbl->ttl}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Umur</label>
                  <input type="text" class="form-control" name="umur" value="{{$kbbl->umur}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Berat Badan Lahir</label>
                  <input type="text" class="form-control" name="berat_badan" value="{{$kbbl->berat_badan}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Panjang Badan Lahir</label>
                  <input type="text" class="form-control" name="panjang_badan" value="{{$kbbl->panjang_badan}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" value="{{$kbbl->tempat_lahir}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cara Persalinan</label>
                  <input type="text" class="form-control" name="cara_persalinan" value="{{$kbbl->cara_persalinan}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kesimpulan KBBL</label>
                  <input type="text" class="form-control" name="kesimpulan_kbbl" value="{{$kbbl->kesimpulan_kbbl}}">
                </div>
                <div class="modal-footer">
                {{Form::hidden('_method', 'PUT')}}
                  <button type="submit" class="btn btn-info btn-fill pull-right">Simpan</button>
                  <div class="clearfix"></div>
                </div>
              {!! Form::close() !!}
            </div>
      </div>
  </div>
</div>
@endforeach
<!-- ====================================================================================================== -->
@foreach($kbbls as $kbbl)
<div class="modal fade" id="modal-hapus-{{$kbbl->id_kbbl}}">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" align="center">HAPUS</h4>
        </div>

        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus Data "{{$kbbl->nama_anak}}"?</p>
        </div>

        <div class="modal-footer">
          <form action="/datakbbl/{{$kbbl->id_kbbl}}" method="post">
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






@endsection
