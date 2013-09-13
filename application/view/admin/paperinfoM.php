
<form action="index.php?controller=admin&f=delCheckedPaper" method="post"> 
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>稿件信息管理</span>
  </caption>
<tr > 
   <th width=30px class= "subtitle">序号</th>
  <th width=70px class= "subtitle"><a onClick='checkall()'>全选</a>/<a onclick="recheck()">反选</a></th>
    <th width=100px class= "subtitle">稿件编号</th>
    <th width=250px class= "subtitle">中文标题</th>
    <th width=90px class= "subtitle">第一作者</th>
     <th width=90px class= "subtitle">投稿日期</th>
      <th width=100px class= "subtitle">操作</th>  
</tr> 
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($paperinfo[$k-1])){	
			if( $element['key'] == 'paperid' || $element['key'] == 'cntitle' || $element['key'] == 'firstauthor' || $element['key'] == 'date'){
				$value=$element['value'];
				if( $element['key'] == 'paperid'){
					
					$paperid = 	$element['value'];
					echo "<td align='center'>".
							"<input type='checkbox' name='paperid[]'  value='$value'  />".
							"</td>";
				}
				echo "<td align='center'>".
			//	"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable  '/>".
				"<label>$value</label>".
				"</td>";			
				$flag++;
			}
		}
		echo "<td align='center' >
		 	<a href=\"javascript:if(confirm('确实要删除吗?'))location='index.php?controller=admin&action=paperinfoM&f=delPaperInfo&id=$paperid'\"> 删除</a>&nbsp;
		 	 <a href='index.php?controller=admin&action=paperdetail&f=paperDetailInfoShow&id=$paperid'> 查看详细</a>
			</td>";
		echo "</tr>";
	}
?>
</table>
<table class="bulletin">
	<tr><td></td></tr>
	<tr><td></td></tr>
   <tr style="text-align: center">
    <td > 
    	<button type='submit' style="margin: 0px 5px 0px 5px">
		 <a  onclick="javascript:return confirm_del()">  删除所选</a>
		 </button> &nbsp;&nbsp;
         <button type='button' >
		 <a href='index.php?controller=admin&action=editormanage&f=editorInfoM'> 返回首页 </a>
		 </button>
    </td >
  </tr>
</table>
</form>
<table  cellpadding="0" cellspacing="0" class="pagelist">
	<tr><td>
		<?php  echo $pagelist; ?>
 	</td></tr>
 </table>
 <?php  if(isset($notice)){
	echo $notice;
}?>

