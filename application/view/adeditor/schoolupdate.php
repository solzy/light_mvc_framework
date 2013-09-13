<form action="index.php?controller=adeditor&action=schoolupdate&f=schoolInfoupdate" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>增加学院信息</span>
</caption>
<tr >
	<td width=110px class= "subtitle">学院编号</td>
	<td width=450px>&nbsp;&nbsp;<input type="text"  value='<?php echo $schoolinfo[0]['schoolid'];?>' name="schoolid" class="inputxt Validform_error" datatype="n4-4"  nullmsg="请输入学院编码！" errormsg="请输入由4位数字组成的编号！">
	</td>
	<td><div class="Validform_checktip ">编号由4位数字组成！</div></td>
  </tr>
  
  <tr >
    <td  class= "subtitle"> 学院名称 </td >
    <td>&nbsp;&nbsp;<input type="text" ignore="ignore"  value='<?php echo $schoolinfo[0]['schoolname'];?>' name="schoolname" class="inputxt Validform_error" datatype="*1-20"  nullmsg="请输入学院名称！" errormsg="学院名称太长！">
	<td><div class="Validform_checktip">名称小于20个字符</div></td>
  </tr >
  
  <tr>
    <td class= "subtitle">学院邮箱</td >
    <td>&nbsp;&nbsp;<input type="text" value='<?php echo $schoolinfo[0]['mail'];?>' name="mail" class="inputxt Validform_error" datatype="e" ignore="ignore" 	nullmsg=“" errormsg="输入错误！">	
	<td><div class="Validform_checktip"></div></td>
  </tr>
   <tr>
    <td colspan=3 > 
    	<div class="buttonarea">
    		<button type='submit' >
			 <a>提交</a> 
			 </button>
    		 <button type='button' >
			 <a href='index.php?controller=adeditor&action=schoolmanage&f=schoolInfoShow'> 返回 </a>
			 </button>
    	</div>
    </td >
  </tr>
</table>
<input type="hidden" value='<?php echo $_GET['id'] ;?>' name="oldschoolid"/>
</form>

<?php  if(isset($notice)){
	echo $notice;
}
?>


