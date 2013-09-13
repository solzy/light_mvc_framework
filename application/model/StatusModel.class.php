<?php

//稿件信息MODEL类
class StatusModel extends 	Model{

	private $status_json=array();
	private $statusid=array();
	private $statusname=array();
	protected $result;

	public function infoSet(){
		$this->result = $this->select( '*' , 'paperstatus where remark=1');
		$row_num = $this->num_rows();
		for( $i = 0 ; $i < $row_num ; $i++ ){
			$row = $this->result->fetch_assoc();
			array_push($this->statusid, $row['statusid']);
			array_push($this->statusname, $row['statusname']);
			//将数据存储为JSON格式
			$this->status_json[$i] = array(
					'statusid' => $row['statusid'],
					'statusname' => $row['statusname']
			);
		}
	}

	public function getStatusId(){

		return $this->statusid;
	}

	public function getStatusName(){

		return $this->statusname;
	}

	public function getStatusJson(){

		return json_encode($this->status_json);
	}
}

