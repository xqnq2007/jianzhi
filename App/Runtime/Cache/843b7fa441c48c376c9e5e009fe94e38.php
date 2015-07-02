<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<link href="__PUBLIC__/css/boss_editperinfo.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/boss_editpass.js"></script>
<style>
	.sub{
		margin-left:165px;
	}
	.formli{
		width:600px;
	}
</style>
</head>
<body>
<div id="body1">
<div id="main">
<form action=<?php echo U('__APP__/Stu/update_pass');?> method="post" name="message">
<div class="center1">
<ul class="formul">
	<li class="formli" style="margin-bottom:2px;"><span class="test" ><span style="margin-left:-11px;">原密码</span></span><span style="margin-right:10px;">:</span><input id="pre_pass" name="pre_pass" style="vertical-align:middle;"type="password" class="h15 in1 border"maxlength='20' />&nbsp;<span ></span></li>	
	<li class="formli"><span class="test"><span style="margin-left:-11px;">新密码</span></span><span style="margin-right:10px;">:</span><input id="new_pass" name="new_pass" type="password" class="h15 w300 in4 border" maxlength='20'/>&nbsp;<span  ></span></li>
	
	<li class="formli" style="margin-top:15px;"><input name="" id="submitBut1" type="button" class="sub" value="提交"/></li>
</ul>
</div>
</form>
</div>
</div>
</body>
</html>