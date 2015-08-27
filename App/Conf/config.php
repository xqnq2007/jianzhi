<?php
//注意，请不要在这里配置SAE的数据库，配置你本地的数据库就可以了。
return array(
    //'配置项'=>'配置值'    
    //'URL_HTML_SUFFIX'=>'.html',
	//'URL_MODEL' => 2,
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'127.0.0.1',
	'DB_NAME'=>'jianzhi',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'jz_',
	'DB_CHARSET'=>'utf8',
	'SHOW_PAGE_TRACE' =>false, //开启页面Trace	
	'APP_DEBUG'=>true,
	'URL_ROUTER_ON'   => true, //开启路由
	'URL_ROUTE_RULES' => array( //定义路由规则 		
		'Wei'=>'Wei/index',
		':city^Home|Wei|Admin|Index|Public|User|detail$' => 'Home',
		':city^Home|Wei|Admin|Index|Public|User|detail/:m$' => 'Home',
		':city^Home|Wei|Admin|Index|Public|User|detail/:m/:a' => 'Home',
		
	),
	 //'SESSION_EXPIRE'=>'60'
);
?>