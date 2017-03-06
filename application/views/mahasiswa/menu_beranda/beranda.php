<?php $this->load->view('header'); ?>
<style type="text/css" >
      .table {
          display: table;
      }
      .tr {
          display: table-row;
      }
      .highlight {
          background-color: greenyellow;
          display: table-cell;
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
          <li class="active treeview">
              <a href="<?php echo site_url('mahasiswa/beranda'); ?>">
                <i class="fa fa-home"></i> <span>Beranda</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('mahasiswa/laporan'); ?>">
                <i class="fa fa-dashboard"></i> <span>Laporan Kegiatan</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('mahasiswa/validasi'); ?>">
                <i class="fa fa-files-o"></i>
                <span>Validasi Kegiatan</span>
               </a>
             
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

  <div class="content-wrapper">
  <section class="content-header">
        
   <h1>
            Jadwal Kegiatan
            </h1>
        <!-- Content Header (Page header) -->
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="#">Laporan Rekap Kegiatan</a></li>
            <li class="active">Data Laporan Kegiatan</li>
          </ol>
        </section>
        <section class="content">
        <?php 
                    $total_poin = 0;
                      foreach($laporan_mahasiswa as $data)
                        $total_poin += $data['POIN']; 
                       foreach($kelas as $data_kelas) if($data_kelas['KELAS']=='D3'){
                        foreach ($minimum_poin as $data_poin) if($total_poin >= $data_poin['MINIMUM_POIN_D3']) echo'
                          <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Poin Anda Saat Ini :</span>
                  <span class="info-box-number">
                    '.$total_poin.'</span>
                  <span class="info-box-text">Anda Telah Memenuhi Syarat Kelulusan <b> '.$data_poin['MINIMUM_POIN_D3'].'</b> Poin</span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->';else echo'
            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-exclamation-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Poin Anda Saat Ini :</span>
                  <span class="info-box-number">
                    '.$total_poin.'</span>
                  <span class="info-box-text">Belum Memenuhi Syarat Kelulusan  <b> '.$data_poin['MINIMUM_POIN_D3'].'</b>  Poin</span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->';
                      }
                         else if ($data_kelas['KELAS']=='D4'){
                          if($total_poin >= $data_poin['MINIMUM_POIN_D4']) echo'
                          <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Poin Anda Saat Ini :</span>
                  <span class="info-box-number">
                    '.$total_poin.'</span>
                  <span class="info-box-text">Anda Telah Memenuhi Syarat Kelulusan <b> '.$data_poin['MINIMUM_POIN_D4'].'</b>  Poin</span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->';else echo'
            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-exclamation-circle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Poin Anda Saat Ini :</span>
                  <span class="info-box-number"> 
                    '.$total_poin.'</span>
                  <span class="info-box-text">Belum Memenuhi Syarat Kelulusan <b> '.$data_poin['MINIMUM_POIN_D4'].'</b>  Poin</span>
                  
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->';
                          }?>
         
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
          <?php 
                   
                      if(isset($jadwal_kegiatan)){ 
                      foreach($jadwal_kegiatan as $data){ 
                      
                      
                      ?>
        <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
           <?php echo $data['TANGGAL_MULAI']; ?>
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
           
            <h3 class="timeline-header"><?php echo $data['NAMA']; ?></h3>

            <div class="timeline-body">
              Deskripsi Kegiatan :<?php echo $data['DESKRIPSI']; ?>
            </div>

            <div class="timeline-footer">
                <H3>Tempat : <?php echo $data['LOKASI_KEGIATAN']; ?></H3>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
</ul>
 <?php 
                    }
                    }
                    ?>
         
        

          </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --><!-- Main content -->
      </div><!-- /.content-wrapper -->
    </body>
<?php $this->load->view('footer'); ?>
