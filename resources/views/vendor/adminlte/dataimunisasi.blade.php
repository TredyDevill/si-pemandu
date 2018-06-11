@extends('adminlte::layouts.app')

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


@foreach($arrimun as $imunisasi)
<div class="modal fade" id="modal-edit-{{$imunisasi->id_anak}}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header green-background-main-color">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" align="center">Ubah Data Imunisasi {{$imunisasi->nama_anak}}</h4>
          </div>
            <div class="modal-body">
            {!! Form::open(['action' => ['ImunisasiController@update', $imunisasi->id_anak], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                  <label for="exampleInputEmail1">BCG</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="bcg" value="{{$imunisasi->bcg}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">DPT I</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="dpt_i" value="{{$imunisasi->dpt_i}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">DPT II</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="dpt_ii" value="{{$imunisasi->dpt_ii}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">DPT III</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="dpt_iii" value="{{$imunisasi->dpt_iii}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Polio I</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="polio_i" value="{{$imunisasi->polio_i}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Polio II</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="polio_ii" value="{{$imunisasi->polio_ii}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Polio III</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="polio_iii" value="{{$imunisasi->polio_iii}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Polio IV</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="polio_iv" value="{{$imunisasi->polio_iv}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Campak</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="campak" value="{{$imunisasi->campak}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hepatitis I</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="hepatitis_i" value="{{$imunisasi->hepatitis_i}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hepatitis II</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="hepatitis_ii" value="{{$imunisasi->hepatitis_ii}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hepatitis III</label>
                  <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="hepatitis_iii" value="{{$imunisasi->hepatitis_iii}}">
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


<div class="modal fade" id="modal-hapus">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" align="center">HAPUS</h4>
        </div>

        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus Data Imunisasi "{{$imunisasi->nama_anak}}"?</p>
        </div>

        <div class="modal-footer">
          <form action="#" method="post">
            <input type="submit" class="btn btn-danger" name="submit" value="YA">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
          </form>
          
        </div>

      </div>
  </div>
</div> 






@endsection
