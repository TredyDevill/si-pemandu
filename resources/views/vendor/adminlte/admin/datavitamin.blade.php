@extends('vendor.adminlte.layouts.appadmin')

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
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection