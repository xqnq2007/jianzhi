$(function(){
	$.post("/tj/Public/jjcurcity",function(data){
			if(data['status']=='1'){				
				var str=data['curcity'];
				var backurl="/"+str+"/Weijj";
				$('#goBack').attr('href', backurl);
			}
	});	
	$('#submit-btn').click(function(){				
		if($('#title').val()==''){
		alert('请输入标题');
		return false;}
		
		if($('#content').val()==''){
		alert('请输入内容');
		return false;}

		if($('#phone').val()==''){
		alert('请输入电话');
		return false;}
		else{
			var phone=$.trim($('#phone').val());
			var patrn = /^(\d{3,4}-)?\d{7,8}$/;
			var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;	
			if(!(patrn.test(phone)||validateReg.test(phone))){
				alert('电话格式错误');
				return false;
			}						
		}		
	});
});