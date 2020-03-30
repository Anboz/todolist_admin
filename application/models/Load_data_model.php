<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Load_data_model extends CI_Model
 {
 	 
	 	//====================================
	 	public function count_data()
        { 		
	 		$this->db->select('*');
	 		$this->db->from("tbl_todolist"); 		 
	 		$query = $this->db->get();
	 		return count($query->result());
     	}
	 	
	 	//====================================
	 	
	 	function update_todoText($data)
	 	{
	 		 //$this->db->where('id', $data['id']);
	 	     $this->db->query("UPDATE tbl_todolist SET todo_text = '".$data['todo_text']."' WHERE id = '".$data['id']."'");
	 	     // print_r($this->db->update("tbl_todolist", $data)->result());
	 	     // echo ("OOOOkkkk");
 	    }
	 	
	 	
	 	//====================================
	 	
	 	 function update_status($data)
	 	 { 		
 	    	 $this->db->query("UPDATE tbl_todolist SET status = '".$data['status']."' WHERE id = '".$data['id']."'"); 
 	     }
	 	 
	 	//==================================== 
	 	
	 	function delete_todo($id)
	 	{ 		
 	    	 $this->db->query("DELETE FROM tbl_todolist WHERE id = '".$id."'"); 
 	    }
 	    public function select_data($order = "user_name", $start = 1)
 		{
 		
 		$this->db->select('*');
 		$this->db->from("tbl_todolist");
 		$this->db->order_by($order);
 		$this->db->limit(10, $start);
 		$query = $this->db->get();
 		return $query;
 		}
 	
 	
	 	//==================================== 
	 	
	 	function is_admin($data)					
	 	{ 	
	      $this->db->select("*");
	      $this->db->from('tbl_admin');
	 	  return  count($this->db->query("SELECT *FROM tbl_admin WHERE password = '".$data['password']."' AND login = '".$data['login']."'")->result())  > 0;
	     
	 	}
	 	
 	
 }



?>