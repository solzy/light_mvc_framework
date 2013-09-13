

<form action="index.php?controller=admin&action=adeditorupdate&f=adeditorModify&id=<?php echo  $_GET['id'];?>" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>基本信息修改</span>
</caption>
<tr >
	<td width=110px class= "subtitle">姓名</td>
	<td width=450px>&nbsp;&nbsp;<input type="text" ignore="ignore"  value='<?php echo $writerinfo[0]["name"];?>' name="name" class="inputxt Validform_error" datatype="z2-4"  nullmsg="请输入中文名！" errormsg="中文名为2~4个中文字符！">
	</td>
	<td><div class="Validform_checktip ">中文名为2~4个中文字符！</div></td>
  </tr>
  
  <tr >
    <td  class= "subtitle">性别</td >
    <td>&nbsp;&nbsp;<input type="radio" value="1" ignore="ignore" name="gender" id="male" class="pr1" datatype="*" errormsg="请选择性别！"><label for="male">男</label> <input type="radio" value="2" name="gender" id="female" class="pr1"><label for="female">女</label></td>
	<td><div class="Validform_checktip"></div></td>
	</tr>
	
	 <tr>
    <td colspan=3 > 
    	<div class="buttonarea">
    	<input  type="submit" name="submit" value=提交> &nbsp; 
    	<input type="reset" name="reset" value=重置> 
    	</div>
    </td >
 	 </tr>
</table>
</form>

<form action="index.php?controller=admin&action=adeditorupdate&f=adeditorModify&id=<?php echo  $_GET['id'];?>" method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span>联系方式修改</span>
</caption>
	<tr >
    <td width=110px class= "subtitle"> 电话</td >
    <td width=450px >&nbsp;&nbsp;<input type="text" value='<?php echo $writerinfo[0]['tel'];?>' name="tele" class="inputxt Validform_error" ignore="ignore" datatype="m" nullmsg="请填入信息！" errormsg="手机号码错误！"/></td>
	<td><div class="Validform_checktip "></div></td>
  </tr>
	<tr >
    <td class= "subtitle">邮箱</td >
    <td>&nbsp;&nbsp;<input type="text" value='<?php echo $writerinfo[0]['mail'];?>' name="email" class="inputxt Validform_error" datatype="e" ignore="ignore" 	nullmsg=“输入格式：nist@163.com" errormsg="输入错误！">	
	</td>
	<td><div class="Validform_checktip">输入格式：nist@163.com</div></td>
  </tr>
   <tr >
    <td class= "subtitle">住址</td >
   <td>&nbsp;&nbsp;<input type="text" value='<?php echo  $writerinfo[0]['address'];?>' name="address" class="inputxt Validform_error"datatype="*0-15"ignore="ignore" nullmsg="字数小于20个" errormsg="">	
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

<form action="index.php?controller=admin&action=adeditorupdate&f=adeditorModify&id=<?php echo  $_GET['id'];?>" method="post">
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
<?php  if(isset($notice)){
	echo $notice;
}?>

