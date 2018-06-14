@extends('vendor.adminlte.layouts.appadmin')

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
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection