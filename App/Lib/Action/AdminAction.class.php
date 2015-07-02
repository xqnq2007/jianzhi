<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
	
    public function index()
    { 	       
    	$this->display('Admin:loginIndex'); // 输出模板 
    }
    public function _before_index(){
    	//检查用户是否登录
    	$tmp=new HeaderAction();	    	    
    }
	public function loginIndex(){
    	//检查用户是否登录
    	$this->display('');  	    
    }
	public function adminMain(){
    	//检查用户是否登录
    	if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 }  
    	$this->display('');  	    
    }
	public function adminLogin(){ 	
    $admin_username=trim($_POST['adminUsername']);
    $admin_password=trim($_POST['adminPass']);
    $admin=M('Admin');    
    $condition['username']=$admin_username;
    $tmp=$admin->where($condition)->select();
    $b=is_array($tmp);
    $ps=$b ? $admin_password==$tmp[0]["password"]:FALSE;    
	if($ps){
		$_SESSION[admin_name]=$tmp[0]["name"];
		$_SESSION[admin_username]=$tmp[0]["username"];		
		$_SESSION[admin_shell]=md5($tmp[0]["username"].$tmp[0]["password"]);		
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='/index.php/Admin/adminMain'";
        echo "</script>";        
	}
	else{
		$this->error("登录失败");
	}    
    }    
    public function bossPost(){
    	if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 }     	 
    	$Data = M('Post'); // 实例化Data数据对象
	    import('ORG.Util.myPage');// 导入分页类	    
	    $count= $Data->count();// 查询满足要求的总记录数 $map表示查询条件
	    if($count==0){echo "您没有发布任何信息";}
	    else{
	    $Page= new myPage($count,5);// 实例化分页类 传入总记录数
	    $Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %downPage%  %end%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $tmp=$Page->get_nowPage();
	    $postindex=(5*($tmp-1))+$key+1;
	    $this->assign('nowPage',$postindex);
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	   
	    $this->display(); // 输出模板
	    }
    }
	public function bossList(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$Data = M('Boss'); // 实例化Data数据对象
	    import('ORG.Util.myPage');// 导入分页类	    
	    $count= $Data->count();// 查询满足要求的总记录数 $map表示查询条件
	    if($count==0){echo "没有招聘用户注册";}
	    else{	    	  
	    $Page= new myPage($count,10);// 实例化分页类 传入总记录数
	    $Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %downPage%  %end%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('regtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $tmp=$Page->get_nowPage();
	    $postindex=(5*($tmp-1))+$key+1;
	    $this->assign('nowPage',$postindex);
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	   
	    $this->display(); // 输出模板
	    
	    }
    }
	public function stuList(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$Data = M('Stu'); // 实例化Data数据对象
	    import('ORG.Util.myPage');// 导入分页类	    
	    $count= $Data->count();// 查询满足要求的总记录数 $map表示查询条件
	    if($count==0){echo "没有招聘用户注册";}
	    else{	    	  
	    $Page= new myPage($count,10);// 实例化分页类 传入总记录数
	    $Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %downPage%  %end%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('regtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $tmp=$Page->get_nowPage();
	    $postindex=(5*($tmp-1))+$key+1;
	    $this->assign('nowPage',$postindex);
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	    
	    $this->display(); // 输出模板
	    
	    }
    }
	public function stuPost(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 }     	 
    	$Data = M('Stupost'); // 实例化Data数据对象
	    import('ORG.Util.myPage');// 导入分页类	    
	    $count= $Data->count();// 查询满足要求的总记录数 $map表示查询条件
	    if($count==0){echo "您没有发布任何信息";}
	    else{
	    $Page= new myPage($count,5);// 实例化分页类 传入总记录数
	    $Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %first% %prePage% %linkPage% %downPage%  %end%");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $tmp=$Page->get_nowPage();
	    $postindex=(5*($tmp-1))+$key+1;
	    $this->assign('nowPage',$postindex);
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	    
	    $this->display(); // 输出模板
	    }
    }
    public function arr1($arr){
    	$arr1=$arr[0];
    	return $arr1;    	
    }
    public function editpost(){
    	if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
      $post=M('Post');
      $boss=M('Boss');
      $condition['id']=$_GET['cid'];
      $tmp=$post->where($condition)->select();
      $tmp1=$this->arr1($tmp);
      $tmpid=$tmp[0][area];      
      $tjareas=M('Tjareas');
      $condition['id']=$tmpid;
      $tmpareas=$tjareas->where($condition)->select();
      $tmparea=$tmpareas[0][area];      
      $this->assign('thepost',$tmp);
      $this->assign('thearea',$tmparea);
      $this->assign('theareaid',$tmpid);
      $this->assign('theusername',$_GET['cusername']);
      $this->assign('thename',$_GET['cname']);
      $this->assign('thetime',$_GET['ctime']);             
     $this->display();
    }
	public function editBoss(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
      $post=M('Post');
      $boss=M('Boss');
      $condition['id']=$_GET['cid'];
      $tmp=$boss->where($condition)->select();
      $tmp1=$this->arr1($tmp);        
      $this->assign('theboss',$tmp);
     $this->display();
    }
	public function editStu(){ 
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 }      
      $stu=M('Stu');
      $condition['id']=$_GET['cid'];
      $tmp=$stu->where($condition)->select();             
      $this->assign('thestu',$tmp);
     $this->display();
    }
	public function editstupost(){
		if(!$_SESSION[admin_shell]){
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
	public function updatestupost(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$Post=D("Stupost");
      if(!$Post->create()){
      	echo "<script type='text/javascript'>alert('内容有误');window.location.href='/index.php/Boss/editpost?cid=$_GET[cid]';</script>";
      }else{
      	$post=M('Stupost');
      $stu=M('Stu');
      $condition['id']=$_GET['cid'];
      $tmp=$post->where($condition)->select();
      if($tmp[0][username]){
      	$username=$tmp[0][username];
      }
      if($tmp[0][name]){
      	$name=$tmp[0][name];
      }      
      $title=trim($_POST['title']);
      $detail=$this->detailSub($_POST['detail']);
      $phone=$this->phoneSub($_POST['phone']);
      $qq=$this->qqSub($_POST['qq']);
      $data=array(      
      'id'=>$_GET['cid'],
      'username'=>$username,
      'name'=>$name,
      'title'=>$title,
      'area'=>$_POST['area_id'],      
      'detail'=>$detail,
      'time'=> $tmp[0][time],
      'phone'=>$phone,
      'qq'=>$qq,      
      );      
        if($post->save($data)){
        	$this->success('更新成功');
        	$this->redirect('Admin:stuPost');
        }else{
        	echo "更新失败";
        	$this->redirect('Admin:stuPost');
        }    	
      }     
    }
	public function delstupost(){
		if(!$_SESSION[admin_shell]){
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
	public function nameSub($str){
	$name_num=mb_strlen(trim($str),'utf8');
      if($name_num>5){
      	$name=mb_substr(trim($str),0,5,'utf8');
      }else{
      	$name=trim($str);
      }
	  return $name;	  
    }
    public function qqSub($str){
     if(preg_match("/^[1-9][0-9]{4,9}$/",trim($str))){ 
		$qq=trim($str); 
	  }else{
		$qq=''; 
	  } 
	  return $qq;  
    }
    
    public function emailTest($str){
    if(preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",trim($str))){ 
		$email=trim($str); 
	  }else{
		$email=''; 
	  }
	  return $email;  
    }     
    public function updatepost(){
    	if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$Post=D("Post");
      if(!$Post->create()){ 
      	echo "<script type='text/javascript'>alert('内容有误');window.location.href='/index.php/Boss/editpost?cid=$_GET[cid]';</script>";
      }else{
      	$post=M('Post');
      $boss=M('Boss');
      $condition['id']=$_GET['cid'];
      $tmp=$post->where($condition)->select();
      if($tmp[0][username]){
      	$username=$tmp[0][username];
      }
      if($tmp[0][name]){
      	$name=$tmp[0][name];
      }
      $detail_num=mb_strlen(trim($_POST['detail']),'utf8');
      if($detail_num>500){
      	$detail=mb_substr(trim($_POST['detail']),0,500,'utf8');
      }else{
      	$detail=trim($_POST['detail']);
      }
      if(preg_match("/^[1-9][0-9]{1,2}$/",trim($_POST['salary']))) { 
		$salary=trim($_POST['salary']); 
	  }else{
		$salary=''; 
	  }
	  if(preg_match("/^[1-9][0-9]{1,2}$/",trim($_POST['num']))){ 
		$num=trim($_POST['num']); 
	  }else{
		$num=''; 
	  }
      if(preg_match("/^[1-9][0-9]{4,9}$/",trim($_POST['qq']))){ 
		$qq=trim($_POST['qq']); 
	  }else{
		$qq=''; 
	  }
	  $title=trim($_POST['title']);
	  $phone=trim($_POST['phone']);
      $data=array(      
      'id'=>$_GET['cid'],
      'username'=>$username,
      'name'=>$name,
      'title'=>$title,
      'area'=>$_POST['area_id'],
      'salary'=>$salary,
      'numwant'=>$num,
      'detail'=>$detail,
      'time'=> $tmp[0][time],
      'phone'=>$phone,
      'qq'=>$qq,     
      );
       if($post->save($data)){
        	$this->success('更新成功');
        	$this->redirect('Admin:bossPost');
        }else{
        	echo "更新失败";
        	$this->redirect('Admin:bossPost');
        }  	
      }      
    }
	public function updateBoss(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 }     	
      $boss=M('Boss');
      $condition['id']=$_GET['cid'];
      $tmp=$boss->where($condition)->select();
      if(preg_match("/^[1-9][0-9]{4,9}$/",trim($_POST['qq']))){ 
		$qq=trim($_POST['qq']); 
	  }else{
		$qq=''; 
	  }
	  if(preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",trim($_POST['bossmail']))){ 
		$email=trim($_POST['bossmail']); 
	  }else{
		$email=''; 
	  }
      $name_num=mb_strlen(trim($_POST['name']),'utf8');
      if($name_num>5){
      	$name=mb_substr(trim($_POST['name']),0,5,'utf8');
      }else{
      	$name=trim($_POST['name']);
      }
      $username=trim($_POST[username]);
      $pass=trim($_POST[pass]);
	  $phone=trim($_POST[phone]);
      $data=array(
      'id'=>$_GET['cid'],      
      'username'=>$username,
      'pass'=>$pass,
      'name'=>$name,
      'phone'=>$phone,
      'qq'=>$qq, 
      'bossmail'=>$email,
       'regtime'=>$tmp[0][regtime],       
      );      
      if($boss->save($data)){
        $tmp=new HeaderAction();	
      	$this->success("更新成功");        	
        $this->redirect('__APP__/Admin/bossList');
        }else{
        	$this->error("更新失败");
        	$this->redirect('__APP__/Admin/bossList');
        }    	
    }
	public function updateStu(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 }     	
      $stu=M('Stu');
      $condition['id']=$_GET['cid'];
      $tmp=$stu->where($condition)->select();
      if(preg_match("/^[1-9][0-9]{4,9}$/",trim($_POST['qq']))){ 
		$qq=trim($_POST['qq']); 
	  }else{
		$qq=''; 
	  }
	  if(preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",trim($_POST['email']))){ 
		$email=trim($_POST['email']); 
	  }else{
		$email=''; 
	  }
      $name_num=mb_strlen(trim($_POST['name']),'utf8');
      if($name_num>5){
      	$name=mb_substr(trim($_POST['name']),0,5,'utf8');
      }else{
      	$name=trim($_POST['name']);
      }
      $username=trim($_POST[username]);
      $pass=trim($_POST[pass]);
	  $phone=trim($_POST[phone]);
      $data=array(
      'id'=>$_GET['cid'],      
      'username'=>$username,
      'pass'=>$pass,
      'name'=>$name,
      'phone'=>$phone,
      'qq'=>$qq, 
      'email'=>$email,
       'regtime'=>$tmp[0][regtime],       
      );
      if($stu->save($data)){
        $tmp=new HeaderAction();	
      	$this->success("更新成功");        	
        $this->redirect('__APP__/Admin/stuList');
        }else{
        	$this->error("更新失败");
        	$this->redirect('__APP__/Admin/stuList');
        }    	 
    }
    public function delpost(){
    	if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$post=M('Post');    	
    	$condition['id']=$_GET['cid'];
    	if($post->where($condition)->delete()){
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}
    	
    }
	public function delBoss(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$boss=M('Boss');
    	$condition['id']=$_GET['cid'];
    	if($boss->where($condition)->delete()){    		
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}
    	
    }
	public function delStu(){
		if(!$_SESSION[admin_shell]){
		    exit('Access Denied');
		 } 
    	$stu=M('Stu');    	
    	$condition['id']=$_GET['cid'];
    	if($stu->where($condition)->delete()){    		
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}
    	
    }     
}
?>