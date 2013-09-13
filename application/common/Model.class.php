<?php

/********基础模型类*******/

 class Model extends DataAccess{
	
	protected $db=null;
	

	function  __construct( ){
		$this->db= $GLOBALS["CONFIG"]['config']['db'];
		parent::__construct($this->db['db_host'], $this->db['db_user'], $this->db['db_password'], $this->db['db_database']);				
	}
	
 	/**
	 * function autoload() 自动加载实例化common中所有类 
	 * @param $dirname 路径名 
	 */
	
/* 	
	protected function autoload( $dirname ){
		
		$this->dirReader( $dirname );
		
	} 
	 */
	/**
	 * function dirReader（） 读取目录中的所有文件名 
	 * @param $dir 路径名
	 */
/* 	protected function dirReader( $dir){
		
		$handle = opendir($dir);
		while( $file = readdir( $handle)){
			if( $file != "." && $file!= ".."){
				$list[substr($file , 0 , -10)] = $file;
			}			
		} 
		
		return $list;
	} 
	 */
}
?>