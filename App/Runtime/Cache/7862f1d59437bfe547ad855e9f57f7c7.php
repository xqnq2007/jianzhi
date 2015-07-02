<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/comcss.css" rel="stylesheet"	type="text/css" />
<link href="__PUBLIC__/css/boss_register.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/jquery.js"></script>
<script src="__PUBLIC__/js/register.js"></script>

</head>
<body>
<div id="main">
<form action="/index.php/Boss/reg" method="post" name="regForm" id="register">
<div class="center1">

<ul class="formul">	
		<li class="formli"><span class="test"><font class="red">* </font>用户名</span><span class="mr10">:</span> <input class="h15 w300"name="user_username" type="text"id="user_username" maxlength='20'  />&nbsp;&nbsp;&nbsp;<span id="#username_tip"></span></li>
		<li class="formli"><span class="test">姓名</span><span class="mr10">:</span> <input class="h15 w300"name="user_name" type="text" maxlength='20'  /> </li>
		<li class="formli"><span class="test"><font class="red">*</font>&nbsp;密码</span><span class="mr10">:</span> <input class="h15 w300" name="user_password" type="password" id="user_password" maxlength='20' />&nbsp;&nbsp;&nbsp;<span></span></li>
		<li class="formli"><span class="test"><font class="red">* </font>电话</span><span class="mr10">:</span> <input class="h15 w300"name="user_phone" type="text" id="user_phone" maxlength='20' />&nbsp;&nbsp;&nbsp;<span ></span></li>
		<li class="formli"><span class="test"></font>微信</span><span class="mr10">:</span> <input class="h15 w300"name="user_weixin" type="text" id="user_weixin" maxlength='20' />&nbsp;&nbsp;&nbsp;<span ></span></li>
		<li class="formli"><span class="test">QQ</span><span class="mr10">:</span> <input class="h15 w300"name="user_qq" id="user_qq" type="text" maxlength='20'  />&nbsp;&nbsp;&nbsp;<span ></span></li>
		<li class="formli"><span class="test">Email</span><span class="mr10">:</span> <input class="h15 w300"name="user_email" type="text" id="user_email"maxlength='30' />&nbsp;&nbsp;&nbsp;<span ></span></li>
		<li class="formli"><span class="test" >验证码</span><span class="mr10">:</span> <img class="yzmimg" id="yzmimg" name="Image1" title="验证码" src='__APP__/Post/yanzhengma'>  <a href="javascript:fleshVerify();">换一个</a></li>
		<li class="formli" style=""><span class="fl verAliBot"><input type="text" id="yzmInput" name="yzmInput" value="请输入验证码"class="h15 w97 yzmInput" maxlength='10'/></span></li>
		<li class="formli mar_lef_240" ><input type="checkbox" name="tongyi" value="1" checked="checked" /><a href="__APP____PUBLIC__/agreement">我同意兼职网服务条款 </a></li>
		<li class="formli"><button id="submitBut" type="button" class="sub ">提交</button></li>
		<li></li>
		
</ul>
</div>
</form>
</div>

</body>
</html>
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