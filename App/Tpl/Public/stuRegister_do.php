<?php

include "../..__PUBLIC__/mysql.php";
$username = $_POST["name"];
$db=new mysql('localhost','root','','jianzhi',"GBK");


$search = "SELECT * FROM jz_stu WHERE username = "."'".$username."'";

$res = $db->query($search);
if(mysql_num_rows($res)>0){
	echo "1";	
}else{	
	echo "0";
	
}

?>