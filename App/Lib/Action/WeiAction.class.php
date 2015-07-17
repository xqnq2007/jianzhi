<?php
// 本类由系统自动生成，仅供测试用途

class WeiAction extends Action {
    public function index()
    {  	
	    $post=M("Post");
		$res=$post->order('id DESC')->limit(100)->select();
		$this->assign('post',$res);
		$this->display(); // 输出模板		  	
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