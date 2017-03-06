<?php
Class update_data extends CI_Model
{
	 //super administrator

	function update_user($ID,$user) {
	$email = $this->input->post('email_pegawai');
	$kode_akses = $this->input->post('hak_akses');
	$datetime = date('d-m-y : H-i-s');
        
	$sql = "UPDATE hak_akses SET email = '".$email."',kode_akses = '".$kode_akses."',waktu_modify = '".$datetime."',updated_by = '".$user['email']."'
	 WHERE id = (SELECT id FROM hak_akses WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data User';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
		// $simpan_data=array(

		// 	'email'   		  		=> $this->input->post('email_pegawai'),
		// 	'kode_akses' 			=> $this->input->post('hak_akses'),
			
		// );
		// $this->db->set('waktu_modify','NOW()',FALSE);	
		// $this->db->where('id', $id);
		// $simpan = $this->db->update('hak_akses', $simpan_data);
		// $aktifitas = "Merubah Data User";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
    }
	function update_batas_waktu($ID,$user) {
	$tahun = date('d-m-Y');
		$datetime = date('d-m-y : H-i-s');
     $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
        
	$sql = "UPDATE batas_waktu SET tgl_awal = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tgl_akhir =TO_DATE('".$tanggal_akhir."','YYYY-MM-DD')
	 WHERE id = (SELECT id FROM batas_waktu WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Batas Waktu Aktifitas Input Pada Data Sistem';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
		}

	//administrator

    	//manajemen poin


	function update_poin($ID,$user) {
      $poin = $this->input->post('poin');
      $datetime = date('d-m-y : H-i-s');
        
      $sql = "UPDATE tingkat_poin SET poin = '".$poin."',updated_by = '".$user['email']."',waktu_modify = '".$datetime."' WHERE id = (SELECT id FROM tingkat_poin WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Jenis Poin Kegiatan';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(

			
		// 	'poin' 									=> $this->input->post('poin'),
			
			
		// );
		// $this->db->where('id', $id);
		// $simpan = $this->db->update('tingkat_poin', $simpan_data);

		// $aktifitas = "Merubah Data Jenis Poin Kegiatan";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
    }

	    //Kegiatan Wajib

	function update_kegiatan_wajib($ID,$user) {
      $nama = $this->input->post('nama');
      $sql = "UPDATE kegiatan SET nama = '".$nama."' WHERE id = (SELECT id FROM kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Jenis Poin Kegiatan';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		// $simpan_data=array(

		// 	'nama'   		  		=> $this->input->post('nama'),
			
			
		// );
		// $this->db->where('id', $id);
		// $simpan = $this->db->update('kegiatan', $simpan_data);

		// $aktifitas = "Merubah Data Kegiatan Wajib";
		// $simpan_data1=array(
		// 	'nama_user' 			=> $user['email'],
		// 	'aktivitas'   		  		=> $aktifitas,
			
		// );

		// $this->db->set('waktu_log','NOW()',FALSE);		
		// $simpan = $this->db->insert('log_skkm', $simpan_data1);
		// return $simpan;
    }

     function update_deskripsi_kegiatan_wajib($ID,$user) {
      $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan Wajib';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		
    }


    //Kegiatan Kepanitiaan
    		//Organisasi Mahasiswa

	function update_ormawa($ID,$user) {
        $nama = $this->input->post('nama');
        $jenis_kegiatan = $this->input->post('jenis_kegiatan');
        $status_kegiatan = $this->input->post('status_kegiatan');
      $sql = "UPDATE kegiatan SET nama = '".$nama."',status_id = '".$jenis_kegiatan."',status_kegiatan = '".$status_kegiatan."' WHERE id = (SELECT id FROM kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Organisasi Mahasiswa';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		
    }
    		//Panitia Acara
    function update_kepanitiaan_acara($ID,$user) {
      $nama = $this->input->post('nama');
      $sql = "UPDATE kegiatan SET nama = '".$nama."' WHERE id = (SELECT id FROM kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Kegiatan Kepanitiaan Acara';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
		
    }

    	
		//Deskripsi Kegiatan Kepanitiaan

    function update_deskripsi_kegiatan_kepanitiaan($ID,$user){
  		 $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan Organisasi Mahasiswa dan  Kepanitiaan Acara';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;

    }

    function update_deskripsi($id) {
      
		$simpan_data=array(

			'nama_kegiatan'   		  		=> $this->input->post('nama_kegiatan'),
			'deskripsi' 			=> $this->input->post('deskripsi'),
			'lokasi_kegiatan' 			=> $this->input->post('lokasi_kegiatan'),
			'tanggal_mulai' 			=> $this->input->post('tgl_mulai'),
			'tanggal_akhir' 			=> $this->input->post('tgl_akhir'),
		);
		$this->db->set('des_modify','NOW()',FALSE);	
		$this->db->where('id', $id);
		$simpan = $this->db->update('deskripsi', $simpan_data);
		return $simpan;
    }
    //Kegiatan Kepesertaan 
	//PKM
		function update_pkm($ID,$user) {
        $nama = $this->input->post('nama');
		$kategori_id = $this->input->post('kategori_pkm');
		$status_kegiatan = 'Aktif';
     $sql = "UPDATE kegiatan SET nama = '".$nama."',pkm_id = '".$kategori_id."',status_kegiatan = '".$status_kegiatan."' WHERE id = (SELECT id FROM kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data PKM';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
    //deskripsi PKM
    function update_deskripsi_kegiatan_pkm($ID,$user) {
      $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan PKM';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
    //MAWAPRES
    function update_mawapres($ID,$user) {
        $nama = $this->input->post('nama');
		$status_kegiatan = 'Aktif';
     $sql = "UPDATE kegiatan SET nama = '".$nama."',status_kegiatan = '".$status_kegiatan."' WHERE id = (SELECT id FROM kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data MAWAPRES';
		$datetime = date('d-m-y : H-i-s');
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
    //deskripsi MAWAPRES
    function update_deskripsi_kegiatan_mawapres($ID,$user) {
      $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan MAWAPRES';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
    function update_deskripsi_kegiatan_perlombaan($ID,$user) {
      $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan MAWAPRES';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
    //Wirausaha
     function update_deskripsi_kegiatan_wirausaha($ID,$user) {
      $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan Wirausaha';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }
    //Workshop
    function update_deskripsi_kegiatan_workshop_seminar($ID,$user) {
      $datetime = date('d-m-y : H-i-s');
      $deskripsi = $this->input->post('deskripsi');
      $lokasi_kegiatan = $this->input->post('lokasi_kegiatan');
      $tanggal_mulai =  $this->input->post('tgl_mulai');
      $tanggal_akhir = $this->input->post('tgl_akhir');
      $sql = "UPDATE deskripsi_kegiatan SET deskripsi = '".$deskripsi."',lokasi_kegiatan = '".$lokasi_kegiatan."',
      tanggal_mulai = TO_DATE('".$tanggal_mulai."','YYYY-MM-DD'),tanggal_akhir = TO_DATE('".$tanggal_akhir."','YYYY-MM-DD'),des_modify = '".$datetime."' WHERE id = (SELECT id FROM deskripsi_kegiatan WHERE id = $ID)";
        $query = $this->db->query($sql);

        $aktivitas = 'Merubah Data Deskripsi Kegiatan Workshop & Seminar';
		
        
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
    }

 		//Laporan
    function update_validasi_laporan($id,$user){
	$validasi = "Tervalidasi";
	$datetime = date('d-m-y : H-i-s');
	$i=0;
	while($i<count($id)){
		$sql = "UPDATE kegiatan_mahasiswa SET validasi = '".$validasi."',waktu_verifikasi = '".$datetime."' 
		WHERE id = (SELECT id FROM kegiatan_mahasiswa WHERE id = $id[$i]) ";
        
        $query = $this->db->query($sql);
        $i++;
    }
     $aktivitas = 'Memvalidasi Kegiatan Mahasiswa';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        return $query;
	// 	$i=0;
	// 	$validasi = "Tervalidasi";
	// 	while($i<count($id)){
	// 	$simpan_data=array(
	// 		'validasi' 						=> $validasi ,
			
			
	// 	);
		
	// 	$this->db->set('waktu_validasi_admin', 'NOW()', FALSE);
	// 	$this->db->where('id', $id[$i]);
	// 	$i++;
	// 	$simpan = $this->db->update('kegiatan_mahasiswa', $simpan_data);
		
	// }
		
	// 	return $simpan;
	}
	


    //mahasiswa

    function update_laporan_mahasiswa($ID,$filebukti) {
    	$datetime = date('d-m-y : H-i-s');
      $sql = "UPDATE kegiatan_mahasiswa SET bukti = '".$filebukti."',waktu_validasi_mahasiswa = '".$datetime."' WHERE id = (SELECT id FROM kegiatan_mahasiswa WHERE id = $ID)";
        $query = $this->db->query($sql);

        return $query;
  //     $simpan_data=array(
  //     	'bukti' => $filebukti,
  //     	 );
		
		// $this->db->set('waktu_validasi_mahasiswa','NOW()',FALSE);	
		// $this->db->where('id', $id);
		// $this->db->update('kegiatan_mahasiswa', $simpan_data);
		// return TRUE;
    }
    function update_log_laporan_mahasiswa($user){
    	$datetime = date('d-m-y : H-i-s');
        $aktivitas = 'Melakukan Validasi';
		
		        $sql1 = "INSERT INTO log_skkm (waktu_log,nama_user,aktivitas)"
                . "VALUES('".$datetime."','".$user['email']."','".$aktivitas."')";
        
        $query = $this->db->query($sql1);
        }
}
?>