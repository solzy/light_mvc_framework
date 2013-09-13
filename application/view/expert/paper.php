
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>稿件审核</span>
  </caption>
  <tr >
  <th width=50px class= "subtitle">序号</th>
    <th width=120px class= "subtitle">稿件编号</th>
    <th width=180px class= "subtitle">稿件题目</th>
    <th width=100px class= "subtitle">日期</th>
     <th width=100px class= "subtitle">稿件状态</th>
      <th width=160px class= "subtitle">操作</th>
     
</tr> 
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		while( $element = each($paperinfo[$k-1])){	
			$value=$element['value'];
			if( $element['key'] == 'paperid'){
				$paperid = 	$element['value'];
			}
			if( $element['key'] == 'paperid' || $element['key'] == 'cntitle' || $element['key'] == 'statusname'  || $element['key'] == 'date'){	
				echo "<td align='center'>".
				"<label>$value </label>".
				"</td>";
			}			
		}
		echo "<td align='center' >
		 	<a href='index.php?controller=expert&action=review&f=paperDetail&id=$paperid'> 审稿</a>&nbsp;
		 	<a href='index.php?controller=expert&action=paper&f=paperDownload&id=$paperid'>下载</a>&nbsp;
		 	 <a href='index.php?controller=expert&action=reference'> 审核参考</a>
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
 <?php  if(isset($notice)){
	echo $notice;
}?>

