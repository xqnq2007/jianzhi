

////////////////////////////////
//   表单验证函数
$(function(){	 
    var ok1=false;
    var ok2=false;
    var ok3=false;
    var ok4=false;    
    // 验证标题/Tpl/PUblic/register_do.php
    $("#title").blur(function(){
        var username=$.trim($(this).val());
        if(username==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
        else{
        	$(this).next().text('');
        }
             
    });   
    function titleTest(){    	
    	var title=$.trim($("#title").val());
    	if(title==''){$("#title").next().text('不能为空').removeClass().addClass('state3');           
        }else{        	
            ok1=true;
            $("#title").next().text('');
        }
    }
    
// 验证电话号码
    $("#phone").blur(function(){
    	var phone=$.trim($(this).val());
		var patrn = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$(this).next().text('不能为空').removeClass().addClass('state2');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{
        	$(this).next().text('');           
        }         
    });
    function phoneTest(){    	
    	var phone=$.trim($("#phone").val());
		var patrn = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$("#phone").next().text('不能为空').removeClass().addClass('state2');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $("#phone").next().text('格式不对').removeClass().addClass('state2');            
        }else{        	
            ok2=true;
            $("#phone").next().text('');
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
    $("#qq").blur(function(){
    	var qq=$.trim($(this).val());
    	if(qq==''){}
    	else if(!(/^[1-9][0-9]{4,9}$/).test(qq)){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{
        	$(this).next().text('');
            //ok3=true;
        }
         
    });    
    //提交按钮,所有验证通过方可提交
    $("#submitBut1").click(function(){    	
    	var title=$.trim($("#title").val());    	
    	if(title==''){
    		alert('标题不能为空');        		
    	}else{
    		titleTest(); 
    		if(ok1){
            	$('form').submit();        	
            }
    	}
    });
     
});
//刷新验证码
function fleshVerify(){  
    //重载验证码 
	
   var time = new Date().getTime(); 
   document.getElementById('yzcode').src= '/index.php/Post/yanzhengma/'+time; 
    
 } 
function check(field) {
	maxlimit=160; 
    if (field.value.length > maxlimit) 
     field.value = field.value.substring(0, maxlimit); 

} 