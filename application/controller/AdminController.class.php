<?php
//管理员控制类
class AdminController extends Controller{

	protected $adminmodel;
	protected $papermodel;
	protected $writermodel;
	protected $editormodel;
	protected $adeditormodel;
	protected $expertmodel;


	function __construct( $model , $controller , $action , $param ){
		parent::__construct($model, $controller, $action, $param);
		$this->adminmodel = new AdminModel( );
	}

	/* ---------------------------------------专家管理----------------------------------------- */
	
	//提取专家表中的所有信息(用于管理页)
	public function expertInfoM(){
		$this->expertmodel = new ExpertModel( );
		$allinfo = $this->expertmodel->getAllinfo($_GET['page'], "index.php?controller=admin&action=expertmanage&f=expertInfoM&page=");
		if($this->expertmodel->flag){
			$this->template->set_var('rownums', $this->expertmodel ->getRowNum());
			$this->template->set_var('expertinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->expertmodel->getPageOffset());
			$this->template->set_var('pagelist', $this->expertmodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	
	//专家添加(初始密码123456 暂时未设置密码生成规则)
	public function expertAdd(){
		$this->expertmodel = new ExpertModel( );
		$this->expertmodel->expertRegister($_POST['username'],$_POST['name'] ,$_POST['gender'] ,123456,
				$_POST['tele'],$_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'] ,  $_POST['field']);
		if($this->expertmodel->flag){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('添加信息失败!');</script>");
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
	
	//专家信息修改
	public function modifyExpertInfo(){
		$this->expertmodel = new ExpertModel( );
		$this->expertmodel->modifyInfo($_GET['id'],$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'],
				$_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'] , $_POST['field'] );
		if($this->expertmodel->flag){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
		}
	}
	
	//删除一个专家信息方法
	public function expertInfoDel(  ){
		$this->expertmodel = new ExpertModel( );
		$this->expertmodel->expertInfoDel($_GET['id'] );
		if($this->expertmodel->flag){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
			header("Location:index.php?controller=admin&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
		}
	}
	
	//删除所选专家信息方法
	public function delCheckedExpert(  ){
		$this->expertmodel = new ExpertModel( );
		for($i = 0 ; $i < count($_POST['exusername']) ; $i++){
				$exusername =$_POST['exusername'][$i];
				if(!is_null($exusername)){
					$this->expertmodel->expertInfoDel($exusername);
				}
		}
		if($this->expertmodel->flag){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
			header("Location:index.php?controller=admin&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
		}
	}
	
	/* --------------------------------------编辑管理----------------------------------------- */
	
	//编辑添加(初始密码123456 暂时未设置密码生成规则)
	public function editorAdd(){
		$this->editormodel = new EditorModel( );
		$this->editormodel->editorAdd($_POST['username'],$_POST['name'] ,
				$_POST['gender'] , 123456, $_POST['tele'], $_POST['email'], $_POST['address']);
		if($this->editormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('添加信息失败!');</script>");
		}
	}
	
	
	//提取编辑表中的所有信息用于信息管理页
	public function editorInfoM(){
		$this->editormodel = new EditorModel( );
		$allinfo = $this->editormodel->getEditorInfo($_GET['page'] , "index.php?controller=admin&action=editormanage&f=editorInfoM&page=");
		if($this->editormodel->getPflag()){
			$this->template->set_var('rownums', $this->editormodel ->getRowNum());
			$this->template->set_var('editorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->editormodel->getPageOffset());
			$this->template->set_var('pagelist', $this->editormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//从编辑表提取一条编辑的信息(查看详细信息)
	public function editorInfo( ){
		$this->editormodel = new EditorModel( );
		$oneinfo = $this->editormodel->selectByUname($_GET['id']);
		if($this->editormodel->getPflag()){
			$this->template->set_var('editorinfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	
	//编辑个人信息修改
	public function modifyEditorInfo(){
		$this->editormodel = new EditorModel( );
		$this->editormodel->modifyInfo($_GET['id'] ,$_POST['name'] ,$_POST['gender'] ,
				$_POST['userpassword2'], $_POST['tele'], $_POST['email'], $_POST['address'] );
		if($this->editormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
		}
	}
	
	//删除编辑信息方法
	public function editorInfoDel(  ){
		$this->editormodel = new EditorModel( );
		$this->editormodel->editorInfoDel($_GET['id'] );
		if($this->editormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	//删除所选编辑信息方法
	public function delCheckedEditor(  ){
		$this->editormodel = new EditorModel( );
		for($i = 0 ; $i < count($_POST['edusername']) ; $i++){
			$edusername =$_POST['edusername'][$i];
			if(!is_null($edusername)){
				$this->editormodel->editorInfoDel($edusername);
			}
		}
		if($this->editormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	/* ---------------------------------------作者管理----------------------------------------- */
	//提取作者表中的所有信息(用于管理页)
	public function writerInfoM(){
		$this->writermodel = new WriterModel( );
		$allinfo = $this->writermodel->getAllinfo($_GET['page'], "index.php?controller=admin&action=writermanage&f=writerInfoM&page=");
		if($this->writermodel->flag){
			$this->template->set_var('rownums', $this->writermodel ->getRowNum());
			$this->template->set_var('writerinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->writermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->writermodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	
	//作者添加(初始密码123456 暂时未设置密码生成规则)
	public function writerAdd(){
		$this->writermodel = new WriterModel( );
		$this->writermodel->writeRegisterSheet($_POST['username'],$_POST['name'] ,$_POST['gender'] ,123456,
				$_POST['tele'],$_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'] );
		if($this->writermodel->flag){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('添加信息失败!');</script>");
		}
	}
	
	
	//从作者表提取一条作者的信息(查看详细信息)
	public function oneWriterInfo( ){
		$this->writermodel = new WriterModel( );
		$oneinfo = $this->writermodel->selectByUname($_GET['id']);
		if($this->writermodel->flag){
			$this->template->set_var('writerinfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//作者信息修改
	public function modifyWriterInfo(){
		$this->writermodel = new WriterModel( );
		$this->writermodel->modifyInfo($_GET['id'],$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'],
				$_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'] );
		if($this->writermodel->flag){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
		}
	}
	
	//删除一个作者信息方法
	public function writerInfoDel(  ){
		$this->writermodel = new WriterModel( );
		$this->writermodel->writerInfoDel($_GET['id'] );
		if($this->writermodel->flag){
			$this->template->set_var('notice',  "<script> alert('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	//删除所选作者信息方法
	public function delCheckedWriter(  ){
		$this->writermodel = new WriterModel( );
		for($i = 0 ; $i < count($_POST['wusername']) ; $i++){
			$wusername =$_POST['wusername'][$i];
			if(!is_null($wusername)){
				$this->writermodel->writerInfoDel($wusername );
			}
		}
		if($this->writermodel->flag){
			$this->template->set_var('notice',  "<script> alert('删除成功！') ;</script>");
		//	header("Location:index.php?controller=admin&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	/* --------------------------------------- 主编管理--------------------------------------------------- */
	
	//编辑作者表中的所有主编信息(用于管理页)
	public function adeditorInfoM(){
		$this->adeditormodel = new AdEditorModel( );
		$allinfo = $this->adeditormodel->getAdeditorInfo($_GET['page'], "index.php?controller=admin&action=adeditormanage&f=adeditorInfoM&page=");
		if($this->adeditormodel->getPflag()){
			$this->template->set_var('rownums', $this->adeditormodel->getRowNum());
			$this->template->set_var('adeditorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->adeditormodel->getPageOffset());
			$this->template->set_var('pagelist', $this->adeditormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	
	//主编添加(初始密码123456 暂时未设置密码生成规则)
	public function adeditorAdd(){
		$this->adeditormodel = new AdEditorModel( );
		$this->adeditormodel->adeditorAdd($_POST['username'],$_POST['name'] ,$_POST['gender'] ,123456,
				$_POST['tele'],$_POST['email'], $_POST['address'] );
		if($this->adeditormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('添加信息失败!');</script>");
		}
	}
	
	
	//从编辑表提取一条主编的信息(查看详细信息)
	public function oneAdeditorInfo( ){
		$this->adeditormodel = new AdEditorModel( );
		$oneinfo = $this->adeditormodel->selectAdeditor($_GET['id']);
		if($this->adeditormodel->getPflag()){
			$this->template->set_var('adeditorinfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//主编信息修改
	public function adeditorModify(){
		$this->adeditormodel = new AdEditorModel( );
		$this->adeditormodel->modifyInfo($_GET['id'],$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'],
				$_POST['email'], $_POST['address'] );
		if($this->adeditormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
		}
	}
	
	//删除一个主编信息方法
	public function adeditorDel(  ){
		$this->adeditormodel = new AdEditorModel( );
		$this->adeditormodel->editorInfoDel($_GET['id'] );
		if($this->adeditormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=adeditormanage&f=adeditorInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	//删除所选主编信息方法
	public function delCheckedAdeditor(  ){
		$this->adeditormodel = new AdEditorModel( );
		for($i = 0 ; $i < count($_POST['edusername']) ; $i++){
			$edusername =$_POST['edusername'][$i];
			if(!is_null($edusername)){
				$this->adeditormodel->editorInfoDel($edusername);
			}
		}
		if($this->adeditormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert(('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=adeditormanage&f=adeditorInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	//数据库备份
	public function adminBackup(){
		$this->adminmodel->backup();
		if($this->adminmodel->flag){
			$this->template->set_var('notice',  "<script> alert('备份成功!');</script>");
			//header("Location:index.php?controller=admin&action=dbbackup");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('备份失败!');</script>");
		}
	}
	
	//返回稿件信息表中的所有信息(查询页)
	public function paperInfoShow(){
		$url="index.php?controller=admin&action=paperquery&f=paperInfoShow";
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
	
	//返回稿件信息表中的所有信息(查询页)
	public function paperInfoM(){
		$url="index.php?controller=admin&action=paperinfoM&f=paperInfoM&page=";
		$this->papermodel= new PaperModel();
		$result = $this->papermodel->getAllinfo($_GET['page'], $url, '1=1');
		if($this->papermodel->flag){
			$this->template->set_var('paperinfo', $result);
			$this->template->set_var('rownums', $this->papermodel ->getRowNum());
			$this->template->set_var('pageoffset', $this->papermodel->getPageOffset());
			$this->template->set_var('pagelist', $this->papermodel->getPagelist());
		} else {
			$this->template->set_var('notice','failed');
		}
	}
	
	public function paperDetailInfoShow(){
		$this->papermodel= new PaperModel();
		$result=$this->papermodel->paperDetailInfoGet($_GET['id']);
		//var_dump($result);
		if($this->papermodel->flag){
			$this->template->set_var('paperinfo', $result);
			$this->template->set_var('page', $_GET['page']);
		} else {
			$this->template->set_var('notice','��Ϣ����ʧ��');
	//		header("Location:index.php?controller=admin&action=promptinfo");
		}
	}
	
	//删除所选稿件信息方法
	public function delCheckedPaper(  ){
		$this->papermodel = new PaperModel( );
		for($i = 0 ; $i < count($_POST['paperid']) ; $i++){
			$paperid =$_POST['paperid'][$i];
			if(!is_null($paperid)){
				$this->papermodel->paperInfoDel($paperid);
			}
		}
		if($this->papermodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert(('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=paperinfoM&f=adeditorInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	//删除稿件信息方法
	public function delPaperInfo(  ){
		$this->papermodel = new PaperModel( );
		$paperid =$_GET['id'];
		if(!is_null($paperid)){
			$this->papermodel->paperInfoDel($paperid);
		}
		if($this->papermodel->flag){
			$this->template->set_var('notice',  "<script> alert(('删除成功！') ;</script>");
			header("Location:index.php?controller=admin&action=paperinfoM&f=adeditorInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('删除失败!');</script>");
		}
	}
	
	
	//显示个人信息方法
	public function showPersonalInfo( ){
		$this->adminmodel= new AdminModel( );
		$row = $this->adminmodel->showPersonalInfo($_SESSION['cur_username']);
		if($this->adminmodel->flag){
			$this->template->set_var('admininfo', $row);
		}
		else{
			$this->template->set_var('notice','fail');
		}
	}
	
	//个人信息修改
	public function AdminUpdate(){
		$this->adminmodel->modifyInfo($_SESSION['cur_username'] ,$_POST['name'] ,$_POST['gender'] , $_POST['userpassword2'], $_POST['tele'], $_POST['email'], $_POST['address'], $_POST['major'] , $_POST['school'] );
		if($this->adminmodel->flag){
			$this->template->set_var('notice', '信息更新成功');
		}
		else{
			$this->template->set_var('notice','信息更新失败');
		}
	}
	
	public function logout(){
		session_destroy( $_SESSION['cur_username']);
		header("Location: index.php");
	}
}
