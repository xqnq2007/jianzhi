<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/post.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/boss_editpass.js"></script>
</head>
<body>
<div id="body1">
<div id="main">
<form action=<?php echo U('__APP__/Boss/update_pass');?> method="post" name="bossEditPassForm">
<div class="center1">
<ul class="formul mlf50 mt50">
	<li class="formli editPassLi"><span class="test" >原密码</span><span class="mar_rig10">:</span><input id="pre_pass" name="pre_pass" type="password" class="h15 in1 border w300"maxlength='20' />&nbsp;<span ></span></li>	
	<li class="formli editPassLi"><span class="test">新密码</span><span class="mar_rig10">:</span><input id="new_pass" name="new_pass" type="password" class="h15 w300 in4 border"maxlength='20' />&nbsp;<span  ></span></li>	
	<li class="formli mar_top15"><input name="editPassSubBut" id="submitBut1" type="button" class="sub editPassSub" value="提交"/></li>
</ul>
</div>
</form>
</div>
</div>
</body>
</html>