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
              <a href="<?php echo site_url('administrator/dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Beranda</span> 
              </a>
            </li>
            <li class="active treeview">
              <a href="<?php echo site_url('administrator/manajemen_poin'); ?>">
                <i class="fa fa-pie-chart"></i>
                <span>Manajemen Poin</span>
              </a>
              </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kegiatan Wajib</span>
                 <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
               <li><a href="<?php echo site_url('administrator/kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Kegiatan Wajib </a></li>
               <li><a href="<?php echo site_url('administrator/deskripsi_kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan</a></li>
               <li><a href="<?php echo site_url('administrator/isi_mahasiswa_kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Isi Kegiatan Wajib </a></li>
              </ul>
              </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kegiatan Kepanitiaan</span>
                <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/organisasi_mahasiswa'); ?>"><i class="fa fa-circle-o"></i> Organisasi Mahasiswa </a></li>
                <li><a href="<?php echo site_url('administrator/kepanitiaan_acara'); ?>"><i class="fa fa-circle-o"></i> Kepanitiaan Acara </a></li>
                <li><a href="<?php echo site_url('administrator/deskripsi_kegiatan_kepanitiaan'); ?>"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan</a></li>
               <li><a href="<?php echo site_url('administrator/isi_mahasiswa_kegiatan_kepanitiaan'); ?>"><i class="fa fa-circle-o"></i> Isi Kegiatan Kepanitiaan </a></li>
              </ul>
              </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kegiatan Kepesertaan</span>
               </a>
                <ul class="treeview-menu">
                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan Kepesertaan </a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Edit Poin </a></li>
                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> PKM </a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Mawapres </a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Perlombaan </a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Pelatihan </a></li>
                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Wirausaha</a></li>
              </ul>
               <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
               </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/laporan'); ?>"><i class="fa fa-circle-o"></i>  Hasil Inputan Admin </a></li>
                <li><a href="<?php echo site_url('administrator/laporan_validasi_mahasiswa'); ?>"><i class="fa fa-circle-o"></i>  Hasil Validasi Mahasiswa </a></li>
                <li><a href="<?php echo site_url('administrator/rekap_tiap_mahasiswa'); ?>"><i class="fa fa-circle-o"></i>  Rekap KegiatanMahasiswa </a></li>
              <li><a href="<?php echo site_url('administrator/rekap_alumni'); ?>"><i class="fa fa-circle-o"></i>  Rekap Kegiatan Alumni </a></li>
              </ul>
            
              </li>
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User
            <small>Administrator</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manajemen Kegiatan Kepanitiaan</a></li>
            <li class="active">Edit Poin</li>
          </ol>
        </section>
 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Poin</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php foreach ($hasil as $data) {           ?>
                <?php echo form_open('administrator/update_poin/'.$data['ID']);  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label>Tingkat Partisipasi</label>
                      <input type="text" class="form-control" name="tingkat_partisipasi" value="<?php echo $data['TINGKAT_PARTISIPASI'] ?>"disabled >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tingkat Partisipasi</label>
                      <input type="text" class="form-control" name="lingkup_partisipasi" value="<?php echo $data['LINGKUP_KEGIATAN'] ?>" disabled >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Poin Partisipasi</label>
                      <input type="text" class="form-control" name="poin" value="<?php echo $data['POIN'] ?>">
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <input type="submit" name="submit" value="Update" class="btn btn-primary"> 
                  </div>
                </form>
                <?php }?>  
              </div><!-- /.box -->
              </div>
              </div>

              </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- ./wrapper -->
    </body>
<?php $this->load->view('footer'); ?>