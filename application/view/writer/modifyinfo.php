
<form action="index.php?controller=writer&action=promptinfo&f=modifyInfo" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>基本信息修改</span>
</caption>
<tr >
	<td width=110px class= "subtitle">姓名</td>
	<td width=450px>&nbsp;&nbsp;<input type="text" ignore="ignore"  value="" name="name" class="inputxt Validform_error" datatype="*2-15"  nullmsg="请输入中文名！" errormsg="姓名为2~15个字符！">
	</td>
	<td><div class="Validform_checktip ">姓名为2~15个字符！</div></td>
  </tr>
  
  <tr >
    <td  class= "subtitle">性别</td >
    <td>&nbsp;&nbsp;<input type="radio" value="1" ignore="ignore" name="gender" id="male" class="pr1" datatype="*" errormsg="请选择性别！"><label for="male">男</label> <input type="radio" value="2" name="gender" id="female" class="pr1"><label for="female">女</label></td>
	<td><div class="Validform_checktip"></div></td>
  </tr >
  
  <tr>
    <td class= "subtitle">学院</td >
    <td>&nbsp;&nbsp;<select class="selectschool" ignore="ignore" name="school" datatype="*" nullmsg="请选择所在学院！" errormsg="请选择所在学院！">
				<option value="" >请选择所在学院</option>
			</select></td>
	<td><div class="Validform_checktip"></div></td>
  </tr>
  <tr >
    <td class= "subtitle">专业</td >
  	<td>&nbsp;&nbsp;<select class="selectmajor" ignore="ignore"  name="major" datatype="*" nullmsg="请选择您所学的专业！" errormsg="请选择您所学的专业！">
				<option value="" >请选择所学专业</option>
			</select></td>
	<td><div class="Validform_checktip"></div></td>
  </tr>
   <tr >
    <td colspan=3 > 
    	<div class="buttonarea">
    	<input  type="submit" name="submit" value=提交> &nbsp; 
    	<input type="reset" name="reset" value=重置> 
    	</div>
    </td >
  </tr>
 
</table>
</form>

<form action="index.php?controller=writer&action=promptinfo&f=modifyInfo" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>联系方式修改</span>
</caption>
	<tr >
    <td width=110px class= "subtitle"> 手机号码</td >
    <td width=450px >&nbsp;&nbsp;<input type="text" value="" name="tele" class="inputxt Validform_error" ignore="ignore" datatype="m" nullmsg="请填入信息！" errormsg="手机号码错误！"/></td>
	<td><div class="Validform_checktip "></div></td>
  </tr>
	<tr >
    <td class= "subtitle">邮箱</td >
    <td>&nbsp;&nbsp;<input type="text" value="" name="email" class="inputxt Validform_error" datatype="e" ignore="ignore" 	nullmsg=“输入格式：nist@163.com" errormsg="输入错误！">	
	</td>
	<td><div class="Validform_checktip">输入格式：nist@163.com</div></td>
  </tr>
   <tr >
    <td class= "subtitle">住址</td >
   <td>&nbsp;&nbsp;<input type="text" value="" name="address" class="inputxt Validform_error"datatype="*0-15"ignore="ignore" nullmsg="字数小于20个" errormsg="">	
			</td>
	<td><div class="Validform_checktip">字数小于20个</div></td>
  </tr>
  <tr >
    <td colspan=3 > 
    	<div class="buttonarea">
    	<input  type="submit" name="submit" value=提交> &nbsp; 
    	<input type="reset" name="reset" value=重置> 
    	</div>
    </td >
  </tr>
</table>
</form>

<form action="index.php?controller=writer&action=promptinfo&f=modifyInfo" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>密码修改</span>
</caption>
	<tr >
    <td width=110px class= "subtitle"> 新密码</td >
    <td width=450px>&nbsp;&nbsp;<input type="password" value="" name="userpassword" ignore="ignore" class="inputxt Validform_error" datatype="*6-16"  errormsg="密码范围在6~16位之间！" nullmsg="请填入信息！"></td>
     <td><div class="Validform_checktip ">密码范围在6~16位之间</div></td>
  </tr>
	<tr >
    <td class= "subtitle">密码确认</td >
    <td>&nbsp;&nbsp;<input type="password" value="" name="userpassword2" tip="test" ignore="ignore" class="inputxt Validform_error" datatype="*" recheck="userpassword" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！"></td>
     <td><div class="Validform_checktip ">请再输入一次密码！</div></td>
  </tr>
  <tr >
    <td colspan=3 > 
    	<div class="buttonarea">
    	<input  type="submit" name="submit" value=提交> &nbsp; 
    	<input type="reset" name="reset" value=重置> 
    	</div>
    </td >
  </tr>
</table>
</form>
