<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * 公共操作类库
 * @category   ORG
 * @package  ORG
 * @subpackage  Util
 * @author    liu21st <liu21st@gmail.com>
 */
namespace Org\Util; 
class ComFunc {
	public function __construct() {        
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
    public function qqSub($str){
     if(preg_match("/^[1-9][0-9]{4,9}$/",trim($str))){ 
		$qq=trim($str); 
	  }else{
		$qq=''; 
	  } 
	  return $qq;  
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
    public function emailTest($str){
    if(preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",trim($str))){ 
		$email=trim($str); 
	  }else{
		$email=''; 
	  }
	  return $email;  
    }
	public function weixinTest($str){
    if(preg_match("/^[a-zA-Z\d_]{5,20}$/",trim($str))){ 
		$email=trim($str); 
	  }else{
		$email=''; 
	  }
	  return $email;  
    }    
}
?>