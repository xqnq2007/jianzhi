<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<link href="__PUBLIC__/css/boss_editperinfo.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/selectArea.js"></script>
<link href="__PUBLIC__/css/selectArea.css" type="text/css" rel="stylesheet">
<script src="__PUBLIC__/js/boss_editperinfo.js"></script>

</head>
<body>
<div id="body1">
<div id="main">
<form action=<?php echo U('__APP__/Stu/update_perinfo',array('cusername'=>$theinfo[0][username]));?> method="post" name="message">
<div class="center1">
<ul class="formul">
	<li class="formli" style="margin-bottom:2px;"><span class="test" ><span style="">姓名</span></span><span style="margin-right:10px;">:</span><input id="name" name="name" style="vertical-align:middle;"type="text" class="h15 in1 border"value='<?php echo ($theinfo[0][name]); ?>'maxlength='20' />&nbsp;<span ></span></li>	
	<li class="formli"><span class="test"><span style="margin-left:-11px;"><font color="#FF0000"style="margin-right:5px;">*</font>电话</span></span><span style="margin-right:10px;">:</span><input id="phone" name="phone" type="text" value="<?php echo ($theinfo[0][phone]); ?>"class="h15 w300 in4 border" maxlength='20' />&nbsp;<span  ></span></li>
	<li class="formli"><span class="test"><span style="margin-left:-11px;">微信</span></span><span style="margin-right:10px;">:</span><input id="user_weixin" name="user_weixin" type="text" class="h15 w300 in4 border" value="<?php echo ($theinfo[0][weixin]); ?>" maxlength='20' />&nbsp;<span></span></li>	
	<li class="formli"><span  class="test" style="text-align:center;" ><span style="margin-left:8px;">Q Q</span></span><span style="margin-right:10px;">:</span><input class="h15 w300 in4 border"name="qq" id="qq" type="text" value="<?php echo ($theinfo[0][qq]); ?>" maxlength='20' />&nbsp;<span></span></li>
	<li class="formli"><span  class="test" style="text-align:center;" ><span style="">Email</span></span><span style="margin-right:10px;">:</span><input class="h15 w300 in4 border"name="email" id="email" type="text" value="<?php echo ($theinfo[0][email]); ?>" maxlength='30' />&nbsp;<span></span></li>
	<li class="formli" style="margin-top:15px;"><input name="" id="submitBut1" type="button" class="sub" value="提交"/><a href="__APP__/Stu/managepost" ><input name="" id="canselBut" type="button" class="canselBut" value="取消"/></a></li>
</ul>
</div>
</form>
</div>
</div>
</body>
</html>