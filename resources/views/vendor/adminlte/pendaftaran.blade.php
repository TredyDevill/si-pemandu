@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Pendaftaran</h3>
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
                  <th>Umur</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($pendaftaran as $daftar)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$daftar->nama_anak}}</td>
                  <td>{{$daftar->nama_ayah}}</td>
                  <td>{{$daftar->nama_ibu}}</td>
                  <td>{{$daftar->umur}}</td>
                  <td>{{$daftar->tgl}}</td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection
