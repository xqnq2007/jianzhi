$(function(){	
	$.post("/index.php/Public/isLogin",function(data){			
			if(data=='1'){
				$('#loginBtn').hide();
			}
		});
	$('#postBtn').click(function(){		
		$.post("/index.php/Public/isLogin",function(data){			
			if(data=='0'){
				 alert('您还没有登陆');
			}else{
				$('#postModal').modal('show');				
			}
		});
	});
	$("#searchBtn").click(function(){	
		var tmpkey=$.trim($("#keywords").val());
		if(tmpkey){			
			location.href='/index.php/Index/search?k='+tmpkey;						
		}						
	});
	$("#login-btn").click(function(){		
    	var username=$.trim($("#username").val());
    	var pass=$.trim($("#pass").val());    	
    	if((username=='')||(pass=='')){
    		alert('用户名和密码不能为空');   
			return false;
    	}else{
			var tmp='0';
			$.ajaxSetup({ 
				async : false 
			});			
			$.post("/index.php/Boss/bossLoginTest",{username:username,pass:pass},function(data){				
				if(data=='1'){					
					tmp='1';
				 }				
			});			
			if(tmp=='0'){
				$('#alertModalLabel').text('登陆失败!');
					$('#alertModal').modal('show');
					setTimeout("$('#alertModal').modal('hide');",1000);		
				return false;
			}else{
				$('#loginModal').modal('hide');
					$('#alertModalLabel').text('登陆成功!');
					$('#alertModal').modal('show');	
					setTimeout("$('#alertModal').modal('hide');",2000);
					window.location.href="/index.php/Index";	
			}
		}
    });	
});
//   表单验证函数
$(function(){	 
    var ok1=false;
    var ok2=false;
    var ok3=false;	
    // 验证标题 
    function titleTest(){
    	var title=$("#title").val();
        if($.trim(title)==''){}
        else{
        	$("#title").next().text('');
            ok1=true;
        }
    }
	// 验证详情     
    function detailTest(){
    	var title=$("#detail").val();
        if($.trim(title)==''){        	
        }
        else{        	
            ok3=true;
        }
    }	
	$("#detail").keyup(function(){
		maxlimit=1000; 
		if (this.value.length > maxlimit) 
		this.value = this.value.substring(0, maxlimit); 
	}); 
 // 验证电话号码
    function phoneTest(){
    	var phone=$.trim($("#phone").val());
		var patrn = /^(((\+?86)|(\(\+86\)))?\d{3,4}-)?\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$("#phone").next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $("#phone").next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$("#phone").next().text('');
            ok2=true;
        }
    }	
    //提交按钮,所有验证通过方可提交
	//公共发布页面提交
    $("#submit-btn").click(function(){
    	var title=$.trim($("#title").val());
    	var phone=$.trim($("#phone").val());
    	var detail=$.trim($("#detail").val());
		var weixin=$.trim($("#weixin").val());
		var qq=$.trim($("#qq").val());
    	if((title=='')||(phone=='')||(detail=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();    							
    		if(ok2){            	
				var tmp;
				$.ajaxSetup({ 
					async : false 
				});			
				$.post("/index.php/Post/pubBossPost",{title:title,phone:phone,detail:detail,weixin:weixin,qq:qq},function(data){			
				if(data=='1'){
						 $('#postModal').modal('hide');
						$('#alertModal').modal('show');
						setTimeout("$('#alertModal').modal('hide');",2000);
						window.location.href="/index.php/Index";	  
					 }
					 else{
						alert('提交失败');
					 }
				});			
            }else{
				alert('电话格式有误');
			} 
    	}       
    });		
});