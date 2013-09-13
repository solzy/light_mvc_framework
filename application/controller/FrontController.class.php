<?php

class FrontController {
	
	private $majorinfo;
	private $schoolinfo;
	private $fieldinfo;
	private $fundinfo;
	private $majorfilemanipluate;
	private $schoolfilemanipluate;
	private $fieldfilemanipluate;
	private $fundfilemanipluate;
	private $statusfilemanipluate;

	function __construct(){
		$this->majorfilemanipluate = new FileManipulate(CACHE.'/majorjson.php');
		$this->schoolfilemanipluate = new FileManipulate(CACHE.'/schooljson.php');
		$this->fieldfilemanipluate = new FileManipulate(CACHE.'/fieldjson.php');
		$this->fundfilemanipluate = new FileManipulate(CACHE.'/fundjson.php');
		$this->statusfilemanipluate = new FileManipulate(CACHE.'/statusjson.php');
	}

	
	//得到 JSON数据格式的专业信息
	public function majorJson(){
		$this->majorinfo = new MajorModel( );
		$this->majorinfo->infoSet();
		$this->majorfilemanipluate->createFile( );
		$this->majorfilemanipluate->writerFile( $this->majorinfo->getMajorJson() );
	}
	
	//得到 JSON数据格式的学院信息
	public function schoolJson(){
		$this->schoolinfo = new SchoolModel( );
		$this->schoolinfo->infoSet();
		$this->schoolfilemanipluate->createFile();
		$this->schoolfilemanipluate->writerFile($this->schoolinfo->getSchoolJson());
	}
	
	//得到 JSON数据格式的领域信息
	public function fieldJson(){
		$this->fieldinfo = new FieldModel( );
		$this->fieldinfo->infoSet();
		$this->fieldfilemanipluate->createFile();
		$this->fieldfilemanipluate->writerFile($this->fieldinfo->getFieldJson());
	}
	
	//得到 JSON数据格式的基金信息
	public function fundJson(){
		$this->fundinfo = new FundModel( );
		$this->fundinfo->infoSet();
		$this->fundfilemanipluate->createFile();
		$this->fundfilemanipluate->writerFile($this->fundinfo->getFundJson());
	}
    
	//得到 JSON数据格式的稿件状态信息
	public function statusJson(){
		$this->statusinfo = new StatusModel( );
		$this->statusinfo->infoSet();
		$this->statusfilemanipluate->createFile();
		$this->statusfilemanipluate->writerFile($this->statusinfo->getStatusJson());
	}
    	
	//将用户级别储存在全局的SESSION中
	public function saveLevelToSession(){
		$usertype = new UserTypeModel( );
		$_SESSION['userlevel'] = $usertype->getUserLevel();
	
	}	
	
	public function dataLoad(){
		$papermodel= new PaperModel();
		$paper_result=$papermodel->getTop();
		$bulletinmodel = new BulletinModel( );
		$bulletin_result = $bulletinmodel->getTop();
		if($papermodel->flag || $bulletinmodel->flag){
			$this->template->set_var('paperinfo', $paper_result);
			$this->template->set_var('bulletininfo', $bulletin_result);
		} else {
			$this->template->set_var('notice','faile');
		}
		
	}
	
	//检查登录信息重定向页面
	public function login(){
		if(!isset($_POST['editor'])){
			if(isset($_POST['userflags']) && isset($_POST['username']) && isset($_POST['password']) || isset($_POST['authcode'])){
				$userflags = $_POST['userflags'];
				$username =  $_POST['username'];
				$password =  $_POST['password'];
				$authcode = strtolower($_POST['authcode']);
				//作者登录
			
				if($userflags == $_SESSION['userlevel']['writer']){	
					$writermodel = new WriterModel( );
				//	echo "<>". md5($password)."<>".$writermodel->loginVerify($username).$authcode.'== '.$_SESSION['authcode'];
					if( md5($password)  == $writermodel->loginVerify($username)|| $authcode == $_SESSION['authcode']){
						$_SESSION['cur_username'] = $username;
						header('Location:index.php?controller=writer&action=home');
					}else{
						echo "<script> alert('writer 信息输入有误!');Location.href='Location:index.php?controller=home&action=home'</script>"	;
					}			 
				}
				//专家登录
				if($userflags == $_SESSION['userlevel']['expert']){
						$expertmodel = new ExpertModel( );
				//		echo "<>". md5($password) ."<>".$expertmodel->loginVerify($username)."<>".$authcode;
						if(md5($password) == $expertmodel->loginVerify($username) || $authcode == $_SESSION['authcode']){
						$_SESSION['cur_username'] = $username;
						header('Location:index.php?controller=expert&action=home');
					}else{
						echo "<script> alert('expert 信息输入有误!');Location.href='Location:index.php'</script>"	;	
					}
				}
			}
		}
		//admin login
		if( isset($_POST['username']) && isset($_POST['password']) &&  $_POST['admin'] == $_SESSION['userlevel']['admin']){
			$username= $_POST['username'];
			$password = $_POST['password'];
			$adminmodel = new AdminModel( );
			if(md5($password) == $adminmodel->loginVerify($username)){
				$_SESSION['cur_username'] = $username;
				header('Location:index.php?controller=admin&action=home');
			}else{
				echo "<script> alert('admin 信息输入有误!');Location.href='Location:index.php?controller=home&action=home'</script>"	;
				//header("Location:index.php?controller=home&action=home");
			}
		}else{
			if( isset($_POST['username']) && isset($_POST['password']) || isset($_POST['authcode'])){
				$userflags= $_POST['editor'];
				$username =  $_POST['username'];
				$password =  $_POST['password'];
				$authcode = strtolower($_POST['authcode']);
				//编辑登录
				if($userflags == $_SESSION['userlevel']['editor']){
					$editormodel = new EditorModel( );
				//	echo "<>". md5($password)."<>".$editormodel->loginVerify($username).$authcode.'== '.$_SESSION['authcode'];
					if(md5($password) == $editormodel->loginVerify($username) && $authcode == $_SESSION['authcode']){
						$_SESSION['cur_username'] = $username;
						header('Location:index.php?controller=editor&action=home');
					}else{
						echo "<script> alert('editor信息输入有误!');Location.href='Location:index.php?controller=home&action=home'</script>"	;	
					}
				}
				//主编登录
				if($userflags == $_SESSION['userlevel']['adeditor']){
					$editormodel = new AdEditorModel( );
					if(md5($password) == $editormodel->loginVerify($username) || $authcode == $_SESSION['authcode']){
						$_SESSION['cur_username'] = $username;
						header('Location:index.php?controller=adeditor&action=home');
					}else{
						echo "<script> alert('adeditor 信息输入有误!');Location.href='Location:index.php?controller=home&action=home'</script>"	;
					}
				}
			}
			
		}
		
	}
	
	
	
}