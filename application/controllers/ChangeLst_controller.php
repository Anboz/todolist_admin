<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeLst_controller extends CI_Controller {
		function update_text(){
			 $this->load->model("SaveData_model");
			 $data = array(
				  'id' => $_POST['id'],
				  'todo_text' => $_POST['todo_text'] 
			 );
			  
			 $this->SaveData_model->update_text($data); 		
		}
		
		function update_status(){
			
			
		}
		
		function delete_(){
			
			
		}

	 
	
	 
	 

}



?>