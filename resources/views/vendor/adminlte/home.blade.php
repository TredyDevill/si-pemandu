@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="row">
	<div class="col-xs-12">
          <!-- Bar chart -->
        <div class="box box-primary">
            <div class="box-header with-border bg-light-blue" style="padding: 15px">
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
								<b>Total Bayi Dan Balita</b>
								<div class="line-height-box-body"></div>
								<div class="col-md-8">
									<canvas id="canvassehat" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
								</div>
								<div class="col-md-4 bg-aqua-active box-keterangan">
									<p class="text-center">
										<i class="fa fa-info-circle fa-2x"></i><br>
										<strong>Keterangan</strong>
									</p>
									<div class="progress-group">
										<span class="progress-text">Total Keseluruhan</span>
										<span class="progress-number"><b>48</b></span>
									</div>
								</div>

								<div class="col-md-4 box-detail-keterangan">
									<div class="progress-group">
									</div>
								</div>
							</div>

							<div class="tab-pane" id="gizi">
								<b>Status Gizi Bayi dan Balita</b>
								<div class="line-height-box-body"></div>
								<div class="col-md-8">
									<canvas id="canvasgizi" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
								</div>
								<div class="col-md-4 bg-aqua-active box-keterangan">
									<p class="text-center">
										<i class="fa fa-info-circle fa-2x"></i><br>
										<strong>Keterangan</strong>
									</p>
									<div class="progress-group">
										<span class="progress-text">Total Keseluruhan</span>
										<span class="progress-number"><b>48</b></span>
									</div>
								</div>

								<div class="col-md-4 box-detail-keterangan">
									<div class="progress-group">
									</div>
								</div>
							</div>

							<div class="tab-pane" id="berat">
								<b>Tingkat Berat Badan Bayi dan Balita</b>
								<div class="line-height-box-body"></div>
								<div class="col-md-8">
									<canvas id="canvasberat" width="1351" height="675" style="display: block; height: 450px; width: 901px;"></canvas>
								</div>
								<div class="col-md-4 bg-aqua-active box-keterangan">
									<p class="text-center">
										<i class="fa fa-info-circle fa-2x"></i><br>
										<strong>Keterangan</strong>
									</p>
									<div class="progress-group">
										<span class="progress-text">Total Keseluruhan</span>
										<span class="progress-number"><b>48</b></span>
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