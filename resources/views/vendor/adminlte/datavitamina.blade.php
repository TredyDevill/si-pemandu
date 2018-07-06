@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Pemberian Vitamin A</h3>
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
                  <th>Tanggal lahir</th>
                  <th>Umur</th>
                  <th>Vitamin A I</th>
                  <th>Vitamin A II</th>
                  <th>Kesimpulan Vitamin</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($arrimun as $vit)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $vit->nama_anak }}</td>
                  <td>{{ $vit->nama_ayah }}</td>
                  <td>{{ $vit->nama_ibu }}</td>
                  <td>{{ $vit->ttl }}</td>
                  <td>{{ $vit->umur }}</td>
                  <td>{{ $vit->vita_i }}</td>
                  <td>{{ $vit->vita_ii }}</td>
                  <td>{{ $vit->kesimpulan_vita }}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$vit->id_anak}}"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$vit->id_anak}}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@foreach($arrimun as $vit)
<div class="modal fade" id="modal-edit-{{$vit->id_anak}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Data Vitamin {{$vit->nama_anak}}</h4>
          </div>
            <div class="modal-body">
            {!! Form::open(['action' => ['VitaminController@update', $vit->id_anak], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">VItamin A I</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="vita_i" value="{{ $vit->vita_i }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Vitamin A II</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="vita_ii" value="{{ $vit->vita_ii }}">
                  </div>
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

@foreach($arrimun as $vit)
<div class="modal fade" id="modal-hapus-{{$vit->id_anak}}">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" align="center">HAPUS</h4>
        </div>

        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus Data Vitamin "{{$vit->nama_anak}}" ?</p>
        </div>

        <div class="modal-footer">
          <form action="/datavitamina/{{$vit->id_anak}}" method="post">
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
