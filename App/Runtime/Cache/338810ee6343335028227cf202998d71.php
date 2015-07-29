<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>发布兼职</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maxinum-scale=1.0,user-scalable=no">
	<link href="__PUBLIC__/boot/css/bootstrap.min.css" rel="stylesheet">
	<link href="__PUBLIC__/css/Wei/post.css" rel="stylesheet"	type="text/css" />
	<link href="__PUBLIC__/css/Wei/comcss.css" rel="stylesheet"	type="text/css" />	
	<script src="__PUBLIC__/js/jquery.min.js"></script>	
	<script src="__PUBLIC__/boot/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/Wei/post.js"></script>	
</head>
<body class="bgf5">
<!-- header begin -->
<nav class="navbar navbar-fixed-top text-center">
      <a class="pass-header-back" id="goBack" href="__APP__/Wei"></a>
	  <span class="pass-header-title">发布信息</span>
</nav>
<!-- fabu begin -->
<div class="well f16 bgf5 bor0">
<form method="post" class="postForm">
<div class="form-group">
<label for="name">标题&nbsp;<font style="color:red">*</font></label>
<input class="form-control h35" type="text" id="title" name="title" placeholder="请输入标题" value="" /></div>
<div class="form-group">
<label for="content">详情&nbsp;<font style="color:red">*</font></label>
<textarea id="content" name="content" class="form-control h80" placeholder="请输入兼职内容" rows="8"></textarea></div>
<div class="form-group">
<label for="name">电话&nbsp;<font style="color:red">*</font></label>
<input class="form-control h35" type="text" id="phone" name="phone" placeholder="请输入你的电话" value="<?php echo ($phone); ?>" /></div>
<div class="form-group">
<label for="name">微信</label>
<input class="form-control h35" type="text" id="weixin" name="weixin" placeholder="请输入你的微信" value="" /></div>
<div class="form-group">
<label for="name">QQ</label>
<input class="form-control h35" type="text" id="qq" name="qq" placeholder="请输入你的QQ" value="" /></div>
<div class="text-right tacenter">
<button class="btn btn-primary subbtn" type="submit" id="submit-btn">提交</button>
</div></form>
</div>

 		<script type="text/javascript">
			
		</script>

</body>
</html>