<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
    public function index()
    { 
    	$this->display(''); // 输出模板 
    }	
	public function test()
    { 
    	echo $_GET['city'];
    }	
    public function agree()
    { 
    	 $curcity=$_SESSION['curcity'];
		 $this->assign('appurl',$curcity);
		$this->display(''); // 输出模板
    }
	public function contactUs()
    { 
    	$this->display(''); // 输出模板 
    }
	public function replymsg()
    { 
    	$this->display(''); // 输出模板 
    }
	public function testyzcode()
    { 
    	if(md5(strtolower(trim($_POST['yzcodenum'])))== $_SESSION['verify'])
		{  
			 echo "1";	      
		}
		else{	
			echo "0";	
		}
    }
	public function isLogin()
    { 
    	if($_SESSION[boss_shell])
		{  
			 echo "1";	      
		}
		else{	
			echo "0";	
		}
    }
	function curcity(){		
		$data['status'] = 1;
		$data['curcity'] =$city;	
		$data['curcity'] =$_SESSION[curcity];				
		$this->ajaxReturn($data,'JSON');
		return $data;
	}	
	function jjcurcity(){		
		$data['status'] = 1;
		$data['curcity'] =$city;	
		$data['curcity'] =$_SESSION[jjcurcity];				
		$this->ajaxReturn($data,'JSON');
		return $data;
	}	
	Public function yanzhengma(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
			//Image::GBVerify();
	}
}
?>