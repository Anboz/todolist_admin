<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	
	<link rel="stylesheet" href="user_guide/_static/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="user_guide/_static/css/style.css"/>
	<link rel="stylesheet" href="user_guide/_static/css/css_scroll.css"/>
	
</head>
<body>
<div class="container">
   <div class="container">
   <div>
   <br><br> <br><br>
   </div>
   	<div class="row">
   	  <div class="col-md-4"></div>
   	    <div class="col-md-4">
   		 <form action="" method="post" class="todo">
   		 	<div class="form-group">
   		 		<label for="login">Логин:</label>
   		 		<input type="text"class="form-control" placeholder="Логин" name="login" id="login" />
   		 		
   		 	</div>
   		 	<div class="form-group">
   		 		<label for="password">Пароль:</label>
   		 		<input type="password" class="form-control" name="password"id="password" />   		 		
   		 	</div>
   		 	<div class="form-group">
   		 		<input type="submit" value=" Вход " class="btn btn-success" name="sendpassword"/>
   		 	</div>
   		 	
   		 </form>
   		</div> 
   	  <div class="col-md-4"></div>
   	</div>
   	
   </div>  	
</div>
	 
	
	
</body>
</html>