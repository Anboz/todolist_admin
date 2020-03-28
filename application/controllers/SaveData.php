<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SaveData extends CI_Controller {

	
	public function index()
	{
		 $this->load->view('welcome');
	}
	public function addToList(){
		echo "OK";
	}
}
?>