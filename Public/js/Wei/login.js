$(function(){
	$('#submit-btn').click(function(){
		var ok1=false;
		function bossLoginTest(){
		var username=$.trim($("#phone").val());
		var password=$.trim($("#pass").val());
		$.ajaxSetup({ 
			async : false 
		});
		$.post("/index.php/Index/bossLoginTest",{name:username,pass:password},function(data){			
			if(data=='1'){            		
				ok1=true;
			}
			else{
				alert('手机或密码错误');
			}
		}); 
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
			}else{
				bossLoginTest();
				if(!ok1){
					return false;
				}
			}						
		}
	});
});