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
            Validasi Kegiatan
            <small>Kepanitiaan dan Kepesertaan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Validasi Kegiatan</a></li>
            <li class="active">Data Laporan Kegiatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                 </div><!-- /.box-header -->
               <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                       <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tingkat Partisipasi</th>
                        <th>Lingkup Kegiatan</th>
                        <th>Poin</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                    $no=0;$total_poin = 0;
                    $hal=$this->uri->segment(3);
                    $no=$no+$hal;
                      if(isset($laporan_mahasiswa)){ 
                      foreach($laporan_mahasiswa as $data){ 
                      
                      $no++;
                      ?>
                      <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['NAMA_KEGIATAN']; ?> </td>
                    <td> <?php echo $data['TINGKAT_PARTISIPASI']; ?> </td>
                    <td> <?php echo $data['LINGKUP_KEGIATAN']; ?> </td>
                    <td> <?php echo $data['POIN']; ?> </td>
    <td> <a href="detail_laporan_mahasiswa/<?php echo $data['ID_DESKRIPSI']; ?>"onClick="return doconfirm();">
<i class=" fa fa-fw fa-desktop"></i> </a> | <a href="update_laporan_mahasiswa/<?php echo $data['ID']; ?>"><i class="fa fa-fw fa-edit"></i> </a> </td>
 
</tr>
                     <?php
                      $total_poin += $data['POIN'];
                    }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tingkat Partisipasi</th>
                        <th>Lingkup Kegiatan</th>
                        <th>Poin</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                  <?php echo '</tbody>
                                </table>
                            </div>
                        </div>';
                         echo "<tr>
                                        <td><b>Total Poin</b></td>
                                        <td></td>
                                        <td><b><center><font size='18'>".$total_poin."</font></center></b></td>
                                        <td></td>
                                    </tr>";?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </body>
<?php $this->load->view('footer'); ?>
