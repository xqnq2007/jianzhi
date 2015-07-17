<?php
// 本类由系统自动生成，仅供测试用途
class PostAction extends Action {	
    public function index()
    { 	
       $this->display('Post:index'); // 输出模板    	
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
	Public function yanzhengma(){
		import('ORG.Util.Image');		
        Image::buildImageVerify();			
	}
}
?>