<?php
class PaperattachmentModel extends PaperModel{
	
	private $id;
	private $paperid;
	private $attachmentid;
	private $originalname;
	private $targetname;
	private $remark;
	private $paperattachment_array=array();
    private $ext;
    public $flg;
    
    function __construct( ){
		parent::__construct();
        $this->flag=1;
	}
    
    public function paperViewlist($paperid,$cntitle,$entitle,$cnabstract,$enabstract,$cnkey,$enkey,$schoolid,$majorid,$fieldid,$firstauthor,$secondauthor,$fundid,$date,$editorname,$remark){
	
	}
	
	//paperupload--->paperattachment table
	public function paperUpload($paperid,$originalname,$tmpname){

		try{
            $this->select( 'max(attachmentid) AS attachmentid' , 'paperattachment where paperid ='.$paperid );
            $query_result=$this->get_result();
            $this->attachmentid = $query_result['attachmentid'];
            if ($this->attachmentid == '') {
                $this->attachmentid = 1;
            } else {
                $this->attachmentid = (int)$this->attachmentid  + 1;
            }
            $this->ext = explode('.',$originalname);
			$this->insert("paperattachment", array(
						'paperid' => $paperid,
						'attachmentid'=>$this->attachmentid,
						'originalname'=>$originalname,
						'targetname'=>$paperid.'.'.$this->ext[1],
			));
		}catch( Exception $e ){
		  	$this->flag=0;
			print $e->getMessage();
		}
        
        /*if(file_exists('upload/'.$paperid.'doc')) {
        	 echo $originalname."already exists.";
        } else {
        	move_uploaded_file($tmpname,'uploads/'.$paperid.'doc');
        	echo "Storedin:"."upload/".$_FILES["file"]["name"];
        }*/

        
	}
	//Ìõ¼þÑ¡Ôñ
	public function selectDetial(  $paperid  ){
		try{
			$this->result = $this->select( '*' ,
					"paperattachment  where remark=1 and paperid='".$paperid."'");
			$this->row_num = $this->num_rows();
			for( $i = 0 ; $i < $this->row_num ; $i++ ){
				$row = $this->result->fetch_assoc();
				$this->paperattachment_array[$i] = array(
						'originalname'=>$row['originalname'],
						'targetname'=>$row['targetname'],
				);
			}
		}catch( Exception $e ){
			$this->flag=0;
		}
	
		return $this->paperattachment_array;
	}
	
	public function __get( $name ){
	
		return $this->flag;
	}
    
}