<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<meta charset="utf-8">
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
  .checkbox {
    position: relative;
    margin: 0 10px 0 0;
    cursor: pointer;
  }
  .checkbox:before {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    content: "";
    position: absolute;
    left: 0;
    z-index: 1;
    width: 1rem;
    height: 1rem;
    border: 2px solid #d0cece;
  }
  .checkbox:checked:before {
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
    height: .5rem;
    border-color: #009688;
    border-top-style: none;
    border-right-style: none;
  }
  .checkbox:after {
    content: "";
    position: absolute;
    top: -0.125rem;
    left: 0;
    width: 1.1rem;
    height: 1.1rem;
    background: #fff;
    cursor: pointer;
  }
  .scrollbar {
    float: left;
    height: 300px;
    overflow-y: auto;
  }
  #map {
    height: 520px;
    width: 100%;
    background: grey;
        }
  .w3-check {
    width: 15px;
    height: 18px;
  }
  .responsive {
    top: 100%; 
    right: 1%; 
    width:500px;
    height:560px;
    white-space: nowrap; 
    border: 1px #4083c0 solid; 
    font-size: 13.6px!important;
  }

  @media  only screen and (max-width: 500px) {
    .responsive {
      width: 100%;
      height: 350px;
      font-size: 11px!important;
    }
  }
</style>

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini" id="padding-absolute">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheaderadmin')

    @include('adminlte::layouts.partials.sidebaradmin')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{ asset('plugins/bar_chart/Chart.bundle.js.download')}}"></script>
<script src="{{ asset('plugins/bar_chart/utils.js.download') }}"></script>
<script src="{{ asset('js/chart-si-pemandu.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script type="text/javascript">
$(function(){
    var color = Chart.helpers.color;
        var sehatChartData = {
            labels: ["Januari", "Februari", "Maret", "April"],
             datasets: [{
                label: 'Balita',
                backgroundColor: color(window.chartColors.red).alpha(1).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [13, 20, 27, 30]
             }, {
                label: 'Bayi',
                backgroundColor: color(window.chartColors.green).alpha(1).rgbString(),
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: [9, 11, 17, 25]
                }]
             };

            $('#canvassehat').SiPemanduCharts({
                type        : 'bar',
                chartData   : sehatChartData,
                titleText   : 'Kesehatan Balita & Bayi',
                ketId       : 'sehat'
            });

        });

</script>
<script>
function dropdown() {
    var x = document.getElementById("dropdown1");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</html>