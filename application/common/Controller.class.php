<?php

//核心Ctroller类

class Controller extends FrontController{
		
	protected $model;
	protected $midcontroller;
	protected $controller;
	protected $action;
	protected $template;
	protected $param;
	
	function __construct($model , $controller , $action , $param){
		parent::__construct();
		$this->param = $param;
		$this->action = $action;
		$this->saveLevelToSession();//修改于12月
		$this->template = new Template( $controller , $action ,  $param);
	}
	
	//创建缓冲文件
	public function createCacheFile(){
		$this->majorJson();
		$this->schoolJson();
		$this->fieldJson();	
		$this->fundJson();
		$this->statusJson();
	}
	
	
	//模板显示
	public function display( ){	
		$this->template->render();
	}
}