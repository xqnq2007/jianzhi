<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title> 
<link href="__PUBLIC__/css/public_post.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/post.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/comcss.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/js/post.js"></script>
</head>
<body>
<div name="postIndexHeader"><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
</html></div>
<div id="body1">
<div id="main">
<form action="__APP__/Index/pubBossPost" method="post" id="postForm" name="pubPostForm">
<div class="center1">
<ul class="formul">
	<li class="formli" name="postTypeLi">
	<span class="test" ><font  class="mar_rig5 red">*</font>类型</span><span class="mar_rig10">:</span>
	<input type="checkbox" class="vam" id="zhaopin"name="tongyi" value="0" checked=true />&nbsp;招聘消息&nbsp;&nbsp;<input type="checkbox" class="vam" id="qiuzhi" name="tongyi" value="1"/>&nbsp;求职消息</li>
	<li class="formli"><span class="test" ><font  class="mar_rig5 red">*</font>标题</span><span class="mar_rig10">:</span><input id="title" name="title" type="text" class="h15 in1 border" maxlength="25" />&nbsp;<span ></span></li>
	<li class="formli"><span class="test" >地区</span><span class="mar_rig10 fl">:</span>
	<div class="input_select_menu" id="select_prov_id"><span class="select_item"><font class="select_area mar_lef12">选择地区</font><input name="area_id" class="input disnone" value="0" /></span>
        <ul class="item_list disnone">
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
	 <span id="changeState" name="hireNumSpan"><span class="mar_rig5">人数:</span><input
		type="text" class="h15 in5 mar_rig5 border" name="num" maxlength='5' />人</span></li>
	<li class="formli" id="salaryli" name="salaryLi"><span class="test" >工资</span><span class="mar_rig10 fl">:</span>
	<div class="input_select_menu width85 backgrdleft52" id="select_payType_id"><span class="select_item"><font class="select_area"style="margin-left:12px;">日结</font><input name="payType_id"  value="1" class="disnone"/></span>
        <ul class="item_list disnone">
			<li><span dc="1" >日结</span></li>
			<li><span dc="2" >周结</span></li>
			<li><span dc="3" >月结</span></li>
			<li><span dc="0" >其它</span></li>			
        </ul>
        </div>
	 <span id="changeState">	 
	 <input name="salary" type="text" width="20" class="h15 in5 fl mar_rig5 mar_top11 border" maxlength='5'/>
	 <div class="input_select_menu width92 backgrdleft60" id="select_salaryType_id"><span class="select_item"><font class="select_area mar_lef12">元/时</font><input name="salaryType_id"  value="1" class="disnone"/></span>
        <ul class="item_list disnone">
			<li><span dc="1" >元/时</span></li>
			<li><span dc="2" >元/日</span></li>
			<li><span dc="3" >元/月</span></li>
			<li><span dc="0" >其它</span></li>			
        </ul>
        </div>
	 </li>
	<li class="li1"><span class="test"><font  class="mar_rig5 red">*</font>详情</span><span class="mar_rig10">:</span><textarea  id="detail" name="detail"  class="in3 border alignTop"></textarea>&nbsp;<span></span></li>
	<li class="formli"><span class="test"><font  class="mar_rig5 red">*</font>电话</span><span class="mar_rig10">:</span><input id="phone" name="phone" type="text" class="h15 w380 in4 border" value="<?php echo ($phone); ?>" maxlength='20' />&nbsp;<span></span></li>
	 <li class="formli"><span class="test">微信</span><span class="mar_rig10">:</span><input id="user_weixin" name="user_weixin" type="text" class="h15 w380 in4 border" value="<?php echo ($weixin); ?>" maxlength='20' />&nbsp;<span></span></li>	
	<li class="formli"><span class="test"><font class="mar_rig3">Q Q</font></span><span class="mar_rig10">:</span><input class="h15 w380 in4 border"name="qq" id="qq" type="text" value="<?php echo ($qq); ?>" maxlength='20' />&nbsp;<span></span></li>
	<li class="formli" name="yzcodeLi"><span class="test" ><font  class="mar_rig5 red">*</font>验证码</span><span class="mar_rig10 mr17">:</span> <img class="yzimg" id="yzcodeImg" name="Image1" title="验证码" src='__APP__/Post/yanzhengma'><a href="javascript:fleshVerify();">换一个</a></li>
	<li class="formli" name="yzcodeInputLi"><span class="fl alignBot"><input type="text" id="yzcodeInput" name="yzcodeInput" value="请输入验证码"class="h15 w97 border yzcodeInput" maxlength='10'/>&nbsp;<font id="yzcodeAlertFont" ></font></span></li>
	<li class="formli" name="agreementLi"id="agreementLi"><input type="checkbox" name="tongyi"  class="vam" value="1" checked="checked" />我同意兼职网服务条款《<a href="__APP__/Public/agreement">使用协议</a>》 </li>
	<li class="formli mar_top15"><input name="pubSubBut" id="subBut" type="button" class="sub" value="提交"/></li>
</ul>
</div>
</form>
</div>
</div>
<div name="postIndexFooter"><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
</html></div>
</body>
</html>