<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>首页</title>
<link href="__PUBLIC__/css/index_index.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/index_index.js"></script>
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
<div id="bigmain">
<div id="rig">
<div class="rig1" onclick="postinfo()">
<ul >
	<li><a href="/index.php/Index/postinfo" class="postA" ><font class="color_black" >发布兼职信息</font></a></li>
</ul>
</div>
<div class="riggap"></div>
<div class="rig2">
<div class="mar_bot20">
<ul>
	<li id="boss" class="guzhudenglu"onMouseOver="bosshov();" >
	<h3 id="bosstab">雇主登录</h3>
	</li>
	<li id="stu" class="xueshengdenglu"	onmouseover="stuhov();">
	<h3  id="stutab">学生登录</h3>
	</li>
</ul>
</div>
<form action="__URL__/boss_login" method=post id="bossform"
	class="formboss">
<ul class="bossul">
	<li>用户名：<input type="text" name="bossUsername" id="bossUsername"class="fotext" maxlength='20'  /></li>
	<li>密　码：<input type="password" name="bossPass" id="bossPass" class="fotext" maxlength='20' /></li>
	<li><input type="button" value="登录" class="subtext" name="stuform" id="bossSubBut" /></li>
	<li><a href="__APP__/Boss/register"><font class="color333 mf30">还没有帐号？立即注册一个</font></a></li>
</ul>
</form>
<form action="__URL__/stu_login" method=post id="stuform"
	style="display:none;">
<ul class="bossul">
	<li>用户名：<input class="fotext" type="text" name="stuUsername" id="stuUsername" maxlength='20'/></li>
	<li>密　码：<input class="fotext" type="password" name="stuPass" id="stuPass" maxlength='20'/></li>
	<li><input type="button" value="登录" class="subtext" name="stuform" id="stuSubBut" /></li>
	<li><a href="__APP__/Stu/register"><font class="color333 mf30">还没有帐号？立即注册一个</font></a></li>	
</ul>
</form>
</div>
</div>
<div id="main"><div class="divvolist"><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box600a205">
<div class="box600a50">
<div class="box450a50"><a href="<?php echo U('__APP__/Post/postDetail',array('cid'=>$vo['id']));?>"><font class="title"><?php echo ($vo["title"]); ?></font></a></div>
<div class="box150a50 date"><?php echo (substr($vo["time"],0,16)); ?></div>
</div>
<div class="box600a135">
	<div class="box600a110">
		<div class="detail"><?php echo ($vo["detail"]); ?></div>
	</div>
	<div class="box600a25">
		<span class="phoneOutSpan">
			<span class="phoneText">电话：</span><span class="phoneNum"><?php echo ($vo["phone"]); ?></span>
		</span>
		<span class="phoneOutSpan">
			<span class="phoneText">微信：</span><span class="phoneNum"><?php echo ($vo["weixin"]); ?></span>
		</span>
		<span class="qqOutSpan">
			<span class="qqText">q q：</span><span class="qqNum"><?php echo ($vo["qq"]); ?></span>
		</span>
	<span name="detailId" class="disnone"><?php echo ($vo["id"]); ?></span>
	</div>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="resultpage"><?php echo ($page); ?></div>
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
		<li><a href="http://www.miibeian.gov.cn/">京ICP备15033321号</a></li>
	</ul>
</div>
</body>
</html> 
</body>
</html>