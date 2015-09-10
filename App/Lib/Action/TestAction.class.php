<?php
// 本类由系统自动生成，仅供测试用途
class TestAction extends Action {	
    public function index()
    { 
    	$ip = get_client_ip();
		import('ORG.Net.IpLocation');// 导入IpLocation类
		$Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation("218.247.237.26"); // 获取某个IP地址所在的位置
		var_dump($area);
    }	
	public function test(){
		//echo "aaa";
		$this->display('Header:index');
	}
}
?>