<?php $this->load->view('header'); ?>
<style type="text/css">
  label {
    display: inline-block;
}
</style>
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
            <li class="treeview">
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
               <li class="active treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
               </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('administrator/laporan'); ?>"><i class="fa fa-circle-o"></i>  Hasil Inputan Admin </a></li>
                <li><a href="<?php echo site_url('administrator/laporan_validasi_mahasiswa'); ?>"><i class="fa fa-circle-o"></i>  Hasil Validasi Mahasiswa </a></li>
                <li><a href="<?php echo site_url('administrator/rekap_tiap_mahasiswa'); ?>"><i class="fa fa-circle-o"></i>  Rekap Kegiatan Mahasiswa </a></li>
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
            Laporan Rekap Kegiatan
            <small>Kepanitiaan dan Kepesertaan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Rekap Tiap Mahasiswa</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <form id="form-searchadmin" method="post">
                    <label>Pilih Kelas </label>
                     <label><select name = "kelas" id="select_kelas"class="form-control select2" style="width: 100%;">
                     <!--<?php foreach($kelas as $each)
                      {
                          ?>
                          <option value="<?=$each['ID']?>"><?=$each['NAMA']?></option>
                          <?php
                      }
                      ?>?>-->
                      <option value="1 ">1</option>
                      <option value="2 ">2</option>
                      <option value="3 ">3</option>
                      <option value="4 ">4</option>
                    </select></label>
                    <label><select name = "prodi" id="select_kelas"class="form-control select2" style="width: 100%;">
                    <option value="D3 ">D3</option>
                      <option value="D4 ">D4</option>
                    </select></label>
                    <label><select name = "jurusan" id="select_kelas"class="form-control select2" style="width: 100%;">
                    <option value="Elektronika ">Elektronika</option>
                      <option value="Telekomunikasi ">Telekomunikasi</option>
                      <option value="Elektro Industri ">Elektro Industri</option>
                      <option value="Teknik Informatika ">Teknik Informatika</option>
                      <option value="Mekatronika ">Mekatronika</option>
                      <option value="Multimedia Broadcasting ">Multimedia Broadcasting</option>
                      <option value="Teknik Komputer ">Teknik Komputer</option>
                      <option value="Sistem Pembangkitan Energi ">Sistem Pembangkitan Energi</option>
                      <option value="Teknologi Game ">Teknologi Game</option>
                    </select></label>
                    <label><select name = "pararel" id="select_kelas"class="form-control select2" style="width: 100%;">
                    <option value="A">A</option>
                      <option value="B">B</option>
                    </select></label>
                    <button type="submit" class="btn btn-primary"><i class=" fa fa-fw fa-search"></i></button>
                    </div>
                    <div id ="kelasMahasiswa4"></div>
                  </div><!-- /.box-body -->
                 
                </form>
              
                  </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
       
      </div><!-- /.content-wrapper -->

      <!-- ./wrapper -->
    </body>
<?php $this->load->view('footer'); ?>