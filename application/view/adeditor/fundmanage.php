
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>基金信息列表</span>
  </caption>
  <tr >
  <th width=50px class= "subtitle">序号</th>
    <th width=120px class= "subtitle">基金编号</th>
    <th width=160px class= "subtitle">基金名称</th>
     <th width=180px class= "subtitle">基金种类</th>
     <th width=170px class= "subtitle">操作</th>
</tr>
  
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($fundinfo[$k-1])){	
			$value=$element['value'];
			if(  $element['key'] == 'fundid'){
				$fundid= $element['value']+' ';
			}
			echo "<td align='center'>".
			"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable lineinput$i$flag '/>".
			"</td>";
			$flag++;
		}
		echo "<td align='center'>
		 <a href=\"javascript:if(confirm('确实要删除吗?'))location='index.php?controller=adeditor&action=fundinfoshow&f=fundInfoDel&id=$fundid'\"> 删除 </a> &nbsp;
		<a href='index.php?controller=adeditor&action=fundupdate&f=fundDetial&id=$fundid'> 编辑 </a>
		 </td>";
		echo "</tr>";
	}
?>

</table>
<table class="bulletin">
	<tr><td></td></tr>
	<tr><td></td></tr>
   <tr style="text-align: center">
    <td > 
    	<div class="buttonarea1">
    	<button type='button' style="margin: 0px 5px 0px 5px">
		 <a href='index.php?controller=adeditor&action=issueinfoinsert'> 增加一项</a>
		 </button> &nbsp;&nbsp;
         <button type='button' >
		 <a href='index.php?controller=adeditor&action=issueinfoshow&f=issueInfoShow'> 返回首页 </a>
		 </button>
    	</div>
    </td >
  </tr>
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
