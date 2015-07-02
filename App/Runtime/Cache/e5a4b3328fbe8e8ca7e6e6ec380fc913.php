<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<link href="__PUBLIC__/css/post.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/post.js"></script>
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
<div id="main">
<form action="__APP__/Boss/addReply" method="post" name="replymsgForm">
<div class="center1">
<ul class="formul mt40">
	<li class="formli ml40" style="margin-bottom:2px;"><span class="test"><span style="margin-left:-11px;"><font color="#FF0000"style="margin-right:5px;">*</font>标题</span></span><span style="margin-right:10px;">:</span><input id="title" name="title" style="vertical-align:middle;"type="text" class="h15 in1 border" />&nbsp;<span ></span></li>	
	<li class="li1 ml40"><span class="test"><font class="mar_rig5 red">*</font>详情</span><span style="margin-right:10px;">:</span><textarea name="detail" id="detail" class="in3 border" style="vertical-align:top;"></textarea>&nbsp;<span></span></li>
	<li class="formli ml40"><span class="test"><span style=""><font class="mar_rig5 red">*</font>电话</span></span><span style="margin-right:10px;">:</span><input id="phone" name="phone" type="text" value="<?php echo ($theinfo[0][phone]); ?>"class="h15 w380 in4 border" />&nbsp;<span  ></span></li>
	<li class="formli ml40"><span class="test">微信</span><span class="mar_rig10">:</span><input id="user_weixin" name="user_weixin" type="text" class="h15 w380 in4 border" value="<?php echo ($thepost[0][weixin]); ?>" maxlength='20' />&nbsp;<span></span></li>	
	<li class="formli ml40"><span class="test"><font class="mar_rig3">Q Q</font></span><span style="margin-right:10px;">:</span><input class="h15 w380 in4 border"name="qq" id="qq" type="text" value="<?php echo ($theinfo[0][qq]); ?>" />&nbsp;<span></span></li>
	<li class="formli ml40" style="margin-top:15px;"><input name="replymsgSubBut" id="submitBut1" type="button" class="sub" value="提交"/></li>
</ul>
</div>
</form>
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