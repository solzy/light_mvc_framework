<?php

//读取用户类型的ID

class UserTypeModel extends Model{
	
	protected $userlevel=array();
	protected $resource;
	
	function __construct(  ){
		parent::__construct( );
		$this->extractUserType();	
	}
	
	/**
	 * function extractTypeId() 读取表usertype中的信息并存储在数组$userlevel中
	 * @access public
	 */
	
	public function extractUserType(  ){
		try{
			$this->resource = $this->select( '*' , 'usertype');
			for($i = 0 ; $i < $this->num_rows(); $i++){	
				$row = $this->resource->fetch_assoc();	
				$this->userlevel[$row['typename']] = $row['typeid'];
			}			
		}catch( Exception $e ){
			print $e->getMessage();
		}
	}
	
	public function getUserLevel(){
		return $this->userlevel;
	}
	
}