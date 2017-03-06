<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('User','',TRUE);
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('input_data','',TRUE);
		
	}
 
 	
  public function index()
  {
    // load the session library
		
		
		$username = $this->input->post("email");
        $password = $this->input->post("password");
		
		$this->form_validation->set_rules("email", "Email", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required|callback_check_database");
		
 
        // if form was submitted and given captcha word matches one in session
        if ( $this->form_validation->run() == TRUE ){
			$result = $this->User->login($username, $password);
			$hak = $this->User->hak_akses($username);
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				 'EMAIL' => $row['EMAIL'],
				 'ID' => $row['ID'],
				 'HAK_AKSES' => $hak
				);
				$this->session->set_userdata($sess_array);
				
			}
			
			$this->check_user();

        }
		else
		{
	
            $this->load->view('home.php');
        }
		
	}
	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post("email");
		 
		//query the database
		$result = $this->User->login($username, $password);
		 
		if($result)
		{
			
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
	function check_user()
	{	
		$user = $this->set_var();
		$this->input_data->insert_log($user);
		if($this->session->userdata('HAK_AKSES')==1)
			redirect('super_administrator/dashboard');
		else if($this->session->userdata('HAK_AKSES')==2)
			redirect('administrator/dashboard');
		else if($this->session->userdata('HAK_AKSES')==0)
			redirect('mahasiswa/beranda');
		
	}

	function logout()
	{
		$user = $this->set_var();
		$this->input_data->insert_log_logout($user);
		$this->session->unset_userdata('EMAIL');
		$this->session->unset_userdata('ID');
		$this->session->unset_userdata('HAK_AKSES');
		session_destroy();
		redirect('login');
	}
	function set_var(){
		$user['email'] = $this->session->userdata('EMAIL');
	 	$user['id'] = $this->session->userdata('ID');
	 	$user['hak_akses'] = $this->session->userdata('HAK_AKSES');
	 	return $user;
	 }
}

