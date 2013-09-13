<form action="index.php?controller=adeditor&action=fundinfoshow&f=fundSelectBy" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr><td width=150px >&nbsp;<span>按期刊名称查询：</span> </td>
	<td width=180px>
	<input type="text" name="year" value=""  class="inputxt"/>
	</td>
	<td>  <button type='submit' class='submit'><a herf='#' > 查询 </a></button> 	 </td>	
	</tr>

</table>
</form>
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>期刊信息列表</span>
  </caption>
  <tr >
  <th width=70px class= "subtitle">序号</th>
    <th width=200px class= "subtitle">期刊号</th>
    <th width=200px class= "subtitle">稿件数量</th>
</tr>
  
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($issueinfo[$k-1])){	
			$value=$element['value'];
			if(  $element['key'] == 'issueid'){
				continue;
			//	$fundid= $element['value']+' ';
			}
			echo "<td align='center'>".
			"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"</td>";
			$flag++;
		}
		echo "</tr>";
	}
?>
</table>
<table  cellpadding="0" cellspacing="0" class="pagelist">
	<tr><td>
		<?php  echo $pagelist; ?>
 	</td></tr>
 </table>
 
<?php
	 if( isset($notice)){
	 	echo $notice;
	 }
?>

