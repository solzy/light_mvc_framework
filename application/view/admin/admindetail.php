
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>个人信息查看</span>
  </caption>
  <tr>
    <td width=110px class= "subtitle">姓名</td>
    <td width=590px >&nbsp;<?php echo $admininfo["name"];?></td>
  </tr>
    <tr>
    <td class= "subtitle">用户名</td >
    <td >&nbsp;<?php echo $admininfo['adusername'];?></td >
  </tr>
  <tr >
    <td class= "subtitle"> 电话</td >
    <td > &nbsp;<?php echo $admininfo['tel'];?> </td >
  </tr>
  <tr >
    <td  class= "subtitle">性别</td >
    <td >&nbsp;<?php echo $admininfo['sex'];?></td >
  </tr >
  <tr >
    <td class= "subtitle">邮箱</td >
    <td >&nbsp;<?php echo $admininfo['mail'];?></td >
  </tr>
  <tr >
    <td class= "subtitle">住址</td >
    <td >&nbsp;<?php echo $admininfo['address'];?></td >
  </tr>
</table>

