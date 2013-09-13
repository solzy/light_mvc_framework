<?php

class  App{
	
	public $route;
	public $model;
	public $url_param = array();
	public $controller;
	public	$mixcontroller;
	
	function __construct(  ){
		$this->route = new UrlDeal();
		$this->url_param = $this->route->urlToArray();
 
	}
	

	public  function run(){
		$this->model = ucfirst($this->url_param['model']).'Model';
		$this->controller = ucfirst($this->url_param['controller']).'Controller';
        
        if(class_exists($this->controller )){
			$this->controller = new $this->controller($this->model ,$this->url_param['controller'],$this->url_param['action'] , $this->url_param['param']);		
		}else{
			$this->controller = new Controller($this->model ,$this->url_param['controller'],$this->url_param['action'] , $this->url_param['param']);
		}
 
                
        if(isset($this->url_param['param']['f'])){
			$this->controller->{$this->url_param['param']['f']}();
		}
        
		$this->controller->createCacheFile();
		$this->controller->display();	
	}
	
}	
	

?>