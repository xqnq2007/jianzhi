////////////////////////////////
//   表单验证函数
$(function(){
    var ok2=false; 
    //提交按钮,所有验证通过方可提交
    $("#subBut1").click(function(){		
    	var phone=$.trim($("#phone").val());
    	if(phone==''){
    		alert('标星号内容不能为空');        		
    	}else{    		
    		phoneTest(); 
    		if(ok2 ){
				//$("form[name='message']").submit();            	   	
            }
    	}
    });    
});
 // 验证电话号码
   /* $("#phone").blur(function(){
    	var phone=$.trim($(this).val());
		var patrn = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $(this).next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('');           
        }         
    });*/
    function phoneTest(){    	
    	var phone=$.trim($("#phone").val());
		var patrn = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$("#phone").next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $("#phone").next().text('格式不对').removeClass().addClass('state3');            
        }else{        	
            ok2=true;
            $("#phone").next().text('');
        }
    }
	// 验证微信号
	/*$("#user_weixin").blur(function(){
    	var weixin=$.trim($(this).val());
		if(weixin==''){$(this).next().text('');}
    	else if(!(/^[a-zA-Z\d_]{5,20}$/).test(weixin)){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{        	
        	$(this).next().text('')            
        }
         
    });  */
 // 验证QQ号码
   /* $("#qq").blur(function(){
    	var qq=$.trim($("#qq").val());
    	if(qq==''){}
    	else if(!(/^[1-9][0-9]{4,9}$/).test(qq)){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{
        	//$(this).next().text('输入对了').removeClass().addClass('state4');
        	$(this).next().text('');
        }
         
    });  */
  //验证邮箱
    /*$("#email").blur(function(){
    	var email=$.trim($(this).val());
    	if(email==''){}
    	else if(!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(email)){
            $(this).next().text('格式不对').removeClass().addClass('state2');
        }else{                  
        	 $(this).next().text('');
        }
         
    });*/