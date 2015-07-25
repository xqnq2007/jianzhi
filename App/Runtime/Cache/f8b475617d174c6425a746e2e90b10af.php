<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>兼职信息</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maxinum-scale=1.0,user-scalable=no">
	<link href="__PUBLIC__/css/Wei/slide.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="__PUBLIC__/css/Wei/weicss.css" rel="stylesheet"	type="text/css" />
	<link href="__PUBLIC__/boot/css/bootstrap.min.css" rel="stylesheet">
	<script src="__PUBLIC__/js/jquery.min.js"></script>	
	<script src="__PUBLIC__/boot/js/bootstrap.min.js"></script>	
	<script src="__PUBLIC__/js/index.js"></script>
	<style type="text/css">
	body{padding-top: 50px;background: #DADAD8}
	* a{text-decoration: none !important;}
	.navbar{background: #fff;color:#08a5e0 !important;font-size:20px;font-weight:700;line-height: 50px;}
	.navbar-brand{color:#fff}
	.well{background: #DADAD8;border:0px;margin-bottom: -20px;padding:10px;position: relative;border-radius:0px;}
	.well img{height:50px;width: 50px;}
	.well h5{position: absolute;height:30px;line-height:30px;top: 0px;left: 15px;font-size: 18px;color:#4E6694;font-weight: 700;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;width:290px;}
	.well h6{position: absolute;height:20px;top:30px;left: 15px;font-size: 12px;color: #B7B7B7}

	.list-group{border: 0px;border-radius:0px;overflow:hidden}
	.list-group-item{color: #292929;font-size: 14px;font-weight: 500;border: 1px solid #eaeaea;border-radius:0px !important;}
	.posttitle{height:50px;}
	.fabu{
		color: #3BA3FF;
	}
	</style>	
</head>
<body>
<!-- header begin -->
<nav class="navbar navbar-fixed-top text-center">
<a class="fabu" href="__ROOT__/index.php/Wei/post"><span class="glyphicon glyphicon-pencil"></span>&nbsp;发布兼职</a>
</nav>
<div class="well">
</div>
<?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="well">
<ul class="list-group">
<li class="list-group-item">
	<!--<img src="http://www.iconpng.com/png/long_shadow_icons/user.png">-->
<div style="height:50px;">
	<h5><font class="title"><?php echo ($vo["title"]); ?></font></h5>
  <h6 class="time"><?php echo ($vo["time"]); ?></h6></div>
</li>
<li class="list-group-item detail">
	<div class="wrap">
			<div class="detailcontent">
				<?php echo ($vo["detail"]); ?>
			</div>
			<div class="gradient"></div>
	</div>
	<div class="read-more"></div>
</li>
<li class="list-group-item"><span style="color:red"></span>电话：<?php echo ($vo["phone"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<span>微信：<span class="weixin"><?php echo ($vo["weixin"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
<div>QQ：<span class="qq"><?php echo ($vo["qq"]); ?></span></div>
</li>
</ul>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>