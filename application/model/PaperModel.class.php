<?php
class PaperModel extends Model{

	private $paperid;
	private $cntitle;
	private $entitle;
	private $cnabstract;
	private $enabstract;
	private $cnkey;
	private $enkey;
	private $schoolid;
	private $majorid;
	private $fieldid;
	private $firstauthor;
	private $secondauthor;
	private $fundid;
	private $date;
	private $edusername;
	private $exusername;
	private $issueid;
	private $wusername;
	private $query_columns;
	private $query_tables;
	private $query_conditions;
	private $query_result;
	public $flag;
	private $subject;
	private $content;
	private $row_num;
	private $pageoffset;
	private $pagesize = 5;
	private $pagelist;
	protected $paper_array=array();
    
	function __construct( ){
		parent::__construct();
        $this->flag=1;
	}
	
	/**
	 * paper submit method----->paperinfo table
	 */

	public function paperRegister($cntitle,
                                  $entitle,
                                  $cnabstract,
                                  $enabstract,
                                  $cnkey,
                                  $enkey,
                                  $schoolid,
                                  $majorid,
                                  $fieldid,
                                  $firstauthor,
                                  $secondauthor,
                                  $fundid){
		

  
		$editormodel=new EditorModel();//wh ?��o??��o??��o??��o??��o??��o??��o??��o??��o??��o?
		$this->edusername=$this->getparam('edusername');
		echo '$this->edusername'."$this->edusername ----------------";
        		
		try{
		   //�ظ�Ͷ�岻�ɣ�һ����ֻ��Ͷһƪ
           //echo  '$_SESSION[cur_username]='.$_SESSION['cur_username'].'<br>';
		/* 	$this->select( 'max(paperid) AS paperid' , 'paperinfo where wusername = '.'\''.$_SESSION['cur_username'].'\'' );
            $query_result=$this->get_result();
            $this->paperid = $query_result['paperid'];
            if ($this->paperid == '') {
                $this->paperid = date("Ymd").'0001';
            } else {
                $this->flag=0;
            
            } */

            //�ظ�Ͷ���
			$this->select( 'max(paperid) AS paperid' , 'paperinfo where paperid like \''.date("Ymd").'%\'' );
            $query_result=$this->get_result();
            $this->paperid = $query_result['paperid'];
            if ($this->paperid == '') {
                $this->paperid = date("Ymd").'0001';
            } else {
                $seq_now = substr($this->paperid,8,4);
                $seq_next = (int)$seq_now + 1;
                $this->paperid = date("Ymd").sprintf("%04d", $seq_next);
            }

            echo $this->paperid ;
            $_SESSION["paperid"]= $this->paperid;
			$this->edusername=$this->getparam('edusername');
			$this->insert("paperinfo", array(
						'paperid' => $this->paperid,
						'cntitle' => $cntitle,
						'entitle' => $entitle,
						'cnabstract' => $cnabstract,
						'enabstract' => $enabstract,
						'cnkey' => $cnkey,
						'enkey' => $enkey,
						'schoolid' => $schoolid,
						'majorid' => $majorid,
						'fieldid' => $fieldid,
						'firstauthor'=> $firstauthor,
						'secondauthor'=> $secondauthor,
						'fundid'=> $fundid,
						'date'=> date('YmdHis'),
						'edusername'=>$this->edusername,
                        'exusername'=>'',
                        'issueid'=>'',
						'wusername'=>$_SESSION['cur_username'],
                        'statusid'=>'0')
            );
    	}catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
	}
	
	/**
	 * paper paperInfoGet method<---get the paperinfo
	 * 
	 */
	
	public function paperInfoGet($paperid){
    
    	try{
			$this->select( '*' , 'paperinfo where paperid ='.$paperid );
            $query_result=$this->get_result();
            if(!sizeof($query_result)) {
                $this->flag=0;
            }
    	}catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
        
        return $query_result;
	}
	
	//��ȡ�����������
	public function getAllinfo( $curpage ,  $url  , $attach_condition){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
 			$this->select( '*' , 'paperinfo where '.$attach_condition);
 			$this->row_num = $this->num_rows();
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize , $url);
			$this->pageoffset = $divpage->getOffset();
			$this->pagesize = $divpage->getPageSize();
			$this->pagelist = $divpage->getPageList();
			$this->result = $this->select('paperid ,cntitle , entitle , cnabstract , enabstract , enkey, cnkey , schoolinfo.schoolname ,
					majorinfo.majorname , fieldinfo.fieldname , firstauthor , secondauthor , fundinfo.fundname ,  paperinfo.date,
					 paperinfo.edusername ,  paperinfo.exusername ,  paperinfo.issueid ,  paperinfo.wusername , year, 
					 paperstatus.statusname ,  paperinfo.remark' ,
					"paperinfo
					left join schoolinfo on schoolinfo.schoolid=paperinfo.schoolid
					left join majorinfo on majorinfo.majorid=paperinfo.majorid
					left join fieldinfo on fieldinfo.fieldid=paperinfo.fieldid
					left join  fundinfo on fundinfo.fundid=paperinfo.fundid
					left join issueinfo on issueinfo.issueid=paperinfo.issueid
					left join paperstatus on paperstatus.statusid= paperinfo.statusid
					where   paperinfo.remark=1 and $attach_condition  order by paperinfo.date LIMIT $this->pageoffset , $this->pagesize");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->paper_array[$i] = array(
						'wusername' => $row['wusername'],
						'paperid' => $row['paperid'],
						'cntitle' => $row['cntitle'],
						'cnabstract' => $row['enabstract'],
						'entitle' => $row['entitle'],
						'cnabstract' => $row['cnabstract'],
						'cnkey' => $row['cnkey'],
						'enkey' => $row['enkey'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'fieldname' => $row['fieldname'],
						'firstauthor' => $row['firstauthor'],
						'secondauthor' => $row['secondauthor'],
						'fundname' => $row['fundname'],
						'edusername' => $row['edusername'],
						'exusername' => $row['exusername'],
						'year' => $row['year'],
						'date' => $row['date'],
						'statusname' => $row['statusname'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->paper_array;
		
	}
    
	//home页显示最近的十条信息
	public function getTop(){
		try{
			$this->result = $this->select('paperid ,cntitle , entitle , cnabstract , enabstract , enkey, cnkey , schoolinfo.schoolname ,
					majorinfo.majorname , fieldinfo.fieldname , firstauthor , secondauthor , fundinfo.fundname ,  paperinfo.date,
					 paperinfo.edusername ,  paperinfo.exusername ,  paperinfo.issueid ,  paperinfo.wusername , year,
					 paperstatus.statusname ,  paperinfo.remark' ,
					"paperinfo
					left join schoolinfo on schoolinfo.schoolid=paperinfo.schoolid
					left join majorinfo on majorinfo.majorid=paperinfo.majorid
					left join fieldinfo on fieldinfo.fieldid=paperinfo.fieldid
					left join  fundinfo on fundinfo.fundid=paperinfo.fundid
					left join issueinfo on issueinfo.issueid=paperinfo.issueid
					left join paperstatus on paperstatus.statusid= paperinfo.statusid
					where   paperinfo.remark=1  order by paperinfo.date LIMIT 0 , 9");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->paper_array[$i] = array(
						'wusername' => $row['wusername'],
						'paperid' => $row['paperid'],
						'cntitle' => $row['cntitle'],
						'cnabstract' => $row['enabstract'],
						'entitle' => $row['entitle'],
						'cnabstract' => $row['cnabstract'],
						'cnkey' => $row['cnkey'],
						'enkey' => $row['enkey'],
						'schoolname' => $row['schoolname'],
						'fieldname' => $row['fieldname'],
						'firstauthor' => $row['firstauthor'],
						'secondauthor' => $row['secondauthor'],
						'fundname' => $row['fundname'],
						'edusername' => $row['edusername'],
						'exusername' => $row['exusername'],
						'year' => $row['year'],
						'date' => $row['date'],
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		return $this->paper_array;	
	}

	/**
	 * paper viewlist method<---paperinfo table
	 * 
	 */
	
	public function paperViewlist($statusid, $curpage, $url){
        try{
            $this->query_columns='P.paperid, P.cntitle, P.firstauthor, P.fieldid,P.date,P.statusid, PS.statusname,F.fieldname';
            $this->query_tables=' paperinfo P, paperstatus PS, fieldinfo F';
            $this->query_conditions=' WHERE P.statusid = PS.statusid and P.fieldid=F.fieldid ';

            if($statusid <> '') {
                $this->query_conditions.=' and P.statusid='.'\''.$statusid.'\'';
            }
             $this->query_conditions.=' order by P.date desc';
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
				$this->paper_array[$i] = array(
						'paperid' => $row['paperid'],
						'cntitle' => $row['cntitle'],
						'firstauthor' => $row['firstauthor'],
						'fieldid' => $row['fieldid'],
                        'date' => $row['date'],
						'statusid' => $row['statusid'],
						'statusname' => $row['statusname'],
						'fieldname' => $row['fieldname'],
				);
			}
        }catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
                
        return $this->paper_array;

	
	
	}	/**

	/**
	 * get paper status method<---paperinfo table
	 * 
	 */
	
	public function paperStatus(){
        $this->query_columns='PS.statusname,P.paperid, P.cntitle, P.entitle,S.schoolname, M.majorname, F.fieldname, P.firstauthor, P.secondauthor, FU.fundname, P.date, P.edusername, P.exusername, P.issueid, P.wusername';
        $this->query_tables=' paperinfo AS P, schoolinfo AS S, majorinfo AS M, fieldinfo AS F, fundinfo AS FU, paperstatus AS PS';
        $this->query_conditions=' WHERE P.schoolid=S.schoolid and P.majorid=M.majorid';
        $this->query_conditions.=' and P.fieldid=F.fieldid and P.fundid=FU.fundid';
        $this->query_conditions.=' and P.statusid=PS.statusid and  P.wusername='.'\''.$_SESSION['cur_username'].'\'';
        
        try{
            $this->select( $this->query_columns , $this->query_tables.$this->query_conditions);
            $query_result=$this->get_result_array();
        }catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
                
        return $query_result;

	}
	
	/**
	 * paper paperDetailInfoGet method<---get the detail paper info
	 * 
	 */
	
	public function paperDetailInfoGet($paperid){
        $this->query_columns='P.paperid,P.statusid, P.cntitle,P.entitle,P.cnabstract,P.enabstract,P.cnkey,P.enkey,S.schoolname,M.majorname,P.fieldid,F.fieldname,P.firstauthor,P.secondauthor,FU.fundname,P.date,P.edusername,P.exusername,P.issueid,P.wusername,PS.statusname';
        $this->query_tables=' paperinfo AS P, schoolinfo AS S, majorinfo AS M, fieldinfo AS F, fundinfo AS FU, paperstatus AS PS';
        $this->query_conditions=' WHERE P.schoolid=S.schoolid and P.majorid=M.majorid';
        $this->query_conditions.=' and P.fieldid=F.fieldid and P.fundid=FU.fundid';
        $this->query_conditions.=' and P.statusid=PS.statusid and  P.paperid='." '$paperid'";
    
    	try{
            $this->select( $this->query_columns , $this->query_tables.$this->query_conditions);
            $query_result=$this->get_result();
            if(!sizeof($query_result)) {
                $this->flag=0;
            }
    	}catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
        
        return $query_result;
	}	
	

	/**
	 * paper paperInfoGet method<---get the paperinfo by condition
	 * 
	 */
	public function paperInfoGetByCon($statusid, $firstauthor, $datefrom , $dateto , $curpage, $url) {
        try{
            $this->query_columns='P.paperid, P.cntitle, P.firstauthor, P.date, S.schoolname,M.majorname,PS.statusname,PR.enddate ';
            $this->query_tables=' paperinfo AS P LEFT JOIN paperreview AS PR ON P.statusid = PR.statusid, schoolinfo S, majorinfo M, paperstatus PS';
            $this->query_conditions=' WHERE P.schoolid = S.schoolid and P.majorid = M.majorid and P.statusid = PS.statusid';

            if($statusid <> "") {
                $this->query_conditions.=' and P.statusid='.'\''.$statusid.'\'';
            }
            if($firstauthor <> "") {
                $this->query_conditions.=' and P.firstauthor='.'\''.$firstauthor.'\'';
            }
            if($datefrom<> "" && $dateto <> "" ) {
           	$this->query_conditions.=" and P.date >= '".$datefrom."' and P.date <= '".$dateto."'";
  //              $this->query_conditions.=' and P.date > '.'str_to_date(\''.$datefrom.'\', \'%Y%m%d\') and P.date < '.'str_to_date(\''.$dateto.'\', \'%Y%m%d\')';
            }
            $this->select( $this->query_columns , $this->query_tables.$this->query_conditions);
            $this->row_num = $this->num_rows();
			$counts = $this->row_num;
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
				$this->paper_array[$i] = array(
						'paperid' => $row['paperid'],
						'cntitle' => $row['cntitle'],
						'firstauthor' => $row['firstauthor'],
						'date' => $row['date'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'statusname' => $row['statusname'],
						'enddate' => $row['enddate'],
				);
			}
		$this->paper_array[0]['counts' ] = $counts;
        }catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
                
        return $this->paper_array;

	}
	/**
	 * paper paperInfoGet method<---get the paperinfo by condition
	 * ����ר�Ҵ��Ĳ�ѯ��͵�����´������ࣩ
	 */
	public function paperInfoSelect($statusid, $firstauthor, $datefrom, $dateto , $curpage, $url , $condition) {
		try{
			$this->query_columns='P.paperid, P.cntitle, P.firstauthor, P.date, S.schoolname,M.majorname,PS.statusname,PR.enddate';
			$this->query_tables=' paperinfo AS P LEFT JOIN paperreview AS PR ON P.statusid = PR.statusid, schoolinfo S, majorinfo M, paperstatus PS';
			$this->query_conditions=' WHERE P.schoolid = S.schoolid and P.majorid = M.majorid and P.statusid = PS.statusid and P.'.$condition;
	
			if($statusid <> "") {
				$this->query_conditions.=' and P.statusid='.'\''.$statusid.'\'';
			}
			if($firstauthor <> "") {
				$this->query_conditions.=' and P.firstauthor='.'\''.$firstauthor.'\'';
			}
			 if($datefrom<> "" && $dateto <> "" ) {
          	 	$this->query_conditions.=" and P.date >= '".$datefrom."' and P.date <= '".$dateto."'";
            }
            $this->query_conditions.= ' order by P.date desc';
			$this->select( $this->query_columns , $this->query_tables.$this->query_conditions);
			$this->row_num = $this->num_rows();
			$counts = $this->row_num;
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
				$this->paper_array[$i] = array(
						'paperid' => $row['paperid'],
						'cntitle' => $row['cntitle'],
						'firstauthor' => $row['firstauthor'],
						'date' => $row['date'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'statusname' => $row['statusname'],
						'enddate' => $row['enddate'],
				);
			}
			$this->paper_array[0]['counts' ] = $counts;
		}catch( Exception $e ){
			$this->flag=0;
			print $e->getMessage();
		}
	
		return $this->paper_array;
	
	}

	/**
	 * paper paperCountInfoGet method<---get the paper count info by condition
	 * 
	 */
	public function paperCountInfoGetByCon($schoolid, $fieldid, $date, $curpage, $url) {
        try{
            $this->query_columns='S.schoolname AS schoolname, F.fieldname AS fieldname, count( P.paperid ) AS count, min( P.date ) AS sdate, max( P.date ) AS edate';
            $this->query_tables=' paperinfo AS P, schoolinfo S, fieldinfo F';
            $this->query_conditions=' WHERE P.schoolid = S.schoolid and P.fieldid = F.fieldid';

            if($schoolid <> '') {
                $this->query_conditions.=' and P.schoolid='.'\''.$schoolid.'\'';
            }
            if($fieldid <> '') {
                $this->query_conditions.=' and P.fieldid='.'\''.$fieldid.'\'';
            }
            if($date <> '') {
                $this->query_conditions.=' and P.date='.'str_to_date(\''.$date.'\', \'%Y%m%d\')';
            }
            $this->query_conditions.=' GROUP BY S.schoolname, F.fieldname';
            
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
				$this->paper_array[$i] = array(
						'schoolname' => $row['schoolname'],
						'fieldname' => $row['fieldname'],
						'count' => $row['count'],
						'fromtodate' => $row['sdate'].'~'.$row['edate'],
				);
			}
        }catch( Exception $e ){
            $this->flag=0;
            print $e->getMessage();
		}
                
        return $this->paper_array;

	}
	
	/**
	 * ChangeExpertInfoByEditor �༭�޸�ר����Ϣ
	 */
	public function ChangeExpertInfoByEditor($paperid, $exusername){
		try{
			$this->update('paperinfo',
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
			$this->update('paperinfo',
               			"statusid = '".$statusid."'",
           				'paperid = '."'$paperid'");
		}catch( Exception $e ){
			$this->flag=0;
		}
	}
    	
	//����ѡ��
	public function paperDetail(  $paperid  ){
		try{
			$this->result = $this->select( ' paperinfo.paperid ,cntitle , entitle , cnabstract , enabstract , enkey, cnkey , schoolinfo.schoolname ,
					majorinfo.majorname , fieldinfo.fieldname , firstauthor , secondauthor , fundinfo.fundname ,  paperinfo.date,
					 paperinfo.edusername ,  paperinfo.exusername ,  paperinfo.issueid ,  paperinfo.wusername , year, 
					 paperstatus.statusname ,  paperinfo.remark ,expertinfo.name ,paperreview.enddate' ,
					"paperinfo
					left join schoolinfo on schoolinfo.schoolid=paperinfo.schoolid
					left join majorinfo on majorinfo.majorid=paperinfo.majorid
					left join fieldinfo on fieldinfo.fieldid=paperinfo.fieldid
					left join  fundinfo on fundinfo.fundid=paperinfo.fundid
					left join paperreview on paperreview.paperid= paperinfo. paperid
					left join issueinfo on issueinfo.issueid=paperinfo.issueid
					left join paperstatus on paperstatus.statusid= paperinfo.statusid
					left join expertinfo on expertinfo.exusername=paperinfo.exusername
					where   paperinfo.remark=1 and  paperinfo.paperid=$paperid");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->paper_array[$i] = array(
						'paperid' => $row['paperid'],
						'cntitle' => $row['cntitle'],
						'cnabstract' => $row['enabstract'],
						'entitle' => $row['entitle'],
						'cnabstract' => $row['cnabstract'],
						'cnkey' => $row['cnkey'],
						'enkey' => $row['enkey'],
						'schoolname' => $row['schoolname'],
						'majorname' => $row['majorname'],
						'fieldname' => $row['fieldname'],
						'firstauthor' => $row['firstauthor'],
						'secondauthor' => $row['secondauthor'],
						'fundname' => $row['fundname'],
						'date' => $row['date'],
						'edusername' => $row['edusername'],
						'exusername' => $row['exusername'],
						'wusername' => $row['wusername'],
						'year' => $row['year'],
						'statusname' => $row['statusname'],
						'expert' => $row['name'],
						'enddate'=>$row['enddate'],
				);
			}
			$array= explode('-', $this->paper_array[0]['enddate']);
			$this->paper_array[0]['enddate'] = $array[0].'��'.$array[1].'��'.$array[2].'��';
		}catch( Exception $e ){
			$this->flag=0;
		}
		return $this->paper_array;
	}
	
	//稿件删除
	public function paperInfoDel( $paperid ){
		try{
			if( isset($paperid)  ){
				$this->update('paperinfo',
						'remark = 0',
						'paperid  = '."'$paperid'");
			}
		}catch( Exception $e ){
			$this->flag=0;
		}	
	} 
	
	public function getparam($param){
		 return $this->param;
	}

	//�õ��ܼ�¼��
	public function getRowNum(){
	
		return  $this->row_num;
	}
	
	//�õ�pagelink����
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