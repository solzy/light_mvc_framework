<?php

//学院信息MODEL类
class SchoolModel extends 	Model{

	private $school_json=array();
	private $schoolid=array();
	private $schoolname=array();
	private $school_array=array();
	private $row_num;
	private $pageoffset;
	private $pagesize = 10;
	private $pagelist;
	private $flag = 1;
	protected $result;
	protected $row;
	
	function __construct(){
		parent::__construct();
		$this->result = $this->select( '*' , 'schoolinfo  where  remark = 1');
		$this->row_num = $this->num_rows();
	}
	
	public function infoSet(){
		$this->result = $this->select( '*' , 'schoolinfo');
		$row_num = $this->num_rows();
		for( $i = 0 ; $i < $row_num ; $i++ ){
			$this->row = $this->result->fetch_assoc();
			array_push($this->schoolid, $this->row['schoolid']);
			array_push($this->schoolname, $this->row['schoolname']);
			//将数据存储为JSON格式
			$this->school_json[$i] = array(
						'schoolid' => $this->row['schoolid'],
						'schoolname' => $this->row['schoolname']
					);		
		}
	}

	public function selectById( $condition  , $curpage){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize ,
					"index.php?controller=adeditor&action=schoolinfoshow&f=schoolInfoShow&page=");
			$this->pageoffset = $divpage->getOffset();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' , "schoolinfo where  remark = 1 and schoolid = '".$condition."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->school_array[$i] = array(
						'schoolid' => $row['schoolid'],
						'schoolname' => $row['schoolname'],
						'mail' => $row['mail']
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->school_array;
	}
	
	
	public function selectDetail( $condition ){
		try{
			$this->result = $this->select( '*' , "schoolinfo where  remark = 1 and schoolid = '".$condition."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->school_array[$i] = array(
						'schoolid' => $row['schoolid'],
						'schoolname' => $row['schoolname'],
						'mail' => $row['mail']
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->school_array;
	}
	
	//提取表中所有数据
	public function getAllinfo( $curpage  , $url){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
			$this->pageoffset = $divpage->getOffset();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' , "schoolinfo ".
					"where remark = 1 LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->school_array[$i] = array(
						'schoolid' => $row['schoolid'],
						'schoolname' => $row['schoolname'],
						'mail' => $row['mail']
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
			//	echo $e->getMessage();
		}
		return $this->school_array;
	}
	
	//删除学院信息
	public function schoolInfoDel( $schoolid ){
		try {
			$this->result = $this->update('schoolinfo', "remark= 0" , "schoolid='".$schoolid."'");
		}catch( Exception $e){
			$this->flag=0;
		}
	}
	
	//更新数据
	public function schoolInfoUpdate($oldschoolid , $schoolid , $schoolname , $mail){
		try{
			$this->result = $this->update('schoolinfo', "schoolid='".$schoolid."', "."schoolname='".$schoolname."', ".
					"mail='".$mail."' " , "schoolid='".$oldschoolid."'");
		}catch( Exception $e ){
			$this->flag=0;
		}
	
	}
	
	//插入新数据
	public function insertInfo( $schoolid , $schoolname , $mail){
		try{
			if(isset($schoolid) && isset($schoolname)){
				$this->result = $this->insert('schoolinfo', array(
						'schoolid' => $schoolid,
						'schoolname' => $schoolname,
						'mail' => $mail
				));
			}
		}catch( Exception $e ){
			$this->flag=0;
			//		echo $e->getMessage();
		}
	}
	
	public function getSchoolId(){
		
		return $this->schoolid;
	}
	
	public function getSchoolName(){
		
		return $this->schoolname;
	}
	
	public function getSchoolJson(){
		
		return json_encode($this->school_json);
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