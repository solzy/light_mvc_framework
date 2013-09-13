
<form action="index.php?controller=adeditor&action=majorinfoshow&f=majorSelectBy" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr><td width=100px >按学院查询： </td>
	<td width=150px>
	<select class="selectschool" name="school">
	<option value="0">请选择所在学院</option> </select>
	</td>
	<td>  <button type='submit' class='submit'><a herf='#' > 查询 </a></button> 	 </td>	
	</tr>
	<tr><td width=100px >按专业查询： </td>	
	<td width=150px>
	<select class="querymajor" name="major">
	<option value="0"> 请选择所学专业 </option>
	</select></td>
	<td>  <button type='submit' class='submit'><a herf='#' > 查询 </a></button> 	 </td>
	</tr>
</table>
</form>


<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>专业信息列表</span>
  </caption>
  <tr >
  <th width=50px class= "subtitle">序号</th>
    <th width=120px class= "subtitle">专业编号</th>
    <th width=180px class= "subtitle">专业名称</th>
    <th width=180px class= "subtitle">所属学院</th>
 
</tr> 
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($majorinfo[$k-1])){	
			$value=$element['value'];
			if(  $element['key'] == 'majorid')
				$majorid = 	$element['value'];
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
 
