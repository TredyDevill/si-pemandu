@extends('vendor.adminlte.layouts.appadmin')

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
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection