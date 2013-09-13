
<form action="index.php?controller=adeditor&action=editoradd&f=editorAdd" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
	<caption  class = "title" >
		<span> 添加编辑信息</span>
	</caption>
	<tr >
	<td class="need" style="width: 15px;">*</td>
	<td width=110px class= "subtitle">姓名 </td >
	<td width= 450px>&nbsp;&nbsp;<input type="text" value="" name="name" class="inputxt Validform_error" datatype="z2-4"  nullmsg="请输入中文名！" errormsg="中文名为2~4个中文字符！">
	</td>
	<td><div class="Validform_checktip ">中文名为2~4个中文字符！</div></td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td  class= "subtitle">电话号码：</td>
		<td>&nbsp;&nbsp;<input type="text" value="" name="tele" class="inputxt Validform_error" datatype="m" nullmsg="请填入信息！" errormsg="手机号码错误！"/></td>
		<td><div class="Validform_checktip "></div></td>
	</tr>
	<tr>
			<td class="need">*</td>
			<td class= "subtitle">用户名</td>
			<td >&nbsp;&nbsp;<input type="text" value="" name="username" class="inputxt Validform_error" datatype="s4-18" nullmsg="请填入信息！" errormsg="用户名最少6个字符,最多18个字符"/>
			</td>
			<td> <div class="Validform_checktip "> 用户名最少4个字符,最多18个字符!</div></td>
	</tr>
       <tr>
				<td class="need">*</td>
				<td class= "subtitle" >性别</td>
				<td>&nbsp;&nbsp;<input type="radio" value="1" name="gender" id="male" class="pr1" datatype="*" errormsg="请选择性别！"><label for="male">男</label> <input type="radio" value="2" name="gender" id="female" class="pr1"><label for="female">女</label></td>
				<td><div class="Validform_checktip"></div></td>
			</tr>
		<tr>
		<tr>
			<td class="need">*</td>
			<td class= "subtitle" >邮箱</td>
			<td>&nbsp;&nbsp;<input type="text" value="" name="email" class="inputxt Validform_error" datatype="e" ignore="ignore" 	nullmsg=“" errormsg="输入错误！">	
			</td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td class="need"></td>
			<td class= "subtitle" >住址：</td>
			<td>&nbsp;&nbsp;<input type="text" value=""  name="address" class="inputxt Validform_error"datatype="*0-15"ignore="ignore" nullmsg="" errormsg="">	
			</td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		 <tr >
  		  <td colspan=4 > 
    			<div class="buttonarea">
    				<button type='submit' >
					 <a>提交</a> 
					 </button>
    		 		<button type='button' >
					 <a href='index.php?controller=adeditor&action=editormanage&f=editorInfoShow'> 返回 </a>
					 </button> 
    			</div>
 		   </td >
	  </tr>
</table>
</form>
<?php  if(isset($notice)){
	echo $notice;
}?>

