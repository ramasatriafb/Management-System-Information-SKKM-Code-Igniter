<?php
Class Query extends CI_Model{

  //Query Super Administrator
  function getAllPegawai(){
    $sql = ("SELECT a.email,b.email,b.nama FROM user_ a,pegawai b WHERE a.email=b.email ORDER BY b.nama asc");
     $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('a.email,b.email,b.nama')-> from ('user a,pegawai b')->where('a.email=b.email')->order_by("b.nama","asc");
    // $query=$this->db->get();
    // return $query->result_array();
    }


    function query_batas_waktu(){
      $sql =("SELECT id as id,tgl_awal as tgl_awal,tgl_akhir as tgl_akhir FROM batas_Waktu ORDER by id desc");
       $query = $this->db->query($sql);
   return $query->result_array();

    }
     function getByIdbatas_waktu($ID){
      $sql = ("SELECT * FROM batas_Waktu  WHERE id = ?");
      $query = $this->db->query($sql,$ID);
   return $query->result_array();
      // return $this->db->get_where('hak_akses', array('id' => $id))->row();

  }
  
  function query_user_admin(){
    $sql = ("SELECT a.id as id,a.email,a.kode_akses,b.email,b.nama,a.waktu_create,a.waktu_modify,a.created_by,a.updated_by FROM hak_akses a,pegawai b,user_ c
      WHERE a.email=b.email AND a.email=c.email AND a.kode_akses <> 0 ORDER BY a.id asc");
     $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('a.id as id,a.email,a.kode_akses,b.email,b.nama')-> from ('hak_akses a,pegawai b,user c')->where('a.email=b.email')->where('a.email=c.email')->where('a.kode_akses <> 0');
    // $query=$this->db->get();
    // return $query->result();
  }

  function getByIdAkses($ID){
      $sql = ("SELECT * FROM hak_akses  WHERE id = ?");
      $query = $this->db->query($sql,$ID);
   return $query->result_array();
      // return $this->db->get_where('hak_akses', array('id' => $id))->row();

  }

   function getByNamePegawai($ID){
      $sql = ("SELECT a.email,b.email,b.nama,c.id FROM user_ a,pegawai b, hak_akses c WHERE a.email=b.email and a.email = c.email and c.id = ? ORDER BY b.nama asc");
      $query = $this->db->query($sql,$ID);
   return $query->result_array();
      // return $this->db->get_where('hak_akses', array('id' => $id))->row();

  }

  function query_log(){
     $sql = ("SELECT id,nama_user,aktivitas,waktu_log FROM log_skkm ORDER BY id DESC ");
     $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('id,nama_user,aktivitas,waktu_log')-> from ('log_skkm')->order_by("id","desc")->limit('2000');
    // $query=$this->db->get();
    // return $query->result();
    }

  // function query_laporan(){
  //   $this->db->distinct()->select('e.nrp  ,e.nama ,a.jenis_kegiatan , b.nama_kegiatan ,a.poin_kegiatan,b.id as id_deskripsi,c.id')
  //   ->from('poin_kegiatan a,deskripsi b,kegiatan_mahasiswa c ,user d,mahasiswa e')->where('a.id = c.id_poin_kegiatan')
  //   ->where ('b.id = c.id_deskripsi')->where('c.id_user = e.nrp')->order_by("b.id","desc");
  //   $query=$this->db->get();
  //   return $query->result(); 
  // }
  // function query_laporan1(){
  //   $this->db->distinct()->select('c.id as id,e.nrp  ,e.nama ,a.jenis_kegiatan , b.nama_kegiatan ,a.poin_kegiatan,c.bukti,b.id as id_deskripsi,c.id')
  //   ->from('poin_kegiatan a,deskripsi b,kegiatan_mahasiswa c ,user d,mahasiswa e')->where('a.id = c.id_poin_kegiatan')
  //   ->where ('b.id = c.id_deskripsi')->where('c.id_user = e.nrp')->where('c.bukti is not null')->where('c.validasi is null')->order_by("b.id","desc");
  //   $query=$this->db->get();
  //   return $query->result(); 
  // }
  // function query_laporan_tervalidasi(){
  //   $this->db->distinct()->select('c.id as id,e.nrp  ,e.nama ,a.jenis_kegiatan , b.nama_kegiatan ,a.poin_kegiatan,c.bukti,b.id as id_deskripsi,c.waktu_validasi_admin')
  //   ->from('poin_kegiatan a,deskripsi b,kegiatan_mahasiswa c ,user d,mahasiswa e')->where('a.id = c.id_poin_kegiatan')
  //   ->where ('b.id = c.id_deskripsi')->where('c.id_user = e.nrp')->where('c.bukti is not null')->where('c.validasi is not null')->order_by("c.waktu_validasi_admin","desc");
  //   $query=$this->db->get();
  //   return $query->result(); 
  // }

  //Query Administrator

  //dashboard
    function query_tahun_kegiatan(){
      $sql = ("SELECT * from tahun order by id desc");
      $query = $this -> db -> query($sql)->result_array();
    return $query;
    }
    function query_akumulasi(){
      $sql=("SELECT SUM(jumlah) as jumlah,tahun from jumlah_akumulasi group by tahun");
      $query = $this -> db -> query($sql)->result_array();
    return $query;
    }
  function query_count_wajib($tahun){
    $sql=("SELECT count (*)  from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c, kegiatan d, jenis_kegiatan e where a.nrp = b.nrp and b.deskripsi_id = c.id and c.jenis_kegiatan_id = d.id and d.status_id = e.id and e.jenis_kegiatan ='Kegiatan Wajib'
and EXTRACT( YEAR FROM b.tahun) = ?");
    $query = $this -> db -> query($sql,$tahun)->row_array();
    return $query;
  }

  function query_count_ormawa($tahun){
    $sql=("SELECT count (*)  from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c, kegiatan d, jenis_kegiatan e where a.nrp = b.nrp and b.deskripsi_id = c.id and c.jenis_kegiatan_id = d.id and d.status_id = e.id and e.jenis_kegiatan ='Organisasi Mahasiswa' and EXTRACT( YEAR FROM b.tahun) = ?");// and b.bukti is not null and b.validasi is not null
    $query = $this -> db -> query($sql,$tahun)->row_array();
    return $query;
  }

  function query_count_ukm($tahun){
    $sql=("SELECT count(*)   from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c, kegiatan d, jenis_kegiatan e where a.nrp = b.nrp and b.deskripsi_id = c.id and c.jenis_kegiatan_id = d.id and d.status_id = e.id and e.jenis_kegiatan ='Unit Kegiatan Mahasiswa' and EXTRACT( YEAR FROM b.tahun) = ?");
    $query = $this -> db -> query($sql,$tahun)->row_array();
    return $query;
  }

  function query_count_panitia($tahun){
    $sql=("SELECT count(*)  from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c, kegiatan d, jenis_kegiatan e where a.nrp = b.nrp and b.deskripsi_id = c.id and c.jenis_kegiatan_id = d.id and d.status_id = e.id and e.jenis_kegiatan ='Panitia Acara' and EXTRACT( YEAR FROM b.tahun) = ?");
    $query = $this -> db -> query($sql,$tahun)->row_array();
    return $query ;
  }
  //manajemen poin

  function query_tabel_poin(){
   $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin,b.kode as kode_partisipasi,c.kode as kode_lingkup
    FROM tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id and lingkup_partisipasi_id = c.id  order by id asc");
   $query = $this->db->query($sql);
   return $query->result_array();
   //  $this->db->select('a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin,b.kode as kode_partisipasi,c.kode as kode_lingkup')
   //  ->from('tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c')->where('a.tingkat_partisipasi_id = b.id')->where('lingkup_partisipasi_id = c.id');
   // $query=$this->db->get();
   //  return $query->result(); 
  }
  function query_tabel_poin_super(){
   $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin,a.created_by as created_by,a.updated_by as updated_by,
    a.waktu_create,a.waktu_modify,b.kode as kode_partisipasi,c.kode as kode_lingkup
    FROM tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id and lingkup_partisipasi_id = c.id  order by id asc");
   $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_minimum_poin(){
    $sql=("SELECT * FROM minimum_poin where id=(select max(id) from minimum_poin)");
    $query = $this->db->query($sql);
   return $query->result_array();
 }

  function query_tingkat_partisipasi(){
    $sql=("SELECT * FROM tingkat_partisipasi");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('*')->from('tingkat_partisipasi');
    // $query=$this->db->get();
    // return $query->result_array();
  }
   function query_lingkup_partisipasi(){
    $sql=("SELECT * FROM lingkup_partisipasi");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('*')->from('lingkup_partisipasi');
    // $query=$this->db->get();
    // return $query->result_array();
  }

   function getByIDTingkatPoin($ID){
    $sql = ("SELECT a.id as id,b.id,b.tingkat_partisipasi as tingkat_partisipasi , c.id, c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin from tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c where a.tingkat_partisipasi_id = b.id and lingkup_partisipasi_id = c.id and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }

    //kegiatan wajib
        //Kegiatan Wajib
  function query_kegiatan_wajib(){
    $sql = ("SELECT a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi from kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c
     where a.status_id = b.id and b.jenis_kegiatan = 'Kegiatan Wajib'and b.klasifikasi_id = c.id");
    $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi')->from('kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c')->where('a.status_id = b.id')->where('b.jenis_kegiatan = "Kegiatan Wajib"')->where('b.klasifikasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result();

  }

  function query_jenis_kegiatan_wajib(){
    $sql=("SELECT * FROM jenis_kegiatan WHERE jenis_kegiatan = 'Kegiatan Wajib'");
    $query = $this->db->query($sql);
   return $query->result_array();
   // $this->db->select('*')->from('jenis_kegiatan')->where('jenis_kegiatan = "Kegiatan Wajib"');
    // $query = $this->db->get();
    // return $query->result_array();
  }

  function getByIDKegiatanWajib($ID){
    $sql=("SELECT a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan from kegiatan a,jenis_kegiatan b 
      where a.status_id = b.id and b.jenis_kegiatan = 'Kegiatan Wajib' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }

    //Deskripsi Kegiatan Wajib

  function query_kegiatan_wajib1(){
    $sql =("SELECT a.id as id,a.nama as nama FROM kegiatan a,jenis_kegiatan b WHERE status_id = b.id AND b.jenis_kegiatan = 'Kegiatan Wajib'");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('a.id as id,a.nama as nama')->from('kegiatan a,jenis_kegiatan b')->where('a.status_id = b.id')->where('b.jenis_kegiatan = "Kegiatan Wajib"');
    // $query=$this->db->get();
    // return $query->result_array();
  }

  function query_poin_wajib(){
    $sql =("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin FROM 
    tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id AND b.tingkat_partisipasi = 'Peserta' ORDER BY a.poin asc ");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin')
    // ->from('tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c')->where('a.tingkat_partisipasi_id = b.id')->where('lingkup_partisipasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result_array(); 
  }

  function query_deskripsi_wajib(){
    $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir 
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g WHERE 
      a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id AND
       b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Wajib' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir')
    // ->from('deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g')
    // ->where('a.jenis_kegiatan_id = b.id')->where('a.tingkat_poin_id = c.id')->where('c.tingkat_partisipasi_id = d.id')
    // ->where('c.lingkup_partisipasi_id = e.id')->where('b.status_id = f.id')->where('f.klasifikasi_id = g.id')->where('g.klasifikasi = "Kegiatan Wajib"')->order_by("a.id","desc");
    // $query=$this->db->get();
    // return $query->result();
  }
  
  function getByIdDeskripsiWajib($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
       and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Wajib' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }

  // Isi Kegiatan Wajib
  function query_nomor_sk_wajib(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'Wajib' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_nomor_sk_kepanitiaan(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'Kepanitiaan' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_deskripsi_wajib1(){
   $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
    FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
    WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
    AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Wajib' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
   $query = $this->db->query($sql);
   return $query->result_array();
   // $this->db->select('a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir')
   //  ->from('deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g')
   //  ->where('a.jenis_kegiatan_id = b.id')->where('a.tingkat_poin_id = c.id')->where('c.tingkat_partisipasi_id = d.id')
   //  ->where('c.lingkup_partisipasi_id = e.id')->where('b.status_id = f.id')->where('f.klasifikasi_id = g.id')->where('g.klasifikasi = "Kegiatan Wajib"');
   //  $query=$this->db->get();
   //  return $query->result_array();
  
  }

  //Kegiatan Kepanitiaan
      //Organisasi Mahasiswa

  function query_ormawa(){
    $sql=("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi,a.status_kegiatan as status_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id 
      AND (b.jenis_kegiatan = 'Organisasi Mahasiswa' OR b.jenis_kegiatan = 'Unit Kegiatan Mahasiswa') AND b.klasifikasi_id = c.id");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi ')->from('kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c')->where('a.status_id = b.id')
    // ->group_start()->where('b.jenis_kegiatan = "Organisasi Mahasiswa"')->or_where('b.jenis_kegiatan = "Unit Kegiatan Mahasiswa"')->group_end()->where('b.klasifikasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result();

  }

  function query_jenis_kegiatan_ormawa(){
    $sql = ("SELECT id,jenis_kegiatan FROM jenis_kegiatan WHERE jenis_kegiatan = 'Organisasi Mahasiswa' OR jenis_kegiatan = 'Unit Kegiatan Mahasiswa'"); 
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('id,jenis_kegiatan')->from('jenis_kegiatan')->where('jenis_kegiatan = "Organisasi Mahasiswa"')->or_where('jenis_kegiatan = "Unit Kegiatan Mahasiswa"');
    // $query = $this->db->get();
    // return $query->result_array();
  }

  function getByIdOrmawa($ID){
    $sql=("SELECT a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan,a.status_kegiatan as status_kegiatan from kegiatan a,jenis_kegiatan b where a.status_id = b.id and (b.jenis_kegiatan = 'Organisasi Mahasiswa' or b.jenis_kegiatan = 'Unit Kegiatan Mahasiswa') and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }

    //Kepanitiaan Acara

  function query_kepanitiaan_acara(){
    $sql = ("SELECT a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi 
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id AND b.jenis_kegiatan = 'Panitia Acara' AND b.klasifikasi_id = c.id");
    $query = $this -> db -> query($sql);
    return $query->result_array();
    //  $this->db->select('a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi')->from('kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c')->where('a.status_id = b.id')->where('b.jenis_kegiatan = "Panitia Acara"')->where('b.klasifikasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result();
  }

  function query_jenis_kegiatan_kepanitiaan_acara(){
    $sql = ("SELECT * FROM jenis_kegiatan WHERE jenis_kegiatan = 'Panitia Acara'");
    $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('*')->from('jenis_kegiatan')->where('jenis_kegiatan = "Panitia Acara"');
    // $query = $this->db->get();
    // return $query->result_array();

  }

  function getByIdKepanitiaan_Acara($ID){
     $sql=("SELECT a.id as id,a.nama as nama,b.jenis_kegiatan as jenis_kegiatan from kegiatan a,jenis_kegiatan b where a.status_id = b.id and b.jenis_kegiatan = 'Panitia Acara' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }

      
    //Deskripsi Kegiatan Kepanitiaan

  function query_kegiatan_kepanitiaan1(){
     $sql = ("SELECT a.id as id,a.nama as nama FROM kegiatan a,jenis_kegiatan b WHERE a.status_id = b.id AND (b.jenis_kegiatan = 'Organisasi Mahasiswa' 
      OR b.jenis_kegiatan = 'Unit Kegiatan Mahasiswa' OR b.jenis_kegiatan = 'Panitia Acara') AND a.status_kegiatan = 'Aktif' order by b.jenis_kegiatan");
     $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('a.id as id,a.nama as nama')->from('kegiatan a,jenis_kegiatan b')->where('a.status_id = b.id')->group_start()->where('b.jenis_kegiatan = "Organisasi Mahasiswa"')
    // ->or_where('b.jenis_kegiatan = "Unit Kegiatan Mahasiswa"')->or_where('b.jenis_kegiatan = "Panitia Acara"')->group_end();
    // $query=$this->db->get();
    // return $query->result_array();
  }

  function query_poin_kepanitiaan(){
     $sql = ("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin 
     FROM tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id 
     AND b.tingkat_partisipasi = 'Ketua' AND c.lingkup_kegiatan = 'Internal Kampus'");
     $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin')
    // ->from('tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c')->where('a.tingkat_partisipasi_id = b.id')->where('lingkup_partisipasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result_array(); 
  }
  function query_poin_kepanitiaan1(){
     $sql = ("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin 
     FROM tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id 
     AND b.tingkat_partisipasi = 'Menteri / Kadiv / Bendahara' AND c.lingkup_kegiatan = 'Internal Kampus'");
     $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin')
    // ->from('tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c')->where('a.tingkat_partisipasi_id = b.id')->where('lingkup_partisipasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result_array(); 
  }
  function query_poin_kepanitiaan2(){
     $sql = ("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin 
     FROM tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id 
     AND b.tingkat_partisipasi = 'Anggota / Staff' AND c.lingkup_kegiatan = 'Internal Kampus'");
     $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin')
    // ->from('tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c')->where('a.tingkat_partisipasi_id = b.id')->where('lingkup_partisipasi_id = c.id');
    // $query=$this->db->get();
    // return $query->result_array(); 
  }

  function query_deskripsi_kepanitiaan(){
    $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepanitiaan' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
     $query = $this -> db -> query($sql);
    return $query->result_array();
    // $this->db->select('a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir')
    // ->from('deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g')
    // ->where('a.jenis_kegiatan_id = b.id')->where('a.tingkat_poin_id = c.id')->where('c.tingkat_partisipasi_id = d.id')
    // ->where('c.lingkup_partisipasi_id = e.id')->where('b.status_id = f.id')->where('f.klasifikasi_id = g.id')->where('g.klasifikasi = "Kegiatan Kepanitiaan"')->order_by("a.id","desc");
    // $query=$this->db->get();
    // return $query->result();
  }
  
  function getByIdDeskripsiKepanitiaan($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
       and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Kepanitiaan' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }

  // Isi Kegiatan Kepanitiaan
  function query_deskripsi_kepanitiaan1(){
    $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepanitiaan' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC ");
     $query = $this -> db -> query($sql);
    return $query->result_array();
   // $this->db->select('a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir')
   //  ->from('deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g')
   //  ->where('a.jenis_kegiatan_id = b.id')->where('a.tingkat_poin_id = c.id')->where('c.tingkat_partisipasi_id = d.id')
   //  ->where('c.lingkup_partisipasi_id = e.id')->where('b.status_id = f.id')->where('f.klasifikasi_id = g.id')->where('g.klasifikasi = "Kegiatan Kepanitiaan"')->order_by("a.id","desc");
   //  $query=$this->db->get();
   //  return $query->result_array();
  
  }

  //Kegiatan Kepesertaan
   //PKM

  function query_pkm(){
    $sql=("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi,a.status_kegiatan as status_kegiatan, d.nama as kategori_pkm
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c,kategori_pkm d WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'PKM' AND b.klasifikasi_id = c.id AND a.pkm_id = d.id");
    $query = $this->db->query($sql);
   return $query->result_array();
    

  }

  function query_jenis_kegiatan_pkm(){
    $sql = ("SELECT id,jenis_kegiatan FROM jenis_kegiatan WHERE jenis_kegiatan = 'PKM'"); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
   function query_kategori_pkm(){
    $sql = ("SELECT id,nama FROM kategori_pkm"); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }

  function getByIdPKM($ID){
    $sql=("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi,a.status_kegiatan as status_kegiatan, a.pkm_id as pkm_id,d.nama as kategori_pkm
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c,kategori_pkm d WHERE a.id = ? and a.status_id = b.id 
      AND b.jenis_kegiatan = 'PKM' AND b.klasifikasi_id = c.id AND a.pkm_id = d.id");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
  function query_kegiatan_pkm(){
    $sql = ("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan, d.nama as kategori_pkm
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c,kategori_pkm d WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'PKM' AND b.klasifikasi_id = c.id AND a.pkm_id = d.id"); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
  function query_poin_pkm(){
    $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin FROM 
    tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id ORDER BY a.poin asc");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_deskripsi_pkm(){
    $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'PKM' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
   function getByIdDeskripsiPKM($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir,h.nama as kategori_pkm
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
      ,kategori_pkm h where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
       and  b.pkm_id = h.id and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'PKM' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
  function query_nomor_sk_pkm(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'PKM' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
 
  function query_deskripsi_pkm1(){
   $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'PKM' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
   $query = $this->db->query($sql);
   return $query->result_array();
}
function rekap_pkm(){
  $sql = ("SELECT b.id AS id,a.nrp AS nrp,a.nama AS nama,d.nama AS nama_kegiatan,b.nomor_sk as nomor_sk,b.tahun as tahun,g.nama AS kategori_pkm
from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c,kegiatan d,jenis_kegiatan e,klasifikasi_kegiatan f,kategori_pkm g where a.nrp=b.nrp and b.deskripsi_id = c.id
and c.jenis_kegiatan_id = d.id
and d.status_id = e.id and e.klasifikasi_id = f.id and d.pkm_id = g.id");
$query = $this->db->query($sql);
   return $query->result_array();
}

  //MAWAPRES
  function query_mawapres(){
    $sql=("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi,a.status_kegiatan as status_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'MAWAPRES' AND b.klasifikasi_id = c.id ");
    $query = $this->db->query($sql);
   return $query->result_array();
    

  }

  function query_jenis_kegiatan_mawapres(){
    $sql = ("SELECT id,jenis_kegiatan FROM jenis_kegiatan WHERE jenis_kegiatan = 'MAWAPRES'"); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
   
  function getByIdMawapres($ID){
    $sql=("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan,b.klasifikasi_id,b.kode as kode_jenis,c.kode as kode_klasifikasi,a.status_kegiatan as status_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.id = '281' and a.status_id = b.id AND b.jenis_kegiatan = 'MAWAPRES' AND b.klasifikasi_id = c.id ");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
  function query_kegiatan_mawapres(){
    $sql = ("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'MAWAPRES' AND b.klasifikasi_id = c.id "); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
  function query_poin_mawapres(){
    $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin FROM 
    tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id ORDER BY a.poin asc");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_deskripsi_mawapres(){
    $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'MAWAPRES' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
   function getByIdDeskripsiMawapres($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
      and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'MAWAPRES' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
function query_nomor_sk_mawapres(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'MAWAPRES' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
 
  function query_deskripsi_mawapres1(){
   $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'MAWAPRES' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
   $query = $this->db->query($sql);
   return $query->result_array();
}

  function query_mahasiswa_poin_mawapres(){
    $sql=("SELECT nrp, nama , total_poin from  v_total_poin_mahasiswa  WHERE rownum <= 10");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
function rekap_mawapres(){
  $sql = ("SELECT b.id AS id,a.nrp AS nrp,a.nama AS nama,d.nama AS nama_kegiatan,b.nomor_sk as nomor_sk,b.tahun as tahun
from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c,kegiatan d,jenis_kegiatan e,klasifikasi_kegiatan f where a.nrp=b.nrp and b.deskripsi_id = c.id
and c.jenis_kegiatan_id = d.id
and d.status_id = e.id and e.klasifikasi_id = f.id and f.klasifikasi = 'Kegiatan Kepesertaan' and e.jenis_kegiatan = 'MAWAPRES'");
$query = $this->db->query($sql);
   return $query->result_array();
}
  //Perlombaan
  function queryid_lomba(){
     $lomba = ("SELECT id   from  ( select  id from kegiatan order by id desc )  where rownum <=1");
        
        $query = $this->db->query($lomba);
        return $query->result_array();
  }
  function queryid_lomba1($nama){
     $lomba = ("SELECT id  from  kegiatan  where nama = ? ");
        
        $query = $this->db->query($lomba,$nama);
        return $query->result_array();
  }
  function query_kegiatan_perlombaan(){
    $sql = ("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'Kompetisi Minat dan Bakat' AND b.klasifikasi_id = c.id "); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
  function query_poin_perlombaan(){
    $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin FROM 
    tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id ORDER BY a.poin asc");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_deskripsi_perlombaan(){
    $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Kompetisi Minat dan Bakat' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
   function getByIdDeskripsiPerlombaan($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
      and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Kompetisi Minat dan Bakat' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
  function query_nomor_sk_lomba(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'Kompetisi Minat dan Bakat' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
 
  function query_deskripsi_lomba1(){
   $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Kompetisi Minat dan Bakat' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
   $query = $this->db->query($sql);
   return $query->result_array();
}
function rekap_lomba(){
  $sql = ("SELECT b.id AS id,a.nrp AS nrp,a.nama AS nama,d.nama AS nama_kegiatan,b.nomor_sk as nomor_sk,b.tahun as tahun
from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c,kegiatan d,jenis_kegiatan e,klasifikasi_kegiatan f where a.nrp=b.nrp and b.deskripsi_id = c.id
and c.jenis_kegiatan_id = d.id
and d.status_id = e.id and e.klasifikasi_id = f.id and f.klasifikasi = 'Kegiatan Kepesertaan' and e.jenis_kegiatan = 'Kompetisi Minat dan Bakat'");
$query = $this->db->query($sql);
   return $query->result_array();
}
  //Wirausaha
   function query_kegiatan_wirausaha(){
    $sql = ("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'Wirausaha' AND b.klasifikasi_id = c.id "); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
  function query_poin_wirausaha(){
    $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin FROM 
    tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id ORDER BY a.poin asc");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_deskripsi_wirausaha(){
    $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Wirausaha' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
   function getByIdDeskripsiWirausaha($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
      and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Wirausaha' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
   function query_nomor_sk_wirausaha(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'Wirausaha' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
 
  function query_deskripsi_wirausaha1(){
   $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Wirausaha' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
   $query = $this->db->query($sql);
   return $query->result_array();
}
function rekap_wirausaha(){
  $sql = ("SELECT b.id AS id,a.nrp AS nrp,a.nama AS nama,d.nama AS nama_kegiatan,b.nomor_sk as nomor_sk,b.tahun as tahun
from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c,kegiatan d,jenis_kegiatan e,klasifikasi_kegiatan f where a.nrp=b.nrp and b.deskripsi_id = c.id
and c.jenis_kegiatan_id = d.id
and d.status_id = e.id and e.klasifikasi_id = f.id and f.klasifikasi = 'Kegiatan Kepesertaan' and e.jenis_kegiatan = 'Wirausaha'");
$query = $this->db->query($sql);
   return $query->result_array();
}
  //Workshop
   function query_kegiatan_workshop_seminar(){
    $sql = ("SELECT a.id as id,a.nama as nama, b.jenis_kegiatan as jenis_kegiatan
      FROM kegiatan a,jenis_kegiatan b,klasifikasi_kegiatan c WHERE a.status_id = b.id 
      AND b.jenis_kegiatan = 'Workshop & Seminar' AND b.klasifikasi_id = c.id "); 
    $query = $this->db->query($sql);
   return $query->result_array();
  
  }
  function query_poin_workshop_seminar(){
    $sql=("SELECT a.id as id,b.tingkat_partisipasi as tingkat_partisipasi , c.lingkup_kegiatan as lingkup_kegiatan, a.poin as poin FROM 
    tingkat_poin a, tingkat_partisipasi b, lingkup_partisipasi c WHERE a.tingkat_partisipasi_id = b.id AND lingkup_partisipasi_id = c.id ORDER BY a.poin asc");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_deskripsi_workshop_seminar(){
    $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Workshop & Seminar' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
   function getByIdDeskripsiWorkshop_seminar($ID){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
      and f.klasifikasi_id = g.id and g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Workshop & Seminar' and a.id = ?");
    $query = $this -> db -> query($sql, $ID);
    return $query->result_array();
  }
function query_nomor_sk_workshop_seminar(){
    $sql=("SELECT * from nomor_sk where EXTRACT( YEAR FROM tahun) = EXTRACT(YEAR FROM sysdate) and jenis_sk = 'Workshop & Seminar' ");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
 
  function query_deskripsi_workshop_seminar1(){
   $sql = ("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g 
      WHERE a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id
      AND b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Kepesertaan' and f.jenis_kegiatan = 'Workshop & Seminar' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY A.ID DESC");
   $query = $this->db->query($sql);
   return $query->result_array();
}
function rekap_workshop_seminar(){
  $sql = ("SELECT b.id AS id,a.nrp AS nrp,a.nama AS nama,d.nama AS nama_kegiatan,b.nomor_sk as nomor_sk,b.tahun as tahun
from mahasiswa a,kegiatan_mahasiswa b,deskripsi_kegiatan c,kegiatan d,jenis_kegiatan e,klasifikasi_kegiatan f where a.nrp=b.nrp and b.deskripsi_id = c.id
and c.jenis_kegiatan_id = d.id
and d.status_id = e.id and e.klasifikasi_id = f.id and f.klasifikasi = 'Kegiatan Kepesertaan' and e.jenis_kegiatan = 'Workshop & Seminar'");
$query = $this->db->query($sql);
   return $query->result_array();
}


  // Laporan

  //query_laporan()getByIdLaporan($id)getByIdDetail($id_deskripsi);

  function query_laporan($tahun,$tahunlalu){
    $sql=("SELECT * FROM v_laporan_kegiatan_admin where EXTRACT( YEAR FROM tahun) = '$tahun' OR EXTRACT( YEAR FROM tahun) = '$tahunlalu' ORDER BY id DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('*')->from('v_laporan_kegiatan_admin')->order_by("id","desc");
    // $query=$this->db->get();
    // return $query->result();
  }

  function query_laporan1(){
    $sql=("SELECT * FROM v_laporan_kegiatan_validasi WHERE bukti is not null and waktu_verifikasi is null ORDER BY id DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
    // $this->db->select('*')->from('v_laporan_kegiatan_admin_validasi')->where('bukti is not null')->where('waktu_validasi_admin is null')->order_by("id","desc");
    // $query=$this->db->get();
    // return $query->result();
  }

  function getByIdDetail($ID_DESKRIPSI){
      $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
       and f.klasifikasi_id = g.id and a.id = ?");
    $query = $this -> db -> query($sql, $ID_DESKRIPSI);
    return $query->result_array();
  }

  function get_rekap($nrp){
    $sql = ("SELECT * FROM v_laporan_rekap_kegiatan where nrp = ?");
    $query = $this -> db -> query($sql, $nrp);
    return $query->result_array();

  }
function query_data_mahasiswa1($nrp){
    $sql = ("SELECT a.nama as nama,a.nrp as nrp,b.nama as kelas,c.nama as jurusan from mahasiswa a,kelas b, jurusan c
where nrp =  ? and a.kelas_id = b.id and b.jurusan_id = c.id");
    $query = $this -> db -> query($sql, $nrp);
    return $query->result_array(); 

  }
  function query_data_wakil(){
     $sql = ("SELECT nip,nama from pegawai where nama='Dr. Indra Adji Sulistijono, ST., M.Eng'");
    $query = $this -> db -> query($sql);
    return $query->result_array(); 
  }
  function get_Deskripsi($id_deskripsi){
     $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
      from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
       and f.klasifikasi_id = g.id and a.id = ?");
    $query = $this -> db -> query($sql, $id_deskripsi);
    return $query->row();
  }

  function query_alumni(){
    $sql=("SELECT nrp,nama from mahasiswa where status = 'Tidak Aktif' ORDER BY nama asc");
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  function query_laporan_alumni(){
    $sql=("SELECT * FROM v_rekap_alumni ORDER BY id DESC");
    $query = $this->db->query($sql);
   return $query->result_array();
  }


  function cari_kelas($kelas,$prodi,$jurusan,$pararel){
   
    
        
            $sql = "SELECT a.nama as nama,a.nrp as nrp FROM mahasiswa a,kelas b WHERE a.kelas_id = b.id
             and b.nama = '".$kelas."".$kelas."".$prodi."".$jurusan."".$pararel."' and a.status = 'Aktif' order by a.nrp asc";
        
        $query = $this->db->query($sql);
        return $query->result_array();
  }
  function get_kelas() {
    $query = $this->db->get('KELAS');
    return $query->result_array();
  }

  function get_mahasiswa($id) {
    $sql = ("SELECT a.nama as nama,a.nrp as nrp FROM mahasiswa a,kelas b WHERE a.kelas_id = b.id and a.kelas_id = ? and a.status = 'Aktif' order by a.nrp asc ");
    $query = $this -> db -> query($sql, $id);
    return $query->result_array();
  }
  function get_mahasiswa_kelas($namakelas) {
    $sql = ("SELECT a.nama as nama,a.nrp as nrp FROM mahasiswa a,kelas b WHERE a.kelas_id = b.id and b.nama = ? and a.status = 'Aktif' order by a.nrp asc ");
    $query = $this -> db -> query($sql, $namakelas);
    return $query->result_array();
  }


  //Query Mahasiswa
  function query_data_mahasiswa($user){
    $sql = ("SELECT a.nama as nama,a.nrp as nrp,b.nama as kelas,c.nama as jurusan from mahasiswa a,kelas b, jurusan c
where nrp =  ? and a.kelas_id = b.id and b.jurusan_id = c.id");
    $query = $this -> db -> query($sql, array($user['id']));
    return $query->result_array(); 

  }
  function query_data_mahasiswa_kelas($user){
    $sql = ("SELECT a.nama as nama,a.nrp as nrp,SUBSTR(b.nama, 3,2) as kelas,c.nama as jurusan from mahasiswa a,kelas b, jurusan c
where nrp =  ? and a.kelas_id = b.id and b.jurusan_id = c.id");
    $query = $this -> db -> query($sql, array($user['id']));
    return $query->result_array(); 

  }

  function query_laporan_mahasiswa($user){
    $sql = ("SELECT * FROM v_laporan_rekap_kegiatan where nrp = ?");
    $query = $this -> db -> query($sql, array($user['id']));
    return $query->result_array(); 
    
  }

   function query_laporan_mahasiswa1($user){
    $sql = ("SELECT * FROM v_laporan_mahasiswa_validasi where nrp = ? and waktu_validasi_mahasiswa is null");
    $query = $this -> db -> query($sql, array($user['id']));
    return $query->result_array(); 
  }

  function getByIdDetail1($ID_DESKRIPSI){
      $sql=("SELECT a.id as id,b.nama as nama ,d.tingkat_partisipasi as tingkat_partisipasi, e.lingkup_kegiatan as lingkup_kegiatan ,c.poin as poin,a.deskripsi as deskripsi,a.lokasi_kegiatan as lokasi_kegiatan,a.tanggal_mulai as tanggal_mulai,a.tanggal_akhir as tanggal_akhir
    from deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g
       where a.jenis_kegiatan_id = b.id and a.tingkat_poin_id = c.id and c.tingkat_partisipasi_id = d.id and c.lingkup_partisipasi_id = e.id and b.status_id = f.id
       and f.klasifikasi_id = g.id and a.id = ?");
    $query = $this -> db -> query($sql, $ID_DESKRIPSI);
    return $query->result_array();
  }

  function getByIdLaporan($ID){
    $sql = ("SELECT * FROM v_laporan_kegiatan_admin where id = ?");
    $query = $this -> db -> query($sql,$ID);
    return $query->result_array();
    }

    function query_jadwal_kegiatan(){
      $sql = ("SELECT a.id as id,b.nama as nama ,a.lokasi_kegiatan as lokasi_kegiatan,a.deskripsi as deskripsi,a.tanggal_mulai as tanggal_mulai 
      FROM deskripsi_kegiatan a, kegiatan b , tingkat_poin c, tingkat_partisipasi d, lingkup_partisipasi e, jenis_kegiatan f,klasifikasi_kegiatan g WHERE 
      a.jenis_kegiatan_id = b.id AND a.tingkat_poin_id = c.id AND c.tingkat_partisipasi_id = d.id AND c.lingkup_partisipasi_id = e.id AND
       b.status_id = f.id AND f.klasifikasi_id = g.id AND g.klasifikasi = 'Kegiatan Wajib' and EXTRACT( YEAR FROM a.tahun) = EXTRACT(YEAR FROM sysdate) ORDER BY a.tanggal_mulai DESC");
      $query = $this -> db -> query($sql);
    return $query->result_array();
    }
}
?>
