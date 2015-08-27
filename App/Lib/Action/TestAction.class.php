<?php
// 本类由系统自动生成，仅供测试用途
class TestAction extends Action {
	public function getIPaddress(){
		 $IPaddress='';
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
	}
    public function index()
    { 
    	$ip = get_client_ip();
		import('ORG.Net.IpLocation');// 导入IpLocation类
		$Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation("218.247.237.26"); // 获取某个IP地址所在的位置
		var_dump($area);
    }	
	function gstr($str)
	{   
		$encode = mb_detect_encoding( $str, array('ASCII','UTF-8','GB2312','GBK'));
		if ( !$encode =='UTF-8' ){
			$str = iconv('UTF-8',$encode,$str);
		}
		return $str;
	}
	public function test()
    { 
    	$ip=get_client_ip();
		$area=$this->taobaoIP($ip);
		$encode = mb_detect_encoding( $area, array('ASCII','UTF-8','GB2312','GBK'));
		//echo $encode;
		$area=$this->gstr($area);
		var_dump( $area);
	}	
    public function taobaoIP($clientIP){
        $taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
		//$taobaoIP='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='.$clientIP;
        $IPinfo = json_decode(file_get_contents($taobaoIP));
        $province = $IPinfo->data->region;
        $city = $IPinfo->data->city;
        $data = $province.$city;
        return $data;
    }
}
?>