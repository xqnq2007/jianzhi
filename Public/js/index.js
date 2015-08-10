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
$(function(){		
		$(".current").css('border','none');
		$(".current").hover(function(){
			$(this).css('background','none');
		});
		$(".parenttitle").click(function() {
			var title = $(this).html();
			var detail= $(this).parent().parent().parent().find(".parentdetail").html();
			var time = $(this).parent().parent().parent().find(".parenttime").html();
			var phone=$(this).parent().parent().parent().find(".parentphone").html();
			var weixin =$(this).parent().parent().parent().find(".parentweixin").html();
			var qq =$(this).parent().parent().parent().find(".parentqq").html();			
			$("#myModal").find(".title").html(title);
			$("#myModal").find(".detail").html(detail);
			$("#myModal").find(".time").html(time);
			$("#myModal").find(".phone").html(phone);
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
			$("#Modal").modal();
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