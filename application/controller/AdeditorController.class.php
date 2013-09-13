<?php
//主编控制类
class AdeditorController extends Controller{
	
	protected $adeditormodel;
	protected $editormodel;
	protected $expertmodel;
	protected $schoolmodel;
	protected $majormodel;
	protected $fundmodel;
	protected $bulletinmodel;
	protected $issuemodel;
	
	function __construct( $model , $controller , $action , $param ){
		parent::__construct($model, $controller, $action, $param);
		$this->adeditormodel = new AdEditorModel();
	}
	
	//返回专业信息表中的所有信息（用于查询页）
	public function majorInfoShow(){
		$this->majormodel = new MajorModel( );
		$allinfo = $this->majormodel->getAllinfo( $_GET['page'] , "index.php?controller=adeditor&action=majorinfoshow&f=majorInfoShow&page=");
		if($this->majormodel->flag){
			$this->template->set_var('rownums', $this->majormodel->getRowNum());
			$this->template->set_var('majorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->majormodel->getPageOffset());
			$this->template->set_var('pagelist', $this->majormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
		
	}
	
	//返回专业信息表中的所有信息（用于管理页）
	public function majorInfoM(){
		$this->majormodel = new MajorModel( );
		$allinfo = $this->majormodel->getAllinfo( $_GET['page'] , "index.php?controller=adeditor&action=majormanage&f=majorInfoM&page=");
		if($this->majormodel->flag){
			$this->template->set_var('rownums', $this->majormodel->getRowNum());
			$this->template->set_var('majorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->majormodel->getPageOffset());
			$this->template->set_var('pagelist', $this->majormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	
	}
	
	//专业信息删除
	public function majorInfoDel(  ){
		$this->majormodel = new MajorModel( );
		$this->majormodel->majorInfoDel( $_GET['id'] );
		if($this->majormodel->flag){
			header("Location:index.php?controller=adeditor&action=majorinfoshow&f=MajorInfoShow");
 			$this->template->set_var('notice',  "<script> alert('信息删除成功!');</script>");		
		}else {
			$this->template->set_var('notice',  "<script> alert('信息删除失败!');</script>");		
		}	
	}
	
	//更新专业信息
	public function majorInfoUpdate( ){
		$this->majormodel = new MajorModel( );
		$this->majormodel->majorInfoUpdate($_POST['oldmajorid'], $_POST['majorid'], $_POST['majorname'],$_POST['schoolid'] );
		if($this->majormodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息更新成功!');</script>");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息更新失败!');</script>");
		}
	}
	
	//根据条件显示专业信息
	public function majorSelectBy(  ){
		$this->majormodel = new MajorModel( );
		$allinfo = $this->majormodel->selectByOrder($_POST['school'], $_POST['major'] , $_GET['page']);
		if($this->majormodel->flag){
			$this->template->set_var('rownums', $this->majormodel->getRowNum());
			$this->template->set_var('majorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->majormodel->getPageOffset());
	//		$this->template->set_var('pagelist', $this->majormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//增加专业信息
	public function majorInfoInsert(){
		$this->majormodel = new MajorModel( );
		$this->majormodel->insertInfo($_POST['majorid'], $_POST['majorname'],$_POST['schoolid']);
		if($this->majormodel->flag){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('专业编号已存在增添信息失败!');</script>");
		}
	}
	
	//根据条件查询某一专业信息
	public function majorDetail(  ){
		$this->majormodel = new MajorModel( );
		$allinfo = $this->majormodel->selectDetial($_GET['id'] );
		if($this->majormodel->flag){
			$this->template->set_var('majorinfo',  $allinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	} 
	
	//显示学院信息表中的所有信息(用于查询页)
	public function schoolInfoShow(){
		$this->schoolmodel = new SchoolModel( );
		$allinfo = $this->schoolmodel ->getAllinfo( $_GET['page'] ,"index.php?controller=adeditor&action=schoolinfoshow&f=schoolInfoShow&page=");
		if($this->schoolmodel ->flag){
			$this->template->set_var('rownums', $this->schoolmodel->getRowNum());
			$this->template->set_var('schoolinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->schoolmodel ->getPageOffset());
			$this->template->set_var('pagelist', $this->schoolmodel ->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//显示学院信息表中的所有信息(用于管理页)
	public function schoolInfoM(){
		$this->schoolmodel = new SchoolModel( );
		$allinfo = $this->schoolmodel ->getAllinfo( $_GET['page'] ,"index.php?controller=adeditor&action=schoolmanage&f=schoolInfoM&page=");
		if($this->schoolmodel ->flag){
			$this->template->set_var('rownums', $this->schoolmodel->getRowNum());
			$this->template->set_var('schoolinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->schoolmodel ->getPageOffset());
			$this->template->set_var('pagelist', $this->schoolmodel ->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//根据条件显示学院信息
	public function schoolSelectBy(  ){
		$this->schoolmodel = new SchoolModel( );
		$allinfo = $this->schoolmodel->selectById( $_POST['school'] ,  $_GET['page']);
		if($this->schoolmodel->flag){
			$this->template->set_var('rownums', $this->schoolmodel->getRowNum());
			$this->template->set_var('schoolinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->schoolmodel->getPageOffset());
		//	$this->template->set_var('pagelist', $this->schoolmodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//根据条件查询一条学院信息
	public function schoolDetail(  ){
		$this->schoolmodel = new SchoolModel( );
		$allinfo = $this->schoolmodel->selectDetail($_GET['id']);
		if($this->schoolmodel->flag){
			$this->template->set_var('schoolinfo',  $allinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//学院信息删除
	public function schoolInfoDel(  ){
			$this->schoolmodel = new SchoolModel( );
		$this->schoolmodel->SchoolInfoDel( $_GET['id'] );
		if($this->schoolmodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息删除成功!');</script>");
			header("Location:index.php?controller=adeditor&action=schoolinfoshow&f=schoolInfoShow");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息删除失败!');</script>");
		}
	}
	
	//更新学院信息
	public function schoolInfoUpdate( ){
		$this->schoolmodel = new SchoolModel( );
		$this->schoolmodel->schoolInfoUpdate($_POST['oldschoolid'], $_POST['schoolid'], $_POST['schoolname'],$_POST['mail'] );
		if($this->schoolmodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息更新成功!');</script>");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息更新失败!');</script>");
		}
	}
	
	//增加学院信息
	public function schoolInfoInsert(){
		$this->schoolmodel = new SchoolModel( );
		$this->schoolmodel->insertInfo($_POST['schoolid'], $_POST['schoolname'],$_POST['email']);
		if($this->schoolmodel->flag){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('专业编号已存在增添信息失败!');</script>");
		}
	}
	
	//显示期刊表中的信息(用于信息查询页)
	public function issueInfoShow(){
		$this->issuemodel = new IssueModel( );
		$allinfo = $this->issuemodel->getAllinfo($curpage , "index.php?controller=adeditor&action=issueinfoshow&f=issueInfoShow&page=");
		if($this->issuemodel->flag){
			$this->template->set_var('rownums', $this->issuemodel->getRowNum());
			$this->template->set_var('issueinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->issuemodel->getPageOffset());
			$this->template->set_var('pagelist', $this->issuemodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//显示期刊表中的信息(用于信息管理页)
	public function issueInfoM(){
		$this->issuemodel = new IssueModel( );
		$allinfo = $this->issuemodel->getAllinfo($curpage , "index.php?controller=adeditor&action=issueinfomanage&f=issueInfoM&page=");
		if($this->issuemodel->flag){
			$this->template->set_var('rownums', $this->issuemodel->getRowNum());
			$this->template->set_var('issueinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->issuemodel->getPageOffset());
			$this->template->set_var('pagelist', $this->issuemodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	
	//根据条件查找某一条期刊信息
	public function issueDetial(  ){
		$this->issuemodel = new IssueModel( );
		$allinfo = $this->issuemodel->selectDetail($_GET['id']);
		if($this->issuemodel->flag){
			$this->template->set_var('issueinfo',  $allinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//期刊信息删除
	public function issueInfoDel(  ){
		$this->issuemodel = new IssueModel( );
		$this->issuemodel->issueInfoDel($_GET['id']);
		if($this->issuemodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息删除成功!');</script>");
			header("Location:index.php?controller=adeditor&action=issuemanage&f=issueInfoM");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息删除失败!');</script>");
		}
	}
	
	
	//增加期刊信息
	public function issueInfoInsert(){
		$this->issuemodel = new IssueModel( );
		$this->issuemodel->insertInfo(  $_POST['year'],  $_POST['pmount']);
		if($this->issuemodel->flag){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('专业编号已存在增添信息失败!');</script>");
		}
	}
	
	//更新基金信息
	public 	function issueInfoUpdate( ){
		$this->issuemodel = new IssueModel( );
		$this->issuemodel->issueInfoUpdate( $_POST['issueid'], $_POST['year'],  $_POST['pmount']);
		if($this->issuemodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息更新成功!');</script>");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息更新失败!');</script>");
		}
	}
	
	//显示基金表中的所有信息
	public function fundInfoShow(){
		$this->fundmodel = new FundModel( );
		$allinfo = $this->fundmodel ->getAllinfo( $_GET['page']);
		if($this->fundmodel ->flag){
			$this->template->set_var('rownums', $this->fundmodel->getRowNum());
			$this->template->set_var('fundinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->fundmodel ->getPageOffset());
			$this->template->set_var('pagelist', $this->fundmodel ->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}	
	}
	
	//根据条件显示基金信息
	public function fundSelectBy(  ){
		$this->fundmodel = new FundModel( );
		$allinfo = $this->fundmodel->selectById( $_POST['fund'] ,  $_GET['page']);
		if($this->fundmodel->flag){
			$this->template->set_var('rownums', $this->fundmodel->getRowNum());
			$this->template->set_var('fundinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->fundmodel->getPageOffset());
	//		$this->template->set_var('pagelist', $this->fundmodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//根据条件查找某一条基金信息
	public function fundDetial(  ){
		$this->fundmodel = new FundModel( );
		$allinfo = $this->fundmodel->selectDetail($_GET['id']);
		if($this->fundmodel->flag){
			$this->template->set_var('fundinfo',  $allinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//增加基金信息
	public function fundInfoInsert(){
		$this->fundmodel = new FundModel( );
		$this->fundmodel->insertInfo($_POST['fundid'], $_POST['fundname'] , $_POST['fundcategory']);
		if($this->fundmodel->flag){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('专业编号已存在增添信息失败!');</script>");
		}
	}
	
	//基金信息删除
	public function fundInfoDel(  ){
		$this->fundmodel = new FundModel( );
		$this->fundmodel->fundInfoDel( $_GET['id'] );
		if($this->fundmodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息删除成功!');</script>");
			header("Location:index.php?controller=adeditor&action=fundinfoshow&f=fundInfoShow");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息删除失败!');</script>");
		}
	}
	
	//更新基金信息
	public 	function fundInfoUpdate( ){
		$this->fundmodel = new FundModel( );
		$this->fundmodel->fundInfoUpdate($_POST['oldfundid'], $_POST['fundid'], $_POST['fundname'],$_POST['fundcategory'] );
		if($this->fundmodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息更新成功!');</script>");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息更新失败!');</script>");
		}
	}
	
	//增加公告信息
	public function bulletinInsert(){
		$this->bulletinmodel = new BulletinModel( );
		$this->bulletinmodel->insertInfo($_POST['subject'], $_POST['date'],$_POST['content'], $_SESSION['cur_username']='currentUser');
		if($this->bulletinmodel->flag){				
			$this->template->set_var('notice',  "<script> alert('添加成功') ;</script>");
			header("Location:index.php?controller=adeditor&action=distbulletin");
		}else{
			$this->template->set_var('notice',  "<script> alert('增添信息失败!');</script>");
		}	
	}
	
	//显示公告表中的所有信息
	public function bulletinInfoShow(){
		$this->bulletinmodel = new BulletinModel( );
		$allinfo = $this->bulletinmodel ->getAllinfo( $_GET['page']);
		if($this->bulletinmodel ->flag){
			$this->template->set_var('rownums', $this->bulletinmodel->getRowNum());
			$this->template->set_var('bulletininfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->bulletinmodel ->getPageOffset());
			$this->template->set_var('pagelist', $this->bulletinmodel ->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//公告信息删除
	public function bulletinDel(  ){
		$this->bulletinmodel = new BulletinModel( );
		$this->bulletinmodel->bulletinInfoDel( $_GET['id'] );
		if($this->bulletinmodel->flag){
			$this->template->set_var('notice',  "<script> alert('信息删除成功!');</script>");
			header("Location:index.php?controller=adeditor&action=bulletininfoshow&f=bulletinInfoShow");
		}else {
			$this->template->set_var('notice',  "<script> alert('信息删除失败!');</script>");
		}
	}
	
	//提取一条公告的信息
	public function bulletinInfo( ){
		$this->bulletinmodel = new BulletinModel( );
		$oneinfo = $this->bulletinmodel->selectById($_GET['id']);
		if($this->bulletinmodel ->flag){
			$this->template->set_var('rownums', $this->bulletinmodel->getRowNum());
			$this->template->set_var('bulletininfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}	
	}
	
	//公告信息更新
	public function bulletinUpdate(){
		$this->bulletinmodel = new BulletinModel( );
		$this->bulletinmodel->bulletinUpdate( $_POST['bulletinid'], $_POST['subject'], $_POST['date'], $_POST['content']);
		if($this->bulletinmodel->flag){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('更新信息失败!');</script>");
		}	
	}
	
	//编辑添加(初始密码123456 暂时未设置密码生成规则)
	public function editorAdd(){
		$this->editormodel = new EditorModel( );
		$this->editormodel->editorRegister($_POST['username'],$_POST['name'] ,  
		$_POST['gender'] , 123456, $_POST['tele'], $_POST['email'], $_POST['address']);
		if($this->editormodel->getPflag()){
			$this->template->set_var('notice',  "<script> alert('添加成功！') ;</script>");
		}else{
			$this->template->set_var('notice',  "<script> alert('添加信息失败!');</script>");
		}	
	}
	
	//提取编辑表中的所有信息用于查询页
	public function editorInfoShow(){
		$this->editormodel = new EditorModel( );
		$allinfo = $this->editormodel->getEditorInfo($_GET['page'],"index.php?controller=adeditor&action=editorinfoshow&f=editorInfoShow&page=");
		if($this->editormodel->getPflag()){
			$this->template->set_var('rownums', $this->editormodel ->getRowNum());
			$this->template->set_var('editorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->editormodel->getPageOffset());
			$this->template->set_var('pagelist', $this->editormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//提取编辑表中的所有信息用于信息管理页
	public function editorInfoM(){
		$this->editormodel = new EditorModel( );
		$allinfo = $this->editormodel->getEditorInfo($_GET['page'] , "index.php?controller=adeditor&action=editormanage&f=editorInfoM&page=");
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
		$this->editormodel = new AdEditorModel( );
		$oneinfo = $this->editormodel-> selectByName($_GET['id']);
		if($this->editormodel->getPflag()){
			$this->template->set_var('editorinfo',  $oneinfo);
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//编辑信息模糊查询
	public function editorSelect( ){
		$this->editormodel = new EditorModel( );
		$allinfo = $this->editormodel->selectByName($_POST['name']);
		if($this->editormodel->getPflag()){
			$this->template->set_var('rownums', $this->editormodel ->getRowNum());
			$this->template->set_var('editorinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->editormodel->getPageOffset());
			$this->template->set_var('pagelist', $this->editormodel->getPagelist());
		}else{
			$this->template->set_var('notice', 'failed');
		}
	}
	
	//编辑个人信息修改
	public function modifyInfo(){
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
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
			header("Location:index.php?controller=adeditor&action=editormanage&f=editorInfoShow");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
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
	
	//提取专家表中的所有信息(用于查询页)
	public function expertInfoShow(){
		$this->expertmodel = new ExpertModel( );
		$allinfo = $this->expertmodel->getAllinfo($_GET['page'], "index.php?controller=adeditor&action=expertinfoshow&f=expertInfoShow&page=");
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
	
	
	//提取专家表中的所有信息(用于管理页)
	public function expertInfoM(){
		$this->expertmodel = new ExpertModel( );
		$allinfo = $this->expertmodel->getAllinfo($_GET['page'], "index.php?controller=adeditor&action=expertmanage&f=expertInfoM&page=");
		if($this->expertmodel->flag){
			$this->template->set_var('rownums', $this->expertmodel ->getRowNum());
			$this->template->set_var('expertinfo',  $allinfo);
			$this->template->set_var('pageoffset',  $this->expertmodel->getPageOffset());
			$this->template->set_var('pagelist', $this->expertmodel->getPagelist());
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
	
	//删除专家信息方法
	public function expertInfoDel(  ){
		$this->expertmodel = new ExpertModel( );
		$this->expertmodel->expertInfoDel($_GET['id'] );
		if($this->expertmodel->flag){
			$this->template->set_var('notice',  "<script> alert('更新成功！') ;</script>");
			header("Location:index.php?controller=adeditor&action=expertmanage&f=expertInfoM");
		}
		else{
			$this->template->set_var('notice',  "<script> alert('添加更新失败!');</script>");
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
	
	//file upload
	public function paperUpload(){
		if ($_FILES["myfile"]["error"] > 0) {
	//		echo "Error: ".$_FILES["myfile"]["error"] . "<br />";
		} else {
	//		echo "Upload: ".$_FILES["myfile"]["name"] . "<br />";
	//		echo "Type: ".$_FILES["myfile"]["type"] . "<br />";
	//		echo "Size: ".($_FILES["myfile"]["size"] / 1024) . " Kb<br />";
	//		echo "Stored in: ".$_FILES["myfile"]["tmp_name"];
		}
		$uploadfile =new UploadFile();
		$uploadfile->upload($_FILES["myfile"]);
	}
	
	//返回稿件信息表中的所有信息(查询页)
	public function paperInfoShow(){
	$url="index.php?controller=adeditor&action=paperquery&f=paperInfoShow";
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
			$this->template->set_var('notice','failed');
		}
	}
	
	public function logout(){
		session_destroy( $_SESSION['cur_username']);
		header("Location: index.php");
	}
	
}
