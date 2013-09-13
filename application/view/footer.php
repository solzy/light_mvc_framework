</div>
<!------ display login layer by jquery ------->
	
	<div class="blockUI blockOverlay" title="单击关闭"> </div>
	<div class="blockUI blockMsg blockPage" title="单击关闭">
	<div class="loginform">
	<form  action="index.php?controller=home&f=login" method="post">
		<table  width=293xp style="table-layout:fixed; margin:6px 0px 0px 45px;">	
			<tr height = 20px>
			<td style="width:40px;"></td>
			<td style="width:180px;"> <div class="close"> 关闭</div>
			</td>
			</tr>
		<tr>
		<td colspan=2 >
			<table width=100% >
			<tr height=28px>
				<td style="font:25px; text-indent: 80px; font-family: "微软雅黑", "宋体";text-decoration: underline;"> 网络学刊登录</td>
			</tr>
			</table>
		</tr>
		<tr height=35px style="display: none;" id="editorsort">
			<td   style="width:40px; font-size:13px"> 类别：</td>
			<td style="width:180px;">
				<table width=100%>
				<tr><td  align="center" style="width:70px;" colspan=2>
					<input  type="radio" value="4" name="editor"  /><label >主编</label>		
				
					<input  type="radio" value="2" name="editor"  /><label >编辑</label>
				</td>
				</table>	
			</td>
		</tr>
		<tr height=35px>
			<td   style="width:40px; font-size:13px">用户名：</td>
			<td style="width:180px;">
				<input type="text" value="" name="username"  id="username" class="inputxt " />
			</td>
		</tr>
		<tr>
			<td style="font-size:13px;">密码：</td>
			<td><input type="password" value="" name="password" id="password" class="inputxt " /></td>
		</tr>
		<tr >
			<td   style="font-size:13px;">验证码：</td>
			<td >
			<table width=100%>
			<tr><td style="width:70px;">
				<input type="text" value="" name="authcode" class="inputverify inputxt" />			
			</td>
			<td class="authcodegra">
				<img src="application/common/authcode.php" alt="看不清楚？" onclick = "this.src='application/common/authcode.php?'"  />
			</td>
			</table>		
			</td>
		</tr>
	   <tr>
			<td colspan=2 height=35px>
			<table width=100% >
			<tr >
				<td  style="margin:0px 0px 0px 70px; width:100px;"><input id="submit" type="submit" value="登 录" /></td>
				<td   style=" margin:0px 25px 0px 30px "><a id="register" style="display: none; font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif;" href="index.php?controller=home&action=register" > 注册 </a></td>
				<td style="margin:0px 15px 0px 15px "><a style=" font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif; "href="#" > 忘记密码 </a></td>
			</tr>
			</td>
			</table>
		</tr>
		</table>
		<input type="hidden" name="userflags" id="userflags" value=""/>
	</form>	
	</div>
<!-- --------------------------------------------------- -->

</div>
<div class="clear" > </div>

<div class="footer">
			<div class="center">
				
				<p>
                    &nbsp;版权所有：大连工业大学研究生院</p>
				<p>
                    &nbsp;联系我们: 大连工业大学研究生院</p>
			</div>
		</div>
		<!-------footer-------------->
	</div>
</body>
</html>
