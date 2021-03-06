<?php
// 本类由系统自动生成，仅供测试用途
class BossAction extends Action {	
    public function index()
    { 	
		if(!$_SESSION[boss_shell]){
			$this->error('您尚未登录');
		}		
        $this->display(); // 输出模板
    }
	public function _before_index(){
    	//检查用户是否登录
    	//$tmp=new HeaderAction();
    }       
    public function reg(){ 
		if(IS_POST){
			load("@.comfunc");
			$boss=M('Boss');
			$bosstable=getBossTable();
			$bossid=(string)($boss->max('id')+1);					
			$username=trim($_POST['username']); 			
			$name=nameSub($_POST['name']); 
			$pass=trim($_POST['pass']);
			$phoneReg = "/^1\d{10}$/";	
			$emailReg="/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/";
			if(preg_match($phoneReg,$username)){
				$phone=$username;
				$email='';
			}else if(preg_match($emailReg,$username)){
				$email=$username;
				$phone='';
			}else{
				$email='';
				$phone='';
			}
			$time=date('Y-m-d H:i:s',time());
			$sql = "INSERT INTO ".$bosstable."(id,bossId,username,pass,name,phone,weixin,qq,bossmail,regtime)VALUES('',$bossid,'{$username}','{$pass}','{$name}','{$phone}','{$weixin}','{$qq}','{$email}','{$time}')";					
			if($boss->execute($sql)){
				$_SESSION[boss_name]=$name;
				$_SESSION[boss_username]=$username;
				$_SESSION[boss_shell]=md5($username.$pass);						
				$this->success('注册成功');
				$tmpurl="/".$_SESSION['curcity']."/";
				echo "<script>location.href='$tmpurl';</script>";
			}
			else{      	
				$this->error('注册失败');
			}			
		}else{
			$this->display();
		}		
    }
    public function managepost(){
		    if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		 }		
    	$Data = M('Post'); // 实例化Data数据对象
	    import('ORG.Util.myPage');// 导入分页类
	    $map['username']=$_SESSION[boss_username];		
	    $count= $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    if($count==0){echo "您没有发布任何信息";}
	    else{
	    $Page= new myPage($count,5);// 实例化分页类 传入总记录数
	    $Page->setConfig(header,'个发布');
	    $Page->setConfig(theme,"%upPage% %first% %prePage% %linkPage% %downPage% %nowPage%/%totalPage% 页 %totalRow% %header%");
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
    	if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		}   
		$post=M('Post');
		$boss=M('Boss');
		$paytype=M('Paytype');
		$salarytype=M('salarytype');
		$condition['id']=$_GET['cid'];
		$tmp=$post->where($condition)->select();
		$tmp1=$this->arr1($tmp);
		$tmpid=$tmp[0][area];
		$tmpPayTypeId=$tmp[0][payTypeId];
		$tmpSalaryTypeId=$tmp[0][salaryTypeId];		
		$tmpPayType=$paytype->field('payTypeName')->join('jz_post on jz_paytype.payTypeId=jz_post.payTypeId')->where
		('jz_post.id='.$_GET['cid'])->select();
		$tmpSalaryType=$salarytype->field('salaryTypeName')->join('jz_post on jz_salarytype.salaryTypeId=jz_post.salaryTypeId')->where
		('jz_post.id='.$_GET['cid'])->select();		
		$tjareas=M('Tjareas');
		$condition['id']=$tmpid;
		$tmpareas=$tjareas->where($condition)->select();
		$tmparea=$tmpareas[0][area];      
		$this->assign('thepost',$tmp);
		$this->assign('thearea',$tmparea);
		$this->assign('theareaid',$tmpid);
		$this->assign('payType',$tmpPayType[0]['payTypeName']);
		$this->assign('payTypeId',$tmpPayTypeId);		
		$this->assign('salaryType',$tmpSalaryType[0]['salaryTypeName']);
		$this->assign('salaryTypeId',$tmpSalaryTypeId);	
		$this->display('');		
    }	
    public function edit_perinfo(){
    	if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		 }   
      $post=M('Post');
      $boss=M('Boss');
      $condition['username']=$_SESSION[boss_username];
      $tmp=$boss->where($condition)->select();
      $tmp1=$this->arr1($tmp);
      $this->assign('theinfo',$tmp);          
      $this->display();
    }    
    public function updatepost(){
    	if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		 }   
    	$Post=D("Post");
      if(!$Post->create()){
      	echo "<script type='text/javascript'>alert('内容有误');window.location.href='/index.php/Boss/editpost?cid=$_GET[cid]';</script>";
      }else{
      $post=M('Post');
      $boss=M('Boss');
      $condition['username']=$_SESSION[boss_username];
	  load("@.comfunc");
      $detail=detailSub($_POST['detail']);	
      $salary=salarySub($_POST['salary']);
	  $num=numSub($_POST['num']);	
      $qq=qqSub($_POST['qq']);
	  $title=trim($_POST['title']);
	  $phone=phoneSub($_POST['phone']);
	  $weixin=weixinTest($_POST['user_weixin']);
      $data=array(      
      'id'=>$_GET['cid'],
      'username'=>$tmp[0][username],
      'name'=>$tmp[0][name],
      'title'=>$title,
      'area'=>$_POST['area_id'],
      'salary'=>$salary,
	  'payTypeId'=>$_POST['payType_id'],
	  'salaryTypeId'=>$_POST['salaryType_id'],
      'numwant'=>$num,
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
        	echo "发布失败";
        	$this->redirect('Boss:managepost');
        }
    	;
      }     
    }
	public function update_perinfo(){
		if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		 }   
    	$Boss=D("Boss");
      if(!$Boss->create()){
      	echo "<script type='text/javascript'>alert('数据格式有误');window.location.href='/index.php/Boss/edit_perinfo';</script>";
      }else{      
      $boss=M('Boss');
      $condition['username']=$_GET['cusername'];
      $tmp=$boss->where($condition)->select();
	  load("@.comfunc");
      $qq=qqSub($_POST['qq']);
	  $email=emailTest($_POST['email']);    
      $name=nameSub($_POST['name']); 
	  $phone=phoneSub($_POST['phone']);
	  $weixin=weixinTest($_POST['user_weixin']);
      $data=array(
		  'id'=>$tmp[0][id],      
		  'username'=>$tmp[0][username],
		  'pass'=>$tmp[0][pass],
		  'name'=>$name,
		  'phone'=>$phone,
		  'weixin'=>$weixin,
		  'qq'=>$qq, 
		  'bossmail'=>$email,
		  'regtime'=>$tmp[0][regtime],       
      ); 
      if($boss->save($data)){
        $tmp=new HeaderAction();	
      	$this->success("更新成功");        
        }else{
        	$this->error("更新失败");
        }    	
      }      
    }
	public function edit_pass(){
		if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		 }       	
      $this->display();
    }
	public function update_pass(){
		if(!$_SESSION[boss_shell]){
		    exit('Access Denied');
		 }   
    	$Boss=M("Boss");
    	$map['username']=$_SESSION[boss_username];
    	$tmp=$Boss->where($map)->select();
    	$prepass=trim($_POST[pre_pass]);
    	if($prepass==$tmp[0][pass]){
    		if(strlen(trim($_POST[new_pass]))>=6){
    			$re=$Boss->where($map)->setField('pass', trim($_POST[new_pass]));
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
    public function delpost(){
    	if(!$_SESSION[boss_shell]){
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
	public function replymsg(){		
		$boss=M("Boss");				   
		$condition['username']=$_SESSION[boss_username];
		$res=$boss->where($condition)->select();
		$this->assign('theinfo',$res[0]);			      
		$this->display('Boss:editpost');
		echo "<script src='__PUBLIC__/js/jquery.js'></script>";
		echo "<script>
		var subcss={	
			margin:'0 0 0 225px'				
		};
		$('li[name=\"selAreaLi\"]').hide();
		$('li[name=\"salaryLi\"]').hide();		
		$('#canselBut').hide();
		$('#submitBut1').css(subcss);
		$('form[name=\"bossPostForm\"]').attr('action', '/index.php/Boss/addReply');
		</script>";
    } 
    public function addReply(){
		 load("@.comfunc");
		 $replymsg=M('Replymsg'); 
		 $detail=detailSub($_POST['detail']);    
		 $phone=phoneSub($_POST['phone']);
		 $weixin=weixinTest($_POST['user_weixin']);
		 $qq=qqSub($_POST['qq']);             
			  $data=array( 	           
			 'id'=>'',
			  'title'=>trim($_POST['title']),	      
			  'content'=>$detail,
			  'replytime'=> date('Y-m-d H:i:s',time()),
			  'phone'=>$phone,
			  'weixin'=>$weixin,
			  'qq'=>$qq,  
			  );	     
	    if($replymsg->add($data)){      	
			$this->success('反馈成功');      	
		  }
		  else{      	
			$this->error('反馈失败');
		  }
    }
	public function contactUs(){    	
      $this->display();	  
    }
    public function usernameTest(){		
    	$boss=M('Boss');			
    	$username=$_POST['name'];
		$map['username']=$username;
		$tmp= $boss->where($map)->select();
		if($tmp){
			echo "1";	
		}else{	
			echo "0";	
		}
    } 
	public function bossLoginTest(){ 			
		$boss_username=$_POST['username'];
		$boss_password=$_POST['pass'];		
		$boss=M('Boss');
		$condition['username']=$boss_username;
		$tmp=$boss->where($condition)->select();		
		$b=is_array($tmp);
		$ps=$b ? $boss_password==$tmp[0]["pass"]:FALSE;    
		if($ps){				
			$_SESSION[boss_name]=$tmp[0]["name"];
			$_SESSION[boss_username]=$tmp[0]["username"];		
			$_SESSION[boss_shell]=md5($tmp[0]["username"].$tmp[0]["pass"]);
			echo "1";	
		}
		else{
			echo "0";
		}  		
    }
	public function getComt(){
		load("@.comfunc");
		$comt=getComtData($_SESSION[curcity]);						
		$postid=$this->_post('postid');
		$comtlist = $comt->where('postId='.$postid)->order('postTime ASC')->select();
		if($comtlist){
			for($i=0;$i<count($comtlist);$i++){
				$comtlist[$i]["postTime"]=tmspan($comtlist[$i]["postTime"]);			
			}
			$data['status'] = 1;
			$data['comtlist'] =$comtlist;		
			$this->ajaxReturn($data,'JSON');        
		}else{
			$data['status'] = 0;					
			$this->ajaxReturn($data,'JSON');
		}		
	}
}
?>