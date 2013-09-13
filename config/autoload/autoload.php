<?php

function stripslashesdeep($value){
	$value = is_array($value) ? array_map('stripslashesdeep', $value) : stripslashes($value);
	return $value;
}

//删除魔术符号
function removemagicquotes(){
	if(get_magic_quotes_gpc()){
		$_GET = stripslashesdeep($_GET);
		$_POST = stripslashesdeep($_POST);
		$_COOKIE = stripslashesdeep($_COOKIE);
		$_SESSION = stripslashesdeep($_SESSION);
	}
}

//自动加载将要实例化的类
function __autoload( $className ){
	
	if(file_exists(APP.PH.$className.'.class.php')){
		require_once (APP.PH.$className.'.class.php');
	}
	if(file_exists(COMMON.PH.$className.'.class.php')){
		require_once (COMMON.PH.$className.'.class.php');
	}
	if(file_exists(MODEL.PH.$className.'.class.php')){
		require_once(MODEL.PH.$className.'.class.php');
	}
	if(file_exists(CONTROLLER.PH.$className.'.class.php')){
		require_once(CONTROLLER.PH.$className.'.class.php');
	}
}
removemagicquotes();
session_start();
?>