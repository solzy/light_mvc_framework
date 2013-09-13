
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <tr>
     <td width=110px class="subtitle">论文编号</td>
     <td width=590px class="subtitle">中文题目</td>
  </tr>
  <tr>
     <td width=110px>&nbsp;<?php echo $paperinfo["paperid"]; ?></td>
     <td width=590px>&nbsp;<?php echo $paperinfo["cntitle"]; ?></td>
  </tr>
</table>

<table  cellpadding="0" cellspacing="0" class="showinfo">
    <tr >
    &nbsp;
    </tr> 
    <tr >
          <th width=25px class= "subtitle">序号</th>
          <th width=80px class= "subtitle">专家名</th>
          <th width=120px class= "subtitle">学院</th>
          <th width=40px class= "subtitle">在审稿件数</th>
          <th width=40px class= "subtitle">操作</th>
    </tr>
    <tr>
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($expertcntinfo[$k-1])){	
            if($element['key'] == 'exusername') {
                $exusername = $element['value'];
                continue;                 
            }
            echo "<td align='center'>".
			$value=$element['value'];
			"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"</td>";			
			$flag++;
		}
        if($paperinfo["statusid"] == '0') {
            $paperid=$paperinfo["paperid"];
            $fieldid=$paperinfo["fieldid"];
            echo "<td align='center'><a href='index.php?controller=editor&action=expertappoint&f=expertAppoint&paperid=$paperid&fieldid=$fieldid&exusername=$exusername&expage=$page'>指定</a>&nbsp;";
        }
	}

?>
    </tr>
</table>
<table> 
  <tr>

  </tr>
  <tr>
  </tr>
</table>

<form action="index.php?controller=editor&action=paperapprove&f=paperListInfoGet&flg=1&paperid=<?php echo $paperinfo["paperid"]; ?>&page=<?php if($page<>''){  echo '&page='.$page; } ?>" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
 <tr>
    <td align=center>
		<?php  echo "第".$pagelist."页"; ?>
 	</td>
    <td align=center><input type="submit" class="submit" value=返回 />
    </td>	
  </tr>
</table>
</form>

 