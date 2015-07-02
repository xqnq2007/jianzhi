
//根据所点单选按钮更改post的URL
function checks()
{    
    var radio=document.getElementsByName("user_kind");      
    var form=document.regForm;
        if(radio[0].checked)
        {
            form.action="/index.php/Stu/reg"; 
            
        }else{
        	form.action="/index.php/Boss/reg";         	 
        }    
}
////////////////////////////////
//   表单验证函数
$(function(){
	 
    var ok1=false;
    var ok2=false;
    var ok3=false;
    var ok4=false;    
    // 验证用户名/Tpl/PUblic/register_do.php
    $("#username").focus(function(){
    	$(this).next().text('用户名为3-20位').removeClass().addClass('state2');
    }).blur(function(){
        var username=$.trim($(this).val());
        if(username==''){$(this).next().text('用户名不能为空').removeClass().addClass('state3');}        
        else if(!(/[a-zA-Z0-9]{3,20}/).test(username)){
            $(this).next().text('用户名格式不正确').removeClass().addClass('state3');
            //$(this).focus();
        }else{            
            //$(this).next().text('输入正确').removeClass('state1').addClass('state4');
            var tmp;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Stu/usernameTest",{name:username},function(data){            	 
            	
           	 if(data=='0'){
            		 //alert('可以注册');            		 
            		 //ok1=true;
            		 tmp='1';
                	 }
            	 else{
            		alert('这个用户名已经被注册过了');
            	 }
   			});
   			if(tmp=='1'){$(this).next().text('可以注册').removeClass().addClass('state4');}    	
        }         
    });   
    function usernameTest(){
    	var username=$.trim($("#username").val());
        if(username==''){$("#username").next().text('用户名不能为空').removeClass().addClass('state3');}        
        else if(!(/[a-zA-Z0-9]{3,20}/).test(username)){
            $("#username").next().text('用户名格式不正确').removeClass().addClass('state3');
            //$(this).focus();
        }else{  		 
            ok1=true;            		
        }      
    }
    //验证密码
    $("#pass").focus(function(){
        $(this).next().text('密码为6-20位').removeClass().addClass('state2');
    }).blur(function(){
    	var password=$.trim($(this).val());
    	if(password==''){$(this).next().text('密码不能为空').removeClass().addClass('state3');}
    	else if(!(/[a-zA-Z0-9]{6,20}/).test(password)){
        	$(this).next().text('密码格式不对').removeClass().addClass('state3');
            
        }else{
        	$(this).next().text('输入对了').removeClass().addClass('state4');
            //ok2=true;
        }
         
    });
    function passwordTest(){
    	var password=$.trim($("#pass").val());
    	if(password==''){$("#pass").next().text('密码不能为空').removeClass().addClass('state3');}
    	else if(!(/[a-zA-Z0-9]{6,20}/).test(password)){
        	$("#pass").next().text('密码格式不对').removeClass().addClass('state3');
            
        }else{
        	$("#pass").next().text('输入对了').removeClass().addClass('state4');
            ok2=true;
        }
    }
 // 验证电话号码
    $("#phone").focus(function(){
       // $(this).next().text('手机号码应该为11位').removeClass('state1').addClass('state2');
    }).blur(function(){
    	var phone=$.trim($(this).val());
    	if(phone==''){$(this).next().text('手机号不能为空').removeClass().addClass('state3');}
    	else if(!(/^1\d{10}$/).test(phone)){
        	 $(this).next().text('手机号码格式不正确').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('输入对了').removeClass().addClass('state4');
           // ok3=true;
        }         
    });
    function phoneTest(){
    	var phone=$.trim($("#phone").val());
    	if(phone==''){$("#phone").next().text('手机号不能为空').removeClass().addClass('state3');}
    	else if(!(/^1\d{10}$/).test(phone)){
        	 $("#phone").next().text('手机号码格式不正确').removeClass().addClass('state3');            
        }else{
        	$("#phone").next().text('输入对了').removeClass().addClass('state4');
            ok3=true;
        }   
    }
 // 验证QQ号码
    $("#qq").focus(function(){
        //$(this).next().text('请输入QQ').removeClass().addClass('state2');
    }).blur(function(){
    	var qq=$.trim($(this).val());
    	if(qq==''){}
    	else if(!(/^[1-9][0-9]{4,9}$/).test(qq)){
        	 $(this).next().text('QQ号码格式不正确').removeClass().addClass('state2');            
        }else{
        	//$(this).next().text('输入对了').removeClass().addClass('state4');
        	$(this).next().text('')
            //ok3=true;
        }
         
    });
    //验证确认密码
       /*$('input[name="repass"]').focus(function(){
        $(this).next().text('输入的确认密码要和上面的密码一致,规则也要相同').removeClass('state1').addClass('state2');
    }).blur(function(){
        if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!='' && $(this).val() == $('input[name="password"]').val()){
            $(this).next().text('输入成功').removeClass('state1').addClass('state4');
            ok3=true;
        }else{
            $(this).next().text('输入的确认密码要和上面的密码一致,规则也要相同').removeClass('state1').addClass('state3');
        }
         
    });*/

    //验证邮箱
    $("#email").focus(function(){
        //$(this).next().text('请输入Email').removeClass().addClass('state2');
    }).blur(function(){
    	var email=$.trim($(this).val());
    	if(email==''){}
    	else if(!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(email)){
            $(this).next().text('Email格式不对').removeClass().addClass('state2');
        }else{                  
            //$(this).next().text('输入对了').removeClass('state1').addClass('state4');
            //ok4=true;
        	$(this).next().text('')
        }
         
    });

    //提交按钮,所有验证通过方可提交
    $("#submitBut").click(function(){
    	var username=$.trim($("#username").val());
    	var password=$.trim($("#pass").val());
    	var phone=$.trim($("#phone").val());
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
       
       // alert('fdfdas');
    });
     
});
//刷新验证码
function fleshVerify(){  
    //重载验证码 	
   var time = new Date().getTime(); 
   document.getElementById('yzcode').src= '/index.php/Post/yanzhengma/'+time;     
 }
/*function check_yzcode(){
	 tmp=$("#yzcode1").val();	
	 //alert(tmp);
	if (hex_md5(tmp)!= $_SESSION['verify'])
	{  
	  alert('验证码错误');  //如果验证码不对就退出程序
	  
	}	
}*/
