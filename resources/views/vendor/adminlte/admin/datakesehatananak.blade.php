@extends('vendor.adminlte.layouts.appadmin')

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
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection