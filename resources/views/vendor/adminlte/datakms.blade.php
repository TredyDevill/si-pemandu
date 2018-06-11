@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Kartu Menuju Sehat</h3>
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
                  <th>Berat Badan</th>
                  <th>Tinggi Badan</th>
                  <th>Status ASI</th>
                  <th>Bulan Penimbangan</th>
                  <th>Status Berat Badan</th>
                  <th>Kesimpulan KMS</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($kmz as $kms)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $kms->nama_anak }}</td>
                  <td>{{ $kms->nama_ayah }}</td>
                  <td>{{ $kms->nama_ibu }}</td>
                  <td>{{ $kms->ttl }}</td>
                  <td>{{ $kms->umur }}</td>
                  <td>{{ $kms->bb }}</td>
                  <td>{{ $kms->tinggi }}</td>
                  <td>{{ $kms->status_asi }}</td>
                  <td>{{ $kms->bln_penimbangan }}</td>
                  <td>{{ $kms->status_bb }}</td>
                  <td>{{ $kms->kesimpulan_kms }}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$kms->id_kms}}"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$kms->id_kms}}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------- -->
@foreach($kmz as $kms)
<div class="modal fade" id="modal-edit-{{$kms->id_kms}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Data KMS {{$kms->nama_anak}}</h4>
          </div>
            <div class="modal-body">
            {!! Form::open(['action' => ['KmsController@update', $kms->id_kms], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">Berat Badan</label>
                  <input type="text" class="form-control" name="bb" value="{{$kms->bb}}">
                </div>
                   <div class="form-group">
                  <label for="exampleInputEmail1">Tinggi Badan</label>
                  <input type="textarea" class="form-control" name="tinggi" value="{{$kms->tinggi}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status Asi</label>
                  <input type="text" class="form-control" name="status_asi" value="{{$kms->status_asi}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bulan Penimbangan</label>
                  <input type="text" class="form-control" name="bln_penimbangan" value="{{$kms->bln_penimbangan}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Status Berat Badan</label>
                  <input type="text" class="form-control" name="status_bb" value="{{$kms->status_bb}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="tgl" value="{{$kms->tgl}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kesimpulan KMS</label>
                  <input type="text" class="form-control" name="kesimpulan_kms" value="{{$kms->kesimpulan_kms}}">
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
<!-- ------------------------------------------------------------------------------------------ -->
@foreach($kmz as $kms)
<div class="modal fade" id="modal-hapus-{{$kms->id_kms}}">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" align="center">HAPUS</h4>
        </div>

        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus Data KMS "{{$kms->nama_anak}}"?</p>
        </div>

        <div class="modal-footer">
          <form action="/datakms/{{$kms->id_kms}}" method="post">
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
