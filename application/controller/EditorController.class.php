<?php

class EditorController extends Controller{
	
	private $writermodel;
	private $majormodel;
	private $schoolmode;
	private $papermodel;
	private $paperreviewmodel;
    private $expertmodel;
    private $paperid;
    private $statusid;
    private $firstauthor;
    private $school;
    private $field;
    private $date;
    private $url;
    private $result;
	
	function __construct( $model , $controller , $action , $param ){
		parent::__construct($model, $controller, $action, $param);
		$this->writermodel = new EditorModel();
		$this->fieldmodel = new FieldModel();
		$this->schoolmode = new SchoolModel();
        $this->paperid = $param['paperid'];

	}
	
	//�༭�鿴Ͷ����Ϣ
	public function paperListInfoGet(){
        if(isset($_GET['flg'])) {
            if($_GET['flg']=='1'){
                //$this->expertAppoint($_GET['paperid'],$_POST['exusername']);
            }
            if($_GET['flg']=='2'){
                $this->paperStatusChange($_GET['paperid'],$_POST['statusid']);
            }
        }
        
        $statusid = "";
        $url="index.php?controller=editor&action=paperapprove&f=paperListInfoGet";
		$this->papermodel= new PaperModel();
        if($_POST['statusid']=="") {
            if(isset($_GET['statusid'])) {
                $statusid = $_GET['statusid'];
                $url.="&statusid=".$statusid;
            }
        } else {
            if(isset($_POST['statusid'])) {
                $statusid = $_POST['statusid'];
                $url.="&statusid=".$statusid;
            }
        }
        $url.="&page=";
        
		$result=$this->papermodel->paperViewlist($statusid,$_GET['page'], $url);
 
        if($this->papermodel->flag){
            $this->template->set_var('paperinfo', $result);
			$this->template->set_var('rownums', $this->papermodel ->getRowNum());
			$this->template->set_var('pageoffset', $this->papermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->papermodel->getPagelist());
		 } else {
            $this->template->set_var('notice','Ͷ����ϢϢȡ��ʧ��');
		 }
	}
    
	//ָ�����ר��
	public function expertAppoint(){
        $url="index.php?controller=editor&action=expertappoint&f=expertAppoint&page=";
        if($_GET['exusername']<>"") {
    		$this->paperreviewmodel= new PaperreviewModel();
            $this->paperreviewmodel->ChangeExpertInfoByEditor($_GET['paperid'],$_GET['exusername']);
            if($this->paperreviewmodel->flag<>'1'){
                $this->template->set_var('notice','��Ϣ����ʧ��');
                header("Location:index.php?controller=editor&action=promptinfo");
    		 }
    
    		$this->papermodel= new PaperModel();
            $this->papermodel->ChangeExpertInfoByEditor($_GET['paperid'],$_GET['exusername']);
            if($this->papermodel->flag<>'1'){
                $this->template->set_var('notice','��Ϣ����ʧ��');
                header("Location:index.php?controller=editor&action=promptinfo");
    		 }
        } 
        $this->expertmodel= new ExpertModel();
    //    echo  $_GET['fieldid']."<<<".$_GET['expage'];
        $result=$this->expertmodel-> selectByField($_GET['fieldid'],$_GET['expage'], $url);
     //var_dump($result);  
        if($this->expertmodel->flag && $this->expertmodel->getRowNum()<>0){
            $this->template->set_var('expertcntinfo', $result);
    		$this->template->set_var('rownums', $this->expertmodel->getRowNum());
    		$this->template->set_var('pageoffset', $this->expertmodel->getPageOffset());
    		$this->template->set_var('pagelist', $this->expertmodel->getPagelist());
    	} else {
            $this->template->set_var('notice','û���ҵ���Ӧ����ר��');
    	}
            
        $this->papermodel= new PaperModel();
        $result=$this->papermodel->paperDetailInfoGet($_GET['paperid']);
        if($this->papermodel->flag){
            $this->template->set_var('paperinfo', $result);
            $this->template->set_var('page', $_GET['page']);
    	} else {
            $this->template->set_var('notice','û���ҵ���Ϣ');
        }                  
    }
    
	//��ĸ��״̬
	public function paperStatusChange($paperid,$statusid){
		$this->paperreviewmodel= new PaperreviewModel();
        $this->paperreviewmodel->ChangeStatusInfoByEditor($paperid, $statusid);
        if($this->paperreviewmodel->flag<>'1'){
            $this->template->set_var('notice','��Ϣ����ʧ��');
            header("Location:index.php?controller=editor&action=promptinfo");
		 }

		$this->papermodel= new PaperModel();
        $this->papermodel->ChangeStatusInfoByEditor($paperid, $statusid);
        if($this->paperreviewmodel->flag<>'1'){
            $this->template->set_var('notice','��Ϣ����ʧ��');
            header("Location:index.php?controller=editor&action=promptinfo");
		 }
    }
    
    //�鿴������Ϣ
	public function paperDetailInfoShow(){
		$this->papermodel= new PaperModel();
		$result=$this->papermodel->paperDetailInfoGet($_GET['paperid']);
        if($this->papermodel->flag){
            $this->template->set_var('paperinfo', $result);
            $this->template->set_var('page', $_GET['page']);
		 } else {
            $this->template->set_var('notice','��Ϣ����ʧ��');
            header("Location:index.php?controller=editor&action=promptinfo");
		 }
	}

	//������ר����Ϣ
	public function expertInfoShow(){
	   

	}
    
	//������ȡ�ø����Ϣ
	public function paperInfoShow(){
		$url="index.php?controller=admin&action=paperinfoshow&f=paperInfoShow";
		$this->papermodel= new PaperModel();
	
		if(($_POST['statusid']=="") && ($_POST['firstauthor']=="") && ($_POST['datefrom']=="")  && ($_POST['datefrom']=="")) {
			if(isset($_GET['statusid'])) {
				$statusid = $_GET['statusid'];
				$url.="&statusid=".$statusid;
			}
			if(isset($_GET['firstauthor'])) {
				$firstauthor = $_GET['firstauthor'];
				$url.="&firstauthor=".$firstauthor;
			}
			if(isset($_GET['datefrom']) && isset($_GET['dateto'])) {
				$datefrom = $_GET['datefrom'];
				$dateto = $_GET['dateto'];
				$url.="&datefrom=".$datefrom;
				$url.="&dateto=".$dateto;
			}
		} else {
			if(isset($_POST['statusid'])) {
				$statusid = $_POST['statusid'];
				$url.="&statusid=".$statusid;
			}
			if(isset($_POST['firstauthor'])) {
				$firstauthor = $_POST['firstauthor'];
				$url.="&firstauthor=".$firstauthor;
			}
			if(isset($_POST['datefrom']) && isset($_POST['dateto'])) {
				$datefrom = $_POST['datefrom'];
				$dateto = $_POST['dateto'];
				$url.="&datefrom=".$datefrom;
				$url.="&dateto=".$dateto;
			}
		}
		$url.="&page=";
		$result=$this->papermodel->paperInfoGetByCon($statusid, $firstauthor, $datefrom , $dateto, $_GET['page'], $url);
		if($this->papermodel->flag){
			$this->template->set_var('paperinfo', $result);
			$this->template->set_var('rownums', $this->papermodel ->getRowNum());
			$this->template->set_var('pageoffset', $this->papermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->papermodel->getPagelist());
		} else {
			$this->template->set_var('notice','ÐÅÏ¢žüÐÂÊ§°Ü');
		}
	}
    //������ȡ�ø��ͳ����Ϣ
	public function paperCountInfoShow(){
        $school = "";
        $field = "";
        $date = "";
        $url="index.php?controller=editor&action=papercountinfoshow&f=paperCountInfoShow";
		$this->papermodel= new PaperModel();
        if(($_POST['school']=="") && ($_POST['field']=="") && ($_POST['date']=="")) {
            if(isset($_GET['school'])) {
                $school = $_GET['school'];
                $url.="&school=".$school;
            }
            if(isset($_GET['field'])) {
                $field = $_GET['field'];
                $url.="&field=".$field;
            }
            if(isset($_GET['date'])) {
                $date = $_GET['date'];
                $url.="&date=".$date;
            }
        } else {
            if(isset($_POST['school'])) {
                $school = $_POST['school'];
                $url.="&school=".$school;
            }
            if(isset($_POST['field'])) {
                $field = $_POST['field'];
                $url.="&field=".$field;
            }
            if(isset($_POST['date'])) {
                $date = $_POST['date'];
                $url.="&date=".$date;
            }
        }
        $url.="&page=";

		$result=$this->papermodel->paperCountInfoGetByCon($school,$field,$date,$_GET['page'], $url);
 
        if($this->papermodel->flag){
            $this->template->set_var('papercountinfo', $result);
			$this->template->set_var('rownums', $this->papermodel ->getRowNum());
			$this->template->set_var('pageoffset', $this->papermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->papermodel->getPagelist());

		 //	header("Location:index.php?controller=editor&action=paperinfoshow");
		 } else {
            $this->template->set_var('notice','��Ϣ����ʧ��');
            header("Location:index.php?controller=editor&action=promptinfo");
		 }
	}
	
	//提取专家表中的所有信息(用于查询页)
	public function expertInfo(){
		$this->expertmodel = new ExpertModel( );
		$allinfo = $this->expertmodel->getAllinfo($_GET['page'], "index.php?controller=editor&action=expertinfoshow&f=expertInfo&page=");
		if($this->expertmodel->flag){
			$this->template->set_var('rownums', $this->expertmodel ->getRowNum());
			$this->template->set_var('expertinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->expertmodel->getPageOffset());
			$this->template->set_var('pagelist', $this->expertmodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//从编辑表提取一条专家的信息(查看详细信息)
	public function oneExpertInfo( ){
		$this->expertmodel = new ExpertModel( );
		$oneinfo = $this->expertmodel->selectByUname($_GET['id']);
		if($this->expertmodel->flag){
			$this->template->set_var('expertinfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//专家信息模糊查询方法
	public function expertSelect(  ){
		$this->expertmodel = new ExpertModel( );
		$allinfo=$this->expertmodel->selectExpert($_POST['method'], $_POST['value']);
		if($this->expertmodel->flag){
			$this->template->set_var('rownums', $this->expertmodel->getRowNum());
			$this->template->set_var('expertinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->expertmodel->getPageOffset());
			//			$this->template->set_var('pagelist', $this->expertmodel->getPagelist());
		}
		else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//从编辑表提取一条编辑的信息(查看详细信息)
	public function editorInfo( ){
		$this->editormodel = new EditorModel( );
		$oneinfo = $this->editormodel-> selectByUname($_GET['id']);
		if($this->editormodel->getPflag()){
			$this->template->set_var('editorinfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	public function logout(){
		session_destroy( $_SESSION['cur_username']);
		header("Location: index.php");
	}
}
