<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--<!DOCTYPE html>-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<title>兼职时代</title>
<link href="__PUBLIC__/boot/css/bootstrap.min.css" rel="stylesheet">
<link href="__PUBLIC__/css/index.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/jquery.min.js"></script>
<script src="__PUBLIC__/boot/js/bootstrap.min.js"></script>
<script src="__PUBLIC__/js/index_index.js"></script>
<script src="__PUBLIC__/js/post.js"></script>
</head>
<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/header.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/js/header.js"></script>
</head>
<body>
  <nav class="navbar navbar-default white h50" role="navigation">
   <div class="navbar-header ml125">
      <a class="navbar-brand" href="__APP__/Index">
		<img width="120" height="36" src="/Public/images/bigelogo.jpg" class="logo">
	  </a>
   </div>
   <div>      
      <ul class="nav navbar-nav navbar-left" style="display:none;">         
		 <li><p class="navbar-text navbar-left">jianzhi022.com</p>		 
		 </li>
      </ul>
      <ul class="nav navbar-nav navbar-right mr120">         
		 <li>
			 <span data-toggle="modal" data-target="#postModal">
				<button type="button" class="navbar-left btn btn-default navbar-btn">快捷发布</button>
			 </span>			 
			 <p class="navbar-text navbar-left" style="display:none;"><a href="#">登陆</a></p>
			 <p class="navbar-text navbar-left" style="display:none;"><a href="#">注册</a></p>		
		</li>
      </ul>	 
	  <!-- 模态框（Modal） -->
		<div class="modal fade" id="postModal" tabindex="-1" role="dialog" 
		   aria-labelledby="myModalLabel" aria-hidden="true">
		   <div class="modal-dialog">
			  <div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" 
					   data-dismiss="modal" aria-hidden="true">
						  &times;
					</button>
					<span class="modal-title" id="myModalLabel">
					   <span class="glyphicon glyphicon-pencil"></span>&nbsp;发布兼职
					</span>
				 </div>
				 <div class="modal-body">					
					<!-- fabu begin -->	
					<form class="form-horizontal" role="form" method="post" id="postForm" name="postForm">
					   <div class="form-group">
						  <label for="firstname" class="col-sm-2 control-label">
							<font style="color:red">*</font>&nbsp;标题：
						  </label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="title" name="title" placeholder="请输入标题" maxlength="50">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="lastname" class="col-sm-2 control-label">
							<font style="color:red">*</font>&nbsp;内容：
						  </label>
						  <div class="col-sm-10">
							 <textarea type="text" id="detail" name="detail" class="form-control h150" placeholder="请输入兼职内容"></textarea>
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="firstname" class="col-sm-2 control-label">
							<font style="color:red">*</font>&nbsp;电话：
						  </label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="phone" name="phone" placeholder="请输入你的电话" maxlength='20'>
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="firstname" class="col-sm-2 control-label">
							微信：
						  </label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="weixin" name="weixin" placeholder="请输入你的微信" maxlength='20'>
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="firstname" class="col-sm-2 control-label">
							Q&nbsp;Q：
						  </label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="qq" name="qq" placeholder="请输入你的QQ" maxlength='20'>
						  </div>
					   </div>					   
					</form>					
				 </div>
				 <div class="modal-footer">
					<button type="button" class="btn btn-default canbtn" 
					   data-dismiss="modal">关闭
					</button>
					<button type="button" class="btn btn-primary subbtn" type="submit" id="submit-btn">
					   提交
					</button>
				 </div>
			  </div><!-- /.modal-content -->
		</div><!-- /.modal -->
   </div>
   
   <!-- 模态框（Modal） -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">            
            <h4 class="modal-title" id="myModalLabel">
               提交成功！
            </h4>
         </div>         
      </div><!-- /.modal-content -->
</div></div><!-- /.modal -->
</nav>
</body>
</html>
<div class="container-fluid mb20">
	<div class="row-fluid">
		<div class="col-md-6 pl110">
			<div class="nums">
				共有<?php echo ($count); ?>条信息
			</div>
			<div class="leftBlock"></div>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="well c-container">				
				<ul class="list-group f13">
				<li class="list-group-item noborder titlepadding">
					<div class="title" >
					<a class="parenttitle" data-toggle="modal" data-target="#myModal">	<?php echo ($vo["title"]); ?>
					</a>
					</div>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					   <div class="modal-dialog">
						  <div class="modal-content">							 
							 <div class="modal-body">
								<div class="well">
									<ul class="list-group">
									<li class="list-group-item titleitem">									   								  
										<button type="button" class="close" 
										   data-dismiss="modal" aria-hidden="true">
											  &times;
										</button>
										 <h4 class="modal-title title" id="myModalLabel">
										</h4>									
									</li>
									<li class="list-group-item timeitem">							
										<font class="time"></font>
									</li>
									<li class="list-group-item detailitem">
										<font class="detail"></font>
									</li>
									<li class="list-group-item phoneitem">
									电话：<font class="phone"></font>&nbsp;&nbsp;&nbsp;&nbsp;
									<span>微信：<font class="weixin"></font>&nbsp;&nbsp;&nbsp;&nbsp;</span>
									<span>QQ：<font class="qq"></font></span>
									</li>									
									</ul>
								</div>
							 </div>							 
						  </div><!-- /.modal-content -->
					</div><!-- /.modal -->
					</div>
				</li>
				<li class="list-group-item noborder titlepadding"><span class="parenttime"><?php echo ($vo["time"]); ?></span></li>
				<li class="list-group-item detail noborder detailpadding">
				<span class="parentdetail"><?php echo ($vo["detail"]); ?></span>
				</li>
				<li name="contactli" class="list-group-item noborder detailpadding h10 parentcontact">
				电话：<span class="parentphone"><?php echo ($vo["phone"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
				<span>微信：<span class="parentweixin"><?php echo ($vo["weixin"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<span>QQ：<span class="parentqq"><?php echo ($vo["qq"]); ?></span></span>
				</li>				
				</ul>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="leftBlock"></div>
			<div class="resultpage"><?php echo ($page); ?></div>			
		</div>
		<div class="col-md-6 pl110">
			<!-- 右侧页面-->
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
	   <div style="display:none;">
		  <p class="navbar-text"><a href="__APP____PUBLIC__/contactUs"  rel="nofollow">帮助</a></p>
	   </div>
	   <div style="display:none;">
		  <p class="navbar-text"><a href="__APP__/Public/replymsg"  rel="nofollow">建议</a></p>
	   </div>
	   <div style="display:none;">
		  <p class="navbar-text"><a href="__APP__/Public/replymsg"  rel="nofollow">关于我们</a></p>
	   </div>
	   <div style="display:none;">
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
<!--<div id="bigmain">
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
</div>-->

</body>
</html>