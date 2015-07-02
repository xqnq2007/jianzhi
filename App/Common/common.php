<?php
function show_db_errorxx(){
	exit('系统访问量大，请稍等添加数据');
}
 function detailSub($str){
    $detail_num=mb_strlen(trim($str),'utf8');
      if($detail_num>500){
      	$detail=mb_substr(trim($str),0,500,'utf8');
      }else{
      	$detail=trim($str);
      }
      return $detail;
   
    } 
	function phoneSub($str){
		$patrn = "/^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$/";
		$validateReg = "/^((\+?86)|(\(\+86\)))?1\d{10}$/";		
		if(preg_match($patrn,trim($str))||preg_match($validateReg,trim($str))){ 
			$phone=trim($str); 
		}else{
			$phone=''; 
			}
		return $phone;	  
    }
	function salarySub($str){			
		if(preg_match("/^[1-9][0-9]{0,4}$/",trim($str))) { 
				$salary=trim($_POST['salary']); 
			  }else{
				$salary=''; 
			  }
		return $salary;	  
    }
	function numSub($str){			
		if(preg_match("/^[1-9][0-9]{0,4}$/",trim($str))) { 
				$num=trim($_POST['num']); 
			  }else{
				$num=''; 
			  }
		return $num;	  
    }
      function qqSub($str){
     if(preg_match("/^[1-9][0-9]{4,9}$/",trim($str))){ 
		$qq=trim($str); 
	  }else{
		$qq=''; 
	  } 
	  return $qq;  
    }
	  function nameSub($str){
	$name_num=mb_strlen(trim($str),'utf8');
	if($name_num>5){
      	$name=mb_substr(trim($str),0,5,'utf8');
      }else{
      	$name=trim($str);
      }
	  return $name;  
    }
      function emailTest($str){
    if(preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",trim($str))){ 
		$email=trim($str); 
	  }else{
		$email=''; 
	  }
	  return $email;  
    }
	  function weixinTest($str){
    if(preg_match("/^[a-zA-Z\d_]{5,20}$/",trim($str))){ 
		$email=trim($str); 
	  }else{
		$email=''; 
	  }
	  return $email;  
    }    
?>