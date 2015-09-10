<?php
include "../Public/lib/simple_html_dom.php" ;
include "../App/Common/comfunc.php" ;	
	insert();	
	//spider();
	 function gettime(){
		$tmp= date('md',time());
		$fir=substr($tmp,0,1);
		$res='';
		if($fir=='0'){
			$res=substr($tmp,1);
		}else{
			$res=$tmp;
		}
		return  $res;
	}	
    function spider(){	
		ini_set('max_execution_time', '1000');		
		$target_url = "http://tj.133jz.com";
		$html = new simple_html_dom();
		$detailhtml = new simple_html_dom();
		$html->load_file($target_url);				
		$res = array();
		foreach($html->find('ul.title-list li') as $k=>$li){       
			$tmpa = $li->find('span.ti a',0);	
			$tmptitle=strip_tags($tmpa->innertext);			
			$tmptitle= iconv("GBK","UTF-8",$tmptitle); 
			$res[$k]['title']=$tmptitle;		
			$res[$k]['href']=$target_url.ltrim($tmpa->href,'.');		
			$tmptime=$li->find('span.bbstime',0)->plaintext;
			$tmptime1=ltrim(trim($tmptime),'[');
			$res[$k]['bbstime']=rtrim($tmptime1,']');
			$detailhtml->load_file($res[$k]['href']);		
			if($detailhtml->find('div.content',0)){
				if($detailhtml->find('div.content',0)->find('p',1)){
					$tmpp=$detailhtml->find('div.content',0)->find('p',1)->innertext;
					$tmpp1=preg_replace("/<a.*?<\/a>/","",$tmpp);
					$tmpp1=mb_convert_encoding($tmpp1,"UTF-8","GBK");	
					$tmpp1=preg_replace("/联系时请说从.*?谢谢！/","",$tmpp1);
					$tmptext=strip_tags($tmpp1);						
					$res[$k]['detail']=$tmptext;
				}			
			}
			if($detailhtml->find('div.content',1)){
				if($detailhtml->find('div.content',1)->find('p',0)){
					$tmpp2=$detailhtml->find('div.content',1)->find('p',0)->innertext;
					$tmparr=explode('br',$tmpp2);					
					for($i=0;$i<count($tmparr);$i++){						
						$tmptmp=mb_convert_encoding($tmparr[$i],"UTF-8","GBK");						
						if(preg_match("/手机/",$tmptmp)){									
							if(preg_match("/1\d{10}/",$tmptmp,$resphone)){							
								$res[$k]['phone']=$resphone[0];
							}							
						}		
						if(preg_match("/电话/",$tmptmp)){
							if(preg_match("/1\d{10}|(\d{3,4}-)?\d{7,8}/",$tmptmp,$resphone1)){							
								$res[$k]['phone']=$resphone1[0];
							}						
						}
						if(preg_match("/QQ/",$tmparr[$i])){
							if(preg_match("/[1-9][0-9]{4,9}/",$tmparr[$i],$resqq)){							
								$res[$k]['qq']=$resqq[0];
							}
						}						
					}				
				}
			}	
		}		
		foreach($res as $i=>$post){		
			if(!array_key_exists("phone",$post)){
				unset($res[$i]);
				$i--;
				continue;
			}		
		}
		/*foreach($res as $i=>$post){
			$tmptime=gettime();		
			$posttime=str_replace('-','',$post['bbstime']);	
			echo $tmptime."**".$posttime."<br>";
			if((int)$tmptime-(int)$posttime>2){				
				unset($res[$i]);
				$i--;
				continue;
			}	
		}*/	
		foreach($res as $i=>$post){
			$timex=explode('-',$post['bbstime']);
			$m='';
			$d='';
			if(strlen($timex[0])==1){
				$m='0'.$timex[0];
			}else{
				$m=$timex[0];
			}
			if(strlen($timex[1])==1){
				$d='0'.$timex[1];
			}else{
				$d=$timex[1];
			}
			$newtime=date('Y').'-'.$m.'-'.$d.' '.date('H').':'.date('i').':'.date('s');
			$res[$i]['bbstime']=$newtime;
		}
		foreach($res as $i=>$post){
			$curtime=date("Y-m-d H:i:s");	
			$span=strtotime($curtime)-strtotime($res[$i]['bbstime']);	
			if($span>2*24*3600){
				unset($res[$i]);
				$i--;
				continue;
			}			
		}
		foreach($res as $i=>$post){			
			if($i>0){
				unset($res[$i]);
				$i--;
				continue;
			}			
		}
		return $res;		
		//var_dump($res);
	}	
	 function insert(){		
		$spiderarr=spider();			
		$link = mysql_connect('w.rdc.sae.sina.com.cn:3307', '0ll2kk510o', 'xzkyw152m1x0wjxhilm1jmjiwjz5mwxmwy31hk0w');		
		mysql_select_db ( 'app_jianzhinan4', $link); 
		$adminsql="select * from jz_admin where id=2";		
		$adminresult=mysql_query($adminsql,$link);
		$admininfo=mysql_fetch_array($adminresult);	
		$postmark=false;
		if($link){				
			foreach($spiderarr as $i=>$thepost){	
				$thetitle=titleSub($thepost['title']);	
				$thedetail=detailSub($thepost['detail']);			
				$detailsql="select * from jz_post where detail="."'".$thedetail."'";
				mysql_query("SET NAMES UTF-8");   
				$detailresult=mysql_query($detailsql,$link);
				$detailinfo=mysql_fetch_array($detailresult);				
				if(!$detailinfo){	
					$numsql="select count(*) from jz_post";
					$numresult=mysql_query($numsql,$link);
					$numinfo=mysql_fetch_array($numresult);
					$num=1+$numinfo[0];    
					$username=$admininfo["username"];
					$name=$admininfo["name"];
				    $title=$thetitle;
				    $detail=detailSub($thepost['detail']);			
					$phone=phoneSub($thepost['phone']);
					$weixin='';
					if(array_key_exists("qq",$thepost)){
						$qq=qqSub($thepost['qq']);
					}else{
						$qq='';
					}					
					$strtime=$thepost['bbstime'];
					$newtime=date('Y-m-d H:i:s',time());			
					$sql = "INSERT INTO jz_post(id,postId,username,name,title,area,payTypeId,salary,salaryTypeId,numwant,detail,time,phone,weixin,qq)VALUES('',$num,'{$username}','{$name}','{$title}','0','0','','0','','{$detail}','{$newtime}','{$phone}','{$weixin}','{$qq}')";					
					$result=mysql_query($sql,$link);					
					if($result){							
						$postmark=true;
					}
				}				
			}
		}else{
			echo "link error";
		}
		mysql_close($link);
		if($postmark){
			echo '1';
		}else{
			echo '0';
		}		
	}
?>