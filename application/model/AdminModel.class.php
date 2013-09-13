<?php
//管理员model类
class AdminModel extends Model{
	
	protected $adusername;
	protected $typeid;
	protected $name;
	protected $sex;
	protected $password;
	protected $tel;
	protected $mail;
	protected $address;
	protected $result;
	private $flag;//返回数据库状态值
	
	
	function __construct( ){
		parent::__construct();
		$this->typeid = $_SESSION['userlevel']['admin'];
		$this->flag=1;
	}
	

		
	
	/**
	 * function loginVerify()登录信息验证
	 * @param $username 数据库中的用户名称
	 */
	public function loginVerify( $username ){
		try{
			 $this->result = $this->select( 'password' , 'admininfo where adusername = '."'$username'");
			 $row = $this->result->fetch_assoc();
			 $this->password = $row['password'];
		}catch( Exception $e ){
			$this->flag=0;
		}
		return $this->password;
	}
	
	/**
	 * function  showPersonalInfo( ) 显示个人信息
	 */
	public function showPersonalInfo($username ){
		try{
			$this->result = $this->select('*' , 'admininfo where adusername = '."'$username' and remark=1");
			$adminrow =  $this->result->fetch_assoc();
		}catch( Exception $e ){
			$this->flag=0;
		}
		return $adminrow;
	}
	
	/**
	 * modifyInfo() 个人信息修改
	 */
	public function modifyInfo($username , $name,$sex,$password,$tele,$mail,$address ){
			try{
				if(isset($sex) && $sex == 1){
					$sex = '男';
				}
				else{
					$sex = '女';
				}
				if( isset($name) && $sex && isset($majorid) && isset($schoolid)){
					$this->update('admininfo', 
							'name = '."'$name',".'sex = '."'$sex'", 
							'adusername = '."'$username'");
				}
				if( isset($tele) && isset($mail) ){
					$this->update('admininfo',
							'tel = '."'$tele',".'mail = '."'$mail',".'address = '."' $address'",
							'adusername = '."'$username'");
				}
				if( isset( $password)){
					$this->update('admininfo',
							"password = '". md5($password)."'",
							'adusername = '."'$username'");
				}
			}catch( Exception $e ){
				$this->flag=0;
			}
	}
	
	//数据库备份
	public function backup(){
		try{
			$this->dbBackup();
		}catch(Exception $e){
			$this->flag=0;
		}
	}
	
	public function __get( $name ){
		return $this->flag;
	} 
	
}
