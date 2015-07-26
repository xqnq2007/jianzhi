$(function(){
	$(".weixin").each(function(){			
                var tmpweixin = $(this).html();			
				if(!tmpweixin){					
					$(this).parent().css("display","none");
				}				
            });
		$(".qq").each(function(){
				var tmpqq = $(this).html();					
				if(!tmpqq){					
					$(this).parent().css("display","none");
				}
            });	
	$.ajaxSetup({
		timeout:5000,
        error: function(XmlHttpRequest,textStatus, errorThrown){
            alert("未知错误");
        }
    });  
	function testDetail(){
		$(".detail").each(function(){
				var slideHeight = 125; // px
				var defHeight = $(this).find(".wrap").find(".detailcontent").height();
				if(defHeight >= slideHeight){
					$(this).find(".wrap").find(".detailcontent").css('height' , slideHeight + 'px');
					$(this).find(".read-more").append('<a href="#">全文</a>');
					$(this).find(".read-more").click(function(){
						var curHeight = $(this).parent().find(".wrap").find(".detailcontent").height();
						if(curHeight == slideHeight){
							$(this).parent().find(".wrap").find(".detailcontent").animate({
							  height: defHeight
							}, "normal");
							$(this).find("a").html("收起");
							$(this).parent().find(".wrap").find(".gradient").fadeOut();
						}else{
							$(this).parent().find(".wrap").find(".detailcontent").animate({
							  height: slideHeight
							}, "normal");
							$(this).find("a").html("全文");
							$(this).parent().find(".wrap").find(".gradient").fadeIn();
						}
						return false;
					});		
				}else{
					$(this).parent().find(".wrap").find(".gradient").fadeOut();
				}
		});
	}
	testDetail();
    //执行瀑布流	
    var $container = $('#mainlist');	  
	var loading = $("#loading").data("on", false);
	$(window).scroll(function(){		
		if(loading.data("on")) return;
		if($(document).scrollTop() > 
			$(document).height()-$(window).height()-$('.footer').height()){
			//加载更多数据			
			loading.data("on", true).fadeIn();
			$.get("/index.php/Wei/getDbMore",{"last_id" : $("#mainlist>div:last>input").val()},function(data){			
					var html = "";
					if($.isArray(data)){						
						for(i in data){
							html+="<div class=\"well\"><input type=\"hidden\" name=\"id\" value=\""+data[i]['id']+"\"/><ul class=\"list-group\"><li class=\"list-group-item\"><div style=\"height:50px;\"><h5><font class=\"title\">"+data[i]['title']+"</font></h5><h6 class=\"time\">"+data[i]['time']+"</h6></div></li><li class=\"list-group-item detail\"><div class=\"wrap\"><div class=\"detailcontent\">"+data[i]['detail']+"</div><div class=\"gradient\"></div></div><div class=\"read-more\"></div></li><li class=\"list-group-item\"><span style=\"color:red\"></span>电话："+data[i]['phone'];
							if(data[i]['weixin']){
								html+="&nbsp;&nbsp;&nbsp;&nbsp;<span>微信：<span class=\"weixin\">"+data[i]['weixin']+"</span></span>";
							}
							if(data[i]['qq']){
								html+="<div>QQ：<span class=\"qq\">"+data[i]['qq']+"</span></div>";
							}
							html+="</li></ul></div>";									
						}
						$(html).appendTo($container);
						testDetail();
				        loading.data("on", false);
					}
					loading.fadeOut();
				},"json");
		}		
	});	
});		