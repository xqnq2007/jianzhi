<?php
// 本类由系统自动生成，仅供测试用途
class HeaderAction extends Action {
    public function index()
    { 	
        
    	  	
    }
    public function _initialize(){
    	if($_SESSION[boss_username])      
	    {
	    	if($_SESSION[boss_name]){
		    	$value='欢迎你！'.' '.$_SESSION[boss_name].'<a href="/index.php/Index/logout" style="margin-right:10px;">退出</a>';
		    	$this->assign('php100',$value);
	    	}
	   		else{     	
	    	$value='欢迎你！'.' '.$_SESSION[boss_username].'<a href="/index.php/Index/logout" style="margin-left:10px;margin-right:10px;">退出</a>';
	    	$this->assign('php100',$value);
	    	}
	    }else if($_SESSION[stu_username]){
	    	if($_SESSION[stu_name]){
		    	$value='欢迎你！'.' '.$_SESSION[stu_name].'<a href="/index.php/Index/logout" style="margin-right:10px;">退出</a>';
		    	$this->assign('php100',$value);
	    	}
	   		else{     	
	    	$value='欢迎你！'.' '.$_SESSION[stu_username].'<a href="/index.php/Index/logout" style="margin-left:10px;margin-right:10px;">退出</a>';
	    	$this->assign('php100',$value);
	    	}	    	
	    }
    }           
}
?>