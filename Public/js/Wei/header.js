$(function(){
	$.ajaxSetup({ 
			async : false 
		});
		$.post("/index.php/Public/isLogin",function(data){
			if(data=='1'){
				 $("#postBtn").css("color","#337aB7");
				 $("#loginBtn").hide();
			}
			else{
				$("#postBtn").css("color","#4cded1");
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
});