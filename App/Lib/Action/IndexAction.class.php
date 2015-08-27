<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {	
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
			 $Data=getPostData($_SESSION[curcity]);			
		 }				 
		$_SESSION[keywords]='';	
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
		$this->assign('curcity',$cityname);
		$this->assign('appurl',$curcity);
	    $this->assign('list',$list);// 赋值数据集
	    $this->assign('page',$show);// 赋值分页输出	
	    $this->display(); // 输出模板			 	  	
    }
	public function search(){
		load("@.comfunc");		
		if($_SESSION[curcity]){
			$cityname=getCityName($_SESSION[curcity]);
			$Data=getPostData($_SESSION[curcity]);			
		}
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
		$this->assign('curcity',$cityname);
		$this->assign('appurl',$_SESSION[curcity]);
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
    public function _before_index(){
    	//检查用户是否登录
    	$tmp=new HeaderAction();
    }
  	public function _after_index(){

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
}
?>