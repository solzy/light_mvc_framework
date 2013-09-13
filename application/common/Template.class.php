<?php

class Template{
	
	protected $controller;
	protected $action;
	protected $param;
	protected static $var = array();
	
	function __construct( $controller , $action , $param){
		$this->param = $param;
		$this->action = $action;
		$this->controller = $controller;
		$this->var = array('title' => '大连工业大学网络期刊');
	}
	
	//设置变量值
	public function set_var($name,$value) {
		$this->var[$name] = $value;
	}
	
	//加载模板
	public function render( ){
		extract($this->var);
		//echo 'template is '.$notice;
		if(file_exists(VIEW.PH."header.php")){
			include(VIEW.PH."header.php");
		}else{
			include(ERROES.PH."error.php" );
		}
		if( file_exists(VIEW.PH.$this->controller.PH."left_nav.php")){
			include(VIEW.PH.$this->controller.PH."left_nav.php");
		}else{
			include(ERROES.PH."error.php" );				
		}
		if( file_exists(VIEW.PH.$this->action.".php" )){
			include(VIEW.PH.$this->action.".php" );
		}else if( file_exists(VIEW.PH.$this->controller.PH.$this->action.".php" )){	
			include(VIEW.PH.$this->controller.PH.$this->action.".php" );
		}else{
			include(ERROES.PH."error.php" );
		}	
		if(file_exists(VIEW.PH."footer.php")){
			include(VIEW.PH."footer.php");
		}else{
			include(ERROES.PH."error.php" );
		}
	}
	
}