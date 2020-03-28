<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {	

	public function login(){	
	 	$this->load->library('form_validation');
		$this->form_validation->set_rules("login", "Login", "required");
		$this->form_validation->set_rules("password", "Password", "required");
		if($this->form_validation->run())
		{
			$this->load->model('Load_data_model');
			$data = array(			
			'login' => md5(trim($this->input->post('login'))),
			'password' => md5(trim($this->input->post('password'))),
			);
			$this->Load_data_model->is_admin($data);
			 if($this->Load_data_model->is_admin($data))
			{
				//
				setcookie('67f9068e757a3edb981233b394d664ee', md5(trim($this->input->post('password'))));
				//redirect(base_url()."Wlecome/");				 
			}	 	
			
			
		} 
		
	}

}

?>