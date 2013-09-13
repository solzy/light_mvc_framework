
<form action="index.php?controller=adeditor&action=expertinfoshow&f=expertSelect" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr><td width=100px >查询方式： </td>
	<td width=150px>
	<select  class="expertmethod" name="method" >
	<option value="">请选择查询方式</option>
	<option value="name">姓名</option>
	<option value="exusername">用户名</option>
	<option value="schoolname">所属学院</option>
	<option value="majorname">专业类别</option>
	<option value="fieldname">研究领域</option>
	</select>
	</td>
	<td width=150px>
	<input  class="expertmethodval" type="text" value="" name="value" class="inputxt" /></td>
	<td>  <button type='submit' class='submit'><a herf='#' > 查询 </a></button> 	 </td>	
	</tr>
</table>
</form>


<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>专家信息列表</span>
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
		while( $element = each($expertinfo[$k-1])){
			if( $element['key'] == 'exusername' || $element['key'] == 'name' || $element['key'] == 'tel' || $element['key'] == 'mail'){
				$value=$element['value'];
				if( $element['key'] == 'exusername'){
					$exusername = 	$element['value'];
				}
				echo "<td align='center'>".
				"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
				"</td>";			
				$flag++;
			}
		}
		echo "<td align='center' > 
		<a href='index.php?controller=adeditor&action=expertdetail&f=oneExpertInfo&id=$exusername'> 查看详细</a> 
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
 


