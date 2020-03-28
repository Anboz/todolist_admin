$(document).ready(function(){
	function load_list(page, _url){
		$.ajax({
			url:_url,
			method:'GET',
			dataType:'json',
			success:function(data){
				$("#paginnation_link").html(data.paginatio_link);
				
			}	
			
		});
	}
	
	
})