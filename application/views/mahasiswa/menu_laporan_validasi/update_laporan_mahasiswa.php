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
            <li class="active">Upload Bukti Data Laporan Kegiatan</li>
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
                  <h3 class="box-title">Validasi Kegiatan Mahasiswa</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <?php foreach ($hasil as $data) {           ?>
               
                <?php echo form_open_multipart('mahasiswa/update_laporan_mahasiswa/'.$data['ID']);  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label>Upload Bukti</label>
                      <input class="form-control" name="file" type="file">
                      <span> File maksimal 2 MB dengan format jpg/png/jpeg/pdf</span>
                    </div>
                     <div class="form-group">
                     <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                     </div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" name="submit" value="Validasi" class="btn btn-primary"> 
                  </div>
                </form>
                <?php }?> 
              </div><!-- /.box -->
              </div>
              </div>

              </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </body>
<?php $this->load->view('footer'); ?>
