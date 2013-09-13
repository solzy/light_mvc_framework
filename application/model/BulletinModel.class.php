<?php
//公告信息MODEL类
class BulletinModel extends 	Model{

	private $bulletin_array=array();
	private $bulletinid=array();
	private $bulletinname=array();
	protected $result;
	private $subject;
	private $content;
	private $row_num;
	private $pageoffset;
	private $pagesize = 10;
	private $pagelist;
	private $flag = 1;

	function __construct(){
		parent::__construct();
		$this->result = $this->select( '*' , 'bulletin where remark=1');
		$this->row_num = $this->num_rows();
	}
	
	//插入数据
	public function insertInfo( $subject, $date, $content  , $edusername ){
		try{
			if(isset($subject) && isset($content)  && isset($date)  && isset($edusername)){
				$this->result = $this->insert('bulletin', array(
						'subject' => $subject,
						'content' => $content,
						'date' => $date,
						'edusername' => $edusername
				));
			}else{
				$this->flag=0;
			}
			unset($subject);
	
		}catch( Exception $e ){
			$this->flag=0;
			//echo $e->getMessage();
		}
	}
	
	//提取表中所有数据
	public function getAllinfo( $curpage ){
		try{
			if(!isset($curpage)){
				$curpage = 1;
			}
			$divpage = new DivPage( $curpage , $this->row_num , $this->pagesize ,
					"index.php?controller=adeditor&action=bulletininfoshow&f=bulletinInfoShow&page=");
			$this->pageoffset = $divpage->getOffset();
			$this->pagesize = $divpage->getPageSize();
			$this->pagelist = $divpage->getPageList();
// 			$this->result = $this->select( '*' ,
// 					"bulletin where remark=1 LIMIT $this->pageoffset , $this->pagesize");
			$this->result = $this->select( '*' ,
 					"bulletin where remark=1 ");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->bulletin_array[$i] = array(
						'bulletinid' => $row['bulletinid'],
						'subject' => $row['subject'],
						'content' => $row['content'],
						'edusername' => $row['edusername'],
						'date' => $row['date'],
						
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
			//	echo $e->getMessage();
		}
		return $this->bulletin_array;
	}
	
	//提取表中前十条数据根据时间排序,用于homepage
	public function getTop(  ){
		try{
			$this->result = $this->select( '*' ,
					"bulletin where remark=1 ");
							$this->row_num = $this->num_rows();
							for( $i = 0 ; $i < $this->row_num ; $i++ ){
							$row = $this->result->fetch_assoc();
								$this->bulletin_array[$i] = array(
										'bulletinid' => $row['bulletinid'],
										'subject' => $row['subject'],
										'content' => $row['content'],
										'date' => $row['date'],
										'edusername' => $row['edusername'],
								);
							}
					}catch( Exception $e ){
						$this->flag = 0;
					}
					return $this->bulletin_array;
	}
	
	
	//删除公告信息方法
	public function bulletinInfoDel( $bulletinid ){
		try {
			echo $bulletinid."<id>";
			if(isset($bulletinid)){
				$this->result = $this->update('bulletin','remark=0' ,"bulletinid=".$bulletinid);
			}
		}catch( Exception $e){
			$this->flag=0;
			echo $e->getMessage();
		}
	}
	
	//通过ｉｄ查找
	public function selectById( $bulletinid ){
		try{
			$this->result = $this->select( '*' , "bulletin where remark=1 and bulletinid='".$bulletinid."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->bulletin_array[$i] = array(
						'bulletinid' => $row['bulletinid'],
						'subject' => $row['subject'],
						'content' => $row['content'],
						'edusername' => $row['edusername'],
						'date' => $row['date'],
			
				);
			}
		}catch( Exception $e ){
			$this->flag = 0;
		}
		
		return $this->bulletin_array ;
	}
	
	//更新数据
	public function bulletinUpdate($bulletinid , $subject , $date , $content ){
		try{
			$this->result = $this->update('bulletin', "subject='".$subject."', "."date='".$date."', ".
					"content='".$content."' " , "bulletinid='".$bulletinid."'");
		}catch( Exception $e ){
			$this->flag=0;
			echo $e->getMessage();
		}
	
	}
	
	public function __get( $name ){
	
		return $this->flag;
	}
	
	
	public function getBulletinId(){
	
		return $this->bulletinid;
	}
	
	public function getSubject(){
	
		return $this->subject;
	}
	
	public function getBulletinArray(){
	
		return $this->bulletin_array;
	}
	
	public function getContent(){
		
		return $this->content;
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
	
}