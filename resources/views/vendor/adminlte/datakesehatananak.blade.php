@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Kesehatan Anak</h3>
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
                  <th>Penyakit</th>
                  <th>Tindakan</th>
                  <th>Keterangan</th>
                  <th>Kesimpulan Kesehatan Anak</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($kesehatans as $kesehatan)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $kesehatan->nama_anak }}</td>
                  <td>{{ $kesehatan->nama_ayah }}</td>
                  <td>{{ $kesehatan->nama_ibu }}</td>
                  <td>{{ $kesehatan->ttl }}</td>
                  <td>{{ $kesehatan->umur }}</td>
                  <td>{{ $kesehatan->penyakit }}</td>
                  <td>{{ $kesehatan->tindakan }}</td>
                  <td>{{ $kesehatan->keterangan }}</td>
                  <td>{{ $kesehatan->kesimpulan_ka }}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{ $kesehatan->id_ka }}"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{ $kesehatan->id_ka }}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
@foreach($kesehatans as $kesehatan)
<div class="modal fade" id="modal-edit-{{ $kesehatan->id_ka }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Data Kesehatan Anak "{{ $kesehatan->nama_anak }}"</h4>
          </div>
            <div class="modal-body">
            {!! Form::open(['action' => ['KesehatanController@update', $kesehatan->id_ka], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">Penyakit</label>
                  <input type="text" class="form-control" name="penyakit" value="{{ $kesehatan->penyakit }}">
                </div>
                   <div class="form-group">
                  <label for="exampleInputEmail1">Tindakan</label>
                  <input type="text" class="form-control" name="tindakan" value="{{ $kesehatan->tindakan }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="{{ $kesehatan->keterangan }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kesimpulan Kesehatan Anak</label>
                  <input type="text" class="form-control" name="kesimpulan_ka" value="{{ $kesehatan->kesimpulan_ka }}">
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
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
@foreach($kesehatans as $kesehatan)
<div class="modal fade" id="modal-hapus-{{ $kesehatan->id_ka }}">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" align="center">HAPUS</h4>
        </div>

        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus Data Kesehatan Anak "{{ $kesehatan->nama_anak }}" ?</p>
        </div>

        <div class="modal-footer">
          <form action="/datakesehatananak/{{$kesehatan->id_ka}}" method="post">
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
