 <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th style="width:50px"><input type="checkbox" name="cek" id="cek" onClick="fcek()"/></th>
                        <th>NRP</th>
                        <th>Nama</th>
                        
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
<td style="width:50px">
                                <input type="checkbox" name="inputcek[]" value=" <?php echo $data['NRP']; ?> " />
                            </td>
                    <td> <?php echo $data['NRP']; ?> </td>
                    <td> <?php echo $data['NAMA']; ?> </td>
                 
                   
                 
                </tr>
                     <?php
                    }
                    }
                    ?>
                 

                    </tbody>

                  </table>
