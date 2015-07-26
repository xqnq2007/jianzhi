  function postinfo(){
	  window.location.href="/index.php/Index/postinfo";	  
  }  
$(function(){
		$(".weixin").each(function(){			
                var tmpweixin = $(this).html();			
				if(!tmpweixin){					
					$(this).parent().css("display","none");
				}				
            });
		$(".qq").each(function(){
				var tmpqq = $(this).html();					
				if(!tmpqq){					
					$(this).parent().css("display","none");
		}
    });
});			  
//  表单验证函数
	$(function(){	
	    var ok1=false;
	    var ok2=false;	    
	    // 验证用户名/Tpl/PUblic/register_do.php	    
	    function usernameTest(){
	    	var username=$.trim($("#bossUsername").val());
	        if(!(/[a-zA-Z0-9]{3,20}/).test(username)){	          
	        }else{
	   			ok1=true;
	        }      
	    }
	    //验证密码	    
	    function passwordTest(){
	    	var password=$.trim($("#bossPass").val());
	    	if(!(/[a-zA-Z0-9]{6,20}/).test(password)){	        		            
	        }else{
	            ok2=true;
	        }
	    }
	    //提交按钮,所有验证通过方可提交
	    $("#bossSubBut").click(function(){	    	
	    	var username=$.trim($("#bossUsername").val());
	    	var password=$.trim($("#bossPass").val());
	    	if((username=='')||(password=='')){
	    		alert('用户名和密码不能为空');        		
	    	}else{				 
	    		usernameTest();
	    		passwordTest();
	    		if(ok1 && ok2){
					var tmp;
					$.ajaxSetup({ 
						async : false 
					});
					$.post("/index.php/Index/bossLoginTest",{name:username,pass:password},function(data){					
						if(data=='1'){            		
							 $("#bossform").submit();
						}
						else{
							alert('用户名或密码错误');
						}
					});	            	        	
	            }
	    	}
	    });	     
	});
	$(function(){		 
	    var ok3=false;
	    var ok4=false;	    
	    // 验证用户名/Tpl/PUblic/register_do.php	    
	    function usernameTest(){
	    	var username=$.trim($("#stuUsername").val());
	        if(!(/[a-zA-Z0-9]{3,20}/).test(username)){	           
	        }else{
	   			ok3=true;
	        }      
	    }
	    //验证密码	    
	    function passwordTest(){
	    	var password=$.trim($("#stuPass").val());
	    	if(!(/[a-zA-Z0-9]{6,20}/).test(password)){	        		            
	        }else{
	            ok4=true;
	        }
	    }
	    //提交按钮,所有验证通过方可提交
	    $("#stuSubBut").click(function(){	    	
	    	var username=$.trim($("#stuUsername").val());
	    	var password=$.trim($("#stuPass").val());
	    	if((username=='')||(password=='')){
	    		alert('用户名和密码不能为空');        		
	    	}else{	    		
	    		usernameTest();
	    		passwordTest();
	    		if(ok3 && ok4){
					var tmp;
					$.ajaxSetup({ 
						async : false 
					});
					$.post("/index.php/Index/stuLoginTest",{name:username,pass:password},function(data){
						if(data=='1'){            		
							 $("#stuform").submit();
						}
						else{
							alert('用户名或密码错误');
						}
					});	
	            }
	    	} 
	    });	    
	});	
	$(function(){
		$(".current").css('border','none');
		$(".current").hover(function(){
			$(this).css('background','none');
		});
		$(".title").click(function() {
			var title = $(this).find(".parenttitle").html();
			var detail= $(this).parent().parent().find(".parentdetail").html();
			var time = $(this).parent().parent().find(".parenttime").html();
			var phone=$(this).parent().parent().find(".parentphone").html();
			var weixin =$(this).parent().parent().find(".parentweixin").html();
			var qq =$(this).parent().parent().find(".parentqq").html();			
			$("#myModal").find(".title").html(title);
			$("#myModal").find(".detail").html(detail);
			$("#myModal").find(".time").html(time);
			$("#myModal").find(".phone").html(phone);
			$("#myModal").find(".weixin").html(weixin);
			$("#myModal").find(".qq").html(qq);
			$("#Modal").modal();
		});
	});		