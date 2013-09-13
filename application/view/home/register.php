
<form action="index.php?controller=writer&action=register&f=writeRegisterSheet" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
	<caption  class = "title" >
		<span> 个人信息注册</span>
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
        <td class="need" style="width:10px;">*</td>
      <td class= "subtitle">密码</td>
       <td >&nbsp;&nbsp;<input type="password" value="" name="userpassword" class="inputxt Validform_error" datatype="*6-16"  errormsg="密码范围在6~16位之间！" nullmsg="请填入信息！"></td>
        <td><div class="Validform_checktip ">密码范围在6~16位之间</div></td>
      </tr>
     <tr>
         <td class="need">*</td>
          <td class= "subtitle">密码确认</td>
           <td>&nbsp;&nbsp;<input type="password" value="" name="userpassword2" tip="test" class="inputxt Validform_error" datatype="*" recheck="userpassword" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！"></td>
            <td><div class="Validform_checktip ">请再输入一次密码！</div></td>
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
			<td class="need">*</td>
			<td class= "subtitle">所在学院</td>
			<td>&nbsp;&nbsp;<select class="selectschool" name="school" datatype="*" nullmsg="请选择所在学院！" errormsg="请选择所在学院！">
				<option value="" >请选择所在学院</option>
			</select></td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td class="need">*</td>
			<td class= "subtitle">所学专业</td>
			<td>&nbsp;&nbsp;<select class="selectmajor" name="major" datatype="*" nullmsg="请选择您所学的专业！" errormsg="请选择您所学的专业！">
				<option value="" >请选择所学专业</option>
			</select></td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td class="need"></td>
			<td class= "subtitle" >住址：</td>
			<td>&nbsp;&nbsp;<input type="text" value="" name="address" class="inputxt Validform_error"datatype="*0-15"ignore="ignore" nullmsg="" errormsg="">	
			</td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		 <tr >
  		  <td colspan=4 > 
    			<div class="buttonarea">
    			<input type="submit" name="submit" value=提交 /> &nbsp;
    			<input type="reset" name="reset" value=重置 /> 
    			</div>
 		   </td >
	  </tr>
</table>
</form>
 <?php  if(isset($notice)){
	echo $notice;
}?>
