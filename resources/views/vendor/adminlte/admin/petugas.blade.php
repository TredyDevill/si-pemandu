@extends('vendor.adminlte.layouts.appadmin')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
     <h3 class="box-title">Data Admin Posyandu</h3>
    </div>
            <!-- /.box-header -->
    <div class="box-body">
    	<table id="example" class="display nowrap" style="width:100%">
                <thead>
                <tr>
                  <th>Nama Admin Posyandu</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @foreach($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->password }}</td>
                  <td style="white-space: nowrap;" align="center"> 
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat btn-success" data-toggle="modal" data-target="#modal-edit-{{$user->id}}"><i class="fa fa-pencil-square-o"></i></button>

                    <button type="button" class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$user->id}}"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
            @endforeach
                </tbody>
              </table>
    </div>
</div>                

@foreach($users as $user)          
                  <div class="modal fade" id="modal-edit-{{$user->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header green-background-main-color">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" align="center">Ubah Data Kader {{$user->id}}</h4>
                            </div>
                              <div class="modal-body">
                              {!! Form::open(['action' => ['AdmPetugasController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Admin Posyandu</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="password" value="{{$user->password}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                  </div>
                                  <div class="modal-footer">
                                  {{Form::hidden('_method', 'PUT')}}
                                  <button type="submit" class="btn btn-info btn-fill pull-right">Edit</button>
                                  <div class="clearfix"></div>
                                  </div>
                              {!! Form::close() !!}
                              
                              </div>
                        </div>
                    </div>
                  </div>
@endforeach                  
{{--==========================================================================================================================--}}       @foreach($users as $user)          
 
                  <div class="modal fade" id="modal-hapus-{{$user->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" align="center">HAPUS</h4>
                          </div>

                          <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Admin Posyandu?</p>
                          </div>

                          <div class="modal-footer">
                            <form action="/admin/petugas/{{$user->id}}" method="post">
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

				<!-- <form action="{{ url('/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            <label>
                                <div class="checkbox_register icheck">
                                    <label>
                                        <input type="checkbox" name="terms">
                                    </label>
                                </div>
                            </label>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">{{ trans('adminlte_lang::message.terms') }}</button>
                            </div>
                        </div>
                        <div class="col-xs-4 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                        </div>
                    </div>
                </form> -->

<!-- Tambah Petugas -->
<!-- <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Admin Posyandu</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
        {!! Form::open(['action' => 'AdmPetugasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" class="form-control" name="alamat">
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <center><input type="submit" class="btn btn-primary" value="Tambah"></center>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
</section> -->

@endsection