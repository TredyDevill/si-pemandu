@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="row">
	<div class="col-xs-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Balita Dan Bayi Sehat</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<div class="tab-pane active" id="sehat">
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
						</div>
					</div>

					<div class="col-md-4 box-detail-keterangan">
						<div class="progress-group">
						</div>
					</div>
				</div>
            </div>
            <!-- /.box-body-->
          </div>

	</div>
</div>

@endsection