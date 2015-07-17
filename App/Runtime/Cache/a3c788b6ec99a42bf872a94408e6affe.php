<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/postDetail.js"></script>
<link href="__PUBLIC__/css/index_index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/header.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
   <div class="navbar-header ml125">
      <a class="navbar-brand" href="#"><font style="font-size:36px;margin:0;">快捷发布</font></a>
   </div>
   <div>      
      <ul class="nav navbar-nav navbar-left">         
		 <li><p class="navbar-text navbar-left">jianzhi022.com</p>		 
		 </li>
      </ul>
      <ul class="nav navbar-nav navbar-right mr120">         
		 <li>
			 <button type="button" class="navbar-left btn btn-default navbar-btn">快捷发布</button>
			 <p class="navbar-text navbar-left"><a href="#">登陆</a></p>
			 <p class="navbar-text navbar-left"><a href="#">注册</a></p>		
		</li>
      </ul>	 
   </div>
</nav>
</body>
</html>
<div id="detailmain">
<div class="box600a510">
	<div class="box600a50">
		<div class="box450a50">
			<font class="title"><?php echo ($thepost[0][title]); ?></font>
		</div>
		<div class="box150a50 date">
			<?php echo (substr($thepost[0][time],0,16)); ?>
		</div>
	</div>
	<div class="box600a25">
		<span class="phoneOutSpan" name="areaSpan">
			<span class="phoneText">地区：</span><?php echo ($thearea); ?>
		</span>
		<span class="phoneOutSpan" name="salarySpan">
			<span class="phoneText">工资：</span><?php echo ($thepost[0][salary]); echo ($theSalaryType); ?>
		</span>
		<span class="qqOutSpan" name="numSpan">
			<span class="phoneText"><span class="qqText">人数：</span></span><?php echo ($thepost[0][numwant]); ?>	
		</span>
	</div>
	<div class="box600a435">
		<div class="box600a350">
			<div class="detail"><?php echo ($thepost[0][detail]); ?></div>
		</div>
		<div class="box600a25">
			<span class="phoneOutSpan">
				<span class="phoneText">电话：</span><span class="phoneNum"><?php echo ($thepost[0][phone]); ?></span>
			</span>
			<span class="phoneOutSpan">
				<span class="phoneText">微信：</span><span class="phoneNum"><?php echo ($thepost[0][weixin]); ?></span>
			</span>
			<span class="qqOutSpan">
				<span class="phoneText"><span class="qqText">q q：</span></span><span class="qqNum"><?php echo ($thepost[0][qq]); ?></span>
			</span>
		</div>
	</div>
</div>
</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/footer.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div>
	<nav class="navbar navbar-default mb0" role="navigation">   
	   <div class="footer">
	   <div>
		  <p class="navbar-text"><a href="__APP____PUBLIC__/contactUs"  rel="nofollow">帮助</a></p>
	   </div>
	   <div>
		  <p class="navbar-text"><a href="__APP__/Public/replymsg"  rel="nofollow">建议</a></p>
	   </div>
	   <div>
		  <p class="navbar-text"><a href="__APP__/Public/replymsg"  rel="nofollow">关于我们</a></p>
	   </div>
	   <div>
		  <p class="navbar-text"><a href="__APP__/Public/contactUs"  rel="nofollow">联系我们</a></p>
	   </div>
		<div>
		  <p class="navbar-text"><a href="http://www.miibeian.gov.cn/">京ICP备15033321号</a></p>
	   </div>    
	   </div>
	</nav>
	</div>
</body>
</html> 
</body>
</html>