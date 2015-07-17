<?php
// 本类由系统自动生成，仅供测试用途
class StuAction extends Action {	
    public function index()
    { 	
		if(!$_SESSION[stu_shell]){
		exit('Access Denied');
		} 
    	$this->display(); // 输出模板
    }
	public function _before_index(){
    	//检查用户是否登录
    	$tmp=new HeaderAction();
    }
    public function add()//已注册用户发布信息
    { 	
		if(!$_SESSION[stu_shell]){
		    exit('Access Denied');
		}		
        else{
			$stupost=M('Stupost');
			$stu=M('Stu');
			$condition['username']=$_SESSION[stu_username];        load("@.comfunc");    
			$tmp=$stu->where($condition)->select();
			$post_num=$stupost->where('')->count();
			$title=trim($_POST['title']);
			$detail=detailSub($_POST['detail']);
			$phone=phoneSub($_POST['phone']);
			$weixin=weixinTest($_POST['user_weixin']);
			$qq=qqSub($_POST['qq']);
			$data=array(      
			'id'=>(string)(10000+$post_num),
			'username'=>$_SESSION[stu_username],
			'name'=>$tmp[0][name],
			'title'=>$title,
			'area'=>$_POST['area_id'],      
			'detail'=>$detail,
			'time'=> date('Y-m-d H:i:s',time()),
			'phone'=>$phone,
			'weixin'=>$weixin,
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
	    $Page->setConfig(theme,"%upPage% %first% %prePage% %linkPage% %nextPage% %end% %downPage% %nowPage%/%totalPage% 页 %totalRow% %header%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $tmp=$Page->get_nowPage();
		$postindex=(5*($tmp-1))+$key+1;
	    $this->assign('nowPage',$postindex);	   
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	   
		$this->display(''); //  $(this).attr('href').replace(/boss/,'stu');		
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
		$this->display('Boss:editpost');
		echo "<script src='__PUBLIC__/js/jquery.js'></script>";
		echo "<script>
		$('span[name=\"hireNumSpan\"]').hide();
		$('li[name=\"salaryLi\"]').hide();
		var tmp=$('form[name=\"bossPostForm\"]').attr('action');
		var tmpurl=tmp.replace(/Boss/,'Stu');
		$('form[name=\"bossPostForm\"]').attr('action', tmpurl);	
		$('a[name=\"editCancelBut\"]').attr('href', '/index.php/Stu/managepost');	
		</script>";	
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
	  load("@.comfunc");
      $detail=detailSub($_POST['detail']);
      $phone=phoneSub($_POST['phone']);
	  $weixin=weixinTest($_POST['user_weixin']);
      $qq=qqSub($_POST['qq']);
      $data=array(      
      'id'=>$_GET['cid'],
      'username'=>$_SESSION[stu_username],
      'name'=>$tmp[0][name],
      'title'=>$title,
      'area'=>$_POST['area_id'],      
      'detail'=>$detail,
      'time'=> date('Y-m-d H:i:s',time()),
      'phone'=>$phone,
      'weixin'=>$weixin,
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
		$this->display('Boss:edit_perinfo');
		echo "<script src='__PUBLIC__/js/jquery.js'></script>";
		echo "<script>
		var tmp=$('form[name=\"perInfoForm\"]').attr('action');
		var tmpurl=tmp.replace(/Boss/,'Stu');
		$('form[name=\"perInfoForm\"]').attr('action', tmpurl);		
		</script>";	
    }
	public function update_perinfo(){
			if(!$_SESSION[stu_shell]){
		    exit('Access Denied');
		 }
    	$stu=D("Stu");          
      $stu=M("Stu");
      $condition['username']=$_GET['cusername'];
      $tmp=$stu->where($condition)->select();
	  load("@.comfunc");
      $name=nameSub($_POST[name]);
      $phone=phoneSub($_POST[phone]);
	  $weixin=weixinTest($_POST['user_weixin']);
      $qq=qqSub($_POST[qq]);
      $email=emailTest($_POST[email]);    
      $data=array(
      'id'=>$tmp[0][id],      
      'username'=>$tmp[0][username],
      'pass'=>$tmp[0][pass],
      'name'=>$name,
      'phone'=>$phone,
	  'weixin'=>$weixin,
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
		$this->display('Boss:edit_pass');
		echo "<script src='__PUBLIC__/js/jquery.js'></script>";
		echo "<script>
		var tmp=$('form[name=\"bossEditPassForm\"]').attr('action');
		var tmpurl=tmp.replace(/Boss/,'Stu');
		$('form[name=\"bossEditPassForm\"]').attr('action', tmpurl);		
		</script>";	
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
    public function register()//招聘用户注册
    { 	      
    	$tmp=new HeaderAction();	
    	$this->display('Boss:register');
		echo "<script src='__PUBLIC__/js/jquery.js'></script>";
		echo "<script>			
			$('form[name=\"regForm\"]').attr('action', '/index.php/Stu/reg');
			</script>";	
    }	
	public function clearBossSession()//清除BOSS Session
    { 	
       $_SESSION[boss_name]='';
       $_SESSION[boss_username]='';
       $_SESSION[boss_shell]='';
    }
    public function reg()
	{    
		if (md5(trim($_POST['yzmInput']))!= $_SESSION['verify'])
		{  
			echo "<script>fleshVerify();</script>"; 
			$this->error('验证码错误');  //如果验证码不对就退出程序         
		}
        else{
			load("@.comfunc");
			$stu=M('Stu');
			$stu_num=$stu->where('')->count();       		   
			$username=trim($_POST['user_username']); 
			$name=nameSub($_POST['user_name']); 
			$pass=trim($_POST['user_password']);
			$phone=trim($_POST['user_phone']);
			$weixin=weixinTest($_POST['user_weixin']);
			$qq=qqSub($_POST['user_qq']);
			$email=emailTest($_POST['user_email']);          
			$data=array( 	           
				'id'=>(string)(10000+$stu_num),					  
				'username'=>$username,
				'pass'=>$pass,
				'name'=>$name,
				'phone'=>$phone,
				'weixin'=>$weixin,
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
				$this->redirect('/Index/postinfo');
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
		$Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%upPage% %first% %prePage% %linkPage% %downPage% %nowPage%/%totalPage% 页 %totalRow% %header%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出		
	    $this->display(); // 输出模板   
    		
    }	
}
?>