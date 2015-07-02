<?php
class BossModel extends Model{
    function login($phone,$password)
    {
        /*$bossphone=str_replace(" ", "", $phone);
        $Boss=new Model("Boss");
        $a=$Boss->where('phone=$phone')->find();
        $b=$a ? $password==$a[pass]:FALSE;	
        if($b){
        	return $b;
        }           
        return $a;*/
    	return "success";         
         
    }
    protected $_validate = array(
    //array('verify','require','验证码必须！'), //默认情况下用正则进行验证
    //array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
    //array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
    //array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
   // array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
    array('phone','require','电话必须！'), //默认情况下用正则进行验证
    //array('detail','require','内容必须！'), //默认情况下用正则进行验证
    //array('phone','','帐号名称已经存在！',0,'unique',1),
    array('pass','6','长度至少6位'),
  );
 
}
 
?>