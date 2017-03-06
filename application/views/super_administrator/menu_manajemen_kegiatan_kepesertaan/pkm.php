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
            <li class="active">PKM</li>
          </ol>
        </section>
         <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <div class="col-xs-2"><tr><td><a href="<?php echo site_url('super_administrator/tambah_pkm'); ?>"class="btn btn-block btn-primary">Tambah</a></td></tr></div>
                 <div class="col-xs-3"><tr><td><a href="<?php echo site_url('super_administrator/deskripsi_pkm'); ?>"class="btn btn-warning btn-primary">Tambah Deskripsi  PKM</a></td></tr></div>
                 <div class="col-xs-2"><tr><td><a href="<?php echo site_url('super_administrator/isi_mahasiswa_pkm'); ?>"class="btn btn-success btn-primary">Isi Mahasiswa </a></td></tr></div>
                <div class="col-xs-2"><tr><td><a href="<?php echo site_url('super_administrator/rekap_pkm'); ?>"class="btn btn-danger btn-primary">Rekap Mahasiswa Peserta PKM</a></td></tr></div>
              </div><!-- /.box-header -->
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Kegiatan</th>
                        <th>Kategori PKM</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                    $no=0;
                    $hal=$this->uri->segment(3);
                    $no=$no+$hal;
                      if(isset($pkm)){ 
                      foreach($pkm as $data){ 
                      
                      $no++;
                      ?>
                      <tr>
                    <td> <?php echo $no; ?> </td>
                     <td> <?php echo $data['KODE_KLASIFIKASI']; echo '-';echo $data['KODE_JENIS'];?> </td>
                    <td> <?php echo $data['NAMA']; ?> </td>
                    <td> <?php echo $data['JENIS_KEGIATAN']; ?> </td>
                    <td> <?php echo $data['KATEGORI_PKM']; ?> </td>
                      <td> <a href="update_pkm/<?php echo $data['ID']; ?>"><i class="fa fa-fw fa-edit"></i> </a> | <a href="delete_pkm/<?php echo $data['ID']; ?>"onClick="return doconfirm();">
                <i class=" fa fa-fw fa-remove"></i> </a> </td>
                 
                </tr>
                     <?php
                    }
                    }
                    ?>
                    <script>
function doconfirm()
{
    job=confirm("Apakah Anda yakin untuk menghapus data ini ?");
    if(job!=true)
    {
        return false;
    }
}
</script>
                    </tbody>
                    <tfoot>
                      <tr>
                         <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kegiatan</th>
                        <th>Jenis Kegiatan</th>
                        <th>Kategori PKM</th>
                        <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
       
      </div><!-- /.content-wrapper -->

      <!-- ./wrapper -->
    </body>
<?php $this->load->view('footer'); ?>