<?php

abstract  class AbstractEditor extends Model{
	protected $edusername;
	protected $name;
	protected $sex;
	protected $tel;
	protected $mail;
	protected $address;
	protected $editor_array=array();
	protected $flag;//返回数据库状态值
	private $row_num;
	private $pageoffset;
	private $pagesize = 5;
	private $pagelist;
	
//	abstract protected function A();
//	abstract protected function B();
	
	function __construct(){
		parent::__construct();
		$this->flag =1;
	}
	
	/**
	 * function loginVerify()登录信息验证
	 * @param $username 数据库中的用户名称
	 */
	public function loginInfoVerify( $username  , $typeid){
		try{
			 $this->result = $this->select( 'password' , "editorinfo where  typeid = $typeid".' and remark=1 and edusername = '."'$username'");
			 $row = $this->result->fetch_assoc();
			 $this->password = $row['password'];
			// echo $this->password;
		}catch( Exception $e ){
			$this->flag=0;
	//		echo $e->getMessage();
		}
		return $this->password;
	}
	
	
	/**
	 * 编辑注册方法
	 * @param $username
	 * @param $name
	 * @param $sex
	 * @param $password
	 * @param $tele
	 * @param $mail
	 * @param $address		地址（可为空）
	 */
	
	public function editorRegister( $username,$name,$sex,$password,$tele,$mail,$address = NULL , $typeid){
		try{
			if($sex == 1){
				$sex = '男';
			}
			else{
				$sex = '女';
			}
			$this->insert('editorinfo', array(
					'edusername' => $username,
					'typeid' => $typeid,
					'name' => $name,
					'sex' => $sex,
					'password' => md5($password),
					'tel' => $tele,
					'mail' => $mail,
					'address' => $address,
			));
		}catch( Exception $e ){
			$this->flag=0;
			echo $e->getMessage();
		}
	}
	
	
	//提取表中所有数据
	public function getAllinfo( $curpage , $typeid , $url){
		try{
			$this->result = $this->select( '*' , "editorinfo where remark=1 and typeid=$typeid");
			$this->row_num = $this->num_rows();
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
			$this->pageoffset = $divpage->getOffset();
			$this->pagesize = $divpage->getPageSize();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' ,"editorinfo where typeid=$typeid and remark=1 LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->editor_array[$i] = array(
						'edusername' => $row['edusername'],
						'name' => $row['name'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
			//	echo $e->getMessage();
		}
		return $this->editor_array;	
	}
	
	//按条件查询
	public function selectByUserName($edusername, $typeid){
		try{
			$this->result = $this->select( '*' ,"editorinfo where typeid=$typeid and remark=1 and edusername='".$edusername."' ");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->editor_array[$i] = array(
						'edusername' => $row['edusername'],
						'name' => $row['name'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->editor_array;
	}
	
	//按条件的模糊查询
	public function selectByEdname($name, $typeid){
		try{
			$this->result = $this->select( '*' ,"editorinfo where typeid=$typeid and remark=1 and name like '%".
					$name."%'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->editor_array[$i] = array(
						'edusername' => $row['edusername'],
						'name' => $row['name'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->editor_array;
	}
	
	
 	//个人信息修改
	public function modifyInfo($username , $name,$sex,$password,$tele,$mail,$address ){
		try{
			if(isset($sex) && $sex == 1){
				$sex = '男';
			}
			else{
				$sex = '女';
			}
			if( isset($name) && $sex ){
				$this->update('editorinfo',
					'name = '."'$name',".'sex = '."'$sex'",
					'edusername = '."'$username'");
			}
			if( isset($tele) && isset($mail) ){
				$this->update('editorinfo',
					'tel = '."'$tele',".'mail = '."'$mail',".'address = '."' $address'",
					'edusername = '."'$username'");
			}
			if( isset( $password)){
				$this->update('editorinfo',
					"password = '". md5($password)."'",
					'edusername = '."'$username'");
			}
		}catch( Exception $e ){
				$this->flag=0;
				//echo $e->getMessage();
		}
	}
	
	
	//删除编辑信息方法
	public function editorInfoDel( $username ){
		try{
			if( isset($username)  ){
				$this->update('editorinfo',
					'remark = 0',
					'edusername = '."'$username'");
			}
		}catch( Exception $e ){
				$this->flag=0;
		}
	}
	
	public function getPflag(){
		
		return $this->flag;
	}
	
	//得到总计录数
	public function getRowNum(){
	
		return  $this->row_num;
	}
	
	//得到pagelink内容
	public function getPagelist(){
	
		return $this->pagelist;
	}
	
	public function getPageOffset(){
	
		return $this->pageoffset;
	}
	
	public function getPageSize(){
	
		return $this->pagesize;
	}
	
}
