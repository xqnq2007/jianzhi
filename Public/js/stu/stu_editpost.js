

////////////////////////////////
//   表单验证函数
$(function(){	 
    var ok1=false;
    var ok2=false;
    var ok3=false;
    var ok4=false;    
    // 验证标题/Tpl/PUblic/register_do.php
    $("#title").blur(function(){    	
        var username=$(this).val();
        if($.trim(username)==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
        else{
        	$(this).next().text('')
        }
             
    });     
    function titleTest(){    	
    	var title=$("#title").val();
    	if($.trim(title)==''){$("#title").next().text('不能为空').removeClass().addClass('state3');}
        else{
        	$("#title").next().text('');
        	ok1=true;
        }
    } 
 // 验证详情
    $("#detail").blur(function(){
        var username=$(this).val();
        if($.trim(username)==''){
        	//alert('不能为空');
        	}
        else{
        	           
        }
             
    });   
    function detailTest(){
    	var title=$("#detail").val();
        if($.trim(title)==''){
        	//alert('不能为空');
        	}
        else{        	
            ok3=true;
        }
    }    
 // 验证电话号码
    $("#phone").blur(function(){
    	var phone=$.trim($(this).val());
    	if(phone==''){$(this).next().text('手机号不能为空').removeClass().addClass('state3');}
    	else if(!(/^1\d{10}$/).test(phone)){
        	 $(this).next().text('手机号码格式不正确').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('');           
        }         
    });
    function phoneTest(){    	
    	var phone=$.trim($("#phone").val());
    	if(phone==''){$("#phone").next().text('手机号不能为空').removeClass().addClass('state3');}
    	else if(!(/^1\d{10}$/).test(phone)){
        	 $("#phone").next().text('手机号码格式不正确').removeClass().addClass('state3');            
        }else{        	
            ok2=true;
            $("#phone").next().text('');
        }
    }
 // 验证QQ号码
    $("#qq").blur(function(){
    	var qq=$.trim($(this).val());
    	if(qq==''){}
    	else if(!(/^[1-9][0-9]{4,9}$/).test(qq)){
        	 $(this).next().text('QQ号码格式不正确').removeClass().addClass('state3');            
        }else{
        	//$(this).next().text('输入对了').removeClass().addClass('state4');
            //ok3=true;
        	$(this).next().text('');
        }
         
    });    
    //提交按钮,所有验证通过方可提交
    $("#submitBut1").click(function(){    	
    	var title=$.trim($("#title").val());
    	var phone=$.trim($("#phone").val());
    	var detail=$.trim($("#detail").val());
    	if((title=='')||(phone=='')||(detail=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();
    		titleTest();
    		detailTest();
    		if(ok1 && ok2&ok3 ){
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
//详情框输入限制
function check(field) {
	maxlimit=160; 
    if (field.value.length > maxlimit) 
     field.value = field.value.substring(0, maxlimit); 

} 
