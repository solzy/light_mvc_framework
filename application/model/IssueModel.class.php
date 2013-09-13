<?php

//期刊MODEL类
class IssueModel extends 	Model{
	
	private $issue_array=array();
	private $issueid=array();
	private $year=array();
	private $row_num;
	protected $result;
	private $pageoffset;
	private $pagesize = 10;
	private $pagelist;
	private $flag = 1;
	
	function __construct(){
		parent::__construct();
		$this->result = $this->select( '*' , 'issueinfo where remark=1');
		$this->row_num = $this->num_rows();	
	}
	
	//提取表中所有数据以数组的形式返回
	public function getAllinfo( $curpage , $url){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
			$this->pageoffset = $divpage->getOffset();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' , "issueinfo ".
					"where remark=1 LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->issue_array[$i] = array(
						'issueid' =>$row['issueid'],
						'year' => $row['year'],
						'pmount' => $row['pmount'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->issue_array;
	}
	
	public function selectById( $condition  , $curpage){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize ,
					"index.php?controller=adeditor&action=issueinfoshow&f=issueInfoShow&page=");
			$this->pageoffset = $divpage->getOffset();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' , "issueinfo where issueid = '".$condition."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->issue_array[$i] = array(
							'issueid' =>$row['issueid'],
							'year' => $row['year'],
							'pmount' => $row['pmount'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->issue_array;
	}
	
	public function selectDetail( $condition ){
		try{
			$this->result = $this->select( '*' , "issueinfo where issueid = '".$condition."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->issue_array[$i] = array(
							'year' => $row['year'],
							'pmount' => $row['pmount'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->issue_array;
	}
	
	//增加基金信息
	public function insertInfo(  $year , $pmount){
		try{
			if( isset($year)  &&  isset($pmount) ){
				$this->result = $this->insert('issueinfo', array(
						'year' => $year,
						'pmount'=> $pmount
				));
			}
		}catch( Exception $e ){
			$this->flag=0;
		}
	}
	
	//删除基金信息
	public function issueInfoDel( $issueid ){
		try {
			$this->result = $this->update('issueinfo', 'remark=0',"issueid=".$issueid);
		}catch( Exception $e){
			$this->flag=0;
		}
	}
	
	//更新基金信息
	public function issueInfoUpdate( $issueid , $year , $pmount){
		try{
			$this->result = $this->update('issueinfo', "year='".$year."', ".
					"pmount='".$pmount."' " , "issueid='".$issueid."'");
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