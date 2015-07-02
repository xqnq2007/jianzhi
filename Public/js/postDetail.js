$(function(){	 
    var ok1=false;
    var ok2=false;
    var ok3=false;
    var ok4=false;    
    // 验证标题/Tpl/PUblic/register_do.php
      	
        
        var reg= /^(?=.*\d.*\b)/;
		var str = $("#salaryNum").text();
		if(reg.test(str)){}
		else{
			$("#salaryNum").hide(); ;
			}
		var str = $("#wantNum").text();
		if(reg.test(str)){}
		else{
			$("#wantNum").hide(); ;
			}             
    
})