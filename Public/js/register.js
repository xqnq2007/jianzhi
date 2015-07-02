//   表单验证函数
$(function(){
	fleshVerify(); 
    var ok1=false;
    var ok2=false;
    var ok3=false;
	var ok4=false;
    // 验证用户名/Tpl/PUblic/register_do.php
    $("#user_username").blur(function(){		
        var username=$.trim($(this).val());
        if(username==''){$(this).next().text('不能为空').removeClass().addClass('state3');}        
        else if(!(/[a-zA-Z0-9]{3,20}/).test(username)){
            $(this).next().text('格式不对').removeClass().addClass('state3');           
        }else{
            var tmp;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Boss/usernameTest",{name:username},function(data){
           	 if(data=='0'){            		
            		 tmp='1';
                	 }
            	 else{
            		alert('该用户名已被注册');
            	 }
   			});
   			if(tmp=='1'){$(this).next().text('可以注册').removeClass().addClass('state4');}    	
        }         
    });   
    function usernameTest(){
    	var username=$.trim($("#user_username").val());
        if(username==''){$("#user_username").next().text('不能为空').removeClass().addClass('state3');}        
        else if(!(/[a-zA-Z0-9]{3,20}/).test(username)){
            $("#user_username").next().text('格式不对').removeClass().addClass('state3');           
        }else{
            var tmp;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Boss/usernameTest",{name:username},function(data){            	 
            	
           	 if(data=='0'){            		            		 
            		 ok1=true;
            		 tmp='1';
                	 }
            	 else{
            		alert('该用户名已被注册');
            	 }
   			});
   			if(tmp=='1'){$("#user_username").next().text('可以注册').removeClass().addClass('state4');}
        }      
    }	
    //验证密码
    $("#user_password").blur(function(){
    	var password=$.trim($(this).val());
    	if(password==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(/[a-zA-Z0-9]{6,20}/).test(password)){
        	$(this).next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('');            
        }         
    });
    function passwordTest(){
    	var password=$.trim($("#user_password").val());
    	if(password==''){$("#user_password").next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(/[a-zA-Z0-9]{6,20}/).test(password)){
        	$("#user_password").next().text('格式不对').removeClass().addClass('state3');
            
        }else{
        	$("#user_password").next().text('');
            ok2=true;
        }
    }
 // 验证电话号码
    $("#user_phone").blur(function(){
    	var phone=$.trim($(this).val());
		var patrn = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $(this).next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('').removeClass().addClass('state4');          
        }         
    });
    function phoneTest(){
    	var phone=$.trim($("#user_phone").val());
		var patrn = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$("#user_phone").next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $("#user_phone").next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$("#user_phone").next().text('');
            ok3=true;
        }   
    }
 // 验证微信号
	$("#user_weixin").blur(function(){
    	var weixin=$.trim($(this).val());
		if(weixin==''){$(this).next().text('');}
    	else if(!(/^[a-zA-Z\d_]{5,20}$/).test(weixin)){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{        	
        	$(this).next().text('')            
        }
         
    });  
 // 验证QQ号码
    $("#user_qq").blur(function(){
    	var qq=$.trim($(this).val());
		if(qq==''){$(this).next().text('');}
    	else if(!(/^[1-9][0-9]{4,9}$/).test(qq)){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{        	
        	$(this).next().text('')            
        }
         
    });    
    $("#user_email").blur(function(){
    	var email=$.trim($(this).val());
		if(email==''){$(this).next().text('');}
    	else if(!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(email)){
            $(this).next().text('格式不对').removeClass().addClass('state2');
        }else{
        	$(this).next().text('')
        }
         
    });
    //提交按钮,所有验证通过方可提交
    $("#submitBut").click(function(){
    	var username=$.trim($("#user_username").val());
    	var password=$.trim($("#user_password").val());
    	var phone=$.trim($("#user_phone").val());
    	if((username=='')||(password=='')||(phone=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();
    		usernameTest();
    		passwordTest();
    		if(ok1 && ok2&ok3 ){
            	$('form').submit();        	
            }
    	}      
      
    });
	//验证码图片点击刷新
	$("#yzmimg").click(function(){
		var time = new Date().getTime(); 
		document.getElementById('yzmimg').src= '/index.php/Post/yanzhengma/'+time;
    });
	//验证码提示文字：
	$("#yzmInput").focus(function(){		
		if($(this).val()=='请输入验证码') {$(this).val('');}
		}).blur(function(){
    	if($(this).val()=='') {$(this).val('请输入验证码');}
    });
     
});
//刷新验证码
function fleshVerify(){  
    //重载验证码 	
   var time = new Date().getTime(); 
   document.getElementById('yzmimg').src= '/index.php/Post/yanzhengma/'+time;     
 }