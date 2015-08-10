<?php
// 本类由系统自动生成，仅供测试用途
class PublicAction extends Action {
    public function index()
    { 
    	$this->display(''); // 输出模板 
    }
    public function agreement()
    { 
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
	Public function yanzhengma(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
			//Image::GBVerify();
	}
}
?>