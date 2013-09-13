<?php
//专家model的核心类
class ExpertModel extends Model{
	protected $typeid;
	protected $edusername;
	protected $name;
	protected $sex;
	protected $schoolid;
	protected $majorid;
	protected $fieldid;
	protected $tel;
	protected $mail;
	protected $address;
	protected $expert_array=array();
	protected $flag;//返回数据库状态值
	private $row_num;
	private $pageoffset;
	private $pagesize = 5;
	private $pagelist;
	private $expert_json=array();	
	private $expertfilemanipluate;
	private $query_columns;
	private $query_tables;
	private $query_conditions;
            	
	function __construct(){
		parent::__construct();
		$this->typeid = $_SESSION['userlevel']['expert'];
		//状态1为成功
		$this->flag=1;
		$this->result = $this->select( '*' , 'expertinfo where remark=1');
		$this->row_num = $this->num_rows();
	}
	
	
	public function __get( $name ){
		return $this->flag;
	}
	
	/**
	 * 专家注册方法
	 * @param $username
	 * @param $name
	 * @param $sex
	 * @param $password
	 * @param $tele
	 * @param $mail
	 * @param $address		地址（可为空）
	 * @param $majorid		专业编号
	 * @param $schoolid		学院编号
	 * @param $fieldid 		领域编号
	 */
	
	public function expertRegister( $username,$name,$sex,$password,$tele,$mail,$address = NULL,$majorid,$schoolid ,$fieldid){
		try{
			$this->select( '*' , 'expertinfo' );
			if($sex == 1){
				$sex = '男';
			}
			else{
				$sex = '女';
			}
			$this->insert('expertinfo', array(
					'exusername' => $username,
					'typeid' => $this->typeid,
					'name' => $name,
					'sex' => $sex,
					'password' => md5($password),
					'tel' => $tele,
					'mail' => $mail,
					'address' => $address,
					'majorid' => $majorid,
					'schoolid' => $schoolid,
					'fieldid' => $fieldid
			));
		}catch( Exception $e ){
			$this->flag=0;
		}
	}
	
	
	/**
	 * function loginVerify()登录信息验证
	 * @param $username 数据库中的用户名称
	 */
	public function loginVerify( $username ){
		try{
			$this->result = $this->select( 'password' , 'expertinfo where exusername = '."'$username'");
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
			$this->result = $this->select('*' , 'expertinfo where exusername = '."'$username'");
			$expertrow =  $this->result->fetch_assoc();
			$majorid = $expertrow['majorid'];
			$schoolid =$expertrow['schoolid'];
			$this->result = $this->select('majorname', 'majorinfo where majorid = '."'$majorid'");
			$temp =  $this->result->fetch_assoc();
			$expertrow['majorname'] = $temp['majorname'];
			$this->result = $this->select('schoolname', 'schoolinfo where schoolid = '."'$schoolid'");
			$temp =  $this->result->fetch_assoc();
			$expertrow['schoolname'] = $temp['schoolname'];
			$this->result = $this->select('fieldname', 'fieldinfo where fieldid = '."'$fieldid'");
			$temp =  $this->result->fetch_assoc();
			$expertrow['fieldname'] = $temp['fieldname'];
		}catch( Exception $e ){
			$this->flag=0;
		}
		return $expertrow;
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
                        
			$this->result = $this->select('exusername , name , fieldname , majorname , schoolname  , expertinfo.tel , expertinfo.mail , address ,expertinfo.remark' ,
					"expertinfo
					left join schoolinfo on schoolinfo.schoolid=expertinfo.schoolid
					left join majorinfo on majorinfo.majorid=expertinfo.majorid
					left join fieldinfo on fieldinfo.fieldid=expertinfo.fieldid
					where   expertinfo.remark=1 LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->expert_array[$i] = array(
						'exusername' => $row['exusername'],
						'name' => $row['name'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'fieldname' => $row['fieldname'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		
		return $this->expert_array;
	}
	
	//通过用户名查询专家信息
	public function selectByUname( $exusername){
		try{
			$this->result = $this->select('exusername , name , sex , fieldname , majorname , schoolname  , expertinfo.tel , expertinfo.mail , address ,expertinfo.remark' ,
					"expertinfo
					left join schoolinfo on schoolinfo.schoolid=expertinfo.schoolid
					left join majorinfo on majorinfo.majorid=expertinfo.majorid
					left join fieldinfo on fieldinfo.fieldid=expertinfo.fieldid
					where   expertinfo.remark=1 and exusername = '".$exusername ."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->expert_array[$i] = array(
						'exusername' => $row['exusername'],
						'name' => $row['name'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'fieldname' => $row['fieldname'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
	
		return $this->expert_array;
	}
	//通过领域查询专家信息
	public function selectByField($fieldid, $curpage, $url){
		try{
            $this->query_columns='E.exusername, E.name, M.majorname, count( P.paperid ) sum';
            $this->query_tables='  paperinfo AS P, expertinfo AS E, majorinfo AS M, paperreview AS PR';
            $this->query_conditions=' WHERE P.exusername = E.exusername';
            $this->query_conditions.=' AND P.paperid = PR.paperid';
            $this->query_conditions.=' AND M.majorid = E.majorid'; 
            $this->query_conditions.=' AND PR.statusid=\'1\'';
            $this->query_conditions.=' AND E.remark=1';
            $this->query_conditions.=' AND M.remark=1';
            $this->query_conditions.=' AND PR.remark=1';
            $this->query_conditions.=' AND E.fieldid=\''.$fieldid.'\'';
            $this->query_conditions.=' GROUP BY E.exusername, E.name, M.majorname';
            $this->select( $this->query_columns , $this->query_tables.$this->query_conditions);
    		$this->row_num = $this->num_rows();
   			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
			$this->pageoffset = $divpage->getOffset();
			$this->pagesize = $divpage->getPageSize();
			$this->pagelist = $divpage->getPageList();
            
            $this->query_conditions.=' LIMIT '.$this->pageoffset.','.$this->pagesize;
            $this->select( $this->query_columns , $this->query_tables.$this->query_conditions);
    		$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->expert_array[$i] = array(
						'exusername' => $row['exusername'],
						'name' => $row['name'],
						'majorname' => $row['majorname'],
						'sum' => $row['sum'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
	
		return $this->expert_array;
	}

	//通过领域查询生成JSON数据格式的专家信息
	public function expertJsonByField(){
	   	$this->expertfilemanipluate = new FileManipulate(CACHE.'/expertjson.php');
		$this->expertfilemanipluate->createFile();
		$this->expertfilemanipluate->writerFile(json_encode($this->expert_json));
	}
    	
	//模糊查询专家信息
	public function selectExpert( $method , $value ){
		try{
// 			if(!isset($curpage)){
// 				$curpage = 1;
// 			}
// 			$this->result = $this->select('exusername , name , sex , fieldname , majorname , schoolname  , expertinfo.tel , expertinfo.mail , address ,expertinfo.remark' ,
// 					"expertinfo
// 					left join schoolinfo on schoolinfo.schoolid=expertinfo.schoolid
// 					left join majorinfo on majorinfo.majorid=expertinfo.majorid
// 					left join fieldinfo on fieldinfo.fieldid=expertinfo.fieldid
// 					where   expertinfo.remark=1 and $method like '%".$value."%'");
// 			$this->row_num = $this->num_rows();
// 			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
// 			$this->pageoffset = $divpage->getOffset();
// 			$this->pagesize = $divpage->getPageSize();
// 			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select('exusername , name , sex , fieldname , majorname , schoolname  , expertinfo.tel , expertinfo.mail , address ,expertinfo.remark' ,
					"expertinfo
					left join schoolinfo on schoolinfo.schoolid=expertinfo.schoolid
					left join majorinfo on majorinfo.majorid=expertinfo.majorid
					left join fieldinfo on fieldinfo.fieldid=expertinfo.fieldid
					where   expertinfo.remark=1 and $method like '%".$value ."%'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->expert_array[$i] = array(
						'exusername' => $row['exusername'],
						'name' => $row['name'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'fieldname' => $row['fieldname'],
						'tel' => $row['tel'],
						'sex' => $row['sex'],
						'mail' => $row['mail'],
						'address' => $row['address'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->expert_array;
	}
	
	
	 //modifyInfo() 个人信息修改
	public function modifyInfo($username , $name,$sex,$password,$tele,$mail,$address ,$majorid,$schoolid , $fieldid){
		try{
			if(isset($sex) && $sex == 1){
				$sex = '男';
			}
			else{
				$sex = '女';
			}
			if( isset($name) && $sex && isset($majorid) && isset($schoolid) && isset($fieldid)){
				$this->update('expertinfo',
						'name = '."'$name',".'sex = '."'$sex',".'majorid = '."'$majorid',".'schoolid = '."'$schoolid',".'fieldid = '."'$fieldid'",
						'exusername = '."'$username'");
			}
			if( isset($tele) && isset($mail) ){
			$this->update('expertinfo',
					'tel = '."'$tele',".'mail = '."'$mail',".'address = '."' $address'",
					'exusername = '."'$username'");
			}
					if( isset( $password)){
					$this->update('expertinfo',
					"password = '". md5($password)."'",
							'exusername = '."'$username'");
			}
		}catch( Exception $e ){
			$this->flag=0;
		}
	}
	
	
	//删除专家信息方法
	public function expertInfoDel( $username ){
		try{
			if( isset($username)  ){
				$this->update('expertinfo',
						'remark = 0',
						'exusername = '."'$username'");
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
    
	public function getExpertJson(){

		return json_encode($this->expert_json);
	}
} 
