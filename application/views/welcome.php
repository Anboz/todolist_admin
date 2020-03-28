<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Список задач</title>
	
	<link rel="stylesheet" href="user_guide/_static/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="user_guide/_static/css/style.css"/>
	<link rel="stylesheet" href="user_guide/_static/css/css_scroll.css"/>
	<link rel="stylesheet" href="user_guide/_static/css/font-awesome.css"/>
	 
</head>
<body>
  <div class="top_block">
  </div>
	 
	 <div class="container-fluid">
	 <div class="row">
	
	 	<div class="col-md-11">
	 		<div class="scrollbar" id="style-1">
	 		  <div class="container">
	 		  
	 		  <?if(count($todo_list) > 0){ ?>
	 		  
	 		     <? foreach($todo_list as $row){?>
	 			<div class="todo" id="block<?=$row->id?>">
		 			<div class="container">
		 				<div class='row userName'>		 				
			 				<div class="col-md-3 text-info">Пользователь:  </div>
			 				<div class="col-md-9 text-info"><b> <?=htmlspecialchars($row->user_name);?> </b></div>	 				
		 				</div>
		 				
		 				<div class='row userName'>
			 				<div class="col-md-3 text-info">Email:  </div>
			 				<div class="col-md-9 text-info"><b><?=htmlspecialchars($row->user_email);?></b>
			 				</div>	 				
		 				</div>	
		 			  				 
		 				<div class='row'>
			 				<div class="col-md-3">
			 				Задача: 
			 				<hr>
			 				
			 				<div id="status<?=$row->id;?>">			 				 
			 				<i style="color: <?=($row->status==0) ? 'red':'green'?>"><?=($row->status==0)?('Ещё не выполнено'):("<img src='user_guide\_images\success.png'> Выполнено")?></i> 			 				
			 				</div>
			 				 <div >
				 				 <span id="btn_todo<?=$row->id;?>">
				 				 <?if($row->status == 0){ ?>
				 				  <button type="button" id="do<?=$row->id;?>" class="btn btn-link" style="margin-top: 5px; font-size: 12px; padding:4px;" onclick="todo_(<?=$row->id;?>)">
				 				  <img src="user_guide\_images\success.png">
				 				  </button>
				 				  <? } ?>
				 				  </span>
				 				 <span id="btn_edit<?=$row->id;?>">   
				 				  <button type="button"  id="edit<?=$row->id;?>" onclick="edit_(<?=$row->id;?>)" class="btn btn-link" style="margin-top: 5px; font-size: 12px; padding:4px;">
				 				  <img src="user_guide\_images\edit.png">
				 				  </button> 
				 				 </span>
				 				 <span id="btn_delete<?=$row->id;?>"> 
				 				  <button type="button" id="delete<?=$row->id;?>" onclick="delete_(<?=$row->id;?>)" class="btn btn-link" style="margin-top: 5px; font-size: 12px; padding:4px;">
				 				  <img src="user_guide\_images\delete.ico" width="16" height="16">
				 				  </button>
				 				 </span>
			 				 </div>
			 				</div>
			 				<div class="col-md-9 textStyle"> 
			 				  <span id="text<?=$row->id?>">
			 				    <?=htmlspecialchars($row->todo_text);?>
			 				  
			 				  </span>
			 				 
			 			
							</div>	 				
		 				</div>
		 			</div>
	 			</div>
	 			<br />
	 			 <? }   ?>
	 			 
	 			<?  } ?>
	 			 
	 			
	 			</div>
	 			<div class="force-overflow"></div>
	 			 </div>
	 	</div>
	 		 
	 </div>
	 		
	 </div>
	  <div align="center" style="background-color:#b6adb1" >
	 	<br>
	    <?if($_GET['page'] > 2){ ?> 
	    	 <a href="?page=1" class="btn btn-primary">1</a>	  
		  	<a href="?page=<?=($_GET['page'] - 1)?>" class="btn btn-primary">
		  	<<
		  	</a>
	   <? } ?>	  
	  	<a href="?page=<?=($_GET['page'] > 1 && $_GET['page'] < $_GET['amount_pages']) ? $_GET['page'] - 1 :(($_GET['page'] == $_GET['amount_pages'])? $_GET['amount_pages'] - 2 : 1) ?>" class="btn btn-<?=($_GET['page'] == 1) ? 'dark' : 'primary'?>">
	  	<?=($_GET['page'] > 1 && $_GET['page'] < $_GET['amount_pages']) ? $_GET['page'] - 1 : (($_GET['page'] == $_GET['amount_pages'])? $_GET['amount_pages'] - 2 : 1)?>	  		
	  	</a>
	  	
	    <? if( $_GET['amount_pages'] > 1){ ?>
	       
		  	<a href="?page=<?=($_GET['page']!= 1 && $_GET['page']!=$_GET['amount_pages']) ? $_GET['page'] :( ($_GET['page']== 1) ? 2 : $_GET['amount_pages'] - 1)  ?>" class="btn btn-<?=($_GET['page']!= 1 && $_GET['page']!=$_GET['amount_pages']) ? 'dark' :'primary'?>">
		  		<?=($_GET['page']!= 1 && $_GET['page']!=$_GET['amount_pages']) ? $_GET['page'] :( ($_GET['page']== 1) ? 2 : $_GET['amount_pages'] - 1)  ?>	  		
		  	</a>	
	  	 <? } ?>
	  	 
	  	 <? if( $_GET['amount_pages'] > 2){ ?> 
		  	<a href="?page=<?=($_GET['page'] < $_GET['amount_pages'] && $_GET['page'] != 1) ? $_GET['page'] + 1 :(($_GET['page'] == 1) ? 3 : $_GET['amount_pages'] )?>" class="btn btn-<?=($_GET['page'] == $_GET['amount_pages'] && $_GET['amount_pages'] > 2) ? 'dark' : 'primary'?>">
		  		<?=($_GET['page'] < $_GET['amount_pages'] && $_GET['page'] != 1) ? $_GET['page'] + 1 :(($_GET['page'] == 1) ? 3 : $_GET['amount_pages'] )?>
		  	</a>
	  	 <? } ?>
	  	 
	  	 
	  	<?if($_GET['page'] < $_GET['amount_pages'] - 1 && $_GET['amount_pages'] > 3){  ?>
	  	
		     	<a href="?page=<?=($_GET['page'] + 1)?>" class="btn btn-primary">
		     	>>		     		
		     	</a>	     			  	   		  	   	
	     		<a href="?page=<?=$_GET['amount_pages']?>" class="btn btn-primary">	     		
	     		<?=$_GET['amount_pages']?>	     		
	     		</a>		  	  
	  	<? } ?>	
	  	<br>  		<br> 
	  </div>

	<script src="user_guide/_static/js/js_scroll.js"></script>
	<script src="user_guide/_static/jquery-3.1.0.js"></script>
	<script>
	  var edit_click = "";	  
		 function todo_(id_){
		 $.ajax({
		 	url:"",
		 	type:"POST",
		 	data: {'id':id_,'status':'1'},
		 	success: function(){
			 	document.getElementById("status"+id_).innerHTML = "<i class='text-success'><img src='user_guide\_images\success.png'> Выпольнено</i>";	
			 	document.getElementById("btn_todo"+id_).innerHTML = "";
		 	}
		 	
		 });
		 
	      	
	    	
	      	
	      }
	  
		 function edit_(id_){
			if(edit_click == "")
			{
				 document.getElementById("text"+id_).innerHTML = "<textarea class='form-control' style='width:100%; height:auto' id='t"+id_+"'>"+document.getElementById("text"+id_).innerHTML.trim()+"</textarea>";
				 
			document.getElementById("edit"+id_).innerHTML = "<img src='user_guide/_images/save.png' />"; 
			edit_click = id_; 
		    }
		    else
		    {
		       
		    	    $.ajax({
			 			url:"",
			 			type:'POST',
			 			data:{
			 			'id':id_, 
			 			'todo_text': document.getElementById('t'+id_).value.trim()
			 			},
		 			    success:function(){
		 			        document.getElementById("text"+id_).innerHTML = document.getElementById('t'+id_).value.trim();
		 			        document.getElementById("edit"+id_).innerHTML = "<img src='user_guide/_images/edit.png'>";
		 			        	 			         
		 			    	edit_click = "";  
		 			    }
		 				
		 	
		           }); 	 
		          
		       
		    	 
		    }
		}
		
		 function delete_(id_){
		 if(confirm("вы действительно хотите удалить")){
			$.ajax({
				url:"",
				type:"POST",
				data:{'id':id_, 'command':'delete'},
				success:function(info){
				    document.getElementById('block'+id_).innerHTML = "";
					document.getElementById('block'+id_).className = "";
				}
				
				
			});
			
		 }
       }
	     
		
		
		
	</script>
	
	
	
</body>
</html>