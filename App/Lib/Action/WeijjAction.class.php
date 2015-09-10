<?php
// 本类由系统自动生成，仅供测试用途
class WeijjAction extends Action {		
    public function index()
    {  	
		load("@.comfunc");
		$curcity='';				
		 if(!$_GET['city']){
			 if(!$_SESSION[jjcurcity]){				
				$curcity=getCurCity();				
				session('jjcurcity',$curcity);
			 }else{				 
				 $curcity=$_SESSION['jjcurcity'];
			 }
		 }else{			
			 $curcity=$_SESSION[jjcurcity]=$_GET['city'];			
		 }
		 if($_SESSION[jjcurcity]){
			 $cityname=getCityName($_SESSION[jjcurcity]);
			 $post=getJJPostData($_SESSION[jjcurcity]);
			$comt=getJJComtData($_SESSION[jjcurcity]);				 
		 }				
	    $_SESSION[jjkeywords]='';	
		$res=$post->order('id DESC')->limit(10)->select();			
		for($i=0;$i<count($res);$i++){
			$res[$i]["time"]=tmspan($res[$i]["time"]);
			$res[$i]['voo']=$comt->where('postId='.$res[$i]['postId'])->order('postTime ASC')->select();  
		}
		$this->assign('post',$res);
		$this->assign('curcity',$cityname);
		$this->assign('appurl',$curcity);
		$this->display(); // 输出模板		
		//echo "家教";
    }	
	public function nodata(){
		$this->display();
	}
	public function search(){
		load("@.comfunc");
		$keywords = trim($_GET['k']);  //获取搜索关键字
		$cityname=getCityName($_SESSION[jjcurcity]);
		 $post=getJJPostData($_SESSION[jjcurcity]);
		$comt=getJJComtData($_SESSION[jjcurcity]);
		$_SESSION[jjkeywords]=$keywords;
		$tmparr=getJJLikeArr($keywords);	
		//$arr=array('%'.$keywords.'%','%'.$keywords,$keywords.'%');
		$where['title|detail'] = array('like',$tmparr,'OR');  //用like条件搜索title和content两个字段 
		//$where['title|detail'] = array('like',$arr,'OR');  //用like条件搜索title和content两个字段 
		$data = $post->where($where)->order('id DESC')->limit(10)->select();
		$this->assign('curcity',$cityname);
		$this->assign('appurl',$_SESSION[jjcurcity]);
		//echo $keywords;
		if($data){
			for($i=0;$i<count($data);$i++){
				$data[$i]["time"]=tmspan($data[$i]["time"]);	
				$data[$i]['voo']=$comt->where('postId='.$data[$i]['postId'])->order('postTime ASC')->select();  
			}	
		$this->assign('post',$data);
		$this->display('Weijj:index');
		}else{
			$this->display('Weijj:nodata');
		}	
	}
	//获取下一栏数据
	public function getDbMore(){
		load("@.comfunc");
		 $post=getJJPostData($_SESSION[jjcurcity]);
		$comt=getJJComtData($_SESSION[jjcurcity]);	
		$tmp=$this->_get('last_id');
        $map['id'] = array('lt', $tmp);
		if($_SESSION[jjkeywords]){
			$tmparr=getLikeArr($_SESSION[jjkeywords]);
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
			$post=getJJPostData($_SESSION[jjcurcity]);
			$posttable=getJJPostTable($_SESSION[jjcurcity]);
			$username=$_SESSION[boss_username];
			$name=$_SESSION[boss_name];			
			$postid=(string)($post->max('id')+1);
			$title=trim($_POST['title']);
			$detail=detailSub($_POST['content']);
			$time=date('Y-m-d H:i:s',time());
			$phone=phoneSub($_POST['phone']);
			$weixin=weixinTest($_POST['weixin']);
			$qq=qqSub($_POST['qq']);
			$sql = "INSERT INTO ".$posttable."(id,postId,username,name,title,detail,time,phone,weixin,qq)VALUES('',$postid,'{$username}','{$name}','{$title}','{$detail}','{$time}','{$phone}','{$weixin}','{$qq}')";		
			$titleexit=$post->where("detail="."'".$detail."'")->select();
			if(!$titleexit){
				if($post->execute($sql)){					
					$this->success("发布成功");			
					$tmpurl="/".$_SESSION['jjcurcity']."/Weijj";			
					echo "<script>location.href='$tmpurl';</script>";		
				}else{			
					echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
					$this->error("发布失败");			
					$tmpurl="/".$_SESSION['jjcurcity']."/Weijj/post";
					echo "<script>location.href='$tmpurl';</script>";			
				}	
			}else{				
				$this->error("已经有同样的信息了");			
				$tmpurl="/".$_SESSION['jjcurcity']."/Weijj/post";
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
			$bosstable=getBossTable();
			$bossid=(string)($boss->max('id')+1);					
			$username=trim($_POST['phone']); 			
			$name=nameSub($_POST['name']); 
			$pass=trim($_POST['pass']);
			$phone=trim($_POST['phone']);
			/*$weixin=weixinTest($_POST['user_weixin']);
			$qq=qqSub($_POST['user_qq']);
			$email=emailTest($_POST['user_email']); */  
			$time=date('Y-m-d H:i:s',time());
			$sql = "INSERT INTO ".$bosstable."(id,bossId,username,pass,name,phone,weixin,qq,bossmail,regtime)VALUES('',$bossid,'{$username}','{$pass}','{$name}','{$phone}','','','','{$time}')";					
			if($boss->execute($sql)){
				$_SESSION[boss_name]=$name;
				$_SESSION[boss_username]=$phone;
				$_SESSION[boss_shell]=md5($phone.$pass);
				$this->success('注册成功');	
				$this->assign('phone',$phone);
				$tmpurl="/".$_SESSION['jjcurcity']."/Weijj/index";				
				echo "<script>location.href='$tmpurl';</script>";
			}
			else{      	
				$this->error('注册失败');
				$tmpurl="/".$_SESSION['jjcurcity']."/Weijj/reg";
				echo "<script>location.href='$tmpurl';</script>";	
			}		 
		}else{
			$this->display();
		}
	}
	public function postComt(){
		load("@.comfunc");
		$comt=getJJComtData($_SESSION[jjcurcity]);				
		$postid=$this->_post('postid');
		$postername=$_SESSION[boss_name];
		$postcont=$this->_post('postcont');		
		$comtdata=array(      
			'id'=>'',
			'postId'=>(string)$postid,
			'posterName'=>$postername,
			'postContent'=>(string)comtSub($postcont),			
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
	public function postComt1(){
		load("@.comfunc");
		$comt=getComtData($_SESSION[curcity]);				
		//$postid=$this->_get('postid');
		$postid=$_GET['postid'];
		$postername=$_SESSION[boss_name];
		$postcont=$this->_get('postcont');		
		$comtdata=array(      
			'id'=>'',
			'postId'=>(string)$postid,
			'posterName'=>$postername,
			'postContent'=>(string)comtSub($postcont),			
			'postTime'=> date('Y-m-d H:i:s',time()) 
		);	
//var_dump($comtdata);
		print_r($_GET);
		/*if($comt->add($comtdata)){
			$data['status'] = 1;
			$data['name'] =$postername ;
			$data['postcont'] = comtSub($postcont);			
			$this->ajaxReturn($data,'JSON');
		}
		else{
			$data['status'] = 0;					
			$this->ajaxReturn($data,'JSON');
		}	*/	
    } 
}
?>