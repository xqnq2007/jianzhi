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
	$.post("/index.php/Public/jjcurcity",function(data){
			if(data['status']=='1'){				
				var str=data['curcity'];
				var loginurl="/"+str+"/Weijj/login";
				$('#loginBtn').attr('href', loginurl);
				var posturl="/"+str+"/Weijj/post";
				$('#postBtn').attr('href', posturl);	
				var logourl="/"+str+"/Weijj";
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
		$.post("/index.php/Public/jjcurcity",function(data){
			if(data['status']=='1'){				
				var str=data['curcity'];
				switch(str){
					case 'bj':				
						location.href="/bj/Weijj";	  
						break;
					case 'tj':
						location.href="/tj/Weijj";	  
						break;
					default:
						location.href="/tj/Weijj";	  
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
			$.post("/tj/Public/jjcurcity",function(data){
			if(data['status']=='1'){			
				var str=data['curcity'];					
				var tmpurl="/"+str+"/Weijj/search?k="+tmpkey;
				location.href=tmpurl;
			}
			});	
		}						
	});
});