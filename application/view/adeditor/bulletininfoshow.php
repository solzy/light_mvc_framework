<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>公告信息列表</span>
  </caption>
  <tr >
  <th width=50px class= "subtitle">序号</th>
    <th width=150px class= "subtitle">标题</th>
     <th width=150px class= "subtitle">发表者</th>
    <th width=120px class= "subtitle">日期</th>
     <th width=210px class= "subtitle">操作</th>
</tr>
 <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($bulletininfo[$k-1])){	
			$value=$element['value'];
			if(  $element['key'] == 'bulletinid'){
				$bulletinid = 	$element['value'];
				continue;
			}
	 		if(  $element['key'] == 'content'){
				continue;
			} 
			echo "<td align='center'>".
			"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"</td>";			
			$flag++;
		}
		echo "<td align='center'>
		 <a class='submit' href=\"javascript:if(confirm('确实要删除吗?'))location='index.php?controller=adeditor&action=bulletininfoshow&f=bulletinDel&id=$bulletinid'\"> 删除 </a>
		 <a class='submit' href='index.php?controller=adeditor&action=bulletinupdate&f=bulletinInfo&id=$bulletinid'> 编辑 </a>
		 <a class='submit' href='index.php?controller=adeditor&action=bulletindetail&f=bulletinInfo&id=$bulletinid'> 查看详细</a>
		 </td>";
		echo "</tr>";
	}
?>
</table>
<table  cellpadding="0" cellspacing="0" class="pagelist">
	<tr><td>
		<?php  echo $pagelist; ?>
 	</td></tr>
 </table>