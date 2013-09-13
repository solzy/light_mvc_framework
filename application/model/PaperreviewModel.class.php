<?php
class PaperreviewModel extends Model{

	private $paperid;
    private $exusername;
	private $begindate;
	private $enddate;
	private $statusid;
	private $comment;
	private $remark;
 	private $paperreview_array=array();       
    private $query_columns;
    private $query_tables;
    private $query_conditions;
    private $query_result;

	public $flag;
	private $row_num;

    
	function __construct( ){
		parent::__construct();
        $this->flag=1;
	}

	/**
	 * paperreview insert method----->paperreview table
	 */

	public function paperreviewInsert($paperid){
		try{
			$this->insert("paperreview", array(
						'paperid' => $paperid,
						'exusername' => '',
						'begindate' => date('YmdHis'),
						'enddate' => '',
						'statusid' => '1',
                        'comment' => '',
                        'remark'=>'1')
            );
    	}catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
	}
    
	/**
	 * ChangeExpertInfoByEditor �༭�޸�ר����Ϣ
	 */
	public function ChangeExpertInfoByEditor($paperid, $exusername){
		try{
			$this->update('paperreview',
               			"exusername = '".$exusername."'"." , statusid = '2'",
           				'paperid = '."'$paperid'");
		}catch( Exception $e ){
			$this->flag=0;
		}
	}	

	/**
	 * ChangeStatusInfoByEditor �༭�޸����״̬��Ϣ
	 */
	public function ChangeStatusInfoByEditor($paperid, $statusid){
		try{
			$this->update('paperreview',
               			"statusid = '".$statusid."'",
           				'paperid = '."'$paperid'");
		}catch( Exception $e ){
			$this->flag=0;
		}
	}	
	//���������
	public function insement( $paperid , $statusid , $comment ){
		try{
			if(isset($paperid) && isset($statusid) && isset($comment)){
				$this->result = $this->insert('paperreview', array(
						'paperid' => $paperid,
						'statusid' => $statusid,
						'comment' => $comment,
						'enddate' => date("Y-m-d"),
				));
			}
		}catch( Exception $e ){
			$this->flag=0;
		}
	}
	//�������
	public function insertComment($paperid , $exusername , $statusid , $comment ){
		try{
			$this->result = $this->update('paperreview', "statusid='".$statusid."', "."exusername='".$exusername."', "."comment='".$comment."', ".
					 "enddate='".date("Y-m-d")."'", "paperid='".$paperid."'");
		}catch( Exception $e ){
			$this->flag=0;
		}
	
	}
	
	public function __get( $name ){
	
		return $this->flag;
	}

}