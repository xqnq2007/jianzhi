//   表单验证函数
$(function(){	 
    var ok1=false;
    var ok2=false;
 // 验证密码
    $("#pre_pass").blur(function(){
    	var prepass=$.trim($(this).val());
    	var patrn=/^(\w){6,20}$/;
    	if(prepass==''){ $(this).next().text('请输入原密码').removeClass().addClass('state2');}
    	else if(!patrn.test(prepass)){
    		$(this).next().text('');        	   
        }else{
        	$(this).next().text('');            
        }         
    });  
    function prepassTest(){    	
    	var prepass=$.trim($("#pre_pass").val());
    	var patrn=/^(\w){6,20}$/;
    	if(prepass==''){ $("#pre_pass").next().text('请输入原密码').removeClass().addClass('state2');}
    	else if(!patrn.test(prepass)){
    		$("#pre_pass").next().text('');        	         
        }else{        	
            ok1=true;
            $("#pre_pass").next().text('');
        }
    }
 // 验证密码
    $("#new_pass").blur(function(){
    	var newpass=$.trim($(this).val());
    	var patrn=/^(\w){6,20}$/;
    	if(newpass==''){$(this).next().text('请输入新密码').removeClass().addClass('state2');}
    	else if(!patrn.test(newpass)){
        	 $(this).next().text('密码为6-20位字母或数字').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('');            
        }         
    });  
    function newpassTest(){    	
    	var newpass=$.trim($("#new_pass").val());
    	var patrn=/^(\w){6,20}$/;
    	if(newpass==''){$("#new_pass").next().text('请输入新密码').removeClass().addClass('state2');}
    	else if(!patrn.test(newpass)){
        	 $("#new_pass").next().text('密码为6-20位字母或数字').removeClass().addClass('state3');            
        }else{        	
            ok2=true;
            $("#new_pass").next().text('');
        }
    } 
    //提交按钮,所有验证通过方可提交
    $("#submitBut1").click(function(){    	
    	var prepass=$.trim($("#pre_pass").val());
    	var newpass=$.trim($("#new_pass").val());
    	if(prepass==''||newpass==''){
    		alert('密码不能为空');        		
    	}else{
    		prepassTest(); 
    		newpassTest(); 
    		if(ok2&ok1){
            	$('form').submit();        	
            }
    	}
    });     
});