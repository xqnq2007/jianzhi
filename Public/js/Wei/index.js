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
	function addComtFunc(listId){
		$(".comtBtn").each(function(index,element){			
			if(index<listId){		
			}else{				 
				 var  postfunc=function(){
					if(!$("#postBtn").is(":hidden")){
					var postid=$(this).parent().parent().parent().find(".postid").val();				
					var tmpul=$(this).parent().parent();	
					var tmpmodal=$(this).parent().find(".comtModal");
					var sendbtn=$(this).parent().find(".comtSendBtn");
					var tmpinput=$(this).parent().find(".comtInput");
					var tmpli=$(this).parent();
					$(this).parent().find(".modalComtId").val(postid);	
					tmpinput.focus();
					tmpinput.val('');
					tmpmodal.modal('show');				
					var postfunc=function(){		
						var postcont=tmpinput.val();
						if(postcont){	
							$.get("/index.php/Wei/postComt",{"postid":postid,"postcont" :postcont },function(data){	
									var html = "";					
									if(data['status']=='1'){										
										html=html+"<li class=\"list-group-item comtLi\"><span class=\"comtName\">"+data['name']+
										"</span>:&nbsp;&nbsp;"+data['postcont']+"</li>";							
										tmpul.append(html);
										tmpli.css("margin-bottom","5px");
										tmpmodal.modal('hide');
										sendbtn.unbind();
									}
								},"json");
						}
						};
						sendbtn.bind("click",postfunc);				
					}else{
						alert('您还没有登陆');
					}	
				 }	;				
				$(this).bind("click",postfunc);	
			}
		});		
	}
	testDetail(0);
	addComtFunc(0);
	//testWQ(0);
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
			//$("#loading").css("display", "block");	
			loading.data("on", true).fadeIn();
			$.get("/index.php/Wei/getDbMore",{"last_id" : $("#mainlist>div:last>input").val()},function(data){	
					var html = "";					
					if($.isArray(data)){						
						for(i in data){							
							html+="<div class=\"well\"><input type=\"hidden\" class=\"postid\" value=\""+data[i]['id']+"\"/><ul class=\"list-group\"><li class=\"list-group-item\"><div class=\"title\">"+data[i]['title']+"</div><div class=\"time\">"+data[i]['time']+"</div></li><li class=\"list-group-item detail\"><div class=\"wrap\"><div class=\"detailcontent\">"+data[i]['detail']+"</div><div class=\"gradient\"></div></div><div class=\"read-more\"></div></li><li class=\"list-group-item phone\"><span>电话："+data[i]['phone']+"&nbsp;&nbsp;</span>";
							if(data[i]['weixin']){
								html+="<span class=\"clrrig\">微信：<span class=\"weixin\">"+data[i]['weixin']+"</span></span>";
								if(data[i]['qq']){
									html+="<div class=\"qqdiv\"><span class=\"qqspan\"><font>Q</font><font class=\"ml6\">Q</font></span>：<span class=\"qq\">"+data[i]['qq']+"</span></div>";
								}
							}else{
								if(data[i]['qq']){
									html+="<div class=\"qqdivinline\"><span class=\"qqspan\"><font>Q</font><font class=\"ml6\">Q</font></span>：<span class=\"qq\">"+data[i]['qq']+"</span></div>";
								}
							}							
							html+="</li><li class=\"list-group-item comtBtnLi\" >"+
								"<button  class=\"btn comtBtn\">评论</button>"+
								"<div class=\"modal fade comtModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\" >"+
								   "<div class=\"modal-dialog\">"+
									 " <div class=\"modal-content\">"+
										 "<div class=\"modal-body\">"+
											 "<div class=\"input-group\">"+					
											 " <input type=\"text\" class=\"form-control comtInput\" placeholder=\"评价一下吧\" >"+
											 "<span class=\"input-group-btn\">" +
												"<button class=\"btn btn-default comtSendBtn\" type=\"button\">发送</button>"+
											 " </span>"+
													"</div>"+
												"</div>"+
										 "</div>	"+		 
									  "</div>"+
								"</div>"+
							"</li>";
							if(data[i]['voo']){
								var comtarr=data[i]['voo'];
								for(j in comtarr){
									html+="<li class=\"list-group-item comtLi\"><span class=\"comtName\">"+comtarr[j]['posterName']+"</span>:&nbsp;&nbsp;"+comtarr[j]['postContent']+"</li>";
								}
							}							
							html+="</ul></div>";									
						}
						$(html).appendTo($container);						
						scrollnum+=10;					
						addComtFunc(scrollnum);								
						testDetail(scrollnum);
						//testWQ(scrollnum);						
				        loading.data("on", false);
					}
					loading.fadeOut();
				},"json");
		}		
	});	
});