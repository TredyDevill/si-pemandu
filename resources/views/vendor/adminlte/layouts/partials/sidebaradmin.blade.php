<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ URL::asset('img/logo.png') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
<!--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
              <li class="treeview">
              <a href="/admin">
                <i class="fa fa-bar-chart"></i> <span>Grafik</span></i>
              </a>
              </li>

              <li class="treeview">
              <a href="/admin/maps">
                <i class="fa fa-map-o"></i> <span>Pemetaan</span></i>
              </a>
              </li>

              <li class="treeview">
              <a href="/admin/petugas">
                <i class="fa fa-male"></i> <span>Petugas</span></i>
              </a>
<!--                 <ul class="treeview-menu">
                  <li><a href="/petugas"><i class="fa fa-circle-o"></i> Daftar Petugas </a></li>
                  <li><a href="/tambahpetugas"><i class="fa fa-circle-o"></i> Tambah Petugas </a></li>
                </ul> -->
              </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text"></i> <span>Data Kesehatan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                  <li><a href="/admin/datakms"><i class="fa fa-circle-o"></i> Data KMS </a></li>
                  <li><a href="/admin/datakbbl"><i class="fa fa-circle-o"></i> Data KBBL</a></li>
                  <li><a href="/admin/dataimunisasi"><i class="fa fa-circle-o"></i> Data Imunisasi </a></li>
                  <li><a href="/admin/datavitamin"><i class="fa fa-circle-o"></i> Data Pemberian Vitamin A</a></li>
                  <li><a href="/admin/datakesehatananak"><i class="fa fa-circle-o"></i> Data Kesehatan Anak</a></li>
                </ul>
              </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-file"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                  <li><a href="/admin/laporanbayi"><i class="fa fa-circle-o"></i> Laporan Bayi </a></li>
                  <li><a href="/admin/laporanbalita"><i class="fa fa-circle-o"></i> Laporan Balita</a></li>
                  <li><a href="/admin/pendaftaran"><i class="fa fa-circle-o"></i> Data Pendaftaran</a></li>
                  <li><a href="/admin/datasasaran"><i class="fa fa-circle-o"></i> Data Sasaran </a></li>
                </ul>
              </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
