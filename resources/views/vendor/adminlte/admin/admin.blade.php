@extends('vendor.adminlte.layouts.appadmin')

@section('main-content')
<div class="row">
    <div class="col-xs-12">
          <!-- Bar chart -->
        <div class="box box-primary">
            <div class="box-header with-border" style="padding: 15px">
              <h3 class="box-title">Bayi Dan Balita</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus font-white"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#sehat" data-toggle="tab">Total Bayi Dan Balita</a></li>
                        <li><a href="#gizi" data-toggle="tab">Status Gizi Bayi dan Balita</a></li>
                        <li><a href="#berat" data-toggle="tab">Tingkat Berat Badan Bayi dan Balita</a></li>
                    </ul>
                    <div class="box-body border-radius-none">
                        <div class="tab-content">
                            <div class="tab-pane active" id="sehat">
                                <div class="line-height-box-body"></div>
                                <div class="col-md-8">
                                    <canvas id="pie-chart" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
                                </div>
                                <div class="col-md-4 bg-aqua-active box-keterangan">
                                    <p class="text-center">
                                        <i class="fa fa-info-circle fa-2x"></i><br>
                                        <strong>Keterangan</strong>
                                    </p>
                                    <div class="progress-group">
                                        <span class="progress-text">Total Keseluruhan</span>
                                        <span class="progress-number"><b>{{$totaljml[0] + $totaljml[1]}}</b></span>
                                    </div>
                                </div>
                                <div class="col-md-4 bg-white-active box-keterangan">
                                    <div class="progress-group">
                                        <span class="progress-text">Bayi</span>
                                        <span class="progress-number"><b>{{$totaljml[0]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Balita</span>
                                        <span class="progress-number"><b>{{$totaljml[1]}}</b></span>
                                    </div>
                                </div>


                                <div class="col-md-4 box-detail-keterangan">
                                    <div class="progress-group">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="gizi">
                                <div class="line-height-box-body"></div>
                                <div class="col-md-8">
                                    <canvas id="bar-chart-grouped" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
                                </div>
                                <div class="col-md-4 bg-aqua-active box-keterangan">
                                    <p class="text-center">
                                        <i class="fa fa-info-circle fa-2x"></i><br>
                                        <strong>Keterangan</strong>
                                    </p>
                                    <div class="progress-group">
                                        <span class="progress-text">Total Keseluruhan</span>
                                        <span class="progress-number"><b>{{$gizijml[0] + $gizijml[1] + $gizijml[2] + $gizijml[3] + $gizibalitajml[0] + $gizibalitajml[1] + $gizibalitajml[2] + $gizibalitajml[3]}}</b></span>
                                    </div>
                                </div>
                                <div class="col-md-4 bg-white-active box-keterangan">
                                    <div class="progress-group">
                                        <span class="progress-text">Gizi Buruk</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$gizibalitajml[0]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$gizijml[0]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Gizi Kurang</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$gizibalitajml[1]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$gizijml[1]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Gizi Baik</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$gizibalitajml[2]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$gizijml[2]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Gizi Lebih</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$gizibalitajml[3]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$gizijml[3]}}</b></span>
                                    </div>
                                </div>

                                <div class="col-md-4 box-detail-keterangan">
                                    <div class="progress-group">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="berat">
                                <div class="line-height-box-body"></div>
                                <div class="col-md-8">
                                    <canvas id="bar2-chart-grouped" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
                                </div>
                                <div class="col-md-4 bg-aqua-active box-keterangan">
                                    <p class="text-center">
                                        <i class="fa fa-info-circle fa-2x"></i><br>
                                        <strong>Keterangan</strong>
                                    </p>
                                    <div class="progress-group">
                                        <span class="progress-text">Total Keseluruhan</span>
                                        <span class="progress-number"><b>{{$totaljml[0] + $totaljml[1]}}</b></span>
                                    </div>
                                </div>
                                <div class="col-md-4 bg-white-active box-keterangan">
                                    <div class="progress-group">
                                        <span class="progress-text">Sangat Kurus</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$tingkatbalitajml[0]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$tingkatbayijml[0]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Kurus</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$tingkatbalitajml[1]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$tingkatbayijml[1]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Normal</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$tingkatbalitajml[2]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$tingkatbayijml[2]}}</b></span>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Gemuk</span>
                                        <span class="progress-number" style="background-color: #B22222"><b>{{$tingkatbalitajml[3]}}</b></span>
                                        <span class="progress-number" style="background-color: #3e95cd"><b>{{$tingkatbayijml[3]}}</b></span>
                                    </div>
                                </div>

                                <div class="col-md-4 box-detail-keterangan">
                                    <div class="progress-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body-->
        </div>

    </div>
</div>

@endsection