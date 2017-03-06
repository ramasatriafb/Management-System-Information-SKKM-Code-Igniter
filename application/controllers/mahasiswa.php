<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('form_validation');
		$this->load->model('update_data','',TRUE);
		$this->load->model('Query','',TRUE);
		
		//$this->load->library('tcpdf');
		$this->check_login();
	} 
	public function index()
	{
	}
	public function beranda()
	{
		$user = $this->set_var();
		$this->load->model('Query','',TRUE);
		$data['jadwal_kegiatan'] = $this->Query->query_jadwal_kegiatan();
        $data['laporan_mahasiswa'] = $this->Query->query_laporan_mahasiswa($user);
        $data['minimum_poin'] = $this->Query->query_minimum_poin();
        $data['kelas'] = $this->Query->query_data_mahasiswa_kelas($user);
        $this->load->view('mahasiswa/menu_beranda/beranda',$data);
	}
	public function laporan()
	{
		$user = $this->set_var();
		$this->load->model('Query','',TRUE);
		$data['jadwal_kegiatan'] = $this->Query->query_jadwal_kegiatan();
        $data['laporan_mahasiswa'] = $this->Query->query_laporan_mahasiswa($user);
        $this->load->view('mahasiswa/menu_laporan/laporan',$data);
	}
	
	public function validasi()
	{
		$user = $this->set_var();
		$this->load->model('Query','',TRUE);
        $laporan['laporan_mahasiswa'] = $this->Query->query_laporan_mahasiswa1($user);
        $this->load->view('mahasiswa//menu_laporan_validasi/validasi',$laporan);
	}

	public function update_laporan_mahasiswa($ID){
		$user = $this->set_var();
		$config['upload_path']='uploads';
		$config['allowed_types']='jpg|png|jpeg|pdf';
		$config['max_size']='2000';
		$config['file_name'] = $ID;

		$this->load->library('upload',$config);
		 $this->load->model('Query','',TRUE);
		  if($this->input->post('submit')){
		  	if(!$this->upload->do_upload('file')){
				$error = "File yang Anda Upload lebih dari 2MB atau Format file tidak sesuai";
				$data['error']=$error;
				$data['hasil'] = $this->Query->getByIdLaporan($ID);
				$this->load->view('mahasiswa/menu_laporan_validasi/update_laporan_mahasiswa',$data);
				}
				else {
				$bukti=$this->upload->data();
				$data['upload_data']=$bukti;
				if($bukti['file_name']){
				$filebukti="/sim_skkm/uploads/".$bukti['file_name'];
			}

			  // $file = $_FILES['file']['tmp_name'];
			  // $image_name = mysql_real_escape_string($_FILES['file']['name']);
			  // $image = mysql_real_escape_string(file_get_contents($file));
			  $this->update_data->update_laporan_mahasiswa($ID,$filebukti);
			  $this->update_data->update_log_laporan_mahasiswa($user);
			  // $data['hasil'] = $this->Query->getByIdLaporan($ID);
			  // $this->load->view('mahasiswa/menu_laporan_validasi/update_laporan_mahasiswa',$data);
			  redirect('mahasiswa/validasi'); 
			  }
			}
        else{
        $data['hasil'] = $this->Query->getByIdLaporan($ID);
  		    $this->load->view('mahasiswa/menu_laporan_validasi/update_laporan_mahasiswa', $data);
	}
	}
	public function detail_laporan_mahasiswa($ID_DESKRIPSI){
		$this->load->model('Query','',TRUE);
        $data['hasil'] = $this->Query->getByIdDetail1($ID_DESKRIPSI);
        $this->load->view('mahasiswa/menu_laporan_validasi/detail_laporan_mahasiswa', $data);
	}

	private function _gen_pdf($html,$paper='A4'){
		 ob_end_clean();
		 $this->load->library('mpdf/mpdf');
		 $mpdf=new mPDF('utf-8', $paper );
		// // $style = file_get_contents('http://localhost/sim_skkm/assets/DataTable/jquery.dataTables.css"');
		// 	$style1 = file_get_contents('http://localhost/sim_skkm/assets/bootstrap/css/bootstrap.min.css');
		// 	//$mpdf->WriteHTML($style, 1);
		// 	$mpdf->WriteHTML($style1, 1);
		 //$mpdf->debug = true;
		 
	}

	public function cetakpdf_laporan(){
		$user = $this->set_var();
		$data['tanda_tangan']= $this->Query->query_data_wakil();
 		$data['laporan_mahasiswa'] = $this->Query->query_laporan_mahasiswa($user);
        $data['data_mahasiswa'] = $this->Query->query_data_mahasiswa($user);
        $this->load->view('mahasiswa/bukti_print',$data);
		// $user = $this->set_var();
		// $this->load->library('m_pdf');
		// $this->load->model('Query','',TRUE);
		// $pdfFilePath = "Laporan Kegiatan.pdf";
  //       $data['laporan_mahasiswa'] = $this->Query->query_laporan_mahasiswa($user);
  //       $data['data_mahasiswa'] = $this->Query->query_data_mahasiswa($user);
		//  $html = $this->load->view('mahasiswa/bukti_print',$data, true);
		// $this->m_pdf->pdf->WriteHTML($html);
 	//   $this->m_pdf->pdf->Output($pdfFilePath, "D");  
	}

    //  private function _gen_pdf($html,$paper='A4')
    // {
    //     $this->load->library('mpdf53/mpdf');               
    //     $mpdf=new mPDF('utf-8',$paper);
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
    // } 

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
        }else if($this->session->userdata('HAK_AKSES')!=0){
		
			show_error('Acces Denied', '403', $heading = 'An Error Was Encountered');
		}
	}
}