<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="__PUBLIC__/css/managePost.css" rel="stylesheet" type="text/css" />

</head>
<body style="margin-top:10px;">
<div id="main">
<div class="box550a570">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box550a100">
<div class="box550a25">
<div class="box400a25 title"><font style="font-size:15px;"><?php echo ($nowPage++); ?>&nbsp;<?php echo ($vo["title"]); ?></font></div>
<div class="box150a25 date"><?php echo (substr($vo["time"],0,16)); ?></div>
</div>
<div class="box550a75">
<div class="box550a50">
<div class="detail"><?php echo ($vo["detail"]); ?></div>
</div>
<div class="box550a25">
<span style="float:left;width:30px;margin-left:8px;"><a href=<?php echo U('__APP__/Stu/editpost',array('cid'=>$vo['id']));?>>编辑</a></span>
<span style="width:30px;float:left;margin-left:8px;text-align:center;display:none;"><a href=<?php echo U('__APP__/Stu/delpost',array('cid'=>$vo['id']));?>>删除</a></span>
</div>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="resultpage"><?php echo ($page); ?></div>
</div>
</body>
</html>