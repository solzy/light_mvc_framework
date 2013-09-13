<?php

class WriterController extends Controller{
	
	private $writermodel;
	private $majormodel;
	private $schoolmode;
	private $papermodel;
	private $PaperreviewModel;
	private $paperattachmentmodel;
    private $paperid;
	private $result;
	
	function __construct( $model , $controller , $action , $param ){
		parent::__construct($model, $controller, $action, $param);
		$this->writermodel = new WriterModel();
		$this->majormodel = new MajorModel();
		$this->schoolmode = new SchoolModel();
        $this->paperid = $param['paperid'];
/*        $this->papermodel= new PaperModel();
		$this->papaerattachmentmodel=new PaperattachmentModel();*/	
	}
	
	//写注册表单方法
	public function writeRegisterSheet(){
		$this->writermodel->writeRegisterSheet($_POST['username'],$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'], $_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school']);
		if($this->writermodel->flag){	
			$this->template->set_var('notice',  "<script> alert('注册成功！') ;Location.href='index.php';</script>");
		//	header("Location:index.php?controller=home&action=regsuccess");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('注册失败！') ;</script>");
		}	
	}
	
	//显示个人信息方法
	public function showPersonalInfo( ){
		$row = $this->writermodel->showPersonalInfo($_SESSION['cur_username']);
		if($this->writermodel->flag){	
			$this->template->set_var('writerinfo', $row);
		}
		else{
			$this->template->set_var('notice','fail');
		}	
	}
	
	 //个人信息修改
	public function modifyInfo(){
		 $this->writermodel->modifyInfo($_SESSION['cur_username'] ,$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'], $_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'] );
		 if($this->writermodel->flag){
		 	$this->template->set_var('notice', "<script> alert('信息更新成功') ;</script>");
		 }
		 else{
		 	$this->template->set_var('notice',"<script> alert('信息更新失败') ;</script>");
		 }
	}
	
	//paperinfo insert
	public function paperRegister(){
		$this->papermodel= new PaperModel();
		$this->papermodel->paperRegister($_POST['cntitle'],
				$_POST['entitle'],
				$_POST['cnabstract'],
				$_POST['enabstract'],
				$_POST['cnkey'],
				$_POST['enkey'],
				$_POST['school'],
				$_POST['major'],
				$_POST['field'],
				$_POST['firstauthor'],
				$_POST['secondauthor'],
				$_POST['fund']);
                
		$this->PaperreviewModel= new PaperreviewModel();
		$this->PaperreviewModel->paperreviewInsert($_SESSION["paperid"]);
        if($this->PaperreviewModel->flag<>'1'){
            $this->template->set_var('notice','信息更新失败');
   //        header("Location:index.php?controller=writer&action=promptinfo");
		}
             echo    $this->papermodel->flag;
        if($this->papermodel->flag){
	//	 	header("Location:index.php?controller=writer&action=paperupload");
		} else {
            $this->template->set_var('notice','信息更新失败');
  //       header("Location:index.php?controller=writer&action=promptinfo");
		}
	}
	
    //paperinfo update
	public function paperInfoUpdate(){
        $this->papermodel= new PaperModel();
		$this->result=$this->papermodel->paperInfoGet($this->paperid);
        
        if($this->papermodel->flag){
            $this->template->set_var('paperinfo', $this->result);
        } else {
            $this->template->set_var('notice','信息取得失败');
            header("Location:index.php?controller=writer&action=promptinfo");
		 }
	}
    
	//paperattachment upload
	public function paperUpload(){

		if ($_FILES["myfile"]["error"] > 0) {
		  	$this->template->set_var('notice','文件上传失败');
		//	echo "Error: ".$_FILES["myfile"]["error"] . "<br />";
		} else {
	//		echo "Upload: ".$_FILES["myfile"]["name"] . "<br />";
	//		echo "Type: ".$_FILES["myfile"]["type"] . "<br />";
	//		echo "Size: ".($_FILES["myfile"]["size"] / 1024) . " Kb<br />";
	//		echo "Stored in: ".$_FILES["myfile"]["tmp_name"];
		}
		//file upload
        $this->UploadFile =new UploadFile();
		$this->UploadFile->upload($_FILES["myfile"]);
		
        //db update
        $this->PaperattachmentModel=new PaperattachmentModel();
        $this->PaperattachmentModel->paperUpload($_SESSION["paperid"],$_FILES["myfile"]["name"],$_FILES["myfile"]["tmp_name"]);

        if($this->PaperattachmentModel->flag){
        	$this->template->set_var('notice', '文件上传成功');
		}
		else{
			$this->template->set_var('notice','文件上传失败');
		}
	}
    
	//paperFileUpdate
	public function paperFileUpdate(){
        $_SESSION["paperid"]= $_GET['paperid']; 
	}

	//paperinfo display
	public function paperStatus(){
		$this->papermodel= new PaperModel();
        $result=$this->papermodel->paperStatus();
        $this->template->set_var('paperstatus', $result);
	}
    
	//paper expert assign
	public function paperAssign(){
		$this->papermodel= new PaperModel();
        $this->papermodel->paperStatus();

	}
	public function logout(){
		session_destroy( $_SESSION['cur_username']);
		header("Location: index.php");
	}
}
