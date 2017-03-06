
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class super_administrator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->model('input_data','',TRUE);
		$this->load->model('update_data','',TRUE);
		$this->load->model('delete_data','',TRUE);
		$this->load->model('Query','',TRUE);

		
		//$this->load->library('tcpdf');
		$this->check_login();
	} 
	public function index()
	{
	}
	
	//Dashboard
	public function dashboard()
	{
		$tahun = date ('Y');
		$count['now'] = $tahun;
		$count['tahun']= $this->Query->query_tahun_kegiatan();
		$count['count_wajib'] = $this->Query->query_count_wajib($tahun);
		$count['count_ormawa'] = $this->Query->query_count_ormawa($tahun);
        $count['count_ukm'] = $this->Query->query_count_ukm($tahun);
        $count['count_panitia'] = $this->Query->query_count_panitia($tahun);
       	 $this->load->view('super_administrator/menu_dashboard/dashboard',$count);
	}
	public function cari_tahun()
	{
		$tahun = $this->input->post('tahun');
		$count['now'] = $tahun;
		$count['tahun']= $this->Query->query_tahun_kegiatan();
		$count['count_wajib'] = $this->Query->query_count_wajib($tahun);
		$count['count_ormawa'] = $this->Query->query_count_ormawa($tahun);
        $count['count_ukm'] = $this->Query->query_count_ukm($tahun);
        $count['count_panitia'] = $this->Query->query_count_panitia($tahun);
       	 $this->load->view('super_administrator/menu_dashboard/dashboard',$count);
	}

		// Manajemen User
	public function manajemen_user()
	{
		
		$user['batas_waktu'] = $this->Query->query_batas_waktu();
		$user['result_query'] = $this->Query->query_user_admin();
        $this->load->view('super_administrator/menu_manajemen_user/manajemen_user',$user);
	}


	public function tambah_user()
	{
		$data['pegawai']= $this->Query->getAllPegawai();
        $this->load->view('super_administrator/menu_manajemen_user/tambah_user',$data);
	}

	public function submit_tambahuser()
	{
		$user = $this->set_var();
		$this->input_data->insert_user($user);
	
		redirect('super_administrator/manajemen_user');
		
	}

	function update_user($ID) {
		$user = $this->set_var();
		$data['pegawai']= $this->Query->getByNamePegawai($ID);
        if($this->input->post('submit')){
            $this->update_data->update_user($ID,$user);
            redirect('super_administrator/manajemen_user');
        }
        $data['hasil'] = $this->Query->getByIdAkses($ID);
        $this->load->view('super_administrator/menu_manajemen_user/update_user', $data);
 
    }
	function delete_user($id){
		$user=$this->set_var();
		$this->delete_data->delete_user($id);
		$this->delete_data->log_delete_user($user);
		redirect('super_administrator/manajemen_user');
	 
	}
	public function tambah_batas_waktu()
	{
		
        $this->load->view('super_administrator/menu_manajemen_user/tambah_batas_waktu');
	}

	public function submit_batas_waktu()
	{
		$user = $this->set_var();
		$this->input_data->insert_batas_waktu($user);
	
		redirect('super_administrator/manajemen_user');
		
	}

	function update_batas_waktu($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_batas_waktu($ID,$user);
            redirect('super_administrator/manajemen_user');
        }
        $data['hasil'] = $this->Query->getByIdbatas_waktu($ID);
        $this->load->view('super_administrator/menu_manajemen_user/update_batas_waktu', $data);
 
    }
	function delete_batas_waktu($id){
		$user=$this->set_var();
		$this->delete_data->delete_batas_waktu($id);
		$this->delete_data->log_delete_batas_waktu($user);
		redirect('super_administrator/manajemen_user');
	 
	}


	// Log
	public function log()
	{
		$log['log_query'] = $this->Query->query_log();
        $this->load->view('super_administrator/menu_log/log_user',$log);
	}

	
	//Manajemen Poin
	public function manajemen_poin()
	{
		//$user = $this->set_var();
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		 if($query -> num_rows() == 1){
       $poin['tabel_poin'] = $this->Query->query_tabel_poin_super();
       $poin['minimum_poin'] = $this->Query->query_minimum_poin();
         $this->load->view('super_administrator/menu_manajemen_poin/manajemen_poin',$poin);
      }
      else{
        $this->load->view('super_administrator/menu_manajemen_poin/manajemen_poin_batas_waktu');
      }
		 
	}

	public function tambah_jenis_poin()
	{
		//$user = $this->set_var();
		$poin['tingkat_partisipasi'] = $this->Query->query_tingkat_partisipasi();
		$poin['lingkup_partisipasi'] = $this->Query->query_lingkup_partisipasi();
		$this->load->view('super_administrator/menu_manajemen_poin/tambah_poin',$poin);
	}
	public function submit_poin()
	{
		$user = $this->set_var();
		$this->input_data->insert_poin($user);
		redirect ('super_administrator/manajemen_poin');
	}

	function update_poin($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_poin($ID,$user);
            redirect('super_administrator/manajemen_poin');
        }
        $poin['hasil'] = $this->Query->getByIDTingkatPoin($ID);
        $this->load->view('super_administrator/menu_manajemen_poin/update_poin', $poin);
 
    }
	function delete_poin($ID){
		$user = $this->set_var();
		$this->delete_data->delete_poin($ID);
		$this->delete_data->log_delete_poin($user);
		redirect('super_administrator/manajemen_poin');
	 
	}
	public function submit_minimum_poin()
	{
		$user = $this->set_var();
		$this->input_data->insert_minimum_poin($user);
		redirect ('super_administrator/manajemen_poin');
	}

//Kegiatan Wajib
	//Kegiatan Wajib
	public function kegiatan_wajib(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		 if($query -> num_rows() == 1){
		$wajib['kegiatan_wajib'] = $this->Query->query_kegiatan_wajib();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/kegiatan_wajib',$wajib);
        }
      else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/kegiatan_wajib_batas_waktu');
      }

	}

	public function tambah_kegiatan_wajib(){
		$wajib['kegiatan_wajib'] = $this->Query->query_kegiatan_wajib();
		$wajib['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_wajib();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/tambah_kegiatan_wajib',$wajib);
	}
	
	public function submit_kegiatan_wajib(){
		$user = $this->set_var();
		$this->input_data->insert_kegiatan_wajib($user);
		redirect('super_administrator/kegiatan_wajib');
	}

	function update_kegiatan_wajib($ID){
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_kegiatan_wajib($ID,$user);
            redirect('super_administrator/kegiatan_wajib');
        }
        $wajib['hasil'] = $this->Query->getByIDKegiatanWajib($ID);
        $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/update_kegiatan_wajib',$wajib);
	}

	function delete_kegiatan_wajib($ID){
		$user=$this->set_var();
		$this->delete_data->delete_kegiatan_wajib($ID);
		$this->delete_data->log_delete_kegiatan_wajib($user);
		redirect('super_administrator/kegiatan_wajib');
	}
	//Deskripsi Kegiatan Wajib

	public function deskripsi_kegiatan_wajib()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		 if($query -> num_rows() == 1){
		$deskripsi_kegiatan_wajib['nama_kegiatan_wajib'] = $this->Query->query_kegiatan_wajib1();
        $deskripsi_kegiatan_wajib['poin'] = $this->Query->query_poin_wajib();
        $deskripsi_kegiatan_wajib['deskripsi'] = $this->Query->query_deskripsi_wajib();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/deskripsi_kegiatan_wajib',$deskripsi_kegiatan_wajib);
    } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/kegiatan_wajib_batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_wajib(){
		$user = $this->set_var();
		$this->input_data->insert_deskripsi_wajib($user);
		redirect ('super_administrator/deskripsi_kegiatan_wajib');
	}

	function detail_deskripsi_kegiatan_wajib($ID){
		 $deskripsi_kegiatan_wajib['deskripsi'] = $this->Query->getByIdDeskripsiWajib($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/detail_deskripsi_kegiatan_wajib',$deskripsi_kegiatan_wajib);
	}

	function update_deskripsi_kegiatan_wajib($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_wajib($ID,$user);
            redirect('super_administrator/deskripsi_kegiatan_wajib');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiWajib($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_wajib/update_deskripsi_kegiatan_wajib', $data);
 
    }
	function delete_deskripsi_kegiatan_wajib($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_wajib($ID);
		$this->delete_data->log_delete_poin_deskripsi_kegiatan_wajib($user);
		redirect ('super_administrator/deskripsi_kegiatan_wajib');
	 
	}

//Isi Kegiatan Wajib

	public function isi_mahasiswa_kegiatan_wajib(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_wajib['nomor']= $this->Query->query_nomor_sk_wajib();
		$isi_wajib['deskripsi']= $this->Query->query_deskripsi_wajib1();
		$isi_wajib['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan_wajib/isi_kegiatan_wajib',$isi_wajib);
		} else{
        $this->load->view('super_administrator/menu_isi_kegiatan_wajib/isi_kegiatan_wajib_batas_waktu');
      }
	}

	public function submit_mahasiswa_wajib(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "Wajib";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_wajib($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_kegiatan_wajib');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_wajib($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_kegiatan_wajib');
	}
}

	//Kegiatan Kepanitiaan
			//Organisasi Mahasiswa

	public function organisasi_mahasiswa(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$ormawa['ormawa']= $this->Query->query_ormawa();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/organisasi_mahasiswa',$ormawa);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/batas_waktu');
      }
	}

	public function tambah_organisasi_mahasiswa(){
		$ormawa['ormawa']= $this->Query->query_ormawa();
		$ormawa['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_ormawa();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/tambah_organisasi_mahasiswa',$ormawa);
	}

	function submit_ormawa(){
		$user = $this->set_var();
		$this->input_data->insert_ormawa($user);
		redirect ('super_administrator/organisasi_mahasiswa');
	}

	function update_ormawa($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_ormawa($ID,$user);
            redirect('super_administrator/organisasi_mahasiswa');
        }
        $data['hasil'] = $this->Query->getByIdOrmawa($ID);
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/update_organisasi_mahasiswa', $data);
 
    }
	function delete_ormawa($ID){
		$user=$this->set_var();
		$this->delete_data->delete_ormawa($ID);
		$this->delete_data->log_delete_ormawa($user);
		redirect('super_administrator/organisasi_mahasiswa');
	 
	}

		//Kepanitiaan Acara
	public function kepanitiaan_acara(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$panitia['panitia']= $this->Query->query_kepanitiaan_acara();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/kepanitiaan_acara',$panitia);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/batas_waktu');
      }
	}

	public function tambah_kepanitiaan_acara(){
		$panitia['panitia']= $this->Query->query_kegiatan_kepanitiaan1();
		$panitia['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_kepanitiaan_acara();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/tambah_kepanitiaan_acara',$panitia);
	}

	function submit_kepanitiaan_acara(){
		$user = $this->set_var();
		$this->input_data->insert_kepanitiaan_acara($user);
		redirect ('super_administrator/kepanitiaan_acara');
	}

	function update_kepanitiaan_acara($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_kepanitiaan_acara($ID,$user);
            redirect('super_administrator/kepanitiaan_acara');
        }
        $panitia['hasil'] = $this->Query->getByIdKepanitiaan_Acara($ID);
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/update_kepanitiaan_acara', $panitia);
 	 }
	function delete_kepanitiaan_acara($ID){
		$user=$this->set_var();
		$this->delete_data->delete_kepanitiaan_acara($ID);
		$this->delete_data->log_delete_kepanitiaan_acara($user);
		redirect('super_administrator/kepanitiaan_acara');
	 
	}

		//Deskripsi Kegiatan Kepanitiaan

	public function deskripsi_kegiatan_kepanitiaan()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$deskripsi_kegiatan_kepanitiaan['nama_kegiatan_kepanitiaan'] = $this->Query->query_kegiatan_kepanitiaan1();
         $deskripsi_kegiatan_kepanitiaan['poin'] = $this->Query->query_poin_kepanitiaan();
        $deskripsi_kegiatan_kepanitiaan['poin1'] = $this->Query->query_poin_kepanitiaan1();
        $deskripsi_kegiatan_kepanitiaan['poin2'] = $this->Query->query_poin_kepanitiaan2();
        $deskripsi_kegiatan_kepanitiaan['deskripsi'] = $this->Query->query_deskripsi_kepanitiaan();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/deskripsi_kegiatan_kepanitiaan',$deskripsi_kegiatan_kepanitiaan);
        } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_kepanitiaan(){
		$user = $this->set_var();
		$this->input_data->insert_deskripsi_kepanitiaan($user);
		redirect ('super_administrator/deskripsi_kegiatan_kepanitiaan');
	}

	function detail_deskripsi_kegiatan_kepanitiaan($ID){
		 $deskripsi_kegiatan_kepanitiaan['deskripsi'] = $this->Query->getByIdDeskripsiKepanitiaan($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/detail_deskripsi_kegiatan_kepanitiaan',$deskripsi_kegiatan_kepanitiaan);
	}

	function update_deskripsi_kegiatan_kepanitiaan($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_kepanitiaan($ID,$user);
            redirect('super_administrator/deskripsi_kegiatan_kepanitiaan');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiKepanitiaan($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepanitiaan/update_deskripsi_kegiatan_kepanitiaan', $data);
 
    }
	function delete_deskripsi_kegiatan_kepanitiaan($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_kepanitiaan($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_kepanitiaan($user);
		redirect ('super_administrator/deskripsi_kegiatan_kepanitiaan');
	 
	}


//	Isi Kegiatan Kepanitiaan

	public function isi_mahasiswa_kegiatan_kepanitiaan(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_panitia['nomor']= $this->Query->query_nomor_sk_kepanitiaan();
		$isi_panitia['deskripsi']= $this->Query->query_deskripsi_kepanitiaan1();
		$isi_panitia['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan kepanitiaan/isi_kegiatan_kepanitiaan',$isi_panitia);
		 } else{
        $this->load->view('super_administrator/menu_isi_kegiatan kepanitiaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_panitia(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk="Kepanitiaan";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$this->input_data->insert_mahasiswa_panitia($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_kegiatan_kepanitiaan');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_panitia($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_kegiatan_kepanitiaan');
	}
	}

	//Kegiatan Kepesertaan
		//PKM
	public function pkm(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$pkm['pkm']= $this->Query->query_pkm();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/pkm',$pkm);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function tambah_pkm(){
		$pkm['pkm']= $this->Query->query_ormawa();
		$pkm['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_pkm();
		$pkm['kategori_pkm']= $this->Query->query_kategori_pkm();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/tambah_pkm',$pkm);
	}

	function submit_pkm(){
		$user = $this->set_var();
		$this->input_data->insert_pkm($user);
		redirect ('super_administrator/pkm');
	}

	function update_pkm($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_pkm($ID,$user);
            redirect('super_administrator/pkm');
        }
        $data['hasil'] = $this->Query->getByIdPKM($ID);

        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_pkm', $data);
 
    }
	function delete_pkm($ID){
		$user=$this->set_var();
		$this->delete_data->delete_pkm($ID);
		$this->delete_data->log_delete_pkm($user);
		redirect('super_administrator/pkm');
	 
	}
	public function deskripsi_pkm()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$deskripsi_kegiatan_pkm['nama_kegiatan_pkm'] = $this->Query->query_kegiatan_pkm();
         $deskripsi_kegiatan_pkm['poin'] = $this->Query->query_poin_pkm();
        $deskripsi_kegiatan_pkm['deskripsi'] = $this->Query->query_deskripsi_pkm();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/deskripsi_kegiatan_pkm',$deskripsi_kegiatan_pkm);
        } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_pkm(){
		$user = $this->set_var();
		$this->input_data->insert_deskripsi_pkm($user);
		redirect ('super_administrator/deskripsi_pkm');
	}

	function detail_deskripsi_kegiatan_pkm($ID){
		 $deskripsi_kegiatan_pkm['deskripsi'] = $this->Query->getByIdDeskripsiPKM($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/detail_deskripsi_pkm',$deskripsi_kegiatan_pkm);
	}

	function update_deskripsi_kegiatan_pkm($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_pkm($ID,$user);
            redirect('super_administrator/deskripsi_pkm');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiPKM($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_deskripsi_kegiatan_pkm', $data);
 
    }
	function delete_deskripsi_kegiatan_pkm($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_pkm($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_pkm($user);
		redirect ('super_administrator/deskripsi_pkm');
	 
	}
	//Isi Mahasiswa PKM
	public function isi_mahasiswa_pkm(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_pkm['nomor']= $this->Query->query_nomor_sk_pkm();
		$isi_pkm['deskripsi']= $this->Query->query_deskripsi_pkm1();
		$isi_pkm['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan_kepesertaan/isi_kegiatan_pkm',$isi_pkm);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_pkm(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "PKM";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_pkm($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_pkm');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_pkm($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_pkm');
	}
}
//Rekap PKM
	public function rekap_pkm(){
		$pkm['pkm']= $this->Query->rekap_pkm();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/laporan_pkm',$pkm);
	}
	//Mawapres
	public function mawapres(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$mawapres['mawapres']= $this->Query->query_mawapres();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/mawapres',$mawapres);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function tambah_mawapres(){
		$mawapres['mawapres']= $this->Query->query_ormawa();
		$mawapres['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_mawapres();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/tambah_mawapres',$mawapres);
	}

	function submit_mawapres(){
		$user = $this->set_var();
		$this->input_data->insert_mawapres($user);
		redirect ('super_administrator/mawapres');
	}

	function update_mawapres($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_mawapres($ID,$user);
            redirect('super_administrator/mawapres');
        }
        $data['hasil'] = $this->Query->getByIdMawapres($ID);

        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_mawapres', $data);
 
    }
	function delete_mawapres($ID){
		$user=$this->set_var();
		$this->delete_data->delete_mawapres($ID);
		$this->delete_data->log_delete_mawapres($user);
		redirect('super_administrator/mawapres');
	 
	}
	//Dekripsi Mawapres
	public function deskripsi_mawapres()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$deskripsi_kegiatan_mawapres['nama_kegiatan_mawapres'] = $this->Query->query_kegiatan_mawapres();
         $deskripsi_kegiatan_mawapres['poin'] = $this->Query->query_poin_mawapres();
        $deskripsi_kegiatan_mawapres['deskripsi'] = $this->Query->query_deskripsi_mawapres();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/deskripsi_kegiatan_mawapres',$deskripsi_kegiatan_mawapres);
        } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_mawapres(){
		$user = $this->set_var();
		$this->input_data->insert_deskripsi_mawapres($user);
		redirect ('super_administrator/deskripsi_mawapres');
	}

	function detail_deskripsi_kegiatan_mawapres($ID){
		 $deskripsi_kegiatan_mawapres['deskripsi'] = $this->Query->getByIdDeskripsiMawapres($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/detail_deskripsi_mawapres',$deskripsi_kegiatan_mawapres);
	}

	function update_deskripsi_kegiatan_mawapres($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_mawapres($ID,$user);
            redirect('super_administrator/deskripsi_mawapres');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiMawapres($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_deskripsi_kegiatan_mawapres', $data);
 
    }
	function delete_deskripsi_kegiatan_mawapres($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_mawapres($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_mawapres($user);
		redirect ('super_administrator/deskripsi_mawapres');
	 
	}
	//Isi Mahasiswa MAWAPRES
	public function isi_mahasiswa_mawapres(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_mawapres['nomor']= $this->Query->query_nomor_sk_mawapres();
		$isi_mawapres['deskripsi']= $this->Query->query_deskripsi_mawapres1();
		$isi_mawapres['mahasiswa_poin']= $this->Query->query_mahasiswa_poin_mawapres();
		$isi_mawapres['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan_kepesertaan/isi_kegiatan_mawapres',$isi_mawapres);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_mawapres(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "MAWAPRES";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_mawapres($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_mawapres');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_mawapres($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_mawapres');
	}
}
//Rekap MAWAPRES
	public function rekap_mawapres(){
		$mawapres['mawapres']= $this->Query->rekap_mawapres();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/laporan_mawapres',$mawapres);
	}
	//Perlombaaan
	public function perlombaan()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$deskripsi_kegiatan_perlombaan['nama_kegiatan_perlombaan'] = $this->Query->query_kegiatan_perlombaan();
         $deskripsi_kegiatan_perlombaan['poin'] = $this->Query->query_poin_perlombaan();
        $deskripsi_kegiatan_perlombaan['deskripsi'] = $this->Query->query_deskripsi_perlombaan();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/perlombaan',$deskripsi_kegiatan_perlombaan);
        } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_perlombaan(){
		$user = $this->set_var();
		$nama = $this->input->post('nama');
		$sql=("select  nama from kegiatan where nama = '".$nama."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		  	$sql1 = "SELECT id  from  kegiatan  where nama = '".$nama."' ";
      	$query1=$this->db->query($sql1);
      	 $result = $query1->result_array();
		  	 foreach($result as $data){
		  	  $id= $data['ID'];
		  	   }
        $this->input_data->insert_deskripsi_perlombaan($user,$id);
		redirect ('super_administrator/perlombaan');
	}else{
		$this->input_data->insert_nama_perlombaan();
		$sql1 = "SELECT id  from  kegiatan  where nama = '".$nama."' ";
      	$query1=$this->db->query($sql1);
      	 $result = $query1->result_array();
		  	 foreach($result as $data){
		  	 	 $id= $data['ID'];
		  	   }
		  	   
		$this->input_data->insert_deskripsi_perlombaan($user,$id);
		redirect ('super_administrator/perlombaan');
		}
	}

	function detail_deskripsi_kegiatan_perlombaan($ID){
		 $deskripsi_kegiatan_lomba['deskripsi'] = $this->Query->getByIdDeskripsiPerlombaan($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/detail_deskripsi_perlombaan',$deskripsi_kegiatan_lomba);
	}

	function update_deskripsi_kegiatan_perlombaan($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_perlombaan($ID,$user);
            redirect('uper_administrator/perlombaan');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiPerlombaan($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_deskripsi_kegiatan_perlombaan', $data);
 
    }
	function delete_deskripsi_kegiatan_perlombaan($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_perlombaan($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_perlombaan($user);
		redirect ('super_administrator/perlombaan');
	 
	}
	//Isi Mahasiswa Lomba
	public function isi_mahasiswa_lomba(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_lomba['nomor']= $this->Query->query_nomor_sk_lomba();
		$isi_lomba['deskripsi']= $this->Query->query_deskripsi_lomba1();
		$isi_lomba['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan_kepesertaan/isi_kegiatan_lomba',$isi_lomba);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_lomba(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "Kompetisi Minat dan Bakat";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_lomba($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_lomba');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_lomba($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_lomba');
	}
}
//Rekap Perlombaan
	public function rekap_lomba(){
		$lomba['lomba']= $this->Query->rekap_lomba();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/laporan_lomba',$lomba);
	}
	//Wirausaha
	public function wirausaha()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$deskripsi_kegiatan_wirausaha['nama_kegiatan_wirausaha'] = $this->Query->query_kegiatan_wirausaha();
         $deskripsi_kegiatan_wirausaha['poin'] = $this->Query->query_poin_perlombaan();
        $deskripsi_kegiatan_wirausaha['deskripsi'] = $this->Query->query_deskripsi_wirausaha();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/wirausaha',$deskripsi_kegiatan_wirausaha);
        } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_wirausaha(){
		$user = $this->set_var();
		$nama = $this->input->post('nama');
		$sql=("select  nama from kegiatan where nama = '".$nama."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		  	$sql1 = "SELECT id  from  kegiatan  where nama = '".$nama."' ";
      	$query1=$this->db->query($sql1);
      	 $result = $query1->result_array();
		  	 foreach($result as $data){
		  	  $id= $data['ID'];
		  	   }
        $this->input_data->insert_deskripsi_wirausaha($user,$id);
		redirect ('super_administrator/perlombaan');
	}else{
		$this->input_data->insert_nama_wirausaha();
		$sql1 = "SELECT id  from  kegiatan  where nama = '".$nama."' ";
      	$query1=$this->db->query($sql1);
      	 $result = $query1->result_array();
		  	 foreach($result as $data){
		  	 	 $id= $data['ID'];
		  	   }
		  	   
		$this->input_data->insert_deskripsi_wirausaha($user,$id);
		redirect ('super_administrator/wirausaha');
		}
	}

	function detail_deskripsi_kegiatan_wirausaha($ID){
		 $deskripsi_kegiatan_wirausaha['deskripsi'] = $this->Query->getByIdDeskripsiWirausaha($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/detail_deskripsi_wirausaha',$deskripsi_kegiatan_wirausaha);
	}

	function update_deskripsi_kegiatan_wirausaha($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_wirausaha($ID,$user);
            redirect('super_administrator/wirausaha');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiWirausaha($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_deskripsi_kegiatan_wirausaha', $data);
 
    }
	function delete_deskripsi_kegiatan_wirausaha($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_wirausaha($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_wirausaha($user);
		redirect ('super_administrator/wirausaha');
	 
	}
	//Isi Mahasiswa Wirausaha
	public function isi_mahasiswa_wirausaha(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_wirausaha['nomor']= $this->Query->query_nomor_sk_wirausaha();
		$isi_wirausaha['deskripsi']= $this->Query->query_deskripsi_wirausaha1();
		$isi_wirausaha['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan_kepesertaan/isi_kegiatan_wirausaha',$isi_wirausaha);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_wirausaha(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "Wirausaha";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_wirausaha($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_wirausaha');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_wirausaha($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_wirausaha');
	}
}
//Rekap Wirausaha
	public function rekap_wirausaha(){
		$wirausaha['wirausaha']= $this->Query->rekap_wirausaha();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/laporan_wirausaha',$wirausaha);
	}
	//Workshop&Seminar
	public function workshop_seminar()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$deskripsi_kegiatan_workshop_seminar['nama_kegiatan_workshop_seminar'] = $this->Query->query_kegiatan_workshop_seminar();
         $deskripsi_kegiatan_workshop_seminar['poin'] = $this->Query->query_poin_perlombaan();
        $deskripsi_kegiatan_workshop_seminar['deskripsi'] = $this->Query->query_deskripsi_workshop_seminar();
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/workshop',$deskripsi_kegiatan_workshop_seminar);
        } else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_workshop_seminar(){
		$user = $this->set_var();
		$nama = $this->input->post('nama');
		$sql=("select  nama from kegiatan where nama = '".$nama."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		  	$sql1 = "SELECT id  from  kegiatan  where nama = '".$nama."' ";
      	$query1=$this->db->query($sql1);
      	 $result = $query1->result_array();
		  	 foreach($result as $data){
		  	  $id= $data['ID'];
		  	   }
        $this->input_data->insert_deskripsi_workshop_seminar($user,$id);
		redirect ('super_administrator/workshop_seminar');
	}else{
		$this->input_data->insert_nama_workshop_seminar();
		$sql1 = "SELECT id  from  kegiatan  where nama = '".$nama."' ";
      	$query1=$this->db->query($sql1);
      	 $result = $query1->result_array();
		  	 foreach($result as $data){
		  	 	 $id= $data['ID'];
		  	   }
		  	   
		$this->input_data->insert_deskripsi_workshop_seminar($user,$id);
		redirect ('super_administrator/workshop_seminar');
		}
	}

	function detail_deskripsi_kegiatan_workshop_seminar($ID){
		 $deskripsi_kegiatan_workshop_seminar['deskripsi'] = $this->Query->getByIdDeskripsiWorkshop_seminar($ID);
		 $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/detail_deskripsi_workshop',$deskripsi_kegiatan_workshop_seminar);
	}

	function update_deskripsi_kegiatan_workshop_seminar($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_workshop_seminar($ID,$user);
            redirect('super_administrator/workshop_seminar');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiWorkshop_seminar($ID);;
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/update_deskripsi_kegiatan_workshop', $data);
 
    }
	function delete_deskripsi_kegiatan_workshop_seminar($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_workshop_seminar($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_workshop_seminar($user);
		redirect ('super_administrator/workshop_seminar');
	 
	}
	//Isi Workshop$Seminar
	public function isi_mahasiswa_workshop_seminar(){
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$isi_workshop_seminar['nomor']= $this->Query->query_nomor_sk_workshop_seminar();
		$isi_workshop_seminar['deskripsi']= $this->Query->query_deskripsi_workshop_seminar1();
		$isi_workshop_seminar['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_isi_kegiatan_kepesertaan/isi_kegiatan_workshop_seminar',$isi_workshop_seminar);
		} else{
        $this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_workshop_seminar(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "Workshop $ Seminar";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_workshop_seminar($id,$user,$nomor);
		redirect ('super_administrator/isi_mahasiswa_workshop_seminar');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_workshop_seminar($id,$user,$nomor);
       redirect ('super_administrator/isi_mahasiswa_workshop_seminar');
	}
}
//Rekap Workshop$Seminar
	public function rekap_workshop_seminar(){
		$workshop_seminar['workshop_seminar']= $this->Query->rekap_workshop_seminar();
		$this->load->view('super_administrator/menu_manajemen_kegiatan_kepesertaan/laporan_workshop',$workshop_seminar);
	}



	//Laporan
			//Hasil validasi admin
	public function laporan()
	{
		$tahun = date( 'Y');
		$tahunlalu = $tahun - 1;
		$laporan['hasil_laporan'] = $this->Query->query_laporan($tahun,$tahunlalu);
        $this->load->view('super_administrator/menu_laporan/laporan',$laporan);
	}

	public function detail_laporan_mahasiswa($id_deskripsi){
		$data['hasil'] = $this->Query->getByIdDetail($id_deskripsi);
        $this->load->view('super_administrator/menu_laporan/detail_laporan_mahasiswa', $data);
	}

	function delete_laporan_mahasiswa($ID){
		$user=$this->set_var();
		$this->delete_data->delete_laporan_mahasiswa($ID);
		$this->delete_data->log_delete_laporan_mahasiswa($user);
		redirect('super_administrator/laporan');
	 
	}

		//Hasil validasi mahasiswa
	public function laporan_validasi_mahasiswa()
	{
		$laporan['hasil_laporan'] = $this->Query->query_laporan1();
        $this->load->view('super_administrator/menu_laporan/laporan_validasi_mahasiswa',$laporan);
	}
	public function submit_validasi_laporan(){
		$user=$this->set_var();
		$id = $_POST['inputcek'];
		$this->update_data->update_validasi_laporan($id,$user);
		redirect ('super_administrator/laporan_validasi_mahasiswa');
	}


		//Rekap Tiap Mahasiswa
	public function rekap_tiap_mahasiswa(){
		$rekap['kelas'] = $this->Query->get_kelas();
		$this->load->view('super_administrator/menu_laporan/rekap_mahasiswa',$rekap);
	}

	public function detail_rekap_tiap_mahasiswa($nrp){
		$rekap['rekap']=$this->Query->get_rekap($nrp);
		$this->load->view('super_administrator/menu_laporan/detail_rekap_mahasiswa',$rekap);
	}

	public function detail_deskripsi_laporan_mahasiswa($ID_DESKRIPSI){
		$rekap['deskripsi']=$this->Query->get_Deskripsi($ID_DESKRIPSI);
		$this->load->view('super_administrator/menu_laporan/detail_deskripsi_laporan_mahasiswa',$rekap);
	}
	public function cetakpdf_laporan($nrp){
		$user = $this->set_var();
		$data['laporan_mahasiswa'] = $this->Query->get_rekap($nrp);
 		$data['data_mahasiswa'] = $this->Query->query_data_mahasiswa1($nrp);
 		$data['tanda_tangan']= $this->Query->query_data_wakil();
 		$this->load->view('super_administrator/menu_laporan/bukti_print',$data);
 		// $user = $this->set_var();
		// $this->load->library('m_pdf');
		// $this->load->model('Query','',TRUE);
		// $pdfFilePath = "Laporan Kegiatan.pdf";
  //       $data['laporan_mahasiswa'] = $this->Query->get_rekap($nrp);
  //       $data['data_mahasiswa'] = $this->Query->query_data_mahasiswa1($nrp);
		//  $html = $this->load->view('super_administrator/menu_laporan/bukti_print',$data, true);
		// $this->m_pdf->pdf->WriteHTML($html);
 	//   $this->m_pdf->pdf->Output($pdfFilePath, "D");  
	}

	//Rekap Kegiatan Alumni
	public function rekap_alumni()
	{
		$laporan['hasil_laporan'] = $this->Query->query_alumni();
        $this->load->view('super_administrator/menu_laporan/rekap_alumni',$laporan);
	}
	public function detail_rekap_tiap_alumni($nrp){
		$rekap['rekap']=$this->Query->get_rekap($nrp);
		$this->load->view('super_administrator/menu_laporan/detail_rekap_alumni',$rekap);
	}
	
	// public function laporan_validasi()
	// {
	// 	//$user = $this->set_var();
	// 	$this->load->model('Query','',TRUE);
 //        $laporan['hasil_laporan'] = $this->Query->query_laporan_tervalidasi();
 //        $this->load->view('administrator/menu_laporan/laporan_validasi',$laporan);
	// }
	public function carikelas(){
		$this->load->helper('url');
		$kelas = $this->input->post('kelas');
		$prodi = $this->input->post('prodi');
		$jurusan = $this->input->post('jurusan');
		$pararel = $this->input->post('pararel');
		$namakelas = $kelas . $prodi . $jurusan . $pararel;
		$data['kelas'] = $this->Query->get_mahasiswa_kelas($namakelas);
		$this->load->view('super_administrator/ajax_get_kelas',$data);
	}
	public function carikelas1(){
		$this->load->helper('url');
		$kelas = $this->input->post('kelas');
		$prodi = $this->input->post('prodi');
		$jurusan = $this->input->post('jurusan');
		$pararel = $this->input->post('pararel');
		$namakelas = $kelas . $prodi . $jurusan . $pararel;
		$data['kelas'] = $this->Query->get_mahasiswa_kelas($namakelas);
		$this->load->view('super_administrator/ajax_get_rekap',$data);
	}

	public function getkelasMahasiswa($id){
		$this->load->helper('url');
        $data['kelas'] = $this->Query->get_mahasiswa($id);
        $this->load->view('super_administrator/ajax_get_kelas',$data);
	}
	public function getkelasMahasiswa1($id){
		$this->load->helper('url');
        $data['kelas'] = $this->Query->get_mahasiswa($id);
        $this->load->view('super_administrator/ajax_get_rekap',$data);
	}  

	
	function set_var(){
		$user['email'] = $this->session->userdata('EMAIL');
	 	$user['id'] = $this->session->userdata('ID');
	 	$user['hak_akses'] = $this->session->userdata('HAK_AKSES');
	 	return $user;
	 }
	function check_login()
	{
		if($this->session->userdata('EMAIL')==false) {
            redirect('login/index');
        }else if($this->session->userdata('HAK_AKSES')!=1){
		
			show_error('Acces Denied', '403', $heading = 'An Error Was Encountered');
		}
	}
}