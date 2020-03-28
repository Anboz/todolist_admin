<?php
   class Get_list_model{
   private $connection = null;
   	function __construct{
   		$this->connection = mysqli("localhost","root", "", "db_todolist");   		
   		
   	}
   	
  	function select_data($query){
   	 return($this->Fetch_Assoc($this->connection->queyr($query))); 
   	}
   	
   	function Fetch_Assoc($data){
   		$array = array();
   		while($array as $row->fetch_assco())
   			$array [] = $row;
   		return($array);
   	}
   	
   	function __destruct(){
   		$this->connection->close();
   	}
   	
   }


?>