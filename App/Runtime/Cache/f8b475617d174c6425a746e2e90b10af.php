<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>兼职信息</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maxinum-scale=1.0,user-scalable=no">
	<link href="__PUBLIC__/css/Wei/slide.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="__PUBLIC__/css/Wei/index.css" rel="stylesheet"	type="text/css" />
	<link href="__PUBLIC__/css/Wei/comcss.css" rel="stylesheet"	type="text/css" />
	<link href="__PUBLIC__/boot/css/bootstrap.min.css" rel="stylesheet">
	<script src="__PUBLIC__/js/jquery.min.js"></script>	
	<script src="__PUBLIC__/boot/js/bootstrap.min.js"></script>	
	<script src="__PUBLIC__/js/Wei/index.js"></script>	
</head>
<body>
<!-- header begin -->
<nav class="navbar navbar-fixed-top text-center">
<a class="fabu" href="__ROOT__/index.php/Wei/post"><span class="glyphicon glyphicon-pencil"></span>&nbsp;发布兼职</a>
</nav>
<div id="mainlist">
<?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="well">
<input type="hidden" name="id" value=<?php echo ($vo["id"]); ?>/>
<ul class="list-group">
<li class="list-group-item">	
<div class="h40">
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
<li class="list-group-item colorphone f13">电话：<?php echo ($vo["phone"]); ?>&nbsp;&nbsp;
<span>微信：<span class="weixin"><?php echo ($vo["weixin"]); ?></span></span>
<div class="qqdiv">Q&nbsp;<font class="mr2">Q</font>：<span class="qq"><?php echo ($vo["qq"]); ?></span></div>
</li>
</ul>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="loading" class="loading-wrap">
	<span class="loading">加载中...</span>
</div>
<div class="footer"><center>没有更多数据</center></div>
</body>
</html>