
<form action="index.php?controller=admin&f=delCheckedWriter" method="post"> 
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>作者信息管理</span>
  </caption>
  <tr > 
   <th width=30px class= "subtitle">序号</th>
  <th width=70px class= "subtitle"><a onClick='checkall()'>全选</a>/<a onclick="recheck()">反选</a></th>
    <th width=90px class= "subtitle">用户名</th>
    <th width=90px class= "subtitle">姓名</th>
    <th width=130px class= "subtitle">电话</th>
     <th width=160px class= "subtitle">邮箱</th>
      <th width=150px class= "subtitle">操作</th>  
</tr> 
  <?php
	for( $k=1, $i=$pageoffset+1;$i <= $pageoffset+$rownums ; $i++ ,$k++){
		echo "<tr id='$i'>";
		echo "<td align='center'> $i</td>";
		$flag = 1;
		while( $element = each($writerinfo[$k-1])){	
			if( $element['key'] == 'wusername' || $element['key'] == 'name' || $element['key'] == 'tel' || $element['key'] == 'mail'){
				$value=$element['value'];
				if( $element['key'] == 'wusername'){
					$wusername = 	$element['value'];
					echo "<td align='center'>".
							"<input type='checkbox' name='wusername[]'  value='$value'  />".
							"</td>";
				}
				echo "<td align='center'>".
				"<label>$value</label>".
				"</td>";			
				$flag++;
			}
		}
		echo "<td align='center' >
		 	<a href=\"javascript:if(confirm('确实要删除吗?'))location='index.php?controller=admin&action=writermanage&f=writerInfoDel&id=$wusername'\"> 删除</a>&nbsp;
		 	<a href='index.php?controller=admin&action=writerupdate&f=oneWriterInfo&id=$wusername'>编辑</a>&nbsp;
		 	 <a href='index.php?controller=admin&action=writerdetail&f=oneWriterInfo&id=$wusername'> 查看详细</a>
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
    	<button type='submit' style="margin: 0px 5px 0px 5px">
		 <a  onclick="javascript:return confirm_del()">  删除所选</a>
		 </button> &nbsp;&nbsp;
    	<button type='button' style="margin: 0px 5px 0px 5px">
		 <a href='index.php?controller=admin&action=writeradd'> 增加一项</a>
		 </button> &nbsp;&nbsp;
         <button type='button' >
		 <a href='index.php?controller=admin&action=writermanage&f=writerInfoM'> 返回首页 </a>
		 </button>
    </td >
  </tr>
</table>
</form>
<table  cellpadding="0" cellspacing="0" class="pagelist">
	<tr><td>
		<?php  echo $pagelist;  ?>
 	</td></tr>
 </table>
 <?php  if(isset($notice)){
	echo $notice;
}?>

