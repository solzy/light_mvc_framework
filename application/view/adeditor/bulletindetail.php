
<table  cellpadding="0" cellspacing="0" class="bulletin" >
<caption  class = "title" >
<span>公告预览</span>
</caption>
    <tr>
    <td style=" text-align:center;" ><p ><strong><?php echo $bulletininfo[0]['subject'];?> </strong></p></td>
  </tr> 
  <tr>
    <td style=" text-align:right;"><p style="padding-right:150px; "><?php echo $bulletininfo[0]['date'];?> </p></td>
  </tr >
  <tr >
    <td style=" text-align:right;"><p style="padding-right:150px; "><?php echo $bulletininfo[0]['edusername'];?></p></td>
  </tr >
  <tr>
    <td style="text-align:center;"><textarea  style="background-color:white; border:0px;"
    cols=10 rows=10  name="content" disabled="disabled"><?php echo $bulletininfo[0]['content'];?>
    </textarea>	</td>
  </tr>
  <tr><td></td></tr>
   <tr>
    <td> 
    	<div class="buttonarea">
    	<button type='button' class='button'>
		 <a href='index.php?controller=adeditor&action=bulletininfoshow&f=bulletinInfoShow'> 确定 </a>
		 </button> &nbsp;&nbsp;
         <button type='button' class='button'>
		 <a href='index.php?controller=adeditor&action=bulletininfoshow&f=bulletinInfoShow'> 返回 </a>
		 </button>
    	</div>
    </td >
  </tr>
</table>

