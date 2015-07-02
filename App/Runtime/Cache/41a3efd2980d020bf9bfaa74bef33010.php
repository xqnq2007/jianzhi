<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<link href="__PUBLIC__/css/public_post.css" rel="stylesheet"	type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/selectArea.js"></script>
<link href="__PUBLIC__/css/selectArea.css" type="text/css" rel="stylesheet">
<script src="__PUBLIC__/js/post.js"></script>
<style type="text/css">
	.formul{
		height:700px;
	}
</style>
</head>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<script src="__PUBLIC__/js/jquery.js"></script>
<script>

function per_center(){ 		
	window.location.href="__APP__/Index/perCenter"; 
	}
function hrefIndex(){ 		
	window.location.href="__APP__/Index/index"; 
	}
function hrefStuPostIndex(){ 		
	window.location.href="__APP__/Stu/stuPostIndex"; 
	}
</script>

<style type="text/css">
<!--
body {
	margin: 0px;
	width:100%;
	text-align: center;	
}
#top{
    width:960px;
    height:100px;   
    margin:0px auto;
}
#menu{
    width:100%;
    height:50px;
    background:#5da7e0;
    margin:0px auto;
    }
#logo {
	
	height: 100px;
	width: 250px;
	float:left;
}
#toprig {
	
	height: 100px;	
	width: 400px;
	float:right;
	font-size: 14px;
}
a {
	text-decoration: none;
}
a:hover {
	color: #FF0000;
	cursor: hand;
}
*{
  padding:0px;
  margin:0px;
 }
.ul_header {
	text-decoration: none;
	height: 50px;
	width: 960px;
	list-style: none;
	margin:auto;
}
.li_header{
	float: left;
	width: 80px;
	line-height: 50px;
	text-align:center;
}
#header_logintip{
    width:200px;
    height:20px;
	margin-right:20px;
}
#shouyeshoucang{
	width:380px;
	height:50px;
	margin-top:50px;
	
	line-height:50px;
	
	float:right;
	text-align:right;
}
.hovColor:hover{
	cursor:pointer;
	background:#5282e0;
}
-->
</style>
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
	    <li class="li_header hovColor" style="width:55px;" onclick="hrefIndex()"><a href="__APP__/Index/"><font color="#FFFFFF">首页</font></a></li>
	    <li class="li_header hovColor" onclick="hrefStuPostIndex()"><a href="__APP__/Stu/stuPostIndex" ><font color="#FFFFFF">求职信息</font></a></li>	
		 <li class="li_header hovColor" onclick="per_center()"><a href="javascript:void(0);" onclick="per_center()"><font color="#FFFFFF">个人中心</font></a></li>		
	  </ul>
  </div>

</body>
</html>
<div id="body1">
<div id="main">
<form action="__APP__/Stu/add" method="post" name="message">
<div class="center1">
<ul class="formul">	
	<li class="formli" style="margin-bottom:2px;"><span class="test" ><span style="margin-left:-11px;"><font color="#FF0000"style="margin-right:5px;">*</font>标题</span></span><span style="margin-right:10px;">:</span><input id="title" name="title" style="vertical-align:middle;"type="text" class="h15 in1 border" maxlength="25" />&nbsp;<span ></span></li>
	<li class="formli"><span class="test" >地区</span><span style="float:left;margin-right:10px;">:</span>
	<div class="input_select_menu" id="select_prov_id"><span class="select_item"><font class="select_area"style="margin-left:12px;">选择地区</font><input name="area_id"class="input" value="0" style="display:none;"/></span>
        <ul class="item_list" style="display: none;">
			<li><span dc="120101" >和平区</span></li>
                				<li><span dc="120102" >河东区</span></li>
                				<li><span dc="120103" >河西区</span></li>
                				<li><span dc="120104" >南开区</span></li>
                				<li><span dc="120105" >河北区</span></li>
                				<li><span dc="120106" >红桥区</span></li>
                				<li><span dc="120107" >塘沽区</span></li>
                				<li><span dc="120108" >汉沽区</span></li>
                				<li><span dc="120109" >大港区</span></li>
                				<li><span dc="120110" >东丽区</span></li>
                				<li><span dc="120111" >西青区</span></li>
                				<li><span dc="120112" >津南区</span></li>
                				<li><span dc="120113" >北辰区</span></li>
                				<li><span dc="120114" >武清区</span></li>
                				<li><span dc="120115" >宝坻区</span></li>
                				<li><span dc="" >区域不限</span></li>
        </ul>
        </div>
	 </li>
	<li class="li1"><span class="test"><font color="#FF0000"style="margin-right:5px;">*</font>详情</span><span style="margin-right:10px;">:</span><textarea  id="detail" name="detail"  class="in3 border" style="vertical-align:top;"onkeyup="check(this);" ></textarea></li>
	<li class="formli"><span class="test"><span style="margin-left:-11px;"><font color="#FF0000"style="margin-right:5px;">*</font>电话</span></span><span style="margin-right:10px;">:</span><input id="phone" name="phone" type="text" class="h15 w380 in4 border" value="<?php echo ($phone); ?>" maxlength='20' />&nbsp;<span  ></span></li>
	<li class="formli"><span class="test"><span style="margin-left:-11px;">微信</span></span><span style="margin-right:10px;">:</span><input id="user_weixin" name="user_weixin" type="text" class="h15 w380 in4 border" value="<?php echo ($weixin); ?>" maxlength='20' />&nbsp;<span></span></li>	
	<li class="formli"><span  class="test" style="text-align:center;" ><span style="margin-left:8px;">Q Q</span></span><span style="margin-right:10px;">:</span><input class="h15 w380 in4 border"name="qq" id="qq" type="text" value="<?php echo ($qq); ?>" maxlength='20' />&nbsp;<span></span></li>	
	<li class="formli" margin-left:110px; ><input type="checkbox" name="tongyi" value="1" checked="checked"  style="margin-left:50px;"/>我同意兼职网服务条款《<a href="__APP____PUBLIC__/agreement">使用协议</a>》 </li>
	<li class="formli" style="margin-top:15px;"><input name="" id="submitBut1" type="button" class="sub" value="提交"/></li>
</ul>
</div>
</form>
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
		<li style=""><a href="__APP____PUBLIC__/contactUs"  rel="nofollow">联系我们</a> | <a href="__APP____PUBLIC__/replymsg"  rel="nofollow">意见反馈</a> 
		</li>
	</ul>
</div>
</body>
</html>
</body>
</html>