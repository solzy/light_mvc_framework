
<form class="registerform"
	action="index.php?controller=writer&action=paperupload&f=paperRegister"
	method="post">
<table  cellpadding="0" cellspacing="0" class="showinfo">
<caption  class = "title" >
<span> 稿件基本信息录入</span>
</caption>
	<tr >
	<td class="need" style="width: 15px;">*</td>
	<td width=110px class= "subtitle"> 中文题目 </td >
	<td width= 450px>&nbsp;&nbsp;<input type="text" value="" name="cntitle"
			class="inputxt Validform_error" datatype="z1-42" nullmsg="请输入中文题目！"
			errormsg="中文题目不多于21个中文字符！"></td>
		<td>
		<div class="Validform_checktip "> </div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">英文题目</td>
		<td>&nbsp;&nbsp;<input type="text" value="" name="entitle"
			class="inputxt Validform_error" datatype="s1-58" nullmsg="请输入英文题目！"
			errormsg="英文题目不能为空！" /></td>
		<td>
		<div class="Validform_checktip "></div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">中文摘要</td>
		<td style="padding-top: 5px;">&nbsp;&nbsp;<textarea  value=""
			name="cnabstract" class=" Validform_error" datatype="*"
			nullmsg="请输入中文摘要信息！" errormsg="中文摘要不能为空！" > </textarea></td>
		<td>
		<div class="Validform_checktip "></div>
		</td>
	</tr>
	<tr>
		<td class="need" >*</td>
		<td class= "subtitle">英文摘要</td>
		<td style="padding-top: 5px;">&nbsp;&nbsp;<textarea value="" name="enabstract"
			class=" Validform_error" datatype="*" errormsg="英文摘要不能为空！"
			nullmsg="请输入英文摘要信息！"></textarea></td>
		<td>
		<div class="Validform_checktip "></div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">中文关键字</td>
		<td>&nbsp;&nbsp;<input type="text" value="" name="cnkey" tip="test"
			class="inputxt Validform_error" datatype="*" nullmsg="请输入中文关键字！"
			 errormsg="关键字不能为空！" ></td>
		<td>
		<div class="Validform_checktip "></div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">英文关键字</td>
		<td>&nbsp;&nbsp;<input type="text" value="" name="enkey" tip="test"
			class="inputxt Validform_error" datatype="*" nullmsg="请输入英文关键字！" 
			errormsg="关键字不能为空！"></td>
		<td>
		<div class="Validform_checktip "> </div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">所属学院</td>
		<td>&nbsp;&nbsp;<select class="selectschool" name="school" datatype="*"
		
		 nullmsg="请选择所在学院！"errormsg="请选择所在学院！">
			<option value="">请选择所在学院</option>
		</select></td>
		<td>
		<div class="Validform_checktip "></div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">所学专业</td>
		<td>&nbsp;&nbsp;<select class="selectmajor" name="major" datatype="*" nullmsg="请选择您所学的专业！"
			errormsg="请选择您所学的专业！">
			<option value="">请选择所学专业</option>
		</select></td>
		<td>
		<div class="Validform_checktip"></div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">所属领域</td>
		<td>&nbsp;&nbsp;<select class="selectfield" name="field" datatype="*" nullmsg="请选择论文所属领域！"
			errormsg="请选择您所学的专业！">
			<option value="">请选择所属领域</option>		
		</select></td>
		<td>
		<div class="Validform_checktip"></div>
		</td>
	</tr>
	<tr>
		<td class="need">*</td>
		<td class= "subtitle">第一作者</td>
		<td>&nbsp;&nbsp;<input type="text" value="" name="firstauthor"
			class="inputxt Validform_error" datatype="*" 
			nullmsg="请输入第一作者姓名！" errormsg="请输入第一作者姓名！"></td>
		<td>
		<div class="Validform_checktip"></div>
		</td>
	</tr>
	<tr>
		<td class="need"></td>
		<td class= "subtitle">第二作者</td>
		<td>&nbsp;&nbsp;<input type="text" value="" name="secondauthor" ignore="ignore"
			class="inputxt Validform_error" datatype="*" 
			nullmsg="请输入第二作者姓名！" errormsg="请输入第二作者姓名！"></td>
		<td>
		<div class="Validform_checktip"></div>
		</td>
	</tr>
	<tr>
		<td class="need"></td>
		<td class= "subtitle">基金信息</td>
		<td>&nbsp;&nbsp;<select class= "selectfund" name="fund" datatype="*" nullmsg="请选择基金！" ignore="ignore"
			errormsg="请选择基金信息！">
			<option value="">请选择基金</option>
			<option value="1">基金</option>			
		</select></td>
		<td>
		<div class="Validform_checktip"></div>
		</td>
	</tr>
  <tr >
    <td colspan=4 > 
    	<div class="buttonarea">
    	<input type="submit" name="submit" value=下一步 /> &nbsp;
    	<input type="reset" name="reset" value=重置 /> 
    	</div>
    </td >
  </tr>
</table>
</form>
