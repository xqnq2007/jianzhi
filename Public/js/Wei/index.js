$(function(){	
	$(".weixin").each(function(){			
                var tmpweixin = $(this).html();			
				if(!tmpweixin){					
					$(this).parent().css("display","none");
					var theqq=$(this).parent().parent().find(".qq").html();
					if(theqq){
						$(this).parent().parent().find(".qqdiv").css("display","inline");
					}
				}				
            });
	$(".qq").each(function(){
			var tmpqq = $(this).html();					
			if(!tmpqq){					
				$(this).parent().css("display","none");				
			}
		});	
	function testDetail(listId){
		$(".detail").each(function(index,element){			
			if(index<listId){		
			}else{
				var slideHeight = 116; // px
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
			}
		});		
	}
	testDetail(0);
	$.ajaxSetup({
		timeout:5000,
        error: function(XmlHttpRequest,textStatus, errorThrown){
            alert("未知错误");
        }
    }); 
    //执行瀑布流	
    var $container = $('#mainlist');		
	var loading = $("#loading").data("on", false);
	var scrollnum=0;
	$(window).scroll(function(){		
		if(loading.data("on")) return;
		if($(document).scrollTop() > 
			$(document).height()-$(window).height()-$('.footer').height()){
			//加载更多数据		
			$("#loading").css("display", "block");	
			loading.data("on", true).fadeIn();
			$.get("/index.php/Wei/getDbMore",{"last_id" : $("#mainlist>div:last>input").val()},function(data){	
					var html = "";					
					if($.isArray(data)){						
						for(i in data){							
							html+="<div class=\"well\"><input type=\"hidden\" name=\"id\" value=\""+data[i]['id']+"\"/><ul class=\"list-group\"><li class=\"list-group-item\"><div class=\"title\">"+data[i]['title']+"</div><div class=\"time\">"+data[i]['time']+"</div></li><li class=\"list-group-item detail\"><div class=\"wrap\"><div class=\"detailcontent\">"+data[i]['detail']+"</div><div class=\"gradient\"></div></div><div class=\"read-more\"></div></li><li class=\"list-group-item phone\"><span class=\"fl\">电话："+data[i]['phone']+"&nbsp;&nbsp;</span>";
							if(data[i]['weixin']){
								html+="<span class=\"clrrig\">微信：<span class=\"weixin\">"+data[i]['weixin']+"</span></span>";
							}
							if(data[i]['qq']){
								html+="<div class=\"qqdiv\"><span class=\"qqspan fl\"><font class=\"fl\">Q</font><font class=\"fr\">Q</font></span>：<span class=\"qq\">"+data[i]['qq']+"</span></div></div>";
							}
							html+="</li></ul></div>";									
						}
						$(html).appendTo($container);						
						scrollnum+=10;
						testDetail(scrollnum);						
				        loading.data("on", false);
					}
					loading.fadeOut();
				},"json");
		}		
	});	
});