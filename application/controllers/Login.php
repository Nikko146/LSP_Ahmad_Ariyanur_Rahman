<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function index(){
		$data['pesan']="";		
	    $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'Password tidak boleh kosong'));
		if ($this->form_validation->run() == FALSE) 
			$this->load->view("login",$data);
	    else
	    {
	    	if($data['dt']=$this->m_umum->cek_login())
			{
				$data_user = array(
			        'username'  => $data['dt']['username'],
					'name' 		=> $data['dt']['name']
					);
				$this->session->set_userdata($data_user);
				redirect(base_url("admin"));
			}        	
			else
	    	{
	    		$data['pesan']='username password salah';
				$this->load->view("login",$data);			
	    	}
	    }	
	}

	function logout(){
        unset(
            $_SESSION['username'],
			$_SESSION['name'],
        );  
		$data['pesan']='Logout Sukses';
		$this->load->view("login",$data);			
	}

}
