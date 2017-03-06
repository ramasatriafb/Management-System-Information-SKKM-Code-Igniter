<?php
Class input_data extends CI_Model
{
	function insert_log($user){
		$aktivitas = 'Login';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;// $simpan_data=array(
		// 	'nama_user'		=>$user['email'],
		// 	'aktivitas'		=>$aktivitas,
		// 	);
		// $this->db->set('waktu_log','NOW()',FALSE);
		// $simpan = $this->db->insert('log_skkm', $simpan_data);
		// return $simpan;
	}
	function insert_log_logout($user){
		$aktivitas = 'Logout';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql);
        return $query;
		// $simpan_data=array(
		// 	'nama_user'		=>$user['email'],
		// 	'aktivitas'		=>$aktivitas,
		// 	);
		// $this->db->set('waktu_log','NOW()',FALSE);
		// $simpan = $this->db->insert('log_skkm', $simpan_data);
		// return $simpan;
	}
	//super administrator
	function insert_user($user){
		$kode_akses = $this->input->post('hak_akses');
		$email = $this->input->post('email_pegawai');
		$datetime = date('d-m-y : H-i-s');
        
		        $sql = "INSERT INTO hak_akses (kode_akses,email,waktu_create,created_by)"
                . "VALUES('".$kode_akses."','".$email."','".$datetime."','".$user['email']."')";
        
        $query = $this->db->query($sql);
        $aktivitas = 'Menambah User';
        		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(
		// 	'kode_akses' 			=> $this->input->post('hak_akses'),
		// 	'email'   		  		=> $this->input->post('email_pegawai'),
			
		// );
		// $this->db->set('waktu_create','NOW()',FALSE);
		// $simpan = $this->db->insert('hak_akses', $simpan_data);
		
		// $aktifitas = "Menambah User";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
	}
	function insert_batas_waktu($user){
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
     $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql = "INSERT INTO batas_waktu (tgl_awal,tgl_akhir
			)"
                . "VALUES(TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'))";
        
        $query = $this->db->query($sql);
        
        $aktivitas = 'Menambah Batas Waktu Aktifitas Input Pada Data Sistem';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
	//administrator

	//manajemen poin
	function insert_poin($user){
		$tingkat_partisipasi_id = $this->input->post('tingkat_partisipasi');
		$lingkup_partisipasi_id = $this->input->post('lingkup_partisipasi');
		$poin = $this->input->post('poin');
		$datetime = date('d-m-y : H-i-s');
        
		$sql = "INSERT INTO TINGKAT_POIN (tingkat_partisipasi_id,lingkup_partisipasi_id,poin,created_by,waktu_create)"
                . "VALUES('".$tingkat_partisipasi_id."','".$lingkup_partisipasi_id."','".$poin."','".$user['email']."','".$datetime."')";
        
        $query = $this->db->query($sql);
        
        $aktivitas = 'Menambah Jenis Poin Kegiatan';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(

		// 	'tingkat_partisipasi_id'   		  		=> $this->input->post('tingkat_partisipasi'),
		// 	'lingkup_partisipasi_id' 				=> $this->input->post('lingkup_partisipasi'),
		// 	'poin' 									=> $this->input->post('poin'),
			
		// );
		// $simpan = $this->db->insert('tingkat_poin', $simpan_data);

		// $aktifitas = "Menambah Jenis Poin Kegiatan ";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
	}
	function insert_minimum_poin($user){
		$minimum_poin_d3 = $this->input->post('poind3');
		$minimum_poin_d4 = $this->input->post('poind4');
		
		$datetime = date('d-m-y : H-i-s');
        
		$sql = "INSERT INTO MINIMUM_POIN (MINIMUM_POIN_D3, MINIMUM_POIN_D4)"
                . "VALUES('".$minimum_poin_d3."','".$minimum_poin_d4."')";
        
        $query = $this->db->query($sql);
        
        $aktivitas = 'Mengatur Poin Minimum Kegiatan';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }

	//kegiatan wajib
		//kegiatan wajib
	function insert_kegiatan_wajib($user){
		$nama = $this->input->post('nama');
		$status_id = $this->input->post('jenis_kegiatan');
		$sql = "INSERT INTO kegiatan (nama,status_id)"
                . "VALUES('".$nama."','".$status_id."')";
        
        $query = $this->db->query($sql);
        
        $aktivitas = 'Menambah Kegiatan Wajib';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(

		// 	'nama'   		  		=> $this->input->post('nama'),
		// 	'status_id' 			=> $this->input->post('jenis_kegiatan'),
			
		// );	
		// $simpan = $this->db->insert('kegiatan', $simpan_data);

		// $aktifitas = "Menambah Kegiatan Wajib";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
	}

		//deskripsi kegiatan wajib
	function insert_deskripsi_wajib($user){
		$jenis_kegiatan_id = $this->input->post('nama');
		$tingkat_poin_id = $this->input->post('tingkat_poin_id');
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql);
        
        $aktivitas = 'Menambah Deskripsi Kegiatan Wajib';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(
		// 	'jenis_kegiatan_id' 			=> $this->input->post('nama'),
		// 	'tingkat_poin_id' 			=> $this->input->post('tingkat_poin_id'),
		// 	'deskripsi' 			=> $this->input->post('deskripsi'),
		// 	'lokasi_kegiatan' 			=> $this->input->post('lokasi_kegiatan'),
		// 	'tanggal_mulai' 			=> $this->input->post('tgl_mulai'),
		// 	'tanggal_akhir' 			=> $this->input->post('tgl_akhir'),
			
		// );
		// $this->db->set('tahun', 'NOW()', FALSE);	
		// $this->db->set('des_create', 'NOW()', FALSE);	
		// $simpan = $this->db->insert('deskripsi_kegiatan', $simpan_data);

		// $aktifitas = "Menambah Deskripsi Kegiatan Wajib";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
	}

	//Isi Mahasiswa kegiatan Wajib
	function insert_mahasiswa_wajib($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$y= date('Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	$jumlah=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
   
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti Kegiatan Wajib';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	// 	$validasi="Tervalidasi";
	// 	$i=0;
	// 	while($i<count($id)){
	// 	$simpan_data=array(
	// 		'nrp'			   		  		=> $id[$i],
	// 		'deskripsi_id'   		  		=> $this->input->post('deskripsi_id'),
	// 		'validasi'						=>$validasi,
			
	// 	);
		
	// 	$this->db->set('tahun', 'NOW()', FALSE);
	// 	$this->db->set('kegiatan_create', 'NOW()', FALSE);
	// 	$this->db->set('waktu_validasi_admin', 'NOW()', FALSE);
	// 	$i++;
	// 	$simpan = $this->db->insert('kegiatan_mahasiswa', $simpan_data);
	// }
	// 	$aktifitas = "Mengisi Mahasiswa yang Mengikuti Kegiatan Wajib";
	// 	$simpan_data1=array(
	// 		'nama_user' 			=> $user['email'],
	// 		'aktivitas'   		  		=> $aktifitas,
			
	// 	);

	// 	$this->db->set('waktu_log','NOW()',FALSE);		
	// 	$simpan = $this->db->insert('log_skkm', $simpan_data1);

	// 	return $simpan;
	}

	function insert_nomor_sk($user,$nomor,$jenis_sk){
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
		$sql = "INSERT INTO nomor_sk (nomor,tahun,jenis_sk)"
                . "VALUES('".$nomor."','".$tahun."','".$jenis_sk."')";
        
        $query = $this->db->query($sql);
        
        // $aktivitas = 'Menambah Nomor SK Kegiatan Wajib';
		
		      //   $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
        //         . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        // $query = $this->db->query($sql1);
        return $query;
	}

	// Kegiatan Kepanitiaan
		//Organisasi Mahasiswa

	function insert_ormawa($user){
		$nama = $this->input->post('nama');
		$status_id = $this->input->post('jenis_kegiatan');
		$status_kegiatan = 'Aktif';
		$sql = "INSERT INTO kegiatan (nama,status_id,status_kegiatan)"
                . "VALUES('".$nama."','".$status_id."','".$status_kegiatan."')";
        
        $query = $this->db->query($sql);
        $datetime = date('d-m-y : H-i-s');
        $aktivitas = 'Menambah Organisasi Mahasiswa';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(

		// 	'nama'   		  		=> $this->input->post('nama'),
		// 	'status_id' 			=> $this->input->post('jenis_kegiatan'),
			
		// );
		// $simpan = $this->db->insert('kegiatan', $simpan_data);

		// $aktifitas = "Menambah Organisasi Mahasiswa";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
	}
		//Kepanitiaan Acara
	function insert_kepanitiaan_acara($user){
		$nama = $this->input->post('nama');
		$status_id = $this->input->post('jenis_kegiatan');
		$sql = "INSERT INTO kegiatan (nama,status_id)"
                . "VALUES('".$nama."','".$status_id."')";
        
        $query = $this->db->query($sql);
        $datetime = date('d-m-y : H-i-s');
        $aktivitas = 'Menambah Kegiatan Kepanitiaan Acara';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	}
		
		//Deskripsi Kegiatan Kepanitiaan

	function insert_deskripsi_kepanitiaan($user){
		$jenis_kegiatan_id = $this->input->post('nama');
		$tingkat_poin_id1 = $this->input->post('tingkat_poin_id1');
		$tingkat_poin_id2 = $this->input->post('tingkat_poin_id2');
		$tingkat_poin_id3 = $this->input->post('tingkat_poin_id3');
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id1."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql);
        
        $sq2 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id2."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sq2);

        $sql3 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id3."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql3);

        $aktivitas = 'Menambah Deskripsi Kegiatan Organisasi Mahasiswa dan Kepanitiaan Acara';
		
		        $sql4 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql4);
        return $query;
		
	}
	
		//Isi Mahasiswa kegiatan Kepanitiaan
	function insert_mahasiswa_panitia($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti Organisasi Mahasiswa dan Kegiatan Kepanitiaan';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	
	}
	//Kegiatan Kepesertaan
	//PKM
	function insert_pkm($user){
		$nama = $this->input->post('nama');
		$status_id = $this->input->post('jenis_kegiatan');
		$kategori_id = $this->input->post('kategori_pkm');
		$status_kegiatan = 'Aktif';
		$sql = "INSERT INTO kegiatan (nama,status_id,pkm_id,status_kegiatan)"
                . "VALUES('".$nama."','".$status_id."','".$kategori_id."','".$status_kegiatan."')";
        
        $query = $this->db->query($sql);
        $datetime = date('d-m-y : H-i-s');
        $aktivitas = 'Menambah Kegiatan PKM';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
}
	function insert_deskripsi_pkm($user){
		$jenis_kegiatan_id = $this->input->post('nama');
		$tingkat_poin_id = $this->input->post('tingkat_poin_id');
		$tingkat_poin_id2 = $this->input->post('tingkat_poin_id2');
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql);
        $sql2 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id2."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql2);
        
        
        $aktivitas = 'Menambah Deskripsi Kegiatan PKM';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	
}
function insert_mahasiswa_pkm($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti PKM';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	
	}
		//MAWAPRES
		function insert_mawapres($user){
		$nama = $this->input->post('nama');
		$status_id = $this->input->post('jenis_kegiatan');
		$status_kegiatan = 'Aktif';
		$sql = "INSERT INTO kegiatan (nama,status_id,status_kegiatan)"
                . "VALUES('".$nama."','".$status_id."','".$status_kegiatan."')";
        
        $query = $this->db->query($sql);
        $datetime = date('d-m-y : H-i-s');
        $aktivitas = 'Menambah Kegiatan MAWAPRES';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
}
	function insert_deskripsi_mawapres($user){
		$jenis_kegiatan_id = $this->input->post('nama');
		$tingkat_poin_id = $this->input->post('tingkat_poin_id');
		$tingkat_poin_id2 = $this->input->post('tingkat_poin_id2');
		$tingkat_poin_id3= $this->input->post('tingkat_poin_id3');
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql);
        $sql2 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id2."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql2);
        $sql3 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id3."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql3);
        
        $aktivitas = 'Menambah Deskripsi Kegiatan MAWAPRES';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        
        return $query;
	
}
function insert_mahasiswa_mawapres($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti MAWAPRES';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	
	}
		//Perlombaan
		function insert_nama_perlombaan(){
		$nama = $this->input->post('nama');
		$status_id = '7';
		$status_kegiatan = 'Aktif';
		$sql = "INSERT INTO kegiatan (nama,status_id,status_kegiatan)"
                . "VALUES('".$nama."','".$status_id."','".$status_kegiatan."')";
        
        $query = $this->db->query($sql);
        
        return $query;
}

		function insert_deskripsi_perlombaan($user,$id){
		

		
		$tingkat_poin_id = $this->input->post('tingkat_poin_id');
		
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql1 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$id."','".$tingkat_poin_id."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql1);
       
        
        $aktivitas = 'Menambah Deskripsi Kegiatan Perlombaan';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        
        return $query;
	
}
function insert_mahasiswa_lomba($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti Perlombaan';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
}
//Wirausaha

		function insert_nama_wirausaha(){
		$nama = $this->input->post('nama');
		$status_id = '8';
		$status_kegiatan = 'Aktif';
		$sql = "INSERT INTO kegiatan (nama,status_id,status_kegiatan)"
                . "VALUES('".$nama."','".$status_id."','".$status_kegiatan."')";
        
        $query = $this->db->query($sql);
        
        return $query;
}

		function insert_deskripsi_wirausaha($user,$id){
		

		
		$tingkat_poin_id = $this->input->post('tingkat_poin_id');
		$tingkat_poin_id2 = $this->input->post('tingkat_poin_id');
		
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql1 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$id."','".$tingkat_poin_id."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql1);
       $sql2 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$jenis_kegiatan_id."','".$tingkat_poin_id2."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql2);
        
        $aktivitas = 'Menambah Deskripsi Kegiatan Wirausaha';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        
        return $query;
	
}
function insert_mahasiswa_wirausaha($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti Wirausaha';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
}
//Workshop
		function insert_nama_workshop_seminar(){
		$nama = $this->input->post('nama');
		$status_id = '9';
		$status_kegiatan = 'Aktif';
		$sql = "INSERT INTO kegiatan (nama,status_id,status_kegiatan)"
                . "VALUES('".$nama."','".$status_id."','".$status_kegiatan."')";
        
        $query = $this->db->query($sql);
        
        return $query;
}

		function insert_deskripsi_workshop_seminar($user,$id){
		

		
		$tingkat_poin_id = $this->input->post('tingkat_poin_id');
		$tingkat_poin_id2 = $this->input->post('tingkat_poin_id');
		
		$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
		$sql1 = "INSERT INTO deskripsi_kegiatan (jenis_kegiatan_id,tingkat_poin_id,deskripsi,lokasi_kegiatan,tanggal_mulai,tanggal_akhir
			,tahun,des_create)"
                . "VALUES('".$id."','".$tingkat_poin_id."','".$deskripsi."','".$lokasi_kegiatan."',TO_DATE('".$tanggal_mulai."','YYYY-MM-DD')
                	,TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),'".$tahun."','".$datetime."')";
        
        $query = $this->db->query($sql1);
      
        $aktivitas = 'Menambah Deskripsi Kegiatan Workshop & Seminar';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        
        return $query;
	
}
function insert_mahasiswa_workshop_seminar($id,$user,$nomor){
	$validasi = "Tervalidasi";
	$deskripsi_id = $this->input->post('deskripsi_id');
	$tahun = date('d-m-Y');
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "INSERT INTO kegiatan_mahasiswa (nrp,deskripsi_id,validasi,tahun,kegiatan_create,waktu_validasi_admin,nomor_sk)"
                . "VALUES('".$id[$i]."','".$deskripsi_id."','".$validasi."','".$tahun."','".$datetime."','".$datetime."','".$nomor."')";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Mengisi Mahasiswa yang Mengikuti Workshop $ Seminar';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
}
}
?>