$(function(){	
	$.post("/index.php/Public/isLogin",function(data){			
			if(data=='1'){
				$('#loginBtn').hide();
			}
		});
	/*$.post("/index.php/Public/curcity",function(data){
			if(data['status']=='1'){			
				var str=data['curcity'];					
				var tmpurl="/"+str+"/Boss/reg";
				$('.pass-reglink').attr('href', tmpurl);	
				switch(str){
					case 'bj':				
						$('#bjarea').show();
						$('#tjarea').hide();
						$('#tj').show();
						$('#bj').hide();
						break;
					case 'tj':
						$('#tjarea').show();
						$('#bjarea').hide();
						$('#bj').show();
						$('#tj').hide();
						break;
					default:
						 $('#tjarea').show();
						$('#bjarea').hide();
						$('#bj').show();
						$('#tj').hide();
				}
			}
		});*/
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
			$.post("/tj/Public/curcity",function(data){
			if(data['status']=='1'){			
				var str=data['curcity'];					
				var tmpurl="/"+str+"/Index/search?k="+tmpkey;
				location.href=tmpurl;
			}
			});								
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
			$.post("/tj/Boss/bossLoginTest",{username:username,pass:pass},function(data){	
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
				$.post("/tj/Post/bossPost",{title:title,phone:phone,detail:detail,weixin:weixin,qq:qq},function(data){	
					if(data=='1'){
						 $('#postModal').modal('hide');
						$('#alertModal').modal('show');
						setTimeout("$('#alertModal').modal('hide');",2000);
						$.post("/index.php/Public/curcity",function(data){
							if(data['status']=='1'){			
								var str=data['curcity'];					
								var tmpurl="/"+str+"/";
								window.location.href=tmpurl;	  
							}
						});						
					}else if(data=='2'){
						alert('已经有同样的信息了！');
					} else{
						alert('提交失败');
					 }
				});			
            }else{
				alert('电话格式有误');
			} 
    	}       
    });		
});