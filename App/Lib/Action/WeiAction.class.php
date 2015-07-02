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
      $data=array(      
      'id'=>(string)(10000+$post_num),
      'username'=>'',
	  'name'=>'',
      'title'=>trim($_POST['title']),
      'area'=>'0',
      'salary'=>'',
      'numwant'=>'',
      'detail'=>$this->detailSub($_POST['content']),      
      'time'=> date('Y-m-d H:i:s',time()),      
      'phone'=>$this->phoneSub($_POST['phone']),
      'qq'=>$this->qqSub($_POST['qq']),      
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
    public function detailSub($str){
    $detail_num=mb_strlen(trim($str),'utf8');
      if($detail_num>500){
      	$detail=mb_substr(trim($str),0,500,'utf8');
      }else{
      	$detail=trim($str);
      }
      return $detail;
   
    } 
	public function phoneSub($str){
    if(preg_match("/^1\d{10}$/",trim($str))){ 
		$phone=trim($str); 
	  }else{
		$phone=''; 
	  }
	  return $phone;	  
    }
    public function qqSub($str){
     if(preg_match("/^[1-9][0-9]{4,9}$/",trim($str))){ 
		$qq=trim($str); 
	  }else{
		$qq=''; 
	  } 
	  return $qq;  
    }
	public function nameSub($str){
	$name_num=mb_strlen(trim($str),'utf8');
	if($name_num>5){
      	$name=mb_substr(trim($str),0,5,'utf8');
      }else{
      	$name=trim($str);
      }
	  return $name;  
    }
    public function emailTest($str){
    if(preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",trim($str))){ 
		$email=trim($str); 
	  }else{
		$email=''; 
	  }
	  return $email;  
    }      
    public function add()//已注册用户发布信息
    { 	
	if(!$_SESSION[stu_shell]){
		    exit('Access Denied');
		 }
      $stupost=M('Stupost');
      $stu=M('Stu');
      $condition['username']=$_SESSION[stu_username];            
      $tmp=$stu->where($condition)->select();
      $post_num=$stupost->where('')->count();
      $title=trim($_POST['title']);
      $detail=$this->detailSub($_POST['detail']);
      $phone=$this->phoneSub($_POST['phone']);
      $qq=$this->qqSub($_POST['qq']);
      $data=array(      
      'id'=>(string)(10000+$post_num),
      'username'=>$_SESSION[stu_username],
      'name'=>$tmp[0][name],
      'title'=>$title,
      'area'=>$_POST['area_id'],      
      'detail'=>$detail,
      'time'=> date('Y-m-d H:i:s',time()),
      'phone'=>$phone,
      'qq'=>$qq,      
      );    
    
        if($stupost->add($data)){
        	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
        	echo "<script type='text/javascript'>window.parent.location.href='/index.php/Stu/stuPostIndex';</script>";
        	        	
        }else{
        	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";        	
        	$this->error('发布失败');
        }   	
        
    }
	public function managepost(){
		if(!$_SESSION[stu_shell]){
	    exit('Access Denied');
	 	}    	 
    	$Data = M('Stupost'); // 实例化Data数据对象
	    import('ORG.Util.myPage');// 导入分页类
	    $map['username']=$_SESSION[stu_username];
	    $count= $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    if($count==0){echo "您没有发布任何信息";}
	    else{
	    $Page= new myPage($count,5);// 实例化分页类 传入总记录数
	    $Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first% %prePage% %linkPage% %nextPage% %end%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $tmp=$Page->get_nowPage();
		$postindex=(5*($tmp-1))+$key+1;
	    $this->assign('nowPage',$postindex);	   
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出
	    //$value="hello";$this->assign('php100',$value);
	    $this->display(); // 输出模板
	    }
    }
	public function editpost(){
		if(!$_SESSION[stu_shell]){
	    exit('Access Denied');
	 	}
      $post=M('Stupost');
      $stu=M('Stu');
      $condition['id']=$_GET['cid'];
      $tmp=$post->where($condition)->select();      
      $tmpid=$tmp[0][area];      
      $tjareas=M('Tjareas');
      $condition['id']=$tmpid;
      $tmpareas=$tjareas->where($condition)->select();
      $tmparea=$tmpareas[0][area];      
      $this->assign('thepost',$tmp);
      $this->assign('thearea',$tmparea);
      $this->assign('theareaid',$tmpid);         
      $this->display();
    }
	public function updatepost(){
		if(!$_SESSION[stu_shell]){
	    exit('Access Denied');
	 }
    	$Post=D("Stupost");
      if(!$Post->create()){
      	echo "<script type='text/javascript'>alert('内容有误');window.location.href='/index.php/Boss/editpost?cid=$_GET[cid]';</script>";
      }else{
      	$post=M('Stupost');
      $stu=M('Stu');
      $condition['username']=$_SESSION[stu_username];
      $tmp=$stu->where($condition)->select();      
      $title=trim($_POST['title']);
      $detail=$this->detailSub($_POST['detail']);
      $phone=$this->phoneSub($_POST['phone']);
      $qq=$this->qqSub($_POST['qq']);
      $data=array(      
      'id'=>$_GET['cid'],
      'username'=>$_SESSION[stu_username],
      'name'=>$tmp[0][name],
      'title'=>$title,
      'area'=>$_POST['area_id'],      
      'detail'=>$detail,
      'time'=> date('Y-m-d H:i:s',time()),
      'phone'=>$phone,
      'qq'=>$qq,      
      );      
        if($post->save($data)){        	
        	$this->success('更新成功');
        	$this->redirect('Boss:managepost');
        }else{
        	echo "更新失败";
        	$this->redirect('Boss:managepost');
        }
    	;
      }      
    }
	public function delpost(){
		if(!$_SESSION[stu_shell]){
	    exit('Access Denied');
	 }
    	$post=M('Stupost');    	
    	$condition['id']=$_GET['cid'];
    	if($post->where($condition)->delete()){    		
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}    	
    }
    public function edit_perinfo(){
    if(!$_SESSION[stu_shell]){
    exit('Access Denied');
 }
      $post=M('Stupost');
      $stu=M('Stu');
      $condition['username']=$_SESSION[stu_username];
      $tmp=$stu->where($condition)->select();      
      $this->assign('theinfo',$tmp);            
      $this->display();
    }
	public function update_perinfo(){
			if(!$_SESSION[stu_shell]){
		    exit('Access Denied');
		 }
    	$stu=D("Stu");          
      $stu=M("Stu");
      $condition['username']=$_GET['cusername'];
      $tmp=$stu->where($condition)->select(); 
      $name=$this->nameSub($_POST[name]);
      $phone=$this->phoneSub($_POST[phone]);
      $qq=$this->qqSub($_POST[qq]);
      $email=$this->emailTest($_POST[email]);    
      $data=array(
      'id'=>$tmp[0][id],      
      'username'=>$tmp[0][username],
      'pass'=>$tmp[0][pass],
      'name'=>$name,
      'phone'=>$phone,
      'qq'=>$qq, 
      'email'=>$email,
      'regtime'=>$tmp[0][regtime],       
      );     
       $tmpid= $tmp[0][id]; 
      if($stu->save($data)){
        	$this->success("更新成功");
        }else{
        	$this->error("更新失败");
        }
    }
	public function edit_pass(){ 
	if(!$_SESSION[stu_shell]){
    exit('Access Denied');
 }   	
      $this->display();
    } 
	public function update_pass(){
			if(!$_SESSION[stu_shell]){
		    exit('Access Denied');
		 }
    	$Stu=M("Stu");
    	$map['username']=$_SESSION[stu_username];
    	$tmp=$Stu->where($map)->select();
    	$prepass=trim($_POST[pre_pass]);
    	if($prepass==$tmp[0][pass]){
    		if(strlen(trim($_POST[new_pass]))>=6){
    			$re=$Stu->where($map)->setField('pass', trim($_POST[new_pass]));
    			if($re){    				
    				$this->success("更新成功");
    			}else{    				
    				$this->error("更新失败");
    			}
    		}else{
    			$this->error("密码长度不能低于六位");
    		}
    	}else{    		
    		$this->error("密码不正确");
    	}     
    }
    public function replymsg(){
	    if(!$_SESSION[stu_shell]){
	    exit('Access Denied');
	 }
	  $stu=M("Stu");
      $condition['username']=$_SESSION[stu_username];
      $tmp=$stu->where($condition)->select();     
      $this->assign('theinfo',$tmp);    	
      $this->display();
    }
	public function contactUs(){    	
      $this->display('Boss:contactUs');
    }  
    public function register()//招聘用户注册
    { 	
      
    	$tmp=new HeaderAction();	
    	$this->display('Stu:register');
    }	
	public function clearBossSession()//清除BOSS Session
    { 	
       $_SESSION[boss_name]='';
       $_SESSION[boss_username]='';
       $_SESSION[boss_shell]='';
    }
    public function reg(){
    
    	if (md5(trim($_POST['yzcode']))!= $_SESSION['verify'])
        {  
         $this->error('验证码错误');  //如果验证码不对就退出程序         
        }
        else{
       		  $stu=M('Stu');
       		  $stu_num=$stu->where('')->count();       		   
		      $username=trim($_POST['user_username']); 
	         $name=$this->nameSub($_POST['user_name']); 
	         $pass=trim($_POST['user_password']);
	         $phone=trim($_POST['user_phone']);
	         $qq=$this->qqSub($_POST['user_qq']);
	         $email=$this->emailTest($_POST['user_email']);          
		      $data=array( 	           
		     'id'=>(string)(10000+$stu_num),
		      //'username'=>'xqnq',
		      'username'=>$username,
		      'pass'=>$pass,
		      'name'=>$name,
		      'phone'=>$phone,
		      'qq'=>$qq,
		      'email'=>$email,        
		      'regtime'=> date('Y-m-d H:i:s',time()),	                 
      		);
		      if($stu->add($data)){
		      	$_SESSION[stu_name]=$name;
				$_SESSION[stu_username]=$username;
				$_SESSION[stu_shell]=md5($username.$pass);
				$this->clearBossSession();				
		      	$this->success('注册成功');
		      	$this->redirect('/Stu/index');
		      }
		      else{		      	
		      	$this->error('注册失败');
		      }
        } 
    }
    public function usernameTest(){
    	$stu=M('Stu');
    	$username=$_POST['name'];
		$map['username']=$username;
		$tmp= $stu->where($map)->select();
		if($tmp){
			echo "1";	
		}else{	
			echo "0";	
		}
    }
    public function stuPostIndex(){
		$tmp=new HeaderAction();
    	$Data = M('Stupost'); // 实例化Data数据对象
	    import('ORG.Util.Page');// 导入分页类
	    $count= $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page= new Page($count,10);// 实例化分页类 传入总记录数
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出		
	    $this->display(); // 输出模板   
    		
    }    
}
?>