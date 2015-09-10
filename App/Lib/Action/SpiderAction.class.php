<?php
include "/Public/lib/simple_html_dom.php" ;
// 本类由系统自动生成，仅供测试用途
class SpiderAction extends Action {
    public function index(){ 
    	$this->display(''); // 输出模板 
    }
	public function gettime(){
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
	public function gstr($str){   
		$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK'));
		if ( !$encode =='UTF-8' ){
			$str = iconv('gbk',$encode,$str);
		}
		return $encode;
	}	
    public function spider(){		
		 //import('Org.Util.simple_html_dom');
		ini_set('max_execution_time', '1000');		
		$target_url = "http://tj.133jz.com";
		$html = new simple_html_dom();
		$detailhtml = new simple_html_dom();
		$html->load_file($target_url);		
		// 查找channel
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
			if($detailhtml->find('div.content',0)){//解析详情
				if($detailhtml->find('div.content',0)->find('p',1)){
					$tmpp=$detailhtml->find('div.content',0)->find('p',1)->innertext;
					$tmpp1=preg_replace("/<a.*?<\/a>/","",$tmpp);
					$tmpp1=mb_convert_encoding($tmpp1,"UTF-8","GBK");	
					$tmpp1=preg_replace("/联系时请说从.*?谢谢！/","",$tmpp1);
					$tmptext=strip_tags($tmpp1);	
					//$tmpdetail= iconv("GBK","UTF-8",$tmptext); 
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
		foreach($res as $i=>$post){
			$tmptime=$this->gettime();		
			$posttime=str_replace('-','',$post['bbstime']);			
			if((int)$tmptime-(int)$posttime>2){				
				unset($res[$i]);
				$i--;
				continue;
			}		
		}
		foreach($res as $i=>$post){
			$timex=explode('-',$post['bbstime']);
			$m='';
			if(strlen($timex[0])==1){
				$m='0'.$timex[0];
			}else{
				$m=$timex[0];
			}
			$newtime=date('Y').'-'.$m.'-'.$timex[1].' '.date('H').':'.date('i').':'.date('s');
			$res[$i]['bbstime']=$newtime;
		}	
		//return $res;	
		var_dump($res);
		echo  'haha';
	}
	public function test(){
		$post=M('Post');
		$tmptitle='天津长城物流天津招工信息最新招工信息';
		$map['title']='天津长城物流天津招工信息最新招工信息';
		$encode = mb_detect_encoding( $tmptitle, array('ASCII','UTF-8','GB2312','GBK'));
		$tmptitle= iconv("UTF-8","GBK",$tmptitle); 
		$titleexit=$post->where($map)->select();			
		var_dump($titleexit);			
		//echo $encode;
	}
	public function insert(){		
		$spiderarr=$this->spider();
		/*foreach($spiderarr as $k=>$post){			
			if($k>1){				
				unset($spiderarr[$k]);
				$k--;
				continue;
			}		
		}*/		
		$post=M('Post');		
		$admin=M('Admin');
		$admininfo=$admin->where('id='.'1')->select();
		load("@.comfunc");
		$postmark=false;
		foreach($spiderarr as $i=>$thepost){				
			$title=titleSub($thepost['title']);
			$map['title']=$title;
			$titleexit=$post->where($map)->select();
			if($titleexit==null){				
				$detail=detailSub($thepost['detail']);			
				$phone=phoneSub($thepost['phone']);
				$weixin='';
				if(array_key_exists("qq",$thepost)){
					$qq=qqSub($thepost['qq']);
				}
				$post_num=$post->where('')->count();
				$strtime=$thepost['bbstime'];
				$newtime=date('Y-m-d H:i:s',strtotime($strtime));
				$data=array(
					'id'=>'',
					'postId'=>(string)(10000+$post_num),
					'username'=>$admininfo[0]["username"],
					'name'=>$admininfo[0]["name"],
					'title'=>$title,
					'area'=>'0',
					'payTypeId'=>'0',
					'salary'=>'',
					'salaryTypeId'=>'0',
					'numwant'=>'',
					'detail'=>$detail, 					
					'time'=>$newtime,
					'phone'=>$phone,
					'weixin'=>$weixin,
					'qq'=>$qq,      
				);				
				if($post->add($data)){						
					$postmark=true;
				}				
			}else{
				continue;
			}			
		}
		if($postmark){
			echo '1';
		}else{
			echo '0';
		}
	}
}
?>