<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
	   
	    $auth = false;
	    $auth = (isset($_COOKIE['67f9068e757a3edb981233b394d664ee']));	    
		if($auth)
		{	 
			  $this->Delete_And_Change();			
			  $this->load_view();     			 				      		
		 }
		else
		{					
			$this->load->view("authorization");				
		}		
		if(!$auth && isset($_POST['sendpassword']))
		{
			 $this->login();
		}		 
	}
	 
	
	function load_view(){
	         $_GET['page'] = (isset($_GET['page'])) ? $_GET['page'] : 1;
		     $this->load->model("Load_data_model");
		     $amount_pages = 1;
		     
	         if($this->Load_data_model->count_data() > 10)
	         {
	         	$amount_pages = ($this->Load_data_model->count_data() % 10 > 0) ? (int)($this->Load_data_model->count_data() / 10) + 1 : $this->Load_data_model->count_data() / 10;
	         } 
	         $order =(isset($_POST['user_email']))? "user_email" : (isset($_POST['todo_text']) ? "todo_text" : "user_name");         		     		     	 	   
	         $data['todo_list'] =  $this->Load_data_model->select_data($order,( isset($_GET['page']) && $_GET['page']  > 0) ? ($_GET['page'] - 1) * 10 : 1)->result();
	         
	       	 $_GET['amount_pages'] = $amount_pages;
	       	            
		     $this->load->view('welcome', $data);	
		
	}
	
	//===========================
	
   	function update_text(){
   	      $data = array(
						"id" =>        $_POST['id'],
						'todo_text' => $_POST['todotext']
						);
		 $this->load->model("Load_data_model");		 		      
		 $this->Load_data_model->update_todoText($data);
	}
	
	//===========================
    function update_status(){
   	      $data = array(
						"id" =>        $_POST['id'],
						'status' => 1
						);
		 $this->load->model("Load_data_model");		 		      
		 $this->Load_data_model->update_status($data);
	}  
	
	//===========================
	
  	function delete_todo(){   	            
		 $this->load->model("Load_data_model");		 		      
		 $this->Load_data_model->delete_todo($_POST['id']);
	}
	
	//===========================
	
	function Delete_And_Change(){
		     if(isset($_POST['todotext']))			 			  			    
		         $this->update_text();		       	 
			 if(isset($_POST['status']))
			     $this->update_status();
			 if(isset($_POST['command']))
			 	 $this->delete_todo();
	}
	
	//===========================
	
    function login(){	
	  	$this->load->library('form_validation');
		$this->form_validation->set_rules("login", "Login", "required");
		$this->form_validation->set_rules("password", "Password", "required");
	 
		if($this->form_validation->run())
		{
			$this->load->model('Load_data_model');
			$data = array(			
				'login' =>    md5(trim($this->input->post('login'))),
				'password' => md5(trim($this->input->post('password'))),
			);			  
			 if($this->Load_data_model->is_admin($data))
			{		 
				//
				 setcookie(md5(trim($this->input->post('password'))), md5(trim($this->input->post('password'))));
				 die('<script type="text/javascript">window.location="";</script>');
				//Welcome
				//redirect(base_url()."Wlecome/");				 
			}	 	
			
			
		}  
		 
		
	} 
		
}
