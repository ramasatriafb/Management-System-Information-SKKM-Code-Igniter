<?php
Class User extends CI_Model{
    function login($username, $password){
     // $this -> db -> select('user.email as email,user.id as id , password');
      // $this -> db -> from('user , mahasiswa ,pegawai ');
      // $this -> db -> where('user.email', $username);
      // $this -> db -> where('user.password', MD5($password));
      // $this -> db ->group_start();
      // $this -> db -> where('user.email = mahasiswa.email');
      // $this -> db ->or_where('user.email = pegawai.email');
      // $this -> db ->group_end();
      // $this -> db -> limit(1);
 
      // $query = $this -> db -> get();
 
$sql = "SELECT user_.email as email,user_.id as id , password FROM user_ , mahasiswa ,pegawai WHERE
            user_.email='".$username."' AND user_.password ='".MD5($password)."' AND (user_.email = mahasiswa.email OR user_.email = pegawai.email )
             AND ROWNUM <= 1        ";
    
        $query= $this->db->query($sql);
      if($query -> num_rows() == 1){
        return $query->result_array();
      }
      else{
        return false;
      }
    }
 
    function hak_akses($username){
      // $this -> db -> select('kode_akses');
      // $this -> db -> from('hak_akses');
      // $this -> db -> where('email', $username);
      // $this -> db -> limit(1);
 
      // $query = $this -> db -> get();

      $sql = "SELECT kode_akses FROM hak_akses where email = '".$username."' AND ROWNUM <= 1";
      $query=$this->db->query($sql);
 
    if($query -> num_rows() == 1){
      $result = $query->result_array();
      foreach ($result as $row){
        $hak_akses = $row['KODE_AKSES'];
      }
      return $hak_akses;
    }
   
    else{
      return 0;
    }
  }
}
?>
