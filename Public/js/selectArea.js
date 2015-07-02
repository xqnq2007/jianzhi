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