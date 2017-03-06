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
            <li class="active treeview">
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
           <li class="treeview">
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
            <li><a href="#">Kegiatan Kepanitiaan</a></li>
            <li class="active">Deskripsi Kegiatan Kepanitiaan</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Deskripsi Kegiatan Kepanitiaan Mahasiswa</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open("super_administrator/submit_deskripsi_kegiatan_kepanitiaan"); ?>
                  <div class="box-body">
                    <div class="form-group">
                    <label>Pilih Nama Kegiatan</label>
                    <select name = "nama"class="form-control select2" style="width: 100%;">
                     <?php foreach($nama_kegiatan_kepanitiaan as $each)
                      {
                          ?>
                          <option value="<?=$each['ID']?>"><?=$each['NAMA']?></option>
                          <?php
                      }
                      ?>?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea name ="deskripsi"class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lokasi Kegiatan</label>
                      <input type="text" name="lokasi_kegiatan"class="form-control" id="exampleInputEmail1"value="Politeknik Elekronika Negeri Surabaya">
                    </div>
                      <div class="form-group">
                    <label>Tanggal Mulai: hh/bb/tttt</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date"name="tgl_mulai" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                   <div class="form-group">
                    <label>Tanggal Akhir: hh/bb/tttt</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="tgl_akhir"class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div><!-- /.input group -->
                     <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Poin</label>
                        <select name = "tingkat_poin_id1"class="form-control select2" style="width: 100%;">
                     <?php foreach($poin as $each)
                      {
                          ?>
                          <option value="<?=$each['ID']?>"><?php echo ' Sebagai '?><?=$each['TINGKAT_PARTISIPASI']?><?php echo ' dalam lingkup '?><?=$each['LINGKUP_KEGIATAN']?><?php echo ' ( '?><?=$each['POIN']?><?php echo ')'?></option>
                          <?php
                      }
                      ?>?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Poin</label>
                        <select name = "tingkat_poin_id2"class="form-control select2" style="width: 100%;">
                     <?php foreach($poin1 as $each)
                      {
                          ?>
                          <option value="<?=$each['ID']?>"><?php echo ' Sebagai '?><?=$each['TINGKAT_PARTISIPASI']?><?php echo ' dalam lingkup '?><?=$each['LINGKUP_KEGIATAN']?><?php echo ' ( '?><?=$each['POIN']?><?php echo ')'?></option>
                          <?php
                      }
                      ?>?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Poin</label>
                        <select name = "tingkat_poin_id3"class="form-control select2" style="width: 100%;">
                     <?php foreach($poin2 as $each)
                      {
                          ?>
                          <option value="<?=$each['ID']?>"><?php echo ' Sebagai '?><?=$each['TINGKAT_PARTISIPASI']?><?php echo ' dalam lingkup '?><?=$each['LINGKUP_KEGIATAN']?><?php echo ' ( '?><?=$each['POIN']?><?php echo ')'?></option>
                          <?php
                      }
                      ?>?>
                    </select>
                    </div>
                   
                  </div><!-- /.form group -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
              </div>
              </div>

              </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
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
                    $no=0;
                    $hal=$this->uri->segment(3);
                    $no=$no+$hal;
                      if(isset($deskripsi)){ 
                      foreach($deskripsi as $data){ 
                      
                      $no++;
                      ?>
                      <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['NAMA']; ?> </td>
                    <td> <?php echo $data['TINGKAT_PARTISIPASI']; ?> </td>
                    <td> <?php echo $data['LINGKUP_KEGIATAN']; ?> </td>
                    <td> <?php echo $data['POIN']; ?> </td>
                    <td> <a href="detail_deskripsi_kegiatan_kepanitiaan/<?php echo $data['ID']; ?>"><i class="fa fa-fw fa-desktop"></i> </a> | <a href="update_deskripsi_kegiatan_kepanitiaan/<?php echo $data['ID']; ?>"><i class="fa fa-fw fa-edit"></i> </a> | <a href="delete_deskripsi_kegiatan_kepanitiaan/<?php echo $data['ID']; ?>"onClick="return doconfirm();">
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
                        <th>Nama Kegiatan</th>
                        <th>Tingkat Partisipasi</th>
                        <th>Lingkup Kegiatan</th>
                        <th>Poin</th>
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