<?php
// 本类由系统自动生成，仅供测试用途
class WeiAction extends Action {		
    public function index()
    {  	
		load("@.comfunc");
		$curcity='';				
		 if(!$_GET['city']){
			 if(!$_SESSION[curcity]){				
				$curcity=getCurCity();				
				session('curcity',$curcity);
			 }else{				 
				 $curcity=$_SESSION['curcity'];
			 }
		 }else{			
			 $curcity=$_SESSION[curcity]=$_GET['city'];			
		 }
		 if($_SESSION[curcity]){
			 $cityname=getCityName($_SESSION[curcity]);
			 $post=getPostData($_SESSION[curcity]);
			$comt=getComtData($_SESSION[curcity]);				 
		 }				
	    $_SESSION[keywords]='';	
		$res=$post->order('id DESC')->limit(10)->select();			
		for($i=0;$i<count($res);$i++){
			$res[$i]["time"]=tmspan($res[$i]["time"]);
			$res[$i]['voo']=$comt->where('postId='.$res[$i]['postId'])->order('postTime ASC')->select();  
		}
		$this->assign('post',$res);
		$this->assign('curcity',$cityname);
		$this->assign('appurl',$curcity);
		$this->display(); // 输出模板			
    }	
	public function nodata(){
		$this->display();
	}
	public function search(){
		load("@.comfunc");
		$keywords = trim($_GET['k']);  //获取搜索关键字
		$cityname=getCityName($_SESSION[curcity]);
		 $post=getPostData($_SESSION[curcity]);
		$comt=getComtData($_SESSION[curcity]);
		$_SESSION[keywords]=$keywords;
		$tmparr=getLikeArr($keywords);		
		$where['title|detail'] = array('like',$tmparr,'OR');  //用like条件搜索title和content两个字段 
		$data = $post->where($where)->order('id DESC')->limit(10)->select();
		$this->assign('curcity',$cityname);
		$this->assign('appurl',$_SESSION[curcity]);
		if($data){
			for($i=0;$i<count($data);$i++){
				$data[$i]["time"]=tmspan($data[$i]["time"]);	
				$data[$i]['voo']=$comt->where('postId='.$data[$i]['postId'])->order('postTime ASC')->select();  
			}	
		$this->assign('post',$data);
		$this->display('Wei:index');
		}else{
			$this->display('Wei:nodata');
		}	
	}
	//获取下一栏数据
	public function getDbMore(){
		load("@.comfunc");
		 $post=getPostData($_SESSION[curcity]);
		$comt=getComtData($_SESSION[curcity]);	
		$tmp=(int)$this->_get('last_id');
        $map['postId'] = array('lt', $tmp);
		if($_SESSION[keywords]){
			$tmparr=getLikeArr($_SESSION[keywords]);
			$map['title|detail'] = array('like',$tmparr,'OR');  //用like条件搜索title和content两个字段 
		}
        $list =  $post->where($map)->order('id DESC')->limit(10)->select();
		for($i=0;$i<count($list);$i++){
			$list[$i]["time"]=tmspan($list[$i]["time"]);
			$list[$i]['voo']=$comt->where('postId='.$list[$i]['postId'])->order('postTime ASC')->select(); 
		}
        $this->ajaxReturn($list);
	}
	public function post(){	
		if(IS_POST){
			load("@.comfunc");
			$post=getPostData($_SESSION[curcity]);
			$username=$_SESSION[boss_username];
			$name=$_SESSION[boss_name];
			$post_num=$post->where('')->count();			
			$detail=detailSub($_POST['content']);
			$phone=phoneSub($_POST['phone']);
			$weixin=weixinTest($_POST['weixin']);
			$qq=qqSub($_POST['qq']);
			$data=array(      
			'id'=>'',
			'postId'=>(string)(10000+$post_num),
			'username'=>$username,
			'name'=>$name,
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
			$tmpurl="/".$_SESSION['curcity']."/Wei";			
			echo "<script>location.href='$tmpurl';</script>";			
			}
			else{
			echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
			$this->success("发布失败");			
			$tmpurl="/".$_SESSION['curcity']."/Wei/index";
			echo "<script>location.href='$tmpurl';</script>";	
			}
		}else{
			$this->display();
		}		
    } 
	public function reg(){		
		if(IS_POST){
			load("@.comfunc");
			$boss=M('Boss');
			$boss_num=$boss->where('')->count();
			$username=trim($_POST['phone']); 			
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
				$tmpurl="/".$_SESSION['curcity']."/Wei/index";
				$this->redirect($tmpurl);
			}
			else{      	
				$this->error('注册失败');
				$tmpurl="/".$_SESSION['curcity']."/Wei/reg";
				$this->redirect($tmpurl);
			}		 
		}else{
			$this->display();
		}
	}
	public function postComt(){
		load("@.comfunc");
		$comt=getComtData($_SESSION[curcity]);				
		$postid=$this->_get('postid');
		$postername=$_SESSION[boss_name];
		$postcont=$this->_get('postcont');		
		$comtdata=array(      
			'id'=>'',
			'postId'=>$postid,
			'posterName'=>$postername,
			'postContent'=>comtSub($postcont),			
			'postTime'=> date('Y-m-d H:i:s',time()) 
		);	  
		if($comt->add($comtdata)){
			$data['status'] = 1;
			$data['name'] =$postername ;
			$data['postcont'] = comtSub($postcont);			
			$this->ajaxReturn($data,'JSON');
		}
		else{
			$data['status'] = 0;					
			$this->ajaxReturn($data,'JSON');
		}		
    } 
}
?>