<?php

//专业信息MODEL类
class FundModel extends 	Model{

	private $fund_json=array();
	private $fundid=array();
	private $fundname=array();
	private $fund_array=array();
	private $row_num;
	private $pageoffset;
	private $pagesize = 13;
	private $pagelist;
	private $flag = 1;
	protected $result;
	protected $row;

	function __construct(){
		parent::__construct();
		$this->result = $this->select( '*' , 'fundinfo where remark=1');
		$this->row_num = $this->num_rows();
	}
	
	public function infoSet(){
		$this->result = $this->select( '*' , 'fundinfo where remark=1');
		$row_num = $this->num_rows();
		for( $i = 0 ; $i < $row_num ; $i++ ){
			$row = $this->result->fetch_assoc();
			array_push($this->fundid, $row['fundid']);
			array_push($this->fundname, $row['fundname']);
			//将数据存储为JSON格式
			$this->fund_json[$i] = array(
					'fundid' => $row['fundid'],
					'fundname' => $row['fundname']
			);
		}
	}

	//提取表中所有数据以数组的形式返回
	public function getAllinfo( $curpage ){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize ,
					"index.php?controller=adeditor&action=fundinfoshow&f=fundInfoShow&page=");
			$this->pageoffset = $divpage->getOffset();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' , "fundinfo ".
					"where remark=1 LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->fund_array[$i] = array(
						'fundid' => $row['fundid'],
						'fundname' => $row['fundname'],
						'fundcategory'=> $row['fundcategory']
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
			//	echo $e->getMessage();
		}
		return $this->fund_array;
	}
	
	public function selectById( $condition  , $curpage){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize ,
					"index.php?controller=adeditor&action=fundinfoshow&f=fundInfoShow&page=");
			$this->pageoffset = $divpage->getOffset();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select( '*' , "fundinfo where fundid = '".$condition."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->fund_array[$i] = array(
						'fundid' => $row['fundid'],
						'fundname' => $row['fundname'],
						'fundcategory'=> $row['fundcategory']
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->fund_array;
	}
	
	public function selectDetail( $condition ){
		try{
			$this->result = $this->select( '*' , "fundinfo where fundid = '".$condition."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->fund_array[$i] = array(
						'fundid' => $row['fundid'],
						'fundname' => $row['fundname'],
						'fundcategory'=> $row['fundcategory']
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->fund_array;
	}
	
	//增加基金信息
	public function insertInfo( $fundid , $fundname , $fundcategory){
		try{
			if(isset($fundid) && isset($fundname)){
				$this->result = $this->insert('fundinfo', array(
						'fundid' => $fundid,
						'fundname' => $fundname,
						'fundcategory'=> $fundcategory
				));
			}
		}catch( Exception $e ){
			$this->flag=0;
			//		echo $e->getMessage();
		}
	}
	
	//删除基金信息
	public function fundInfoDel( $fundid ){
		try {
			$this->result = $this->update('fundinfo', 'remark=0',"fundid=".$fundid);
		}catch( Exception $e){
			$this->flag=0;
		}
	}
	
	//更新基金信息
	public function fundInfoUpdate($oldfundid , $fundid , $fundname , $fundcategory){
		try{
			$this->result = $this->update('fundinfo', "fundid='".$fundid."', "."fundname='".$fundname."', ".
					"fundcategory='".$fundcategory."' " , "fundid='".$oldfundid."'");
		}catch( Exception $e ){
			$this->flag=0;
		}
	}
	
	
	public function getFundId(){

		return $this->fundid;
	}

	public function getFundName(){

		return $this->fundname;
	}

	public function getFundJson(){

		return json_encode($this->fund_json);
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

