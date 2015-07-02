<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<script src="__PUBLIC__/js/jquery.js"></script>
<link href="__PUBLIC__/css/stuPostDetail.css" rel="stylesheet" type="text/css" />

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

<div id="main">
<div class="box600a520">
<div class="box600a85">
<div class="box600a50 title"><font style="font-size:22px;margin-left:25px;"><?php echo ($thepost[0][title]); ?></font></div>
<div class="box600a25 date">
<div class="box280a25">
</div>
<div class="box200a25">
<div class="box75a25">发布时间：</div>
<div class="box125a25"><?php echo (substr($thepost[0][time],0,16)); ?></div>
</div>
<div class="box100a25">地区：<?php echo ($thearea); ?></div>
</div>
</div>
<div class="box600a400">
<div class="box600a350">
<div class="detail"><?php echo ($thepost[0][detail]); ?></div>
</div>
<div class="box600a50">
<div class="box600a25">
<span style="width:130px;float:right;margin-right:20px;text-align:left;color:blue;">
<span style="float:left;width:50px;text-align:right;">电话：</span>
<?php echo ($thepost[0][phone]); ?></span>
</div>
<div class="box600a20">
<span style="width:130px;float:right;margin-right:20px;text-align:left;color:blue;">
<span style="float:left;width:50px;text-align:right;"><span style="width:28px;float:left;margin-left:8px;text-align:center;">q q</span>：</span>
<?php echo ($thepost[0][qq]); ?>
</span>
</div>
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