
<form class="bulletin" action="index.php?controller=adeditor&action=bulletinupdate&f=bulletinUpdate" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>公告发布</span>
</caption>
    <tr >
    <td width=80px  class= "subtitle"> 主题</td >
    <td>&nbsp;&nbsp;<input type="text" name="subject" class="inputxt Validform_error" datatype="*1-20" 
     nullmsg="请输入学院名称！" errormsg="学院名称太长！" value=<?php echo $bulletininfo[0]['subject'];?>>
	<td><div class="Validform_checktip">名称小于20个字符</div></td>
  </tr >
   <tr >
    <td width=80px  class= "subtitle"> 日期</td >
    <td>&nbsp;&nbsp;<input type="text"  name="date" class="inputxt Validform_error" datatype="*"  
    nullmsg="请输入发布日期！" errormsg="学院名称太长！" value=<?php echo $bulletininfo[0]['date'];?>>
	<td><div class="Validform_checktip">格式：Y-m-d</div></td>
  </tr >
  
  <tr>
    <td class= "subtitle">内容</td >
    <td>&nbsp;&nbsp;<textarea cols=10 rows=10 name="content" class=" Validform_error" datatype="*" 	nullmsg=“" errormsg="输入错误！">
    <?php echo $bulletininfo[0]['content'];?>
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
<input type="hidden" value=<?php echo $bulletininfo[0]['bulletinid'];?> name="bulletinid"/>
</form>
<?php  
if(isset($notice)) echo $notice;
?>

