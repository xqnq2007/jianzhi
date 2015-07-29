<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<title>登陆</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maxinum-scale=1.0,user-scalable=no">
	<link href="__PUBLIC__/boot/css/bootstrap.min.css" rel="stylesheet">
	<link href="__PUBLIC__/css/Wei/comcss.css" rel="stylesheet"	type="text/css" />	
	<link href="__PUBLIC__/css/Wei/login.css" rel="stylesheet"	type="text/css" />
	<script src="__PUBLIC__/js/jquery.min.js"></script>	
	<script src="__PUBLIC__/boot/js/bootstrap.min.js"></script>	
	<script src="__PUBLIC__/js/Wei/login.js"></script>
</head>
<body>
<!-- header begin -->
<nav class="navbar navbar-fixed-top">
	<a class="pass-header-back" id="goBack" href="__APP__/Wei/"></a>
	<span class="pass-header-title">用户登陆</span>
	<a class="pass-header-links" href="__APP__/Wei/reg">注册</a>
</nav>
<div class="error_area border-top1" id="error"></div>
	<form class="form-horizontal" action="__APP__/Wei" role="form" method="post" id="postForm" name="postForm">
		<div class="border-top1">
			<div class="form-group">
			<label for="name" class="inputlabel">手机</label>
			<input class="form-control inputtext" type="text" id="phone" name="phone" placeholder="请输入你的电话" value="" /></div>		
			<div class="form-group">
			<label for="name" class="inputlabel">密码</label>
			<input class="form-control inputtext" type="text" id="pass" name="pass" placeholder="请输入你的密码" value="" /></div>
		</div>	   
		<div class="form-item-btn">
		<button class="pass-button-full" id="submit-btn">登陆</button>
		</div>	   
	</form>		
</div>
</body>
</html>