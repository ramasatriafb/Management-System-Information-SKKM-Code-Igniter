 <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Lihat Histori Kegiatan</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                    $no=0;
                    $hal=$this->uri->segment(3);
                    $no=$no+$hal;
                      if(isset($kelas)){ 
                      foreach($kelas as $data){ 
                      
                      $no++;
                      ?>
                      <tr>
                    <td> <?php echo $data['NRP']; ?> </td>
                    <td> <?php echo $data['NAMA']; ?> </td>
                     <td><center><a href="<?php echo site_url('administrator/cetakpdf_laporan/'.$data['NRP']);  ?>">
<i class=" fa fa-fw fa-print"></i> </a>  <a href="detail_rekap_tiap_mahasiswa/<?php echo $data['NRP']; ?>"><i class="fa fa-fw fa-desktop"></i> </a></center></td>
                   
                 
                </tr>
                     <?php
                    }
                    }
                    ?>
                 

                    </tbody>

                  </table>
