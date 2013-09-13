<form action="index.php?controller=expert&action=review&f=paperReview" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>稿件审核</span>
  </caption>
 <tr>
 	<td  width=80px class= "subtitle">题目</td>
 	<td>&nbsp;&nbsp;<?php echo $paperinfo[0]['cntitle'] ;?></td>	
 </tr> 
  <tr>
 	<td colspan=2 >
 	<p>尊敬的<?php echo $paperinfo[0]['expert'];?>教授：</p>
    	<p style=" text-indent:2em;">兹送上稿件一份，请您按照学术类核心期刊的标准进行评审并将具体意见写在本审稿单中。
    请您于<?php echo $paperinfo[0]['enddate'];?>前审毕并回复至网络学刊电子邮箱。</p>
   <p style=" text-indent:2em;"> 此致</p>
	<p >敬礼！</p>      
	<p style=" text-indent:30em;">大连工业大学研究生网络学刊编辑部</p>
	<p style=" text-indent:34em;">日期：<?php echo date("Y-m-d");?></p></td>
 </tr> 
 <tr>
 	<td  width=80px class= "subtitle">处理意见</td>
 	<td>&nbsp;&nbsp;
 		<input type="radio" value="6" name="status" ><label >1.采用</label>&nbsp;&nbsp;
 		<input type="radio" value="3" name="status" ><label >2.修改后采用</label>&nbsp;&nbsp;
 		<input type="radio" value="5" name="status" ><label >3.修改后再审</label>&nbsp;&nbsp;
 		<input type="radio" value="4" name="status" ><label >4.不采用</label>
 	 </td>
 </tr>
 <tr>
 	<td  width=80px class= "subtitle">具体意见</td>
 	<td style="padding-top: 5px;">&nbsp;&nbsp;<textarea  style="width:600px; height:250px;"value=""
	name="comment" class=" Validform_error" datatype="*" 
	 > </textarea></td>
 </tr>
 </table>
 <input type="hidden" value='<?php echo  $_GET['id'];?>' name='paperid'/> 
  <input type="hidden" value='<?php echo $_SESSION['cur_username'];?>' name='exusername'/> 
<table class="bulletin">
	<tr><td></td></tr>
	<tr><td></td></tr>
   <tr style="text-align: center">
    <td > 
    	<button type='submit' style="margin: 0px 5px 0px 5px">
		 <a>  提交</a>
		 </button> &nbsp;&nbsp;
    	<button type='button' style="margin: 0px 5px 0px 5px">
		 <a href='index.php?controller=expert&action=paper&f=paperInfoM'> 返回</a>
		 </button> &nbsp;&nbsp;
    </td >
  </tr>
</table>
</form>
 <?php  if(isset($notice)){
	echo $notice;
}?>