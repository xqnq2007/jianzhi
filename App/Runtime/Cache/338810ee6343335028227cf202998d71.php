<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>发布兼职</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maxinum-scale=1.0,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="__PUBLIC__/css/Wei/weicss.css" rel="stylesheet"	type="text/css" />
	<script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style type="text/css">
	body{padding-top:50px;}
	* a{text-decoration: none !important;}
	.navbar{background: #fff;color:#08a5e0 !important;font-size:20px;font-weight:700;line-height: 50px;}
	.navbar-brand{color:#fff}</style>
</head>
<body>
<!-- header begin -->
<nav class="navbar navbar-fixed-top text-center">

<a class="fabu" href="__ROOT__/index.php/Wei/index"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;查看兼职</a>
</nav>
<!-- fabu begin -->
<div class="well f18">
<form method="post">
<div class="form-group">
<label for="name">标题&nbsp;<font style="color:red">*</font></label>
<input class="form-control h40" type="text" id="title" name="title" placeholder="请输入标题" value="" /></div>
<div class="form-group">
<label for="content">兼职内容&nbsp;<font style="color:red">*</font></label>
<textarea id="content" name="content" class="form-control" placeholder="请输入兼职内容" rows="8"></textarea></div>
<div class="form-group">
<label for="name">你的电话&nbsp;<font style="color:red">*</font></label>
<input class="form-control h40" type="text" id="phone" name="phone" placeholder="请输入你的电话" value="" /></div>
<div class="form-group">
<label for="name">微信</label>
<input class="form-control h40" type="text" id="weixin" name="weixin" placeholder="请输入你的微信" value="" /></div>
<div class="form-group">
<label for="name">你的QQ</label>
<input class="form-control h40" type="text" id="qq" name="qq" placeholder="请输入你的QQ" value="" /></div>
<div class="text-right tacenter">
<button class="btn btn-primary subbtn" type="submit" id="submit-btn">提交</button>
</div></form>
</div>

 		<script type="text/javascript">
			$('#submit-btn').click(function(){
					if($('#title').val()==''){
					alert('请输入标题');
					return false;}
					
					if($('#content').val()==''){
					alert('请输入内容');
					return false;}

					if($('#phone').val()==''){
					alert('请输入电话');
					return false;}
					else{
						var phone=$.trim($('#phone').val());
						var patrn = /^(((\+?86)|(\(\+86\)))?\d{3,4}-)?\d{7,8}(-\d{3,4})?$/;
						var validateReg = /^((\+?86)|(\(\+86\)))?1\d{10}$/;	
						if(!(patrn.test(phone)||validateReg.test(phone))){
							alert('电话格式错误');
							return false;
						}						
					}
				})
		</script>

</body>
</html>