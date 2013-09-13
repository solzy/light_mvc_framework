<?php
//编辑ＭＯＤＥＬ类
class EditorModel extends AbstractEditor{

	protected $result;
	protected $typeid;
//	protected $flag;//返回数据库状态值
	
	function __construct(){
		parent::__construct( );
		$this->typeid = $_SESSION['userlevel']['editor'];
	;//	$this->flag=1;
	}

	
	//读取编辑表中所有编辑的信息用于编辑查询
	public function getEditorInfo( $curpage , $url  ){
		if(!isset($curpage)){
			$curpage = 1;
		}
		return $this->getAllinfo($curpage, $this->typeid , $url);
	}
	
	//编辑添加
	public function editorAdd($username,$name,$sex,$password,$tele,$mail,$address){
		
		return $this->editorRegister($username, $name, $sex, $password, $tele, $mail,$address, $this->typeid);
	}
	
	//按条件查询
	public function selectByUname( $edusername ){
			
		return $this->selectByUserName($edusername, $this->typeid);
	}
	
	//按条件的模糊查询
	public function selectByName($name ){
	
		return $this->selectByEdname($name, $this->typeid);
	}
	
	//登录信息验证
	public function loginVerify($username){
		
		return $this->loginInfoVerify($username, $this->typeid);
	}
}
