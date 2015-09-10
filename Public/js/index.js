function current(){ 
	var d=new Date();
	var str=''; 
	str +=d.getFullYear()+'-'; //获取当前年份 
	str +=d.getMonth()+'-'; //获取当前月份（0——11） 
	str +=d.getDate()+' '; 
	str +=d.getHours()+':'; 
	if(d.getMinutes()<10){
		str+='0'+d.getMinutes()+':'; 
	}else{
		str +=d.getMinutes()+':'; 
	}
	if(d.getSeconds()<10){
		str+='0'+d.getSeconds(); 
	}else{
		str +=d.getSeconds(); 
	}		
	return str;
} 		
$(function(){		
		$(".current").css('border','none');
		$(".current").hover(function(){
			$(this).css('background','none');
		});
		$("#myModal").on('click','.allComtBtn',function(){
		var t=$(this).text();
		var tmpul=$("#comtul");
		if(t=="全部评论"){
			tmpul.find(".hid").addClass("show");
			$(this).text("收起");
		}else{
			tmpul.find(".hid").removeClass("show");
			$(this).text("全部评论");
		}  
	})
		$(".parenttitle").click(function() {			
			var title = $(this).html();
			var detail= $(this).parent().parent().parent().find(".parentdetail").html();
			var time = $(this).parent().parent().parent().find(".parenttime").html();
			var phone=$(this).parent().parent().parent().find(".parentphone").html();
			var weixin =$(this).parent().parent().parent().find(".parentweixin").html();
			var qq =$(this).parent().parent().parent().find(".parentqq").html();
			var postid=$(this).parent().parent().find(".postid").val();
			$("#myModal").find(".title").html(title);
			$("#myModal").find(".detail").html(detail);
			$("#myModal").find(".time").html(time);
			$("#myModal").find(".phone").html(phone);			
			$("#modalid").val(postid);
			$("#myModal").find(".comtInput").val('');	
			$("#myModal").find(".comtInput").focus();	
			$("#comtul").empty();
			$("#myModal").find('.allComtBtnLi').hide();
			var tmpul=$("#comtul");
			$.post("/tj/Boss/getComt",{"postid":postid},function(data){	
				var html = "";				
				if(data['status']=='1'){					
					var comtlist=data['comtlist'];					
					for(i in comtlist){
						html=html+"<li class=\"list-group-item comtLi\"><ul><li><span class=\"comtName\">"+comtlist[i]['posterName']+
						"</span>:&nbsp;&nbsp;"+comtlist[i]['postContent']+"</li>"+
						"<li><span class=\"comtTime\">"+comtlist[i]['postTime']+
							"</span></li></ul></li>";		
					}					
					var dom=$('<div></div>').append(html);
					var tmplis=dom.find(".comtLi");
					if(tmplis.length>10){						
						var allbtnli=$("#myModal").find(".allComtBtnLi");
						if(!allbtnli.is(":visible")){							
							allbtnli.show();
						}
						for(i=0;i<tmplis.length-10;i++){
							tmplis.eq(i).addClass("hid");
						}
						html=dom.html();								
					}						
					$("#comtul").append(html);	
				}
			},"json");
			if(weixin){
				$("#myModal").find(".weixin").parent().show();
				$("#myModal").find(".weixin").html(weixin);
			}else{
				$("#myModal").find(".weixin").parent().hide();
			}
			if(qq){
				$("#myModal").find(".qq").parent().show();
				$("#myModal").find(".qq").html(qq);
			}else{
				$("#myModal").find(".qq").parent().hide();
			}			
			$("#myModal").modal('show');
		});
		$(".comtSendBtn").click(function(){	
			if($("#loginBtn").is(":hidden")){	
				var postid=$("#modalid").val();		
				var postcont=$(this).parent().parent().find(".comtInput").val();
				var postTime="刚刚";
				var tmpul=$('#comtul');
				var tmpmodal=$("#myModal");					
				if($.trim(postcont)){				
					$.post("/tj/Wei/postComt",{"postid":postid,"postcont" :postcont },function(data){				
							var html = "";					
							if(data['status']=='1'){							
								html=html+"<li class=\"list-group-item comtLi\"><ul><li><span class=\"comtName\">"+data['name']+
								"</span>:&nbsp;&nbsp;"+postcont+"</li>"+
								"<li><span class=\"comtTime\">"+postTime+
								"</span></li></ul></li>";									
								tmpul.append(html);
								$("#myModal").find(".comtInput").val('');
								var tmplis=tmpul.find(".comtLi");
								if(tmplis.length>10){
									var allbtnli=$("#myModal").find(".allComtBtnLi");
									if(!allbtnli.is(":visible")){
										allbtnli.show();
									}
									var togbtn=$("#myModal").find(".allComtBtn");
									var t=togbtn.text();
									if(t=="全部评论"){				
										tmplis.eq(tmplis.length-10-1).addClass("hid");	
									}else{
										tmplis.eq(tmplis.length-10-1).addClass("hid show");
									} 
								}
								//tmpmodal.modal('hide');						
							}
						},"json");
				}			
			}else{
				alert('您还没有登陆');
			}			
		});
		$(".parentweixin").each(function(){			
                var tmpweixin = $(this).html();				
				if(!tmpweixin){					
					$(this).parent().css("display","none");
				}				
            });
		$(".parentqq").each(function(){
				var tmpqq = $(this).html();				
				if(!tmpqq){					
					$(this).parent().css("display","none");
				}
         });   
	});		