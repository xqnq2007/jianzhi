$(function(){
	$.post("/index.php/Public/curcity",function(data){
			if(data['status']=='1'){			
				var str=data['curcity'];
				var tmpurl="/"+str+"/Public/agree";
				$('#agreehref').attr('href', tmpurl);	
			}
		});
	var okusername=false;
    var okpass=false;
    var okname=false;
	var okverifycode=false;	
	 // 验证用户名/Tpl/PUblic/register_do.php
    $("#username").blur(function(){		
        var username=$.trim($(this).val());
		var phoneReg = /^1\d{10}$/;	
		var emailReg=/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
        if(username==''){$(this).parent().find('.alertSpan').text('不能为空');}        
        else if(phoneReg.test(username)||emailReg.test(username)){
            var tmp='0';
            $.ajaxSetup({ 
                async : false 
            });			
			var posturl="/tj/Boss/usernameTest";			
			$.post(posturl,{name:username},function(data){		
				 if(data=='0'){			 
						 tmp='1';
						 }
				 else{	
					$("#username").parent().find('.alertSpan').text('该用户名已被注册');
				 }
			});			
   			if(tmp=='1'){$("#username").parent().find('.alertSpan').text('可以注册');}    	
        }else{
            $(this).parent().find('.alertSpan').text('格式不对');           
        }        
    });   
    function usernameTest(){
    	var username=$.trim($("#username").val());
		var phoneReg = /^1\d{10}$/;	
		var emailReg=/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
        if(username==''){$("#username").parent().find('.alertSpan').text('不能为空');}        
        else if(phoneReg.test(username)||emailReg.test(username)){
            var tmp='0';
            $.ajaxSetup({ 
                async : false 
            });			
            $.post("/tj/Boss/usernameTest",{name:username},function(data){ 			
           	 if(data=='0'){            		            		 
            		 okusername=true;
            		 tmp='1';
                	 }
            	 else{
            		$("#username").parent().find('.alertSpan').text('该用户名已被注册');
            	 }
   			});
   			if(tmp=='1'){$("#username").parent().find('.alertSpan').text('可以注册');}
        }else{
            $("#username").parent().find('.alertSpan').text('格式不对');           
        }      
    }	
	//验证密码
    $("#pass").blur(function(){
    	var password=$.trim($(this).val());
    	if(password==''){$(this).next().text('不能为空');}
    	else if(!(/[a-zA-Z0-9]{6,20}/).test(password)){
        	$(this).next().text('格式不对');            
        }else{
        	$(this).next().text('');            
        }         
    });
    function passwordTest(){
    	var password=$.trim($("#pass").val());
    	if(password==''){$("#pass").next().text('不能为空');}
    	else if(!(/[a-zA-Z0-9]{6,20}/).test(password)){
        	$("#pass").next().text('格式不对');            
        }else{
        	$("#pass").next().text('');
            okpass=true;
        }
    }
	// 验证姓名
	$("#name").blur(function(){
    	var name=$.trim($(this).val());
		if(name==''){$(this).next().text('不能为空');}
    	else if((/^[\s\S]{1,10}$/).test(name)){   
			$(this).next().text('');
        }else{        	
        	$(this).next().text('最大长度为10');          
        }         
    }); 
	function nameTest(){		
    	var name=$.trim($('#name').val());
		if(name==''){$('#name').next().text('不能为空');}		
    	else if((/^[\s\S]{1,10}$/).test(name)){			
        	 okname=true; 
			$('#name').next().text('');			 
        }else{        	
        	$('#name').next().text('最大长度为10');          
        }         
    };  	
	//验证码图片点击刷新
	$("#verifyImg").click(function(){
		fleshVerify();
    });
	// 验证验证码
    $("#verifyCode").focus(function(){
		$(this).parent().find('.alertSpan').text('请输入图中字符，不区分大小写');
	}).blur(function(){	
        var yzcode=$.trim( $("#verifyCode").val());
        if(yzcode==''){ $("#verifyCode").parent().find('.alertSpan').text('不能为空');}        
        else if((/[0-9a-zA-Z]{4}/).test(yzcode)){ 
			var tmp=0;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Public/testyzcode",{yzcodenum:yzcode},function(data){		
           	if(data=='1'){				
				 $("#verifyCode").parent().find('.alertSpan').text('');
            }
            else{					
				 $("#verifyCode").parent().find('.alertSpan').text('验证码错误');
				fleshVerify();
            }
   			});			
        }else {
             $("#verifyCode").parent().find('.alertSpan').text('格式不对');           
        }        
    });   
    function verifyCodeTest(){
    	var yzcode=$.trim($("#verifyCode").val());
        if(yzcode==''){$("#verifyCode").next().text('不能为空').removeClass().addClass('state3');}        
        else if((/[0-9a-zA-Z]{4}/).test(yzcode)){
			var tmp=0;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Public/testyzcode",{yzcodenum:yzcode},function(data){ 			
           	if(data=='1'){ 
				tmp=1;
				okverifycode=true;
				$("#verifyCode").next().text('');
            }
            else{
				 $("#verifyCode").parent().find('.alertSpan').text('验证码错误');
				fleshVerify();
            }
   			});			
        }else{
            $("#verifyCode").next().text('格式不对');           
        }
    }
	 //提交按钮,所有验证通过方可提交
    $("#submit-btn").click(function(){
    	var username=$.trim($("#username").val());
    	var password=$.trim($("#pass").val());
    	var name=$.trim($("#name").val());
		var verifyCode=$.trim($("#verifyCode").val());
    	if((username=='')||(password=='')||(name=='')||(verifyCode=='')){
    		alert('以上四项不能为空');   
			return false;
    	}else{    		
    		usernameTest();
    		passwordTest();
			nameTest();
    		verifyCodeTest();
    		if(okusername&&okpass&&okname&&okverifycode ){
            	$('form').submit();        	
            }else{				
				return false;
			}
    	}  
    });
})
function fleshVerify(){  
    //重载验证码 	
   var time = new Date().getTime(); 
   $("#verifyImg")[0].src= '/index.php/Public/yanzhengma/'+time;     
 }
 