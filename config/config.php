<?php

/**************系统文件路径配置************/

define('PH' , '/'); 
define('CONFIG_PATH', dirname(__FILE__));
define('ROOT_PATH' , substr(CONFIG_PATH, 0 , -7));
define('SERVER', substr(ROOT_PATH, 13));
define('ERROES', ROOT_PATH."/public/errors");
define('LIB_JS', ROOT_PATH."/lib/js");
define('APP',ROOT_PATH."/application");
define('CACHE' , ROOT_PATH."/tmp/cache");
define('COMMON', ROOT_PATH."/application/common");
define('MODEL' , ROOT_PATH."/application/model");
define('CONTROLLER' , ROOT_PATH."/application/controller");
define('VIEW' , ROOT_PATH."/application/view");
define('CSS' , ROOT_PATH."/public/css");
define('JS' , ROOT_PATH."/public/js");
define('HTML' , ROOT_PATH."/public/html");
define('IMG', ROOT_PATH."/public/images");
define('BACKUP', ROOT_PATH."/dbbackup");
define('UPLOADS', ROOT_PATH."/uploads");


/****************系统配置文件**************/
/*数据库配置*/
$CONFIG['config']['db'] = array(
	'db_host' => 'localhost',
	'db_user' => 'root',
	'db_password' => '123456',
	'db_database' => 'db_papers',
	'db_charset' => 'utf8',
);


/*自定义类库配置*/
$CONFIG['config']['common'] = array(
	'prefix' => 'my' //自定义类库的文件前缀
);

//默认的ROUTE
$CONFIG['config']['route'] = array(
	'controller' => 'home',
	'model' => 'home',
	'action' => 'home',
	'param' => array('f' => 'dataLoad')
);
?>
