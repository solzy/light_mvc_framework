<form action="index.php?controller=adeditor&action=issueupdate&f=issueInfoUpdate" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>增加期刊信息</span>
</caption>
  <tr >
    <td  class= "subtitle"> 期刊名称 </td >
    <td>&nbsp;&nbsp;<input type="text"  value='<?php echo $issueinfo[0]['year'];?>' name="year" class="inputxt Validform_error" datatype="n4-4"  nullmsg="请输入期刊名称！" errormsg="期刊名称输入有误！">
	<td><div class="Validform_checktip">年份为期刊名称，如：2021</div></td>
  </tr >
  <tr >
    <td  class= "subtitle"> 稿件数量 </td >
    <td>&nbsp;&nbsp;<input type="text"   value='<?php echo $issueinfo[0]['pmount'];?>' name="pmount" class="inputxt Validform_error" datatype="n1-3"  nullmsg="请输入稿件数量！" errormsg="输入数量超出了需求！">
	<td><div class="Validform_checktip">每期的稿件数</div></td>
  </tr >
   <tr>
    <td colspan=3 > 
    	<div class="buttonarea">
    		 <button type='submit' >
			 <a>提交</a> 
			 </button>
    		 <button type='button' >
			 <a href='index.php?controller=adeditor&action=issuemanage&f=issueInfoShow'> 返回 </a>
			 </button>
    	</div>	
    </td >
  </tr>
</table>
<input type="hidden" value='<?php echo $_GET['id']?>' name='issueid'/>
</form>

<?php  if(isset($notice)){
	echo $notice;
}?>





