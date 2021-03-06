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
              <a href="<?php echo site_url('super_administrator/dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Beranda</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Pilihan</span>
                 <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo site_url('super_administrator/manajemen_user'); ?>"><i class="fa fa-circle-o"></i> User & Sistem </a></li>
                <li><a href="<?php echo site_url('super_administrator/log'); ?>"><i class="fa fa-circle-o"></i> Log Sistem </a></li>
               <li><a href="<?php echo site_url('super_administrator/manajemen_poin'); ?>"><i class="fa fa-circle-o"></i> Poin </a></li>
              </ul>
              </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kegiatan Wajib</span>
                 <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo site_url('super_administrator/kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Kegiatan Wajib </a></li>
                <li><a href="<?php echo site_url('super_administrator/deskripsi_kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan </a></li>
                <li><a href="<?php echo site_url('super_administrator/isi_mahasiswa_kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Isi Kegiatan Wajib </a></li>
              </ul>
              </li>
             <li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kegiatan Kepanitiaan</span>
                <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
               <li><a href="<?php echo site_url('super_administrator/organisasi_mahasiswa'); ?>"><i class="fa fa-circle-o"></i> Organisasi Mahasiswa </a></li>
                <li><a href="<?php echo site_url('super_administrator/kepanitiaan_acara'); ?>"><i class="fa fa-circle-o"></i> Kepanitiaan Acara </a></li>
                <li><a href="<?php echo site_url('super_administrator/deskripsi_kegiatan_kepanitiaan'); ?>"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan </a></li>
               <li><a href="<?php echo site_url('super_administrator/isi_mahasiswa_kegiatan_kepanitiaan'); ?>"><i class="fa fa-circle-o"></i> Isi Kegiatan Kepanitiaan </a></li>
               </ul>
              </li>
             <li class="active treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kegiatan Kepesertaan</span>
                <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo site_url('super_administrator/pkm'); ?>"><i class="fa fa-circle-o"></i> PKM </a></li>
                <li><a href="<?php echo site_url('super_administrator/mawapres'); ?>"><i class="fa fa-circle-o"></i> MAWAPRES </a></li>
                <li><a href="<?php echo site_url('super_administrator/perlombaan'); ?>"><i class="fa fa-circle-o"></i> Perlombaan </a></li>
                <!--<li><a href="<?php echo site_url('super_administrator/wirausaha'); ?>"><i class="fa fa-circle-o"></i> Wirausaha</a></li>-->
                <li><a href="<?php echo site_url('super_administrator/workshop_seminar'); ?>"><i class="fa fa-circle-o"></i> Workshop & Seminar </a></li>
               </ul>
             </li>
               <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
               </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo site_url('super_administrator/laporan'); ?>"><i class="fa fa-circle-o"></i>  Hasil Inputan Admin </a></li>
                <li><a href="<?php echo site_url('super_administrator/laporan_validasi_mahasiswa'); ?>"><i class="fa fa-circle-o"></i>  Hasil Validasi Mahasiswa </a></li>
                <li><a href="<?php echo site_url('super_administrator/rekap_tiap_mahasiswa'); ?>"><i class="fa fa-circle-o"></i>  Rekap Kegiatan Mahasiswa </a></li>
              <li><a href="<?php echo site_url('super_administrator/rekap_alumni'); ?>"><i class="fa fa-circle-o"></i>  Rekap Kegiatan Alumni </a></li>
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
            <small>Super Administrator</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Kegiatan Kepesertaan</a></li>
            <li><a href="#">PKM</a></li>
            <li class="active">Edit PKM</li>
          </ol>
        </section>
          <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit PKM</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <?php foreach ($hasil as $data) {           ?>
                <?php echo form_open('super_administrator/update_pkm/'.$data['ID']);  ?>
                  <div class="box-body">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <input type="text" class="form-control" name="nama" value="<?php echo $data['NAMA'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kegiatan</label>
                      <input type="text" class="form-control" name="jenis_kegiatan" value="<?php echo $data['JENIS_KEGIATAN'] ?>"disabled >
                    </div>
                    <div class="form-group">
                    <label>Pilih Kategori PKM</label>
                    <select name="kategori_pkm"class="form-control select2" style="width: 100%;">
                       <option <?php if($data['PKM_ID']=='1') echo "selected=selected"; ?> value = "1">PKM P (PKM Penelitian)</option>
                      <option <?php if($data['PKM_ID']=='2') echo "selected=selected"; ?> value = "2">PKM T (PKM Penerapan Teknologi)</option>
                      <option <?php if($data['PKM_ID']=='3') echo "selected=selected"; ?> value = "3">PKM K (PKM Kewirausahaan)</option>
                      <option <?php if($data['PKM_ID']=='4') echo "selected=selected"; ?> value = "4">PKM M (PKM Pengabdian Masyarakat)</option>
                      <option <?php if($data['PKM_ID']=='5') echo "selected=selected"; ?> value = "5">PKM KC (PKM Karya Cipta)</option>
                      <option <?php if($data['PKM_ID']=='6') echo "selected=selected"; ?> value = "6">PKM AI (PKM Artikel Ilmiah)</option>
                      <option <?php if($data['PKM_ID']=='7') echo "selected=selected"; ?> value = "7">PKM GT (PKM Gagasan Tertulis)</option>
                      </select>
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