<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {	
    public function index()
    {
	      $_SESSION[keywords]='';
		  load("@.comfunc");
		 $Data = M('Post'); // 实例化Data数据对象
	    import('ORG.Util.Page');// 导入分页类
	    $count= $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page= new Page($count,10);// 实例化分页类 传入总记录数
		$Page->setConfig(header,'个发布');
		$Page->rollPage=10;	    
		$Page->setConfig('theme',"<ul class='pagination'><li>%upPage%</li><li>%linkPage%</li><li>%downPage%</li></ul>");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		if($list){
			for($i=0;$i<count($list);$i++){
				$list[$i]["time"]=tmspan($list[$i]["time"]);	
			}
		}	
		$this->assign('count',$count);
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	
	    $this->display(); // 输出模板		
    }
	public function search(){
		load("@.comfunc");
		$Data = M('Post'); // 实例化Data数据对象
	    import('ORG.Util.Page');// 导入分页类
		$keywords = trim($_GET['k']);  //获取搜索关键字		
		$_SESSION[keywords]=$keywords;
		$tmparr=getLikeArr($keywords);		
		$where['title|detail'] = array('like',$tmparr,'OR');  //用like条件搜索title和content两个字段 
	    $count= $Data->where($where)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page= new Page($count,10);// 实例化分页类 传入总记录数
		$Page->setConfig(header,'个发布');
		$Page->rollPage=10;	    
		$Page->setConfig('theme',"<ul class='pagination'><li>%upPage%</li><li>%linkPage%</li><li>%downPage%</li></ul>");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($where)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		if($list){
			for($i=0;$i<count($list);$i++){
				$list[$i]["time"]=tmspan($list[$i]["time"]);				
			}
			$this->assign('count',$count);
			$this->assign('list',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出	
			$this->display('Index:index'); // 输出模板	
		}else{
			$this->assign('keywords',$keywords);
			$this->display('Public:nodata');
		}			
	}
	public function refreshIndex()
    {
	     $Data = M('Post'); // 实例化Data数据对象
	    import('ORG.Util.Page');// 导入分页类
	    $count= $Data->where($map)->count();// 查询满足要求的总记录数 $map表示查询条件
	    $Page= new Page($count,10);// 实例化分页类 传入总记录数
		$Page->setConfig(header,'个发布');
		$Page->rollPage=10;
	    //$Page->setConfig(theme,"%upPage% %first% %prePage% %linkPage% %downPage% %nowPage%/%totalPage% 页 %totalRow% %header%");
		$Page->setConfig('theme',"<ul class='pagination'><li>%upPage%</li><li>%linkPage%</li><li>%downPage%</li></ul>");
	    $show= $Page->show();// 分页显示输出
	    // 进行分页数据查询
	    $list = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	
	    $this->display(); // 输出模板		
    }
    public function _before_index(){
    	//检查用户是否登录
    	$tmp=new HeaderAction();
    }
  	public function _after_index(){

    }
	public function perCenter(){
		if($_SESSION[boss_username]){
			$this->redirect('/Boss/index');
		}else if($_SESSION[stu_username]){
			$this->redirect('/Stu/index');
		}else{
			$this->error("您尚未登录");
		}
    }
	public function clearStuSession()//清除BOSS Session
    { 	
       $_SESSION[stu_name]='';
       $_SESSION[stu_username]='';
       $_SESSION[stu_shell]='';
    }
	public function clearBossSession()//清除BOSS Session
    { 	
       $_SESSION[boss_name]='';
       $_SESSION[boss_username]='';
       $_SESSION[boss_shell]='';
    }	
	public function stuLoginTest(){ 	
		$stu_id=trim($_POST['name']);
		$stu_password=trim($_POST['pass']);
		$stu=M('Stu');
		$condition['username']=$stu_id;
		$tmp=$stu->where($condition)->select();		
		$b=is_array($tmp);
		$ps=$b ? $stu_password==$tmp[0]["pass"]:FALSE;
		if($ps){
			$this->clearStuSession();
			$this->clearBossSession();			
			$_SESSION[stu_name]=$tmp[0]["name"];
			$_SESSION[stu_username]=$tmp[0]["username"];
			$_SESSION[stu_shell]=md5($tmp[0]["username"].$tmp[0]["pass"]);
			echo "1";
		}
		else{
			echo "0";
		}  
    }
	public function boss_login(){		
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='/index.php/Boss/index'";
        echo "</script>";
    }
	public function stu_login(){
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='/index.php/Stu/index'";
        echo "</script>";
    }
    public function logout(){
    	$_SESSION[boss_name]=null;$_SESSION[stu_name]=null;
    	$_SESSION[boss_username]=null;$_SESSION[stu_username]=null;
    	$_SESSION[boss_shell]=null;$_SESSION[stu_shell]=null;
    	echo "<script type='text/javascript'>";
        echo "window.location.href='/index.php'";
        echo "</script>";
    }
	public function postinfo(){    	
		$tmp=new HeaderAction();		
		if($_SESSION[boss_username]){					
			$tmp=new HeaderAction();
			$boss=M("Boss");		    
		    $condition['username']=$_SESSION[boss_username];
		    $res=$boss->where($condition)->select();
		    $this->assign('qq',$res[0][qq]);
		    $this->assign('phone',$res[0][phone]);
			$this->assign('weixin',$res[0][weixin]);
		    $this->display('Post:index');
			echo "<script src='__PUBLIC__/js/jquery.js'></script>";
			echo "<script> 
				$('li[name=\"postTypeLi\"]').hide();
				$('li[name=\"yzcodeLi\"]').hide();
				$('li[name=\"yzcodeInputLi\"]').hide();
				$('li[name=\"agreementLi\"]').hide();
				$('.formul').css('height','675px');
				$('form[name=\"pubPostForm\"]').attr('action', '/index.php/Boss/add');
				$('form[id=\"postForm\"]').attr('name', 'bossPostForm');
				$('input[id=\"subBut\"]').attr('name', 'bossSubBut');	
			</script>";	
		}else if($_SESSION[stu_username]){
			$tmp=new HeaderAction();
			$stu=M("Stu");		       
		    $condition['username']=$_SESSION[stu_username];
		    $res=$stu->where($condition)->select();
		    $this->assign('qq',$res[0][qq]);
		    $this->assign('phone',$res[0][phone]);
			$this->assign('weixin',$res[0][weixin]);
		    $this->display('Post:index');
			echo "<script src='__PUBLIC__/js/jquery.js'></script>";
			echo "<script> 
				$('li[name=\"postTypeLi\"]').hide();
				$('li[name=\"yzcodeLi\"]').hide();
				$('li[name=\"yzcodeInputLi\"]').hide();
				$('li[name=\"agreementLi\"]').hide();
				$('span[name=\"hireNumSpan\"]').hide();
				$('li[name=\"salaryLi\"]').hide();				
				$('.formul').css('height','600px');
				$('form[name=\"pubPostForm\"]').attr('action', '/index.php/Stu/add');	
				$('form[id=\"postForm\"]').attr('name', 'stuPostForm');
				$('input[id=\"subBut\"]').attr('name', 'stuSubBut');
			</script>";	
		}else
		{			
			$this->display('Post:index');			
		}
    }
 	public function pubStuPost()//已注册用户发布信息
    { 	       
    	$post=M('Stupost');      
		$post_num=$post->where('')->count();
		load("@.comfunc");
        $detail=detailSub($_POST['detail']);
        $qq=qqSub($_POST['qq']);
		$title=trim($_POST['title']);
	    $phone=phoneSub($_POST['phone']);
		$weixin=weixinTest($_POST['user_weixin']);
		$data=array(      
			'id'=>(string)(10000+$post_num),
			'username'=>'',
			'name'=>'',
			'title'=>$title,
			'area'=>$_POST['area_id'],      
			'detail'=>$detail,
			'time'=> date('Y-m-d H:i:s',time()),
			'phone'=>$phone,
			'weixin'=>$weixin,
			'qq'=>$qq,      
		); 
        if($post->add($data)){
        	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
        	echo "<script type='text/javascript'>window.parent.location.href='/index.php/Stu/stuPostIndex';</script>";
        	        	
        }else{
        	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";        	
        	$this->error('发布失败');
        }   	
        
    }
}
?>