<form action="index.php?controller=adeditor&action=fundinfoinsert&f=fundInfoInsert" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>增加基金信息</span>
</caption>
<tr >
	<td width=110px class= "subtitle">基金编号</td>
	<td width=450px>&nbsp;&nbsp;<input type="text"  value="" name="fundid" class="inputxt Validform_error" datatype="n3-3"  nullmsg="请输入基金编码！" errormsg="请输入由3位数字组成的编号！">
	</td>
	<td><div class="Validform_checktip ">编号由3位数字组成！</div></td>
  </tr>
  
  <tr >
    <td  class= "subtitle"> 基金名称 </td >
    <td>&nbsp;&nbsp;<input type="text"  value="" name="fundname" class="inputxt Validform_error" datatype="*1-20"  nullmsg="请输入基金名称！" errormsg="学院名称太长！">
	<td><div class="Validform_checktip">名称小于20个字符</div></td>
  </tr >
  <tr >
    <td  class= "subtitle"> 基金种类 </td >
    <td>&nbsp;&nbsp;<input type="text"   value="" name="fundcategory" class="inputxt Validform_error" datatype="*1-20"  nullmsg="请输入基金名称！" errormsg="学院名称太长！">
	<td><div class="Validform_checktip">名称小于20个字符</div></td>
  </tr >
   <tr>
    <td colspan=3 > 
    	<div class="buttonarea">
    		 <button type='submit' >
			 <a>提交</a> 
			 </button>
    		 <button type='button' >
			 <a href='index.php?controller=adeditor&action=fundmanage&f=fundInfoShow'> 返回 </a>
			 </button>
    	</div>
    	
    </td >
  </tr>
</table>
</form>

<?php  if(isset($notice)){
	echo $notice;
}?>


