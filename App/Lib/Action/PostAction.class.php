<?php
class PostAction extends Action {
    public function index()
    { 	
       $this->display('Post:index'); // 输出模板    	
    }
    public function add()//未注册用户发布信息
    { 	
      $post=M('Post');
      $data=array(      
      'id'=>'',
      'username'=>'xxx',
      'title'=>$_POST['title'],
      'area'=>$_POST['area_id'],
      'salary'=>$_POST['salary'],
      'numwant'=>$_POST['num'],
      'detail'=>$_POST['detail'],      
      'time'=> date('Y-m-d H:i:s',time()),      
      'phone'=>$_POST['phone'],
      'qq'=>$_POST['qq'],      
      );
      if($post->add($data)){
      	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
      	echo "<script type='text/javascript'>alert('发布成功');window.location.href='';</script>";
      }
      else{
      	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
      	echo "<script type='text/javascript'>alert('发布失败');window.location.href='/index.php/post';</script>";
      }
    
    }	
	public function postDetail(){    	  
		$post=M('Post');
		$boss=M('Boss');
		$salarytype=M('salarytype');
		$condition['id']=$_GET['cid'];
		$tmp=$post->where($condition)->select();
		$tmpid=$tmp[0][area];      
		$tjareas=M('Tjareas');
		$condition['id']=$tmpid;
		$tmpareas=$tjareas->where($condition)->select();
		$tmparea=$tmpareas[0][area];
		$tmpSalaryType=$salarytype->field('salaryTypeName')->join('jz_post on jz_salarytype.salaryTypeId=jz_post.salaryTypeId')->where
		('jz_post.id='.$_GET['cid'])->select();		
		$this->assign('thearea',$tmparea);
		$this->assign('theSalaryType',$tmpSalaryType[0]['salaryTypeName']);
		$this->assign('thepost',$tmp);      
		$this->display();		
    }
	public function stuPostDetail(){    	  
		$stupost=M('Stupost');      
		$condition['id']=$_GET['cid'];
		$tmp=$stupost->where($condition)->select();
		$tmpid=$tmp[0][area];      
		$tjareas=M('Tjareas');
		$condition['id']=$tmpid;
		$tmpareas=$tjareas->where($condition)->select();
		$tmparea=$tmpareas[0][area];
		$this->assign('thearea',$tmparea);           
		$this->assign('thepost',$tmp);      
		$this->display('Post:postDetail');
		echo "<script src='__PUBLIC__/js/jquery.js'></script>";
		echo "<script>		
			$('span[name=\"salarySpan\"]').hide();
			$('span[name=\"numSpan\"]').hide();
			var numcss = {			      
				  width: '155px',				 
				  float:'right'
			};
			$('span[name=\"areaSpan\"]').css(numcss);
		</script>";
    }
	public function bossPost()//注册用户发布招聘信息
    { 			    
		load("@.comfunc");		
		if($_SESSION[curcity]){
			$post=getPostData($_SESSION[curcity]);		
			$posttable=getPostTable($_SESSION[curcity]);
		}
		$postid=(string)($post->max('id')+1);		
		$username=$_SESSION[boss_username];
		$name=$_SESSION[boss_name];
		$detail=detailSub($_POST['detail']);
		$qq=qqSub($_POST['qq']);
		$title=trim($_POST['title']);
		$phone=phoneSub($_POST['phone']);
		$weixin=weixinTest($_POST['weixin']);	
		$time=date('Y-m-d H:i:s',time());
		$sql = "INSERT INTO ".$posttable."(id,postId,username,name,title,area,payTypeId,salary,salaryTypeId,numwant,detail,time,phone,weixin,qq)VALUES('',$postid,'{$username}','{$name}','{$title}','0','0','','0','','{$detail}','{$time}','{$phone}','{$weixin}','{$qq}')";		
		$titleexit=$post->where("detail="."'".$detail."'")->select();
		if(!$titleexit){
			if($post->execute($sql)){
				echo "1";	
			}else{			
				echo "0";		
			}	
		}else{
			echo "2";
		}		
    }
	public function test(){
		$post=M('Post');
		$data=array(      
		'id'=>'',
		'username'=>'xx',
		'title'=>$_POST['title'],
		'area'=>$_POST['area_id'],
		'salary'=>$_POST['salary'],
		'numwant'=>$_POST['num'],
		'detail'=>$_POST['detail'],      
		'time'=> date('Y-m-d H:i:s',time()),      
		'phone'=>$_POST['phone'],
		'qq'=>$_POST['qq'],      
        );
		dump($data);
		if($post->add($data)){      	
			echo "<script type='text/javascript'>";
			echo "alert('发布成功');window.location.href='__APP__';";
			echo "</script>";
		}
		else{
			echo "发布失败";
		}
		$this->display('Post:index');
   }
}
?>