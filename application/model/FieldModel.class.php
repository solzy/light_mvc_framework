<?php

//专业信息MODEL类
class FieldModel extends 	Model{

	private $field_json=array();
	private $fieldid=array();
	private $fieldname=array();
	protected $result;

	public function infoSet(){
		$this->result = $this->select( '*' , 'fieldinfo where remark=1');
		$row_num = $this->num_rows();
		for( $i = 0 ; $i < $row_num ; $i++ ){
			$row = $this->result->fetch_assoc();
			array_push($this->fieldid, $row['fieldid']);
			array_push($this->fieldname, $row['fieldname']);
			//将数据存储为JSON格式
			$this->field_json[$i] = array(
					'fieldid' => $row['fieldid'],
					'fieldname' => $row['fieldname']
			);
		}
	}

	public function getFieldId(){

		return $this->fieldid;
	}

	public function getFieldName(){

		return $this->fieldname;
	}

	public function getFieldJson(){

		return json_encode($this->field_json);
	}
}

