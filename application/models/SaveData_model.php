<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class SaveData_model extends CI_Model{
 	public function insert_data($data)
 	{
 		$this->db->insert('tbl_todolist', $data); 	
 	}
 	public function update_data($data)
 	{
 		$this->db->update('tbl_admin', $data); 	
 	} 
  	public function update_text($data)
 	{
 		$this->db->where('id', $data['id']);
 		$this->db->update('tbl_todolist', $data['todo_text']); 	
 	}
 	 
 /*	
 	public function select_data($ORDER_BY = "user_name" $sart)
 	{
 		
 		$this->db->select('*');
 		$this->db->from("tbl_todolist");
 		$this->db->order_by('$ORDER_BY');
 		$this->db->limit(10, $start);
 		$query = $this->db->get();
 		return $query;
 	}
 	
 	*/
 	
 }



?>