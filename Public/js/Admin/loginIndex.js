function stuhov(){
	
	  var fostu=document.getElementById("stuform");
	  fostu.style.display="";
	  $("#stuform").css("display","block");
	  var foboss=document.getElementById("bossform");
	  foboss.style.display="none";
	  var tabstu=document.getElementById("stutab");
	  tabstu.style.fontWeight="bold";
	  var bossbot=document.getElementById("boss");  
	  bossbot.style.borderBottom="1px solid grey";
	  var stubot=document.getElementById("stu");
	  stubot.style.borderBottom="0px";
	  var tabboss=document.getElementById("bosstab");	  
	  tabboss.style.fontWeight="normal";	
	 
  }
  function bosshov(){
	 
	  $("#stuform").css("display","none");
	  var bossfrom=document.getElementById("bossform");
	  bossform.style.display="block";
	  var tabstu=document.getElementById("stutab");
	  tabstu.style.fontWeight="normal";	 
	  var tabboss=document.getElementById("bosstab");
	  tabboss.style.fontWeight="";
	  var stubot=document.getElementById("stu");
	  stubot.style.borderBottom="1px solid grey";
	  var bossbot=document.getElementById("boss");  
	  bossbot.style.borderBottom="";
  }
  function postinfo(){
	  window.location.href="/index.php/Index/postinfo";	  
  }  
  function SetHome(obj,vrl){
		try{ 
			obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl); 
			} 
			catch(e){ 
			if(window.netscape) { 
			try { 
			netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
			} 
			catch (e) { 
			alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。"); 
			} 
			var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch); 
			prefs.setCharPref('browser.startup.homepage',vrl); 
			}else{ 
			alert("您的浏览器不支持，请按照下面步骤操作：1.打开浏览器设置。2.点击设置网页。3.输入："+vrl+"点击确定。"); 
			} 
			} }
	function shoucang(sTitle,sURL) 
	{ 
	try 
	{ 
	window.external.addFavorite(sURL, sTitle); 
	} 
	catch (e) 
	{ 
	try 
	{ 
	window.sidebar.addPanel(sTitle, sURL, ""); 
	} 
	catch (e) 
	{ 
	alert("加入收藏失败，请使用Ctrl+D进行添加"); 
	} 
	} 
	}
//  表单验证函数
	$(function(){		 
	    var ok1=false;
	    var ok2=false;	    
	    // 验证用户名/Tpl/PUblic/register_do.php	    
	    function usernameTest(){
	    	var username=$.trim($("#adminUsername").val());
	        if(!(/[a-zA-Z0-9]{3,20}/).test(username)){
	           // $("#user_username").next().text('用户名格式不正确').removeClass().addClass('state3');
	            //$(this).focus();
	        }else{
	   			ok1=true;
	        }      
	    }
	    //验证密码	    
	    function passwordTest(){
	    	var password=$.trim($("#adminPass").val());
	    	if(!(/[a-zA-Z0-9]{6,20}/).test(password)){	        		            
	        }else{
	            ok2=true;
	        }
	    }
	    //提交按钮,所有验证通过方可提交
	    $("#adminSubBut").click(function(){	
	    	//alert("haha");
	    	var username=$.trim($("#adminUsername").val());
	    	var password=$.trim($("#adminPass").val());
	    	if((username=='')||(password=='')){
	    		alert('用户名和密码不能为空');        		
	    	}else{	    		
	    		usernameTest();
	    		passwordTest();
	    		if(ok1 && ok2){
	            	$("#adminform").submit();        	
	            }
	    	}
	       
	       // alert('fdfdas');
	    });
	     
	});
	