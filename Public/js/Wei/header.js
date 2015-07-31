$(function(){
	$.ajaxSetup({ 
			async : false 
		});
		$.post("/index.php/Public/isLogin",function(data){
			if(data=='1'){
				 $("#loginBtn").hide();				 
				  $("#postBtn").show();				
			}			
		});	
	$('#postBtn').click(function(){	
		$.ajaxSetup({ 
			async : false 
		});
		$.post("/index.php/Public/isLogin",function(data){
			if(data=='1'){			
				location.href="/index.php/Wei/post";	  
			}
			else{
				alert('没有登陆');
				return false;
			}
		});		
	});
	$("#searchBtn").click(function(){	
		$tmpkey=$.trim($("#keywords").val());
		if($tmpkey){
			location.href='/index.php/Wei/search?k='+$tmpkey;
		}						
	});
});