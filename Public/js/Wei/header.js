$(function(){
	$.ajaxSetup({ 
			async : false 
		});
		$.post("/index.php/Public/isLogin",function(data){
			if(data=='1'){
				 $("#loginLi").hide();				 
				  $("#postLi").show();				
			}			
		});
	$.post("/index.php/Public/curcity",function(data){
			if(data['status']=='1'){				
				var str=data['curcity'];
				var loginurl="/"+str+"/Wei/login";
				$('#loginBtn').attr('href', loginurl);
				var posturl="/"+str+"/Wei/post";
				$('#postBtn').attr('href', posturl);	
				var logourl="/"+str+"/Wei";
				$('#logohref').attr('href', logourl);						
				switch(str){
					case 'bj':				
						$('#bjarea').show();
						$('#tj').show();
						$('#tjarea').hide();
						$('#bj').hide();
						break;
					case 'tj':
						$('#tjarea').show();
						$('#bj').show();
						$('#bjarea').hide();
						$('#tj').hide();
						break;
					default:
						 $('#tjarea').show();
						$('#bj').show();
						$('#bjarea').hide();
						$('#tj').hide();
				}
			}
		});
	$('#indexlink').click(function(){
		$.post("/index.php/Public/curcity",function(data){
			if(data['status']=='1'){				
				var str=data['curcity'];
				switch(str){
					case 'bj':				
						location.href="/bj/Wei";	  
						break;
					case 'tj':
						location.href="/tj/Wei";	  
						break;
					default:
						location.href="/tj/Wei";	  
				}
			}
		});
	});
	/*$('#postBtn').click(function(){	
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
	});*/
	$("#searchBtn").click(function(){	
		var tmpkey=$.trim($("#keywords").val());
		if(tmpkey){
			$.post("/tj/Public/curcity",function(data){
			if(data['status']=='1'){			
				var str=data['curcity'];					
				var tmpurl="/"+str+"/Wei/search?k="+tmpkey;
				location.href=tmpurl;
			}
			});	
		}						
	});
});