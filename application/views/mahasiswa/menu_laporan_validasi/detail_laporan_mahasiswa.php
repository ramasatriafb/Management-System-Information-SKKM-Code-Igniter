<?php $this->load->view('header'); ?>
 <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
           <li class="treeview">
              <a href="<?php echo site_url('mahasiswa/beranda'); ?>">
                <i class="fa fa-home"></i> <span>Beranda</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('mahasiswa/laporan'); ?>">
                <i class="fa fa-dashboard"></i> <span>Laporan Kegiatan</span>
              </a>
              
            </li>
            <li class="active treeview">
              <a href="<?php echo site_url('mahasiswa/validasi'); ?>">
                <i class="fa fa-files-o"></i>
                <span>Validasi Kegiatan</span>
               </a>
             
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
            Detail Kegiatan
            <small>Kepanitiaan dan Kepesertaan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Detail Kegiatan</a></li>
            <li class="active">Data Laporan Kegiatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Deskripsi Kegiatan Mahasiswa</h3>
                </div><!-- /.box-header -->
              <div class="box-body">
                    <?php foreach ($hasil as $deskripsii) {           ?>
                    <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <span><?php echo $deskripsii['NAMA']; ?></span>
                    </select>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                     <span><?php echo $deskripsii['DESKRIPSI']; ?></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lokasi Kegiatan</label>
                      <span><?php echo $deskripsii['LOKASI_KEGIATAN']; ?></span>
                    </div>
                      <div class="form-group">
                    <label>Tanggal Mulai:</label>
                     <span><?php echo $deskripsii['TANGGAL_MULAI']; ?></span>
                  </div><!-- /.form group -->
                   <div class="form-group">
                    <label>Tanggal Akhir:</label>
                      <span><?php echo $deskripsii['TANGGAL_AKHIR']; ?></span>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <?php }?>
                  </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </body>
<?php $this->load->view('footer'); ?>
