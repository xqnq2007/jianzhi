<?php
	function titleSub($str){
		$title_num=mb_strlen(trim($str),'utf8');
		if($title_num>50){
			$title=mb_substr(trim($str),0,50,'utf8');
		  }else{
			$title=trim($str);
		  }
		  return $title;   
    } 
	function detailSub($str){
		$detail_num=mb_strlen(trim($str),'utf8');
		if($detail_num>1000){
			$detail=mb_substr(trim($str),0,1000,'utf8');
		  }else{
			$detail=trim($str);
		  }
		  return $detail;   
    } 
	function comtSub($str){
    $comt_num=mb_strlen(trim($str),'utf8');
      if($comt_num>500){
      	$comt=mb_substr(trim($str),0,500,'utf8');
      }else{
      	$comt=trim($str);
      }
      return $comt;   
    } 
	function phoneSub($str){
		$patrn = "/^(((\+?86)|(\(\+86\)))?\d{3,4}-)?\d{7,8}(-\d{3,4})?$/";
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
	if($name_num>10){
      	$name=mb_substr(trim($str),0,10,'utf8');
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
		$weixin=trim($str); 
	  }else{
		$weixin=''; 
	  }
	  return $weixin;  
    }
	function tmspan($timestamp,$current_time=0){
		if(!$current_time) $current_time=date("Y-m-d H:i:s");
		$span=strtotime($current_time)-strtotime($timestamp);	
		if($span<10){
			return "刚刚";
		}else if($span<60){
			return intval($span)."秒前";
		}else if($span<3600){
			return intval($span/60)."分钟前";
		}else if($span<24*3600){
			return intval($span/3600)."小时前";
		}else if($span<2*24*3600){
			return "昨天";
		}else if($span<(30*24*3600)){
			return intval($span/(24*3600))."天前";
		}else{        
			return $timestamp;
		}
	}
	function getLikeArr($keywords){
		$arr=array();
		switch($keywords){
			case '发单':
				$arr=array("%发单%","%发单","发单%","%传单%","%传单","传单%","%派单%","%派单","派单%");
				break;
			case '客服':
				$arr=array('%客服%','%客服','客服%','%话务员%','%话务员','话务员%');
				break;
			case '促销':
				$arr=array('%促销%','%促销','促销%','%临促%','%临促','临促%',
					'%展%','%展','展%'
				);
				break;
			case '保安':
				$arr=array('%保安%','%保安','保安%','%安保%','%安保','安保%');
				break;
			case '服务员':
				$arr=array('%服务员%','%服务员','服务员%','%酒店%','%酒店','酒店%',
					'%迎宾%','%迎宾','迎宾%');
				break;
			case '暑假工':
				$arr=array('%暑假工%','%暑假工','暑假工%','%暑期%','%暑期','暑期%',
					'%暑假%','%暑假','暑假%','%厂%','%厂','厂%'	);
				break;
			case '家教':
				$arr=array('%家教%','%家教','家教%','%老师%','%老师','老师%',
					'%教师%','%教师','教师%','%补习%','%补习','补习%'	);
				break;
			default:
				$arr=array('%'.$keywords.'%','%'.$keywords,$keywords.'%');
		}
		return $arr;
	}
	function getCurCity(){
		$clientIP=get_client_ip();		
		$taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
		$IPinfo = json_decode(file_get_contents($taobaoIP));
        $province = $IPinfo->data->region;
        $city = $IPinfo->data->city;
		switch($city){
			case '北京市':
				$city='bj';
				break;
			case '天津市':
				$city='tj';
				break;
			default:
				$city='tj';
		}
        $data = $city;
		return $data;
	}	
	function getPostData($str){		
		switch($str){
			case 'bj':				
				 $Data = M('Bjpost');
				break;
			case 'tj':				
				 $Data = M('Post');
				break;
			default:				
				 $Data = M('Post');
		}
		return $Data;
	}	
	function getPostTable($str){		
		switch($str){
			case 'bj':				
				 $Data = 'jz_bjpost';
				break;
			case 'tj':				
				 $Data = 'jz_post';
				break;
			default:				
				 $Data = 'jz_post';
		}
		return $Data;
	}	
	function getComtData($str){		
		switch($str){
			case 'bj':				
				 $Data = M('Bjcomment');
				break;
			case 'tj':				
				 $Data = M('Comment');
				break;
			default:				
				 $Data = M('Comment');
		}
		return $Data;
	}
	function getCityName($str){		
		switch($str){
			case 'bj':				
				$cityname='北京';
				break;
			case 'tj':				
				$cityname='天津';
				break;
			default:				
				$cityname='天津';
		}
		return $cityname;
	}
?>