
<form action="index.php?controller=admin&f=delCheckedExpert" method="post"> 
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>专家信息管理</span>
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
		while( $element = each($expertinfo[$k-1])){	
			if( $element['key'] == 'exusername' || $element['key'] == 'name' || $element['key'] == 'tel' || $element['key'] == 'mail'){
				$value=$element['value'];
				if( $element['key'] == 'exusername'){
					$exusername = 	$element['value'];
					echo "<td align='center'>".
							"<input type='checkbox' name='exusername[]'  value='$value'  />".
							"</td>";
				}
				echo "<td align='center'>".
				//"<input type='text' name='$value'  value='$value'  disabled='disabled'  class='infotable  '/>".
					"<label>$value</label>".
				"</td>";			
				$flag++;
			}
		}
		echo "<td align='center' >
		 	<a href=\"javascript:if(confirm('确实要删除吗?'))location='index.php?controller=admin&action=expertmanage&f=expertInfoDel&id=$exusername'\"> 删除</a>&nbsp;
		 	<a href='index.php?controller=admin&action=expertupdate&f=oneExpertInfo&id=$exusername'>编辑</a>&nbsp;
		 	 <a href='index.php?controller=admin&action=expertdetail&f=oneExpertInfo&id=$exusername'> 查看详细</a>
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
		 <a href='index.php?controller=admin&action=expertinfoadd'> 增加一项</a>
		 </button> &nbsp;&nbsp;
         <button type='button' >
		 <a href='index.php?controller=admin&action=expertmanage&f=expertInfoM'> 返回首页 </a>
		 </button>
    </td >
  </tr>
</table>
</form>
<table  cellpadding="0" cellspacing="0" class="pagelist">
	<tr><td>
		<?php  echo $pagelist; ?>
 	</td></tr>
 </table>
 <?php  if(isset($notice)){
	echo $notice;
}?>

