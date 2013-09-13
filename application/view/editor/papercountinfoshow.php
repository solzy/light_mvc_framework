
<form action="index.php?controller=editor&action=papercountinfoshow&f=paperCountInfoShow" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr>
		<td>按学院：<select class="selectschool" name="school">
			<option value="">学院信息</option>
            </select>
        </td>
   		<td>按领域：<select class="selectfield" name="field">
			<option value="">领域信息</option>
            </select>
    	</td>
	</tr>
	<tr>
        <td>按日期：<input type="text" value="" name="date" class="inputxt" />&nbsp;例：20121231
        </td>
        <td><input type="submit" class="submit" value=统计 />
        </td>	
	</tr>

</table>
</form>


<table  cellpadding="0" cellspacing="0" class="showinfo">
    <tr >
    &nbsp;
    </tr> 
    <tr >
          <th width=25px class= "subtitle">序号</th>
          <th width=80px class= "subtitle">学院名称</th>
          <th width=50px class= "subtitle">领域</th>
          <th width=40px class= "subtitle">稿件数</th>
          <th width=150px class= "subtitle">起止时间</th>
    </tr> 
  <?php

	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($papercountinfo[$k-1])){	
			$value=$element['value'];
			echo "<td align='center'>".
		//	"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"<lable> $value </lable>".
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
 

