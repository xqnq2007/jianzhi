<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/post.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/post.js"></script>
</style>
</head>
<body>
<div id="body1">
<div id="main" class="editmain">
<form action=<?php echo U('__APP__/Boss/updatepost',array('cid'=>$thepost[0][id]));?> method="post" name="bossPostForm">
<div class="center1">
<ul class="formul">
	<li class="formli"><span class="test" ><font class="mar_rig5 red">*</font>标题</span><span class="mar_rig10">:</span><input id="title" name="title" type="text" class="h15 in1 border" value='<?php echo ($thepost[0][title]); ?>'maxlength="25" />&nbsp;<span ></span></li>
	<li class="formli" name="selAreaLi"><span class="test" >地区</span><span class="mar_rig10 fl">:</span>
	<div class="input_select_menu" id="select_prov_id"><span class="select_item"><font class="select_area mar_lef12" name="areaText" ><?php echo ($thearea); ?></font><input name="area_id" class="input disnone" value='<?php echo ($theareaid); ?>' /></span>
        <ul class="item_list disnone">
			<li><span dc="120101" >和平区</span></li>
			<li><span dc="120102" >河东区</span></li>
			<li><span dc="120103" >河西区</span></li>
			<li><span dc="120104" >南开区</span></li>
			<li><span dc="120105" >河北区</span></li>
			<li><span dc="120106" >红桥区</span></li>
			<li><span dc="120107" >塘沽区</span></li>
			<li><span dc="120108" >汉沽区</span></li>
			<li><span dc="120109" >大港区</span></li>
			<li><span dc="120110" >东丽区</span></li>
			<li><span dc="120111" >西青区</span></li>
			<li><span dc="120112" >津南区</span></li>
			<li><span dc="120113" >北辰区</span></li>
			<li><span dc="120114" >武清区</span></li>
			<li><span dc="120115" >宝坻区</span></li>
			<li><span dc="0" >区域不限</span></li>
        </ul>
        </div>
	 <span name="hireNumSpan"><span class="mar_rig5">人数:</span><input
		type="text" class="h15 in5 mar_rig5 border mtf5" name="num" value='<?php echo ($thepost[0][numwant]); ?>'maxlength='5' />人</span></li>
	<li class="formli" name="salaryLi"><span class="test" >工资</span><span class="mar_rig10 fl">:</span>
	<div class="input_select_menu width85 backgrdleft52" id="select_payType_id"><span class="select_item"><font class="select_area mar_lef12" name="payTypeText" ><?php echo ($payType); ?></font><input name="payType_id"  value='<?php echo ($payTypeId); ?>' class="disnone"/></span>
        <ul class="item_list disnone" >
			<li><span dc="1" >日结</span></li>
			<li><span dc="2" >周结</span></li>
			<li><span dc="3" >月结</span></li>
			<li><span dc="0" >其它</span></li>			
        </ul>
        </div>
	 <span id="changeState">	 
	 <input name="salary" type="text" class="h15 in5 fl mar_rig5 mar_top11 border" value='<?php echo ($thepost[0][salary]); ?>' maxlength='5'/>
	 <div class="input_select_menu width92 backgrdleft60" id="select_salaryType_id"><span class="select_item"><font class="select_area mar_lef12" name="salaryTypeText" ><?php echo ($salaryType); ?></font><input name="salaryType_id" value='<?php echo ($salaryTypeId); ?>' class="disnone" /></span>
        <ul class="item_list disnone" >
			<li><span dc="1" >元/时</span></li>
			<li><span dc="2" >元/日</span></li>
			<li><span dc="3" >元/月</span></li>
			<li><span dc="0" >其它</span></li>			
        </ul>
        </div>
	 </li>
	<li class="li1"><span class="test"><font class="mar_rig5 red">*</font>详情</span><span class="mar_rig10">:</span><textarea id="detail" name="detail"  class="in3 border alignTop" ><?php echo ($thepost[0][detail]); ?></textarea>&nbsp;<span></span></li>
	<li class="formli"><span class="test"><font class="mar_rig5 red">*</font>电话</span><span class="mar_rig10">:</span><input id="phone" name="phone" type="text" value="<?php echo ($thepost[0][phone]); ?>"class="h15 w380 in4 border"maxlength='20' />&nbsp;<span  ></span></li>
	<li class="formli"><span class="test">微信</span><span class="mar_rig10">:</span><input id="user_weixin" name="user_weixin" type="text" class="h15 w380 in4 border" value="<?php echo ($thepost[0][weixin]); ?>" maxlength='20' />&nbsp;<span></span></li>	
	<li class="formli"><span class="test"><font class="mar_rig3">Q Q</font></span><span class="mar_rig10">:</span><input class="h15 w380 in4 border"name="qq" id="qq" type="text" value="<?php echo ($thepost[0][qq]); ?>"maxlength='20' />&nbsp;<span></span></li>
	<li class="formli mar_top15"><input name="bossSubBut" id="submitBut1" type="button" class="sub editsub" value="提交"/><a name="editCancelBut" href="__APP__/Boss/managepost"><input name="canselBut" id="canselBut" type="button" class="canselBut" value="取消"  /></a></li>
</ul>
</div>
</form>
</div>
</div>
</body>
</html>