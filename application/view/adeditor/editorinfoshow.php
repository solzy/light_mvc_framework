
<form action="index.php?controller=adeditor&action=editorinfoshow&f=editorSelect" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr><td width=100px >按姓名查询： </td>
	<td width=150px>
	<input type="text" value="" name="name" class="inputxt" /></td>
	</td>
	<td>  <button type='submit' class='submit'><a herf='#' > 查询 </a></button> 	 </td>	
	</tr>

	</tr>
</table>
</form>


<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>专业信息列表</span>
  </caption>
  <tr >
  <th width=50px class= "subtitle">序号</th>
    <th width=100px class= "subtitle">用户名</th>
    <th width=100px class= "subtitle">姓名</th>
    <th width=160px class= "subtitle">电话</th>
     <th width=180px class= "subtitle">邮箱</th>
      <th width=120px class= "subtitle">操作</th>
     
</tr> 
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($editorinfo[$k-1])){	
			$value=$element['value'];
			if( $element['key'] == 'edusername'){
				$edusername = 	$element['value'];
			}
			if( $element['key'] == 'sex' || $element['key'] == 'address'){
				continue;
			}
			echo "<td align='center'>".
			"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"</td>";			
			$flag++;
		}
		echo "<td align='center' > 
		<a href='index.php?controller=adeditor&action=editordetail&f=editorInfo&id=$edusername'> 查看详细</a> 
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
 

