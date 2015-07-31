<?php
// 本类由系统自动生成，仅供测试用途
class WeiAction extends Action {		
    public function index()
    {  	
	   $_SESSION[keywords]='';
		$post=M("Post");
		$res=$post->order('id DESC')->limit(10)->select();			
		for($i=0;$i<count($res);$i++){
			$res[$i]["time"]=tmspan($res[$i]["time"]);			
		}
		$this->assign('post',$res);
		$this->display(); // 输出模板			
    }	
	public function nodata(){
		$this->display();
	}
	public function search(){
		$keywords = trim($_GET['k']);  //获取搜索关键字		
		$_SESSION[keywords]=$keywords;
		$tmparr=getLikeArr($keywords);		
		$where['title|detail'] = array('like',$tmparr,'OR');  //用like条件搜索title和content两个字段 
		$data = M('Post')->where($where)->order('id DESC')->limit(10)->select();
		if($data){
			for($i=0;$i<count($data);$i++){
				$data[$i]["time"]=tmspan($data[$i]["time"]);			
			}	
		$this->assign('post',$data);
		$this->display('Wei:index');
		}else{
			$this->display('Wei:nodata');
		}	
	}
	//获取下一栏数据
	public function getDbMore(){		
		$tmp=(int)$this->_get('last_id');
        $map['id'] = array('lt', $tmp);
		if($_SESSION[keywords]){
			$tmparr=getLikeArr($_SESSION[keywords]);
			$map['title|detail'] = array('like',$tmparr,'OR');  //用like条件搜索title和content两个字段 
		}
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
	public function reg(){
		if(IS_POST){
			$boss=M('Boss');
			$boss_num=$boss->where('')->count();
			$username=trim($_POST['phone']); 
			load("@.comfunc");
			$name=nameSub($_POST['name']); 
			$pass=trim($_POST['pass']);
			$phone=trim($_POST['phone']);
			/*$weixin=weixinTest($_POST['user_weixin']);
			$qq=qqSub($_POST['user_qq']);
			$email=emailTest($_POST['user_email']); */         
			$data=array( 	           
				'id'=>(string)(10000+$boss_num),	      
				'username'=>$username,
				'pass'=>$pass,
				'name'=>$name,
				'phone'=>$phone,
				'weixin'=>'',
				'qq'=>'',
				'bossmail'=>'',        
				'regtime'=> date('Y-m-d H:i:s',time())			
			);      
			if($boss->add($data)){
				$_SESSION[boss_name]=$name;
				$_SESSION[boss_username]=$phone;
				$_SESSION[boss_shell]=md5($phone.$pass);
				$this->success('注册成功');	
				$this->assign('phone',$phone);
				$this->redirect('/Wei/post');			
			}
			else{      	
				$this->error('注册失败');
				$this->redirect('/Wei/reg');
			}		 
		}else{
			$this->display();
		}
	}
}
?>