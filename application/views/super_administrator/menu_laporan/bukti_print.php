<?php $this->load->view('super_administrator/head'); ?>

                <div  align="left"><img src="<?php echo base_url("assets/img/Logo_PENS.png");?>"  width="100" height="100"></div>
                <div align="center"><h2>Laporan Kredit Kegiatan Mahasiswa</h2> </div>
                
                           <div class="row">
          <div class="col-md-1 col-sm-3 col-xs-6">
              <div class="info-box">
                <div class="info-box">
                <h5> Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <?php foreach($data_mahasiswa as $data) echo $data['NAMA'] ?></h5> 
                <h5>Kelas  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <?php foreach($data_mahasiswa as $data) echo $data['KELAS'] ?></h5>
               
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col --><div class="col-md-1 col-sm-3 col-xs-6">
              <div class="info-box">
                <div class="info-box">
                <h5>NRP  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <?php foreach($data_mahasiswa as $data) echo $data['NRP']?></h5>
               
                <h5>Jurusan &nbsp;&nbsp;&nbsp; :&nbsp; <?php foreach($data_mahasiswa as $data) echo $data['JURUSAN'] ?></h5>
               
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
<table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:50px">No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tingkat Partisipasi</th>
                        <th>Lingkup Kegiatan</th>
                        <th>Poin</th>
                       </tr>
                    </thead>
                    <tbody>
                     <?php 
                    $no=0;$total_poin = 0;
                      if(isset($laporan_mahasiswa)){ 
                      foreach($laporan_mahasiswa as $data){ 
                      
                      $no++;
                      ?>
                      <tr>
                    <td style="width: 50px"> <?php echo $no; ?> </td>
                    <td> <?php echo $data['NAMA_KEGIATAN'] ?> </td>
                    <td> <?php echo $data['TINGKAT_PARTISIPASI']; ?> </td>
                    <td> <?php echo $data['LINGKUP_KEGIATAN']; ?> </td>
                    <td> <?php echo $data['POIN']; ?> </td>
                   
                 
                </tr>
                <?php $total_poin += $data['POIN'];?>
                     <?php 
                    }
                    }
                    ?>
                   
                    </tbody>
                   
                  </table>
                   <?php echo '</tbody>
                                </table>
                            </div>
                        </div>';
                         echo "<tr>
                                        <td><b>Total Poin</b></td>
                                        <td></td>
                                        <td><b><center><h2>".$total_poin."</h2></center></b></td>
                                        <td></td>
                                    </tr>";?>
                                     <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div align="right"><?php echo "Surabaya, " .date("d-m-Y")?>
                                    </div>
                                    <div align="center"><span>Wakil Direktur Bidang Kemahasiswaan</span>
                                    <div align="center"><h5>&nbsp;&nbsp;&nbsp; &nbsp;</h5></div>
                                    <div align="center"><h5>&nbsp;&nbsp;&nbsp; &nbsp;</h5></div>
                                    <div align="center"><h5>&nbsp;&nbsp;&nbsp; &nbsp;</h5></div>
                                    <div align="center"><?php foreach($tanda_tangan as $data) echo $data['NAMA'] ?></div>
                                    </div>
                                    <div align="center"><?php foreach($tanda_tangan as $data) echo $data['NIP'] ?></div>
                                    </div>
                                    <script>

window.load = print_d();
function print_d(){
  window.print();
}
</script>
<?php $this->load->view('super_administrator/foot'); ?>
