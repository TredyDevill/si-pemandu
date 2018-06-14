@extends('vendor.adminlte.layouts.appadmin')

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
                </tr>
           @endforeach
                </tbody>
              </table>
    </div>
</div>                

@endsection