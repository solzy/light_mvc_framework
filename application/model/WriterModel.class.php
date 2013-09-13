<?php

class WriterModel extends Model{
	
	protected $wusername;
	protected $typeid;
	protected $name;
	protected $sex;
	protected $password;
	protected $tel;
	protected $mail;
	protected $address;
	protected $majorid;
	protected $schoolid;
	protected $papersid;
	protected $result;
	private $flag;//返回数据库状态值
	private $row_num;
	private $pageoffset;
	private $pagesize = 5;
	private $pagelist;
	private $writer_array=array();
	
	
	function __construct( ){
		parent::__construct();
		$this->typeid = $_SESSION['userlevel']['writer'];
		$this->result = $this->select( '*' , 'writerinfo where remark=1');
		$this->row_num = $this->num_rows();
		$this->flag=1;
	}
	
	/**
	 * 注册表单方法
	 * @param $username
	 * @param $name
	 * @param $sex
	 * @param $password
	 * @param $tele
	 * @param $mail
	 * @param $address		地址（可为空）
	 * @param $majorid		专业编号
	 * @param $schoolid		学院编号
	  */
	
	public function writeRegisterSheet( $username,$name,$sex,$password,$tele,$mail,$address = NULL,$majorid,$schoolid){
		try{
		//	$this->select( '*' , 'writerinfo' );
			if($sex == 1){
				$sex = '男';
			}
			else{ 
				$sex = '女';
			}
			$this->insert('writerinfo', array(
						'wusername' => $username,
						'typeid' => $this->typeid,
						'name' => $name,
						'sex' => $sex,
						'password' => md5($password),
						'tel' => $tele,
						'mail' => $mail,
						'address' => $address,
						'majorid' => $majorid,
						'schoolid' => $schoolid
			));
		}catch( Exception $e ){
			$this->flag=0;
//		echo $e->getMessage();		
		}
	}
	
	
	/**
	 * function loginVerify()登录信息验证
	 * @param $username 数据库中的用户名称
	 */
	public function loginVerify( $username ){
		try{
			 $this->result = $this->select( 'password' , 'writerinfo where wusername = '."'$username'");
			 $row = $this->result->fetch_assoc();
			 $this->password = $row['password'];
		}catch( Exception $e ){
			$this->flag=0;
			echo $e->getMessage();
		}
		return $this->password;
	}
	
	/**
	 * function  showPersonalInfo( ) 显示个人信息
	 */
	public function showPersonalInfo($username ){
		try{
			$this->result = $this->select('*' , 'writerinfo where wusername = '."'$username'");
			$writerrow =  $this->result->fetch_assoc();
			$majorid = $writerrow['majorid'];
			$schoolid = $writerrow['schoolid'];
			$this->result = $this->select('majorname', 'majorinfo where majorid = '."'$majorid'");
			$temp =  $this->result->fetch_assoc();
			$writerrow['majorname'] = $temp['majorname'];
			$this->result = $this->select('schoolname', 'schoolinfo where schoolid = '."'$schoolid'");
			$temp =  $this->result->fetch_assoc();
			$writerrow['schoolname'] = $temp['schoolname'];
		}catch( Exception $e ){
			$this->flag=0;
			echo $e->getMessage();
		}
		return $writerrow;
	}
	
	/**
	 * modifyInfo() 个人信息修改
	 */
	public function modifyInfo($username , $name,$sex,$password,$tele,$mail,$address ,$majorid,$schoolid){
			try{
				if(isset($sex) && $sex == 1){
					$sex = '男';
				}
				else{
					$sex = '女';
				}
				if( isset($name) && $sex && isset($majorid) && isset($schoolid)){
					$this->update('writerinfo', 
							'name = '."'$name',".'sex = '."'$sex',".'majorid = '."'$majorid',".'schoolid = '."'$schoolid'", 
							'wusername = '."'$username'");
				}
				if( isset($tele) && isset($mail) ){
					$this->update('writerinfo',
							'tel = '."'$tele',".'mail = '."'$mail',".'address = '."' $address'",
							'wusername = '."'$username'");
				}
				if( isset( $password)){
					$this->update('writerinfo',
							"password = '". md5($password)."'",
							'wusername = '."'$username'");
				}
			}catch( Exception $e ){
				$this->flag=0;
				echo $e->getMessage();
			}
	}
	
	//提取表中所有数据
	public function getAllinfo( $curpage ,  $url){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
			$this->pageoffset = $divpage->getOffset();
			$this->pagesize = $divpage->getPageSize();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select('wusername , name ,  majorname , schoolname  , writerinfo.tel , writerinfo.mail , address ,writerinfo.remark' ,
					"writerinfo
					left join schoolinfo on schoolinfo.schoolid=writerinfo.schoolid
					left join majorinfo on majorinfo.majorid=writerinfo.majorid
					where   writerinfo.remark=1 LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->writer_array[$i] = array(
						'wusername' => $row['wusername'],
						'name' => $row['name'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
	
		return $this->writer_array;
	}
	
	//通过用户名查询作者信息
	public function selectByUname( $wusername){
		try{
			$this->result = $this->select('wusername , name , sex , majorname , schoolname  , writerinfo.tel , writerinfo.mail , address ,writerinfo.remark' ,
					"writerinfo
					left join schoolinfo on schoolinfo.schoolid=writerinfo.schoolid
					left join majorinfo on majorinfo.majorid=writerinfo.majorid
					where   writerinfo.remark=1 and wusername = '".$wusername ."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->writer_array[$i] = array(
						'wusername' => $row['wusername'],
						'name' => $row['name'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
	
		return $this->writer_array;
	}
	
	//模糊查询专家信息
	public function selectWriter( $method , $value ){
		try{
			$this->result = $this->select('wusername , name , sex ,  majorname , schoolname  , writerinfo.tel , writerinfo.mail , address ,writerinfo.remark' ,
					"expertinfo
					left join schoolinfo on schoolinfo.schoolid=expertinfo.schoolid
					left join majorinfo on majorinfo.majorid=expertinfo.majorid
			where   writerinfo.remark=1 and $method like '%".$value ."%'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->writer_array[$i] = array(
						'wusername' => $row['wxusername'],
						'name' => $row['name'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->writer_array;
	}
		
	
	//删除专家信息方法
	public function writerInfoDel( $username ){
		try{
			if( isset($username)  ){
				$this->update('writerinfo',
						'remark = 0',
						'wusername = '."'$username'");
			}
		}catch( Exception $e ){
			$this->flag=0;
		}
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
	
	public function __get( $name ){
		return $this->flag;
	} 
	
}