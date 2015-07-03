//   表单验证函数
$(function(){	 
    var ok1=false;
    var ok2=false;
    var ok3=false;
	var ok4=false;	
    // 验证标题 /Tpl/PUblic/register_do.php
    $("#title").blur(function(){
        var username=$(this).val();
        if($.trim(username)==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
        else{
        	$(this).next().text('');            
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
    function detailTest(){
    	var title=$("#detail").val();
        if($.trim(title)==''){        	
        }
        else{        	
            ok3=true;
        }
    }
	$("#detail").blur(function(){
        var detail=$(this).val();
        if($.trim(detail)==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
        else{
        	$(this).next().text('');            
        }             
    });  
	$("#detail").keyup(function(){
		maxlimit=500; 
		if (this.value.length > maxlimit) 
		this.value = this.value.substring(0, maxlimit); 
	}); 
 // 验证电话号码
    $("#phone").blur(function(){
    	var phone=$.trim($(this).val());
		var patrn = /^(((\+?86)|(\(\+86\)))?\d{3,4}-)?\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$(this).next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $(this).next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$(this).next().text('');            
        }
         
    }); 
    function phoneTest(){
    	var phone=$.trim($("#phone").val());
		var patrn = /^(((\+?86)|(\(\+86\)))?\d{3,4}-)?\d{7,8}(-\d{3,4})?$/;
		var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;
    	if(phone==''){$("#phone").next().text('不能为空').removeClass().addClass('state3');}
    	else if(!(patrn.test(phone)||validateReg.test(phone))){
        	 $("#phone").next().text('格式不对').removeClass().addClass('state3');            
        }else{
        	$("#phone").next().text('');
            ok2=true;
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
    	if(qq==''){$(this).next().text('');  }
    	else if(!(/^[1-9][0-9]{4,9}$/).test(qq)){
        	 $(this).next().text('格式不对').removeClass().addClass('state2');            
        }else{
        	$(this).next().text('');            
        }         
    });
	//验证邮箱
    $("#email").blur(function(){
    	var email=$.trim($(this).val());
    	if(email==''){}
    	else if(!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/).test(email)){
            $(this).next().text('格式不对').removeClass().addClass('state2');
        }else{                  
        	 $(this).next().text('');
        }
         
    });
	// 验证验证码
    $("#yzcodeInput").focus(function(){
		if($(this).val()=='请输入验证码') {$(this).val('');}		
	}).blur(function(){		
        var yzcode=$.trim($(this).val());
        if(yzcode==''){$(this).next().text('不能为空').removeClass().addClass('state3');}        
        else if(!(/\d{4}/).test(yzcode)){
            $(this).next().text('格式不对').removeClass().addClass('state3');           
        }else{ 
			var tmp=0;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Public/testyzcode",{yzcodenum:yzcode},function(data){				
           	if(data=='1'){
				tmp=1;
            }
            else{					
				alert('验证码错误');
				fleshVerify();
            }
   			});
			if(tmp=='1'){
				$(this).next().text('');
			}
        }        
    });   
    function yzcodeTest(){
    	var yzcode=$.trim($("#yzcodeInput").val());
        if(yzcode==''){$("#yzcodeInput").next().text('不能为空').removeClass().addClass('state3');}        
        else if(!(/\d{4}/).test(yzcode)){
            $("#yzcodeInput").next().text('格式不对').removeClass().addClass('state3');           
        }else{
			var tmp=0;
            $.ajaxSetup({ 
                async : false 
            });
            $.post("/index.php/Public/testyzcode",{yzcodenum:yzcode},function(data){ 
           	if(data=='1'){ 
				tmp=1;
				ok4=true;
            }
            else{
				alert('验证码错误');
				fleshVerify();
            }
   			});
			if(tmp=='1'){
				$(this).next().text('');
			}
        }      
    }	
    //提交按钮,所有验证通过方可提交
	//公共发布页面提交
    $("input[name='pubSubBut']").click(function(){
    	var title=$.trim($("#title").val());
    	var phone=$.trim($("#phone").val());
    	var detail=$.trim($("#detail").val());
		var yzcode=$.trim($("#yzcodeInput").val());
    	if((title=='')||(phone=='')||(detail=='')||(yzcode=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();
    		titleTest();
    		detailTest();
			yzcodeTest();			
    		if(ok1 && ok2 && ok3 && ok4 ){
            	$("form[name='pubPostForm']").submit();        	
            } 
    	}       
    });
	//boss发布页面提交
	$("input[name='bossSubBut']").click(function(){
    	var title=$.trim($("#title").val());
    	var phone=$.trim($("#phone").val());
    	var detail=$.trim($("#detail").val());		
    	if((title=='')||(phone=='')||(detail=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();
    		titleTest();
    		detailTest();					
    		if(ok1 && ok2 && ok3){
            	$("form[name='bossPostForm']").submit();        	
            } 
    	}       
    });
	//stu发布页面提交
	$("input[name='stuSubBut']").click(function(){
    	var title=$.trim($("#title").val());
    	var phone=$.trim($("#phone").val());
    	var detail=$.trim($("#detail").val());		
    	if((title=='')||(phone=='')||(detail=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();
    		titleTest();
    		detailTest();					
    		if(ok1 && ok2 && ok3){
            	$("form[name='stuPostForm']").submit();        	
            } 
    	}       
    });
	//反馈页面提交
	$("input[name='replymsgSubBut']").click(function(){
    	var title=$.trim($("#title").val());
    	var phone=$.trim($("#phone").val());
    	var detail=$.trim($("#detail").val());		
    	if((title=='')||(phone=='')||(detail=='')){
    		alert('标星号内容不能为空');        		
    	}else{
    		phoneTest();
    		titleTest();
    		detailTest();					
    		if(ok1 && ok2 && ok3){
            	$("form[name='replymsgForm']").submit();        	
            } 
    	}       
    });
	//修改个人信息页面提交	
    $("#perInfoSubBut").click(function(){		
    	var phone=$.trim($("#phone").val());
    	if(phone==''){
    		alert('标星号内容不能为空');        		
    	}else{    		
    		phoneTest(); 
    		if(ok2 ){
				$("form[name='perInfoForm']").submit();            	   	
            }
    	}
    });    
    $("#zhaopin").click(function(){
    	if($("#zhaopin").get(0).checked==true) {    		  
    		$('form').attr('action', '/index.php/Index/pubBossPost');
    		$("#changeState").show();
			$("#salaryli").show();
    		if($("#qiuzhi").get(0).checked==true) {
    		 $("#qiuzhi").removeAttr("checked");
    		}else{}
    	}else{ 
    		$('form').attr('action', '/index.php/Index/pubStuPost');
			$("#salaryli").hide();
    		$("#changeState").hide();
    		if($("#qiuzhi").get(0).checked==true) {
    			
       		}else{       		
       			$("#qiuzhi").prop("checked",true);       			
       		}    		
    	}
    });    
    $("#qiuzhi").click(function(){
    	if($("#qiuzhi").get(0).checked==true) {
    		   // do something
    		$('form').attr('action', '/index.php/Index/pubStuPost');
			$("#salaryli").hide();
    		$("#changeState").hide();
    		if($("#zhaopin").get(0).checked==true) {
    		 $("#zhaopin").removeAttr("checked");
    		}else{}
    	}else{
    		$('form').attr('action', '/index.php/Index/pubBossPost');
			$("#salaryli").show();
    		$("#changeState").show();
    		if($("#zhaopin").get(0).checked==true) {    			
       		}else{
       		// $("#qiuzhi").attr("checked",true);
       			$("#zhaopin").prop("checked",true);       			
       		}    		
    	}   	
    	
    });
	//验证码图片点击刷新
	$("#yzcodeImg").click(function(){
		var time = new Date().getTime(); 
		document.getElementById('yzcodeImg').src= '/index.php/Post/yanzhengma/'+time;
    });	
});
//刷新验证码
function fleshVerify(){  
    //重载验证码 	
   var time = new Date().getTime(); 
   document.getElementById('yzcodeImg').src= '/index.php/Post/yanzhengma/'+time;     
 }
//下拉列表选择
 $(function(){
	var cities_options = [];
	city_id = 0;
	prov_id = 0;
	position_id = 0;
	category_id = 0;
	subject_id = 0;
	function repselect(className){
		var se=$("#"+className);
		var seli=se.find("ul.item_list li");
		se.hover(
			function(){
					$(this).css("z-index","9999");
					$(this).find("span.select_item").addClass("active");
					$(this).find("ul.item_list").css("display","block");
			},
			function(){
				$(this).css("z-index","");
				$(this).find("ul.item_list").css("display","none");
				$(this).find(".select_item").removeClass("active");
			}
		);   		
		seli.click(function(){
			$(this).parent().parent().find("font.select_area").html($(this).find("span").html());
			$(this).parent().parent().find("input").val($(this).find("span").attr("dc"));           
			$(this).parent().css("display","none");
		});
	}
	repselect("select_prov_id");
	repselect("select_payType_id");
	repselect("select_salaryType_id");
});