$(function(){
	$.post("/tj/Public/jjcurcity",function(data){
			if(data['status']=='1'){				
				var str=data['curcity'];
				var backurl="/"+str+"/Weijj/login";
				$('#goBack').attr('href', backurl);
			}
	});	
	$('#submit-btn').click(function(){
		var ok1=false;
		function usernameTest(){
			var username=$.trim($("#phone").val());
			$.ajaxSetup({ 
				async : false 
			});
			$.post("/tj/Boss/usernameTest",{name:username},function(data){				
				if(data=='0'){      					
					 ok1=true;				 
				}
				else{
					alert('该手机已被注册');				
				}
			});		
		}	
		$name=$.trim($('#name').val());
		if($name==''){
			alert('请输入姓名');
			return false;
		}
		
		$phone=$.trim($('#phone').val());
		if($phone==''){
			alert('请输入手机号');
			return false;
		}else{												
			var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;	
			if(!validateReg.test($phone)){
				alert('手机号码格式错误');
				return false;
			}else{
				usernameTest();
				if(!ok1){				
					return false;
				}
			}	
		}

		$pass=$.trim($('#pass').val());
		if($pass==''){
			alert('请输入密码');
			return false;
		}else{
			if(!(/[a-zA-Z0-9]{6,14}/).test($pass))
			{
				alert('密码格式不正确');
				return false; 
			}						
		}
	});
});