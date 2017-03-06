<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrator extends CI_Controller
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
		//$user = $this->set_var();
		
		$tahun = date ('Y');
		$count['count_wajib'] = $this->Query->query_count_wajib($tahun);
		$count['count_ormawa'] = $this->Query->query_count_ormawa($tahun);
        $count['count_ukm'] = $this->Query->query_count_ukm($tahun);
        $count['count_panitia'] = $this->Query->query_count_panitia($tahun);
        $this->load->view('administrator/menu_dashboard/dashboard',$count);
	}

//Manajemen Poin
	public function manajemen_poin()
	{
		$tahun = date('Y');
		$date = date('d-m-Y');
		$sql=("SELECT * from batas_waktu where EXTRACT( YEAR FROM tgl_awal) = '".$tahun."' and EXTRACT( YEAR FROM tgl_akhir) = '".$tahun."'
and tgl_awal <= '".$date."' and tgl_akhir >= '".$date."' ");
		 $query = $this->db->query($sql);
		 if($query -> num_rows() == 1){
		 $poin['tabel_poin'] = $this->Query->query_tabel_poin();
         $this->load->view('administrator/menu_manajemen_poin/manajemen_poin',$poin);
          }
      else{
        $this->load->view('administrator/menu_manajemen_poin/batas_waktu');
      }
		 
	}

	public function tambah_jenis_poin()
	{
		//$user = $this->set_var();
		$poin['tingkat_partisipasi'] = $this->Query->query_tingkat_partisipasi();
		$poin['lingkup_partisipasi'] = $this->Query->query_lingkup_partisipasi();
		$this->load->view('administrator/menu_manajemen_poin/tambah_poin',$poin);
	}
	public function submit_poin()
	{
		$user = $this->set_var();
		$this->input_data->insert_poin($user);
		redirect ('administrator/manajemen_poin');
	}

	function update_poin($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_poin($ID,$user);
            redirect('administrator/manajemen_poin');
        }
        $poin['hasil'] = $this->Query->getByIDTingkatPoin($ID);
        $this->load->view('administrator/menu_manajemen_poin/update_poin', $poin);
 
    }
	function delete_poin($ID){
		$user = $this->set_var();
		$this->delete_data->delete_poin($ID);
		$this->delete_data->log_delete_poin($user);
		redirect('administrator/manajemen_poin');
	 
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
        $this->load->view('administrator/menu_manajemen_kegiatan_wajib/kegiatan_wajib',$wajib);
           }
      else{
        $this->load->view('administrator/menu_manajemen_kegiatan_wajib/batas_waktu');
      }

	}

	public function tambah_kegiatan_wajib(){
		$wajib['kegiatan_wajib'] = $this->Query->query_kegiatan_wajib();
		$wajib['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_wajib();
		$this->load->view('administrator/menu_manajemen_kegiatan_wajib/tambah_kegiatan_wajib',$wajib);
	}
	
	public function submit_kegiatan_wajib(){
		$user = $this->set_var();
		$this->input_data->insert_kegiatan_wajib($user);
		redirect('administrator/kegiatan_wajib');
	}

	function update_kegiatan_wajib($ID){
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_kegiatan_wajib($ID,$user);
            redirect('administrator/kegiatan_wajib');
        }
        $wajib['hasil'] = $this->Query->getByIDKegiatanWajib($ID);
        $this->load->view('administrator/menu_manajemen_kegiatan_wajib/update_kegiatan_wajib',$wajib);
	}

	function delete_kegiatan_wajib($ID){
		$user=$this->set_var();
		$this->delete_data->delete_kegiatan_wajib($ID);
		$this->delete_data->log_delete_kegiatan_wajib($user);
		redirect('administrator/kegiatan_wajib');
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
        $this->load->view('administrator/menu_manajemen_kegiatan_wajib/deskripsi_kegiatan_wajib',$deskripsi_kegiatan_wajib);
           }
      else{
        $this->load->view('administrator/menu_manajemen_kegiatan_wajib/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_wajib(){
		$user = $this->set_var();
		$this->input_data->insert_deskripsi_wajib($user);
		redirect ('administrator/deskripsi_kegiatan_wajib');
	}

	function detail_deskripsi_kegiatan_wajib($id){
		 $deskripsi_kegiatan_wajib['deskripsi'] = $this->Query->getByIdDeskripsiWajib($id);
		 $this->load->view('administrator/menu_manajemen_kegiatan_wajib/detail_deskripsi_kegiatan_wajib',$deskripsi_kegiatan_wajib);
	}

	function update_deskripsi_kegiatan_wajib($id) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_wajib($id,$user);
            redirect('administrator/deskripsi_kegiatan_wajib');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiWajib($id);;
        $this->load->view('administrator/menu_manajemen_kegiatan_wajib/update_deskripsi_kegiatan_wajib', $data);
 
    }
	function delete_deskripsi_kegiatan_wajib($id){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_wajib($id);
		$this->delete_data->log_delete_poin_deskripsi_kegiatan_wajib($user);
		redirect ('administrator/deskripsi_kegiatan_wajib');
	 
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
		$this->load->view('administrator/menu_isi_kegiatan_wajib/isi_kegiatan_wajib',$isi_wajib);
		  }
      else{
        $this->load->view('administrator/menu_isi_kegiatan_wajib/batas_waktu');
      }
	}

	public function submit_mahasiswa_wajib(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk="Wajib";
		$date = date('d-m-Y');
		$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."' and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		
		$this->input_data->insert_mahasiswa_wajib($id,$user,$nomor);
		redirect ('administrator/isi_mahasiswa_kegiatan_wajib');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_wajib($id,$user,$nomor);
       redirect ('administrator/isi_mahasiswa_kegiatan_wajib');
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
		$this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/organisasi_mahasiswa',$ormawa);
		  }
      else{
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/batas_waktu');
      }
	}

	public function tambah_organisasi_mahasiswa(){
		$ormawa['ormawa']= $this->Query->query_ormawa();
		$ormawa['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_ormawa();
		$this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/tambah_organisasi_mahasiswa',$ormawa);
	}

	function submit_ormawa(){
		$user = $this->set_var();
		$this->input_data->insert_ormawa($user);
		redirect ('administrator/organisasi_mahasiswa');
	}

	function update_ormawa($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_ormawa($ID,$user);
            redirect('administrator/organisasi_mahasiswa');
        }
        $data['hasil'] = $this->Query->getByIdOrmawa($ID);
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/update_organisasi_mahasiswa', $data);
 
    }
	function delete_ormawa($ID){
		$user=$this->set_var();
		$this->delete_data->delete_ormawa($ID);
		$this->delete_data->log_delete_ormawa($user);
		redirect('administrator/organisasi_mahasiswa');
	 
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
		$this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/kepanitiaan_acara',$panitia);
		  }
      else{
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/batas_waktu');
      }
	}

	public function tambah_kepanitiaan_acara(){
		$panitia['panitia']= $this->Query->query_kepanitiaan_acara();
		$panitia['jenis_kegiatan'] = $this->Query->query_jenis_kegiatan_kepanitiaan_acara();
		$this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/tambah_kepanitiaan_acara',$panitia);
	}

	function submit_kepanitiaan_acara(){
		$user = $this->set_var();
		$this->input_data->insert_kepanitiaan_acara($user);
		redirect ('administrator/kepanitiaan_acara');
	}

	function update_kepanitiaan_acara($ID) {
		$user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_kepanitiaan_acara($ID,$user);
            redirect('administrator/kepanitiaan_acara');
        }
        $panitia['hasil'] = $this->Query->getByIdKepanitiaan_Acara($ID);
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/update_kepanitiaan_acara', $panitia);
 	 }
	function delete_kepanitiaan_acara($ID){
		$user=$this->set_var();
		$this->delete_data->delete_kepanitiaan_acara($ID);
		$this->delete_data->log_delete_kepanitiaan_acara($user);
		redirect('administrator/kepanitiaan_acara');
	 
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
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/deskripsi_kegiatan_kepanitiaan',$deskripsi_kegiatan_kepanitiaan);
          }
      else{
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/batas_waktu');
      }
	}

	public function submit_deskripsi_kegiatan_kepanitiaan(){
		$user = $this->set_var();
		$this->input_data->insert_deskripsi_kepanitiaan($user);
		redirect ('administrator/deskripsi_kegiatan_kepanitiaan');
	}

	function detail_deskripsi_kegiatan_kepanitiaan($ID){
		 $deskripsi_kegiatan_kepanitiaan['deskripsi'] = $this->Query->getByIdDeskripsiKepanitiaan($ID);
		 $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/detail_deskripsi_kegiatan_kepanitiaan',$deskripsi_kegiatan_kepanitiaan);
	}

	function update_deskripsi_kegiatan_kepanitiaan($ID) {
        $user = $this->set_var();
		if($this->input->post('submit')){
            $this->update_data->update_deskripsi_kegiatan_kepanitiaan($ID,$user);
            redirect('administrator/deskripsi_kegiatan_kepanitiaan');
        }
        $data['hasil'] = $this->Query->getByIdDeskripsiKepanitiaan($ID);;
        $this->load->view('administrator/menu_manajemen_kegiatan_kepanitiaan/update_deskripsi_kegiatan_kepanitiaan', $data);
 
    }
	function delete_deskripsi_kegiatan_kepanitiaan($ID){
		$user=$this->set_var();
		$this->delete_data->delete_deskripsi_kegiatan_kepanitiaan($ID);
		$this->delete_data->log_delete_deskripsi_kegiatan_kepanitiaan($user);
		redirect ('administrator/deskripsi_kegiatan_kepanitiaan');
	 
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
		$this->load->view('administrator/menu_isi_kegiatan kepanitiaan/isi_kegiatan_kepanitiaan',$isi_panitia);
		 } else{
        $this->load->view('administrator/menu_isi_kegiatan kepanitiaan/batas_waktu');
      }
	}

	public function submit_mahasiswa_panitia(){
		$user = $this->set_var();
		$tahun = date('Y');
		$jenis_sk = "Kepanitiaan";
		$date = date('d-m-Y');$id = $_POST['inputcek'];
		$nomor = $this->input->post('nomor_sk');
		$sql=("select nomor , tahun from nomor_sk where EXTRACT( YEAR FROM tahun) = '".$tahun."' and nomor = '".$nomor."'and jenis_sk = '".$jenis_sk."'
");
		 $query = $this->db->query($sql);
		  if($query -> num_rows() == 1){
		$this->input_data->insert_mahasiswa_panitia($id,$user,$nomor);
		redirect ('administrator/isi_mahasiswa_kegiatan_kepanitiaan');
		} else{
			$this->input_data->insert_nomor_sk($user,$nomor,$jenis_sk);
			$this->input_data->insert_mahasiswa_panitia($id,$user,$nomor);
       redirect ('administrator/isi_mahasiswa_kegiatan_kepanitiaan');
	}
		
	}


	//Laporan
			//Hasil validasi admin
	public function laporan()
	{
		$tahun = date( 'Y');
		$tahunlalu = $tahun - 1;
		$laporan['hasil_laporan'] = $this->Query->query_laporan($tahun,$tahunlalu);
        $this->load->view('administrator/menu_laporan/laporan',$laporan);
	}

	public function detail_laporan_mahasiswa($ID_DESKRIPSI){
		$data['hasil'] = $this->Query->getByIdDetail($ID_DESKRIPSI);
        $this->load->view('administrator/menu_laporan/detail_laporan_mahasiswa', $data);
	}

	function delete_laporan_mahasiswa($ID){
		$user=$this->set_var();
		$this->delete_data->delete_laporan_mahasiswa($ID);
		$this->delete_data->log_delete_laporan_mahasiswa($user);
		redirect('administrator/laporan');
	 
	}

		//Hasil validasi mahasiswa
	public function laporan_validasi_mahasiswa()
	{
		$laporan['hasil_laporan'] = $this->Query->query_laporan1();
        $this->load->view('administrator/menu_laporan/laporan_validasi_mahasiswa',$laporan);
	}
	public function submit_validasi_laporan(){
		$user=$this->set_var();
		$id = $_POST['inputcek'];
		$this->update_data->update_validasi_laporan($id,$user);
		redirect ('administrator/laporan_validasi_mahasiswa');
	}


		//Rekap Tiap Mahasiswa
	public function rekap_tiap_mahasiswa(){
		$rekap['kelas'] = $this->Query->get_kelas();
		$this->load->view('administrator/menu_laporan/rekap_mahasiswa',$rekap);
	}

	public function detail_rekap_tiap_mahasiswa($nrp){
		$rekap['rekap']=$this->Query->get_rekap($nrp);
		$this->load->view('administrator/menu_laporan/detail_rekap_mahasiswa',$rekap);
	}

	public function detail_deskripsi_laporan_mahasiswa($ID_DESKRIPSI){
		$rekap['deskripsi']=$this->Query->get_Deskripsi($ID_DESKRIPSIi);
		$this->load->view('administrator/menu_laporan/detail_deskripsi_laporan_mahasiswa',$rekap);
	}
	public function cetakpdf_laporan($nrp){
		$user = $this->set_var();
		$data['laporan_mahasiswa'] = $this->Query->get_rekap($nrp);
 		$data['data_mahasiswa'] = $this->Query->query_data_mahasiswa1($nrp);
 		$data['tanda_tangan']= $this->Query->query_data_wakil();
 		$this->load->view('administrator/menu_laporan/bukti_print',$data);
		// $this->load->library('m_pdf');
		// $this->load->model('Query','',TRUE);
		// $pdfFilePath = "Laporan Kegiatan.pdf";
  //       $data['laporan_mahasiswa'] = $this->Query->get_rekap($nrp);
  //       $data['data_mahasiswa'] = $this->Query->query_data_mahasiswa1($nrp);
		//  $html = $this->load->view('administrator/menu_laporan/bukti_print',$data, true);
		// $this->m_pdf->pdf->WriteHTML($html);
 	//   $this->m_pdf->pdf->Output($pdfFilePath, "D");  
	}

	//Rekap Kegiatan Alumni
	public function rekap_alumni()
	{
		$laporan['hasil_laporan'] = $this->Query->query_alumni();
        $this->load->view('administrator/menu_laporan/rekap_alumni',$laporan);
	}
	public function detail_rekap_tiap_alumni($nrp){
		$rekap['rekap']=$this->Query->get_rekap($nrp);
		$this->load->view('administrator/menu_laporan/detail_rekap_alumni',$rekap);
	}
	

	public function carikelas(){
		$this->load->helper('url');
		$kelas = $this->input->post('kelas');
		$prodi = $this->input->post('prodi');
		$jurusan = $this->input->post('jurusan');
		$pararel = $this->input->post('pararel');
		$namakelas = $kelas . $prodi . $jurusan . $pararel;
		$data['kelas'] = $this->Query->get_mahasiswa_kelas($namakelas);
		$this->load->view('administrator/ajax_get_kelas',$data);
	}
	public function carikelas1(){
		$this->load->helper('url');
		$kelas = $this->input->post('kelas');
		$prodi = $this->input->post('prodi');
		$jurusan = $this->input->post('jurusan');
		$pararel = $this->input->post('pararel');
		$namakelas = $kelas . $prodi . $jurusan . $pararel;
		$data['kelas'] = $this->Query->get_mahasiswa_kelas($namakelas);
		$this->load->view('administrator/ajax_get_rekap',$data);
	}


	
	// public function laporan_validasi()
	// {
	// 	//$user = $this->set_var();
	// 	$this->load->model('Query','',TRUE);
 //        $laporan['hasil_laporan'] = $this->Query->query_laporan_tervalidasi();
 //        $this->load->view('administrator/menu_laporan/laporan_validasi',$laporan);
	// }

	public function getkelasMahasiswa($id){
		$this->load->helper('url');
        $data['kelas'] = $this->Query->get_mahasiswa($id);
        $this->load->view('administrator/ajax_get_kelas',$data);
	}
	public function getkelasMahasiswa1($id){
		$this->load->helper('url');
        $data['kelas'] = $this->Query->get_mahasiswa($id);
        $this->load->view('administrator/ajax_get_rekap',$data);
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
        }else if($this->session->userdata('HAK_AKSES')!=2){
		
			show_error('Acces Denied', '403', $heading = 'An Error Was Encountered');
		}
	}
}