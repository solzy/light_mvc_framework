
<link rel="stylesheet"  href="lib/css/jquery.ui.all.css" type="text/css"/>
<script type="text/javascript" src="lib/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="lib/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="lib/js/jquery.ui.widget.js"></script>
<script type="text/javascript">
	$(function() {
		$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});	
	});
</script>
<form action="index.php?controller=adeditor&action=paperquery&f=paperInfoShow" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>稿件查询</span>
  </caption>
 </table>
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr>
        <td>按状态：<select name="statusid">
                <option value="">稿件状态选择</option>
                <option value="0">等待审核</option>
                <option value="1">初审</option>
                <option value="2">专家审核</option>
                <option value="3">修改后采用</option>
                <option value="4">退稿</option>
                <option value="5">修改后再审</option>
                <option value="6">采用</option>

			</select>
    	</td>
        <td>按作者：<input type="text" value="" name="firstauthor" class="inputxt" /></td>
    	</td>
	</tr>
	<tr>
        <td>按日期：<input type="text" value="" name="datefrom" class="inputxt" id="from" />&nbsp; 到 &nbsp;
        <input type="text" value="" name="dateto" class="inputxt" id="to" /></td>
        <td><input type="submit" class="submit" value=查询 /> <label> （当前稿件总数：<?php echo $paperinfo[0]['counts'];?>）</label>
        </td>	
	</tr>

</table>
</form>


<table  cellpadding="0" cellspacing="0" class="showinfo">
    <tr >
    &nbsp;
    </tr> 
    <tr >
          <th width=50px class= "subtitle">序号</th>
          <th width=110px class= "subtitle">稿件编号</th>
          <th width=130px class= "subtitle">稿件名称</th>
          <th width=120px class= "subtitle">作者</th>
          <th width=110px class= "subtitle">投稿日期</th>
          <th width=140px class= "subtitle">所属学院</th>
          <th width=120px class= "subtitle">专业</th>
          <th width=100px class= "subtitle">状态</th>
          <th width=120px class= "subtitle">审回日期</th>
     
    </tr> 
  <?php

	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($paperinfo[$k-1])){	
			$value=$element['value'];
			if($element['key'] == 'counts') continue;
			echo "<td align='center'>".
			"<label>$value </label>".
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
 

