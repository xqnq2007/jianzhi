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
			
});			