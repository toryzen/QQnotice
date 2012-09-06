<?php
$config =  array(
    'URL_MODEL'=>1, // 如果你的环境不支持PATHINFO 请设置为3
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_NAME'=>'qqnotic',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'',
    'APP_DEBUG' => 0,
    'SHOW_RUN_TIME'	=> 0,
);
$array = array(

    'URL_ROUTER_ON' => true,
    'TOKEN_ON'  => false,
    'URL_ROUTE_RULES' => array(
        array('data','Data/index','url'),
        array('contact','Other/contact','key'),
        array('submit','Other/submit','key'),
        array('privacy','Other/privacy','key'),
    ),
);
return array_merge($config,$array);
?>