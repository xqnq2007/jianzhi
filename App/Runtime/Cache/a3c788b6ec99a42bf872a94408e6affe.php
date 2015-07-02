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
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/header.js"></script>
<link href="__PUBLIC__/css/header.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="top">
    <div id="logo"><img src="__PUBLIC__/images/logo.jpg" width="250" height="100"></div>
	<div id="toprig">
	
	
	<div id="shouyeshoucang">
	<?php echo ($php100); ?>
	<a href="javascript:void(0)" onclick="SetHome(this,window.location)">设为首页</a>&nbsp;|&nbsp;
	<a href="javascript:void(0)" onclick="shoucang(document.title,window.location)" class="mar_rig20">加入收藏</a>
	
	</div>
	</div>
  </div>
  <div id="menu">
      <ul class="ul_header">
	    <li class="li_header hovColor" style="width:55px;" onclick="hrefIndex()"><a href="__APP__/Index/"><font class="white">首页</font></a></li>
	    <li class="li_header hovColor" onclick="hrefStuPostIndex()"><a href="__APP__/Stu/stuPostIndex" ><font class="white">求职信息</font></a></li>	
		 <li class="li_header hovColor" onclick="per_center()"><a href="javascript:void(0);" onclick="per_center()"><font class="white">个人中心</font></a></li>		
	  </ul>
  </div>

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

<style type="text/css">
<!--

.copyright {
text-align: center;

margin: 0 auto;
color: #3E3E3E;
font-size: 13px;
border-top: 2px solid #C4C4C4;
height:50px;
width:100%;

}
.copyright ul {
list-style: none;
width:100%;
height:50px;
margin-top:20px;
marign-bottom:20px;
}
.copyright a:hover{
	color:red;
}
.copyright li {
display: list-item;
/*text-align: -webkit-match-parent;*/
width:100%;
text-align:center;
height:20px;
line-height:20px;
}
-->
</style>
</head>
<body>
<div class="copyright">
	<ul style="">
		<li style=""><a href="__APP____PUBLIC__/contactUs"  rel="nofollow">联系我们</a> | <a href="__APP__/Public/replymsg"  rel="nofollow">意见反馈</a> 
		</li>
	</ul>
</div>
</body>
</html> 
</body>
</html>