
<form action="index.php?controller=admin&action=dbbackup&f=adminBackup" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
	<caption  class = "title" >
		<span>数据库备份</span>
	</caption>
	<tr >
	<td width= 450px align="center">
		<button type='submit' >
					 <a >数据备份</a> 
		 </button>
	</td>
	<td><div class="Validform_checktip ">备注：</div></td>
	</tr>
</table>
</form>
<?php  if(isset($notice)){
	echo $notice;
}
?>



