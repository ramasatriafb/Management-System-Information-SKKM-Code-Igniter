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
                <li><a href="<?php echo site_url('super_administrator/deskripsi_kegiatan_wajib'); ?>"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan</a></li>
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
                <li><a href="<?php echo site_url('super_administrator/deskripsi_kegiatan_kepanitiaan'); ?>"><i class="fa fa-circle-o"></i> Deskripsi Kegiatan</a></li>
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
            <li class="active">Isi Mahasiswa Peserta MAWAPRES</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Isi Mahasiswa Peserta MAWAPRES</h3>
                </div><!-- /.box-header -->
              <div class="box-body"> <?php echo form_open("super_administrator/submit_mahasiswa_mawapres"); ?>
                  
                  <div class="box-body">
                  <div class="form-group">
                    <label>Nomor SK</label>
                  <input name="nomor_sk" class="form-control" type="text" list="nomor_list" required />
                      <datalist id="nomor_list">
                    <?php foreach($nomor as $each)
                      {
                          ?>
                          <option value="<?=$each['NOMOR']?>"><?=$each['NOMOR']?></option>
                          <?php
                      }
                      ?>?></datalist>
                    </div>
                    <div class="form-group">
                    <label>Pilih Kegiatan</label>
                     <select name = "deskripsi_id"class="form-control select2" style="width: 100%;">
                     <?php foreach($deskripsi as $each)
                      {
                          ?>
                          <option value="<?=$each['ID']?>"><?=$each['NAMA']?><?php echo ' sebagai '?><?=$each['TINGKAT_PARTISIPASI']?><?php echo ' dalam lingkup '?><?=$each['LINGKUP_KEGIATAN']?></option>
                          <?php
                      }
                      ?>?>
                    </select>
                  
                    </div>
                     <div class="form-group">
                   <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th style="width:50px"><input type="checkbox" name="cek" id="cek" onClick="fcek()"/></th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Total Poin</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                    $no=0;
                    $hal=$this->uri->segment(3);
                    $no=$no+$hal;
                      if(isset($mahasiswa_poin)){ 
                      foreach($mahasiswa_poin as $data){ 
                      
                      $no++;
                      ?>
                      <tr>
<td style="width:50px">
                                <input type="checkbox" name="inputcek[]" value=" <?php echo $data['NRP']; ?> " />
                            </td>
                    <td> <?php echo $data['NRP']; ?> </td>
                    <td> <?php echo $data['NAMA']; ?> </td>
                     <td> <?php echo $data['TOTAL_POIN']; ?> </td>
                 
                   
                 
                </tr>
                     <?php
                    }
                    }
                    ?>
                 

                    </tbody>

                  </table>
                   </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan <i class=" fa fa-fw fa-save"></i></button>
                  </div>
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