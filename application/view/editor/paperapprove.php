
<form action="index.php?controller=editor&action=paperapprove&f=paperListInfoGet" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
	<tr>
   		<td>按状态:
             <select class="selectstatus" name="statusid">
                 <option value="">稿件状态:</option>
    	     </select>
        </td>
        <td>
            <input type="submit" class="submit" value=查询 />
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
          <th width=80px class= "subtitle">稿件名称</th>
          <th width=20px class= "subtitle">作者</th>
          <th width=20px class= "subtitle">投稿日期</th>
          <th width=50px class= "subtitle">状态</th>
          <th width=50px class= "subtitle">领域</th>
          <th width=90px class= "subtitle">操作</th>
    </tr> 
  <?php
    $statusid='';
    $paperid='';
    $fieldid='';
    $tmp=$url=array();
    
    $url=parse_url($_SERVER["REQUEST_URI"]);
    $arr = !empty($url['query'] )? explode('&', $url['query'] ) : array();
    if( count( $arr ) > 0 ){
        foreach( $arr as  $value){
	       $tmp = explode('=', $value);
				$arg[$tmp[0]] =  $tmp[1];
        }				
		if( isset( $arg['page']) ){
		  $page=$arg['page'];
		} else {
		  $page='';
		}
    }
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($paperinfo[$k-1])){	
            if($element['key'] == 'statusid') {
                $statusid = $element['value'];
                continue;                 
            }
            if($element['key'] == 'paperid') {
                $paperid = $element['value'];
                continue;                 
            }
            if($element['key'] == 'fieldid') {
                $fieldid = $element['value'];
                continue;                 
            }
            echo "<td align='center'>".
			$value=$element['value'];
	//		"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"<lable>$value</lable>".
			"</td>";			
			$flag++;
		}
		echo "<td align=center > <a href='index.php?controller=editor&action=paperdetail&f=paperDetailInfoShow&paperid=$paperid&page=$page'>查看</a>&nbsp;";
        if($statusid == '0') {
            echo "<a href='index.php?controller=editor&action=expertappoint&f=expertAppoint&paperid=$paperid&fieldid=$fieldid&page=$page'>指派专家</a>&nbsp;";
        } else {
            echo "指派专家&nbsp;";
        }
        echo "<a href='index.php?controller=editor&action=editpaperstatus&f=&f=paperDetailInfoShow&paperid=$paperid&page=$page''>编辑状态</a></td>";
		echo "</tr>";
	}
?>
</table>
<table  cellpadding="0" cellspacing="0" class="pagelist">
	<tr><td>
		<?php  echo $pagelist; ?>
 	</td></tr>
 </table>
 