<?php
// 本类由系统自动生成，仅供测试用途
class WeiAction extends Action {	
    public function index()
    {  	
	    $post=M("Post");
		$res=$post->order('id DESC')->limit(10)->select();			
		for($i=0;$i<count($res);$i++){
			$res[$i]["time"]=tmspan($res[$i]["time"]);			
		}
		$this->assign('post',$res);
		$this->display(); // 输出模板			
    }
	//获取下一栏数据
	public function getDbMore(){		
		$tmp=(int)$this->_get('last_id');
        $map['id'] = array('lt', $tmp);
        $list = D('Post')->where($map)->order('id DESC')->limit(10)->select();
		for($i=0;$i<count($list);$i++){
			$list[$i]["time"]=tmspan($list[$i]["time"]);			
		}
        $this->ajaxReturn($list);
	}
	public function post(){	
	if(IS_POST){
	  $post=M('Post');
      $post_num=$post->where('')->count();
	  load("@.comfunc");
	  $detail=detailSub($_POST['content']);
	  $phone=phoneSub($_POST['phone']);
	  $weixin=weixinTest($_POST['weixin']);
	  $qq=qqSub($_POST['qq']);
      $data=array(      
      'id'=>(string)(10000+$post_num),
      'username'=>'',
	  'name'=>'',
      'title'=>trim($_POST['title']),
      'area'=>'0',
      'payTypeId'=>'0',
      'salary'=>'',
	  'salaryTypeId'=>'0',
      'numwant'=>'',
      'detail'=>$detail,      
      'time'=> date('Y-m-d H:i:s',time()),      
      'phone'=>$phone,
	  'weixin'=>$weixin,
      'qq'=>$qq,      
      );	  
     if($post->add($data)){
      	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
      	$this->success("发布成功");
		$this->redirect('Wei:index');
      }
      else{
      	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
      	$this->success("发布失败");
		$this->redirect('Wei:post');
      }
	}else{
	$this->display();
	}
    }    
}
?>