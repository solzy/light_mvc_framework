<form action="index.php?controller=adeditor&action=majorupdate&f=majorInfoUpdate" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>增加专业信息</span>
</caption>
<tr >
	<td width=110px class= "subtitle">专业编号</td>
	<td width=450px>&nbsp;&nbsp;<input type="text"  value='<?php echo $majorinfo[0]['majorid']?>' name="majorid" class="inputxt Validform_error" datatype="n6-6"  nullmsg="请输入中文名！" errormsg="请输入由六位数字组成的编号！">
	</td>
	<td><div class="Validform_checktip ">编号由六位数字组成！</div></td>
  </tr>
  
  <tr >
    <td  class= "subtitle"> 专业名称 </td >
    <td>&nbsp;&nbsp;<input type="text" ignore="ignore"  value='<?php echo $majorinfo[0]['majorname']?>' name="majorname" class="inputxt Validform_error" datatype="*1-20"  nullmsg="请输入中文名！" errormsg="请输入由六位数字组成的编号！">
	<td><div class="Validform_checktip">名称小于20个字符</div></td>
  </tr >
  
  <tr>
    <td class= "subtitle">所属学院</td >
    <td>&nbsp;&nbsp;<select class="selectschool" name="schoolid" datatype="*" nullmsg="请选择所在学院！" errormsg="请选择所在学院！">
				<option value="" >请选择所属学院</option>
			</select></td>
	<td><div class="Validform_checktip">默认为空</div></td>
  </tr>
   <tr >
    <td colspan=3 > 
    	<div class="buttonarea">
    		<button type='submit' >
			 <a>提交</a> 
			 </button>
    		 <button type='button' >
			 <a href='index.php?controller=adeditor&action=majormanage&f=majorInfoShow'> 返回 </a>
			 </button> 
    	</div>
    </td >
  </tr>
</table>
<input type="hidden" value='<?php echo $_GET[id]?>' name='oldmajorid'/>
</form>

<?php  if(isset($notice)){
	echo $notice;
}
?>

