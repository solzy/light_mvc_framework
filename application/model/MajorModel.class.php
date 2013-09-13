<?php

//专业信息MODEL类
class MajorModel extends 	Model{
	
	private $major_array=array();
	private $majorid=array();
	private $majorname=array();
	private $row_num;
	protected $result;
	private $pageoffset;
	private $pagesize = 10;
	private $pagelist;
	private $flag = 1;
	
	function __construct(){
		parent::__construct();
		$this->result = $this->select( '*' , 'majorinfo where remark=1');
		$this->row_num = $this->num_rows();	
	}
	
	public function infoSet(  ){	
		for( $i = 0 ; $i < $this->row_num ; $i++ ){
			$row = $this->result->fetch_assoc();
			array_push($this->majorid, $row['majorid']);
			array_push($this->majorname, $row['majorname']);
			//将数据存储为array格式
			$this->major_array[$i] = array(
						'majorid' => $row['majorid'],
						'majorname' => $row['majorname']
					);		
		}
	} 
	
	//提取表中所有数据
	public function getAllinfo( $curpage , $url ){
		try{
				if(!isset($curpage)){
					$curpage = 1;
				}
				$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url); 
				$this->pageoffset = $divpage->getOffset();
				$this->pagesize = $divpage->getPageSize();
				$this->pagelist = $divpage->getPageList();
				$this->result = $this->select( 'majorinfo.majorid, majorinfo.majorname, schoolinfo.schoolname' ,
						"majorinfo LEFT JOIN schoolinfo ON majorinfo.schoolid = schoolinfo.schoolid  where majorinfo.remark=1
						LIMIT $this->pageoffset , $this->pagesize");
				$this->row_num = $this->num_rows();
				for( $i = 0 ; $i < $this->row_num ; $i++ ){
					$row = $this->result->fetch_assoc();
					$this->major_array[$i] = array(
							'majorid' => $row['majorid'],
							'majorname' => $row['majorname'],
							'schoolname' => $row['schoolname']
					);
				}
			}catch( Exception $e ){
				$this->flag = 0;
			//	echo $e->getMessage();
			}
		
			return $this->major_array;
	}
	
	//删除专业信息方法
	public function majorInfoDel( $majorid ){
		try {
			$this->result = $this->update('majorinfo','remark=0', "majorid=".$majorid);
		}catch( Exception $e){
			$this->flag=0;
			echo $e->getMessage();
		}
	}
	
	//更新数据
	public function majorInfoUpdate($oldmajorid , $majorid , $majorname , $schoolid){
		try{
			$this->result = $this->update('majorinfo', "majorid='".$majorid."', "."majorname='".$majorname."', ".
					"schoolid='".$schoolid."' " , "majorid='".$oldmajorid."'");
		}catch( Exception $e ){
			$this->flag=0;
			echo $e->getMessage();
		}
	
	}
	
	//插入新数据
	public function insertInfo( $majorid , $majorname , $schoolid ){
		try{
			if(isset($majorid) && isset($majorname)){
				$this->result = $this->insert('majorinfo', array( 
					'majorid' => $majorid,
					'majorname' => $majorname,
					'schoolid' => $schoolid
					));
			}
		}catch( Exception $e ){
			$this->flag=0;
	//		echo $e->getMessage();
		}		
	}
	
	//条件选择
	public function selectByOrder( $schoolid , $majorid ,$curpage ){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize ,
					"index.php?controller=adeditor&action=majorinfoshow&f=majorInfoShow&page=");
			$this->pageoffset = $divpage->getOffset();
			$this->pagesize = $divpage->getPageSize();
			$this->pagelist = $divpage->getPageList();
			if( $schoolid ){
				$this->result = $this->select( 'majorinfo.majorid, majorinfo.majorname, schoolinfo.schoolname' ,
						"majorinfo LEFT JOIN schoolinfo ON majorinfo.schoolid = schoolinfo.schoolid where majorinfo.remark=1 and majorinfo.schoolid='".
						 "$schoolid' ");
			}else if($majorid){		
				$this->result = $this->select( 'majorinfo.majorid, majorinfo.majorname, schoolinfo.schoolname' ,
						"majorinfo LEFT JOIN schoolinfo ON majorinfo.schoolid = schoolinfo.schoolid where majorinfo.remark=1 and majorinfo.majorid='".
						$majorid."'");
			}else{
				$this->result = $this->select( 'majorinfo.majorid, majorinfo.majorname, schoolinfo.schoolname' ,
						"majorinfo LEFT JOIN schoolinfo ON majorinfo.schoolid = schoolinfo.schoolid where majorinfo.remark=1");
			}
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->major_array[$i] = array(
						'majorid' => $row['majorid'],
						'majorname' => $row['majorname'],
						'schoolname' => $row['schoolname']
				);
			}
		}catch( Exception $e ){
			$this->flag=0;
		}	
		return $this->major_array;
	}
	
	//条件选择
	public function selectDetial(  $majorid  ){
		try{
			$this->result = $this->select( 'majorinfo.majorid, majorinfo.majorname, schoolinfo.schoolname' ,
					"majorinfo LEFT JOIN schoolinfo ON majorinfo.schoolid = schoolinfo.schoolid where majorinfo.remark=1 and majorinfo.majorid='".
					$majorid."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->major_array[$i] = array(
						'majorid' => $row['majorid'],
						'majorname' => $row['majorname'],
						'schoolname' => $row['schoolname']
				);
			}
		}catch( Exception $e ){
			$this->flag=0;
		}
	
		return $this->major_array;
	}
	
	public function getMajorId(){
		
		return $this->majorid;
	}
	
	public function getMajorName(){
		
		return $this->majorname;
	}
	
	public function getMajorArray(){
		
		return $this->major_array;
	}
	

	public function getMajorJson(){
		
		return json_encode($this->major_array);
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

