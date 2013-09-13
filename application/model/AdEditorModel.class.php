<?php
class AdEditorModel extends AbstractEditor{

	protected $result;
	protected $typeid;
	//protected $cflag;//返回数据库状态值
	
	function __construct(){
		parent::__construct( );
		$this->typeid = $_SESSION['userlevel']['adeditor'];
	}
	

	
	//读取编辑表中所有编辑的信息用于编辑查询
	public function getAdeditorInfo( $curpage  , $url){
		if(!isset($curpage)){
			$curpage = 1;
		}
		return $this->getAllinfo($curpage, $this->typeid , $url);
	}
	
	//主编添加
	public function adeditorAdd($username,$name,$sex,$password,$tele,$mail,$address){
	
		return $this->editorRegister($username, $name, $sex, $password, $tele, $mail, $address,$this->typeid);
	}
	
	
	//按条件查询
	public function selectAdeditor($edusername, $typeid){

		return $this->selectByUserName($edusername, $this->typeid );
	}
	
	//按条件查询
	public function selectByName($edusername){
	
		return $this->selectByUserName($edusername, $this->typeid );
	}
	
	
	//登录信息验证
	public function loginVerify($username){
	
		return $this->loginInfoVerify($username, $this->typeid);
	}
}
