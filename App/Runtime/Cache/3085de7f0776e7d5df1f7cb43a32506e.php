<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maxinum-scale=1.0,user-scalable=no">
	<link href="__PUBLIC__/boot/css/bootstrap.min.css" rel="stylesheet">
	<link href="__PUBLIC__/css/Wei/comcss.css" rel="stylesheet"	type="text/css" />	
	<link href="__PUBLIC__/css/Wei/login.css" rel="stylesheet"	type="text/css" />
	<link href="__PUBLIC__/css/Wei/reg.css" rel="stylesheet"	type="text/css" />
	<script src="__PUBLIC__/js/jquery.min.js"></script>	
	<script src="__PUBLIC__/boot/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/Wei/reg.js"></script>		
</head>
<body>
<!-- header begin -->
<nav class="navbar navbar-fixed-top">
      <a class="pass-header-back" id="goBack" href="__APP__/Wei/login"></a>
	  <span class="pass-header-title">注册账号</span>
</nav>
<div class="error_area border-top1" id="error"></div>
	<form class="form-horizontal" role="form" method="post" id="weiRegForm" name="weiRegForm">
		<div class="border-top1">
			<div class="form-group">
			<label for="name" class="inputlabel">姓名</label>
			<input class="form-control inputtext" type="text" id="name" name="name" placeholder="请输入你的姓名" value="" maxlength='5'/></div>
			<div class="form-group">
			<label for="name" class="inputlabel">手机</label>
			<input class="form-control inputtext" type="text" id="phone" name="phone" placeholder="请输入你的手机号" value="" maxlength='11'/></div>		
			<div class="form-group">
			<label for="name" class="inputlabel">密码</label>
			<input class="form-control inputtext" type="text" id="pass" name="pass" placeholder="6-14位，字母、数字的组合" value="" maxlength='20'/></div>
			
				<div class="f14 bgf1 p-t10lr14">注册成功后，就可以发布兼职信息了</div>
			
		</div>	   
		<div class="form-item-btn">
		<button class="pass-button-full" type="submit" id="submit-btn">注册</button>
		</div>	   
	</form>		
</div>
</body>
</html>