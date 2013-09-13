<?php

//URL  处理类
class UrlDeal{
	
	public $url;
	public $default_url = array(); 
	public $route_url = array();
	
	function __construct( ) {
		//获取当前页面的URL 
		$this->default_url = $GLOBALS["CONFIG"];
		$this->url = parse_url($_SERVER['REQUEST_URI']);
	}
	
	
	//将URL分解储存在数组中	
	public function urlToArray( ){
		$tmp = $arg = array();
		$arr = !empty( $this->url['query'] )? explode('&', $this->url['query'] ) : array();
		if( count( $arr ) > 0 ){
			foreach( $arr as  $value){
				$tmp = explode('=', $value);
				$arg[$tmp[0]] =  $tmp[1];
			}				
			if( isset( $arg['controller']) ){
				$this->route_url['controller'] = $arg['controller'];
				unset( $arg['controller'] ) ;
			}else{
				$this->route_url['controller'] = null;
			}
			if( isset( $arg['model']) ){
				$this->route_url['model'] = $arg['model'];
				unset( $arg['model']);
			}else{
				$this->route_url['model'] = 'model';
			}
			if( isset( $arg['action']) ){
				$this->route_url['action'] = $arg['action'];
				unset( $arg['action']);
			}else{
				$this->route_url['action'] = null;
			}		
			if( count( $arg ) > 0 ){
				$this->route_url['param'] = $arg;
			}else{
				$this->route_url['param'] = null;
			}
			
		}
		else{
			//设置为默认的ROUTE
			$this->route_url = $this->default_url['config']['route'];		}
		return $this->route_url;
	}	
}