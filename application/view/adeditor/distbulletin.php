
<form class="bulletin" action="index.php?controller=adeditor&action=distbulletin&f=bulletinInsert" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>公告发布</span>
</caption>

    <tr >
    <td width=80px  class= "subtitle"> 主题</td >
    <td>&nbsp;&nbsp;<input type="text"  value='' name="subject" class="inputxt Validform_error" datatype="*1-20"  nullmsg="请输入学院名称！" errormsg="学院名称太长！">
	<td><div class="Validform_checktip">名称小于20个字符</div></td>
  </tr >
   <tr >
    <td width=80px  class= "subtitle"> 日期</td >
    <td>&nbsp;&nbsp;<input type="text"  value=<?php echo date("Y-m-d");?> name="date" class="inputxt Validform_error" datatype="*"  nullmsg="请输入发布日期！" errormsg="学院名称太长！">
	<td><div class="Validform_checktip">格式：Y-m-d</div></td>
  </tr >
  
  <tr>
    <td class= "subtitle">内容</td >
    <td>&nbsp;&nbsp;<textarea  style="overflow-y: scroll;"cols=10 rows=10 type="text" value="" name="content" class="textarea Validform_error" datatype="*" 	nullmsg=“" errormsg="输入错误！">
    </textarea>	
	<td><div class="Validform_checktip"></div></td>
  </tr>
   <tr>
    <td colspan=3 > 
    	<div class="buttonarea">
    		<input  type="submit" name="submit" value=提交> &nbsp; 
    		<input type="reset" name="reset" value=重置> 
    	</div>
    </td >
  </tr>
</table>
</form>
<?php  
if(isset($notice)) echo $notice;
?>
