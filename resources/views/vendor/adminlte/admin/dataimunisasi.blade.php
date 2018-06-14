@extends('vendor.adminlte.layouts.appadmin')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Imunisasi</h3>
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
                  <th>BCG</th>
                  <th>DPT I</th>
                  <th>DPT II</th>
                  <th>DPT III</th>
                  <th>Polio I</th>
                  <th>Polio II</th>
                  <th>Polio III</th>
                  <th>Polio IV</th>
                  <th>Campak</th>
                  <th>Hepatitis I</th>
                  <th>Hepatitis II</th>
                  <th>Hepatitis III</th>
                  <th>Kesimpulan Imunisasi</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                ?>
            @foreach($arrimun as $imunisasi)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $imunisasi->nama_anak }}</td>
                  <td>{{ $imunisasi->nama_ayah }}</td>
                  <td>{{ $imunisasi->nama_ibu }}</td>
                  <td>{{ $imunisasi->ttl }}</td>
                  <td>{{ $imunisasi->umur }}</td>
                  <td>{{ $imunisasi->bcg }}</td>
                  <td>{{ $imunisasi->dpt_i }}</td>
                  <td>{{ $imunisasi->dpt_ii }}</td>
                  <td>{{ $imunisasi->dpt_iii }}</td>
                  <td>{{ $imunisasi->polio_i }}</td>
                  <td>{{ $imunisasi->polio_ii }}</td>
                  <td>{{ $imunisasi->polio_iii }}</td>
                  <td>{{ $imunisasi->polio_iv }}</td>
                  <td>{{ $imunisasi->campak }}</td>
                  <td>{{ $imunisasi->hepatitis_i }}</td>
                  <td>{{ $imunisasi->hepatitis_ii }}</td>
                  <td>{{ $imunisasi->hepatitis_iii }}</td>
                  <td>{{ $imunisasi->kesimpulan_imunisasi }}</td>
                  <td style="white-space: nowrap;" align="center">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$imunisasi->id_anak}}"><i class="fa fa-pencil-square-o"></i></button>
                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection