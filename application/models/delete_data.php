<?php
Class delete_data extends CI_Model
{
	 //super administrator
   function delete_user($ID) {
      $sql = "DELETE FROM hak_akses WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
      // $this->db->delete('hak_akses', array('id' => $id));
    }
   function log_delete_user($user){
       $aktivitas = 'Menghapus Data User Administrator';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data User Administrator';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
   }
   function delete_batas_waktu($ID) {
      $sql = "DELETE FROM batas_waktu WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
      // $this->db->delete('hak_akses', array('id' => $id));
    }
	function log_delete_batas_waktu($user){
       $aktivitas = 'Menghapus Data Batas Waktu Aktifitas Input Pada Data Sistem';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }

	//administrator

    //manajemen poin
    function delete_poin($ID) {
      // $this->db->delete('tingkat_poin', array('id' => $id));
         $sql = "DELETE FROM tingkat_poin WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
    }
    function log_delete_poin($user){
     $aktivitas = 'Menghapus Data Jenis Poin Kegiatan';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Jenis Poin Kegiatan';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
    }

    //kegiatan wajib
      //kegiatan wajib
    function delete_kegiatan_wajib($ID) {
      // $this->db->delete('kegiatan', array('id' => $id));
       $sql = "DELETE FROM kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
    }
    function log_delete_kegiatan_wajib($user){
      $aktivitas = 'Menghapus Data Kegiatan Wajib';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Kegiatan Wajib';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
  }
      //deskripsi kegiatan wajib  
    function delete_deskripsi_kegiatan_wajib($ID) {
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
      // $this->db->delete('deskripsi_kegiatan', array('id' => $id));
    }
    function log_delete_poin_deskripsi_kegiatan_wajib($user){
        $aktivitas = 'Menghapus Data Deskripsi Kegiatan Wajib';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Deskripsi Kegiatan Wajib';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
    }


    //kegiatan kepanitiaan
      //organisasi Mahasiswa
	  function delete_ormawa($ID) {
      $sql = "DELETE FROM kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
      // $this->db->delete('kegiatan', array('id' => $id));
    }
    function log_delete_ormawa($user){
       $aktivitas = 'Menghapus Data Kegiatan Organisasi Mahasiswa';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Kegiatan Organisasi Mahasiswa';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
    }

      //panitia acara
    function delete_kepanitiaan_acara($ID) {
      $sql = "DELETE FROM kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
      // $this->db->delete('kegiatan', array('id' => $id));
    }
    function log_delete_kepanitiaan_acara($user){
       $aktivitas = 'Menghapus Data Kegiatan Kepanitiaan Acara';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Kegiatan Kepanitiaan Acara';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
    }
      
    //Deskripsi Kegiatan Kepanitiaan
    function  delete_deskripsi_kegiatan_kepanitiaan($ID){
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
       // $this->db->delete('deskripsi_kegiatan', array('id' => $id));
    }
    function log_delete_deskripsi_kegiatan_kepanitiaan($user){
         $aktivitas = 'Menghapus Data Deskripsi Kegiatan Kepanitiaan';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Deskripsi Kegiatan Kepanitiaan';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
    }

    //Kegiatan Kepesertaan
    //PKM
    function delete_pkm($ID) {
      // $this->db->delete('kegiatan', array('id' => $id));
       $sql = "DELETE FROM kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
    }
    function log_delete_pkm($user){
      $aktivitas = 'Menghapus Data Kegiatan PKM';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }
      //Deskripsi Kegiatan PKM
    function  delete_deskripsi_kegiatan_pkm($ID){
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
       // $this->db->delete('deskripsi_kegiatan', array('id' => $id));
    }
    function log_delete_deskripsi_kegiatan_pkm($user){
         $aktivitas = 'Menghapus Data Deskripsi Kegiatan PKM';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }
        //MAWAPRES
      function delete_mawapres($ID) {
      // $this->db->delete('kegiatan', array('id' => $id));
       $sql = "DELETE FROM kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
    }
  
    function log_delete_mawapres($user){
      $aktivitas = 'Menghapus Data Kegiatan MAWAPRES';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }
      //Deskripsi Kegiatan PKM
    function  delete_deskripsi_kegiatan_mawapres($ID){
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
       // $this->db->delete('deskripsi_kegiatan', array('id' => $id));
    }
    function log_delete_deskripsi_kegiatan_mawapres($user){
         $aktivitas = 'Menghapus Data Deskripsi Kegiatan MAWAPRES';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }
      //Perlombaan
      function  delete_deskripsi_kegiatan_perlombaan($ID){
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
       }
    function log_delete_deskripsi_kegiatan_perlombaan($user){
         $aktivitas = 'Menghapus Data Deskripsi Kegiatan Perlombaan';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }
      //Wirausaha
      function  delete_deskripsi_kegiatan_wirausaha($ID){
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
       }
    function log_delete_deskripsi_kegiatan_wirausaha($user){
         $aktivitas = 'Menghapus Data Deskripsi Kegiatan Wirausaha';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }
      //Workshop
       function  delete_deskripsi_kegiatan_workshop_seminar($ID){
      $sql = "DELETE FROM deskripsi_kegiatan WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
       }
    function log_delete_deskripsi_kegiatan_workshop_seminar($user){
         $aktivitas = 'Menghapus Data Deskripsi Kegiatan Workshop & Seminar';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      }

    //Laporan
    //Hasil Input Admin

    function delete_laporan_mahasiswa($ID) {
      // $this->db->delete('kegiatan_mahasiswa', array('id' => $id));
       $sql = "DELETE FROM kegiatan_mahasiswa WHERE id = '".$ID."'";
        
        $query = $this->db->query($sql);
        return $query;
    }
    function log_delete_laporan_mahasiswa($user){
      $aktivitas = 'Menghapus Data Laporan Kegiatan Mahasiswa';
    $datetime = date('d-m-y : H-i-s');
        
            $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
      // $aktivitas = 'Menghapus Data Laporan Kegiatan Mahasiswa';
      // $simpan_data=array(
      //   'nama_user'   =>$user['email'],
      //   'aktivitas'   =>$aktivitas,
      //   );
      // $this->db->set('waktu_log','NOW()',FALSE);
      // $simpan = $this->db->insert('log_skkm', $simpan_data);
      // return $simpan;
    }
    

      
}
?>

	 
