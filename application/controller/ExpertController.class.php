<?php
//专家控制类
class ExpertController extends  Controller{
	
	protected $expertmodel;
	protected $papermodel;
	protected $paperattachmentmodel;
	protected $paperreview;
	
	
	function __construct( $model , $controller , $action , $param ){
		parent::__construct($model, $controller, $action, $param);
		$this->expertmodel = new ExpertModel();
		//测试用
	//	$_SESSION['cur_username'] = 'expert';
		
	}
	
	//返回稿件信息表中的所有信息
	public function paperInfoM(){
		$this->papermodel = new PaperModel( );
		$allinfo = $this->papermodel->getAllinfo( $_GET['page'] ,
		 "index.php?controller=expert&action=paper&f=paperInfoM&page=" , "exusername='".$_SESSION['cur_username']."'");
		if($this->papermodel->flag){
			$this->template->set_var('rownums', $this->papermodel->getRowNum());
			$this->template->set_var('paperinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->papermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->papermodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//一条稿件的信息
	public function paperDetail(){
		$this->papermodel = new PaperModel( );
		$oneinfo= $this->papermodel->paperDetail($_GET['id']);
		if($this->papermodel->flag){
			$this->template->set_var('paperinfo',  $oneinfo);

		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//返回稿件信息表中的所有信息(查询页)
	public function paperInfoShow(){
		$statusid = "";
		$firstauthor = "";
		$date = "";
		$url="index.php?controller=expert&action=paperquery&f=paperInfoShow";
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
		$result=$this->papermodel->paperInfoSelect($statusid,$firstauthor,$datefrom , $dateto ,$_GET['page'],$url,  "exusername='".$_SESSION['cur_username']."'");
		if($this->papermodel->flag){
			$this->template->set_var('paperinfo', $result);
			$this->template->set_var('rownums', $this->papermodel ->getRowNum());
			$this->template->set_var('pageoffset', $this->papermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->papermodel->getPagelist());
		} else {
			$this->template->set_var('notice','ÐÅÏ¢žüÐÂÊ§°Ü');
	//		header("Location:index.php?controller=editor&action=promptinfo");
		}
	}
	
	//稿件下载
	public function paperDownload(){
		$this->paperattachmentmodel = new PaperattachmentModel( );
		$oneinfo=$this->paperattachmentmodel->selectDetial($_GET['id']);
		$filename = substr($oneinfo[0]['targetname'], 21);
		$dir = substr($oneinfo[0]['targetname'], 0,21);
		$filemanipulate = new FileManipulate($oneinfo[0]['targetname']);
		$filemanipulate->fileDownload($filename, $dir);
	}
	
	//显示个人信息方法
	public function showPersonalInfo( ){
		$row = $this->expertmodel->showPersonalInfo($_SESSION['cur_username']);
		if($this->expertmodel->flag){
			$this->template->set_var('writerinfo', $row);
		}
		else{
			$this->template->set_var('notice','fail');
		}
	}
	
	//个人信息修改
	public function modifyInfo(){
		$this->expertmodel->modifyInfo($_SESSION['cur_username'] ,$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'], $_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'], $_POST['field']);
		if($this->expertmodel->flag){
			$this->template->set_var('notice', "<script> alert('更新成功！') ;</script>");
		}
		else{
			$this->template->set_var('notice',"<script> alert('添加更新失败!');</script>");
		}
	}
	
	//paper review
	public function paperReview(){
		$this->paperreview = new PaperreviewModel( );
		$this->paperreview->insertComment($_POST['paperid'],$_POST['exusername'], $_POST['status'], $_POST['comment']);
		if($this->paperreview->flag){
			$this->template->set_var('notice', "<script> alert('审核成功！') ;location.href = 'index.php?controller=expert&action=paper&f=paperInfoM';</script>");
		}
		else{
			$this->template->set_var('notice',"<script> alert('审核失败!');</script>");
		}	
	}
	
	public function logout(){
		session_destroy( $_SESSION['cur_username']);
		header("Location: index.php");
	}
}