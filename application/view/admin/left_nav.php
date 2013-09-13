
<div  class="left">
<table height="648px" cellspacing=0 cellpadding=0 width="170px" background= public/images/menu_bg.jpg >
  <tr>
    <td valign=top align="left">
      <table cellspacing=0 cellpadding=0 width="100%" >
        <tr height=15px>
          <td></td> </tr></table>
      <table cellspacing=0 cellpadding=0 width="150px" >      
        <tr height=22px>
          <td style="padding-left: 30px" background=public/images/menu_bt.jpg><a class=menuparent onclick=expand(1)
            href=" javascript:void(0); ">稿件管理</a></td></tr>
        <tr height=4px>
          <td></td></tr></table>
      <table id=child1 style="display: block" cellspacing=0 cellpadding=0 width=150px >
        <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild " href="index.php?controller=admin&action=paperquery&f=paperInfoShow"
		 >稿件信息统计</a></td></tr>
        <tr height=20px>
          <td align="center" width=30px><img height=9px src=public/images/menu_icon.gif width=9px></td>
          <td><a class=menuchild  href="index.php?controller=admin&action=paperinfoM&f=paperInfoM"
           >稿件信息管理</a></td></tr>     
         <tr height=4px>
          <td colspan=2></td></tr>
     </table>
      <table cellspacing=0 cellpadding=0 width="150px" >      
        <tr height=22px>
          <td style="padding-left: 30px" background=public/images/menu_bt.jpg><a class=menuparent onclick=expand(2)
            href=" javascript:void(0); ">用户管理</a></td></tr>
        <tr height=4px>
          <td></td></tr></table>
      <table id=child2 style="display: block" cellspacing=0 cellpadding=0 width=150px >
        <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild " href="index.php?controller=admin&action=expertmanage&f=expertInfoM"
		  >专家信息管理</a></td></tr>
		   <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild "  href="index.php?controller=admin&action=writermanage&f=writerInfoM"
		 >作者信息管理</a></td></tr>
		   <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild "  href="index.php?controller=admin&action=editormanage&f=editorInfoM"
		  >编辑信息管理</a></td></tr>
		   <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild "	href="index.php?controller=admin&action=adeditormanage&f=adeditorInfoM"
		  >主编信息管理</a></td></tr>
        <tr height=4px>
          <td colspan=2></td></tr>
     </table>
        <table cellspacing=0 cellpadding=0 width="150px" >      
        <tr height=22px>
          <td style="padding-left: 30px" background=public/images/menu_bt.jpg><a class=menuparent onclick=expand(3)
            href=" javascript:void(0); ">数据管理</a></td></tr>
        <tr height=4px>
          <td></td></tr></table>
      <table id=child3 style="display: block" cellspacing=0 cellpadding=0 width=150px >
        <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild "  href="index.php?controller=admin&action=dbbackup"
		  >数据库备份</a></td></tr>
       <tr height=4px>
          <td colspan=2></td></tr>
     </table>
       <table cellspacing=0 cellpadding=0 width="150px" >      
        <tr height=22px>
          <td style="padding-left: 30px" background=public/images/menu_bt.jpg><a class=menuparent onclick=expand(4)
            href=" javascript:void(0); ">个人信息管理</a></td></tr>
        <tr height=4px>
          <td></td></tr></table>
      <table id=child4 style="display: block" cellspacing=0 cellpadding=0 width=150px >
        <tr height=20px>
          <td align="center"width=30px><img height=9px src="public/images/menu_icon.gif " width=9px></td>
          <td ><a class="menuchild " href="index.php?controller=admin&action=admindetail&f=showPersonalInfo"
		  >查看个人信息</a></td></tr>
        <tr height=20px>
          <td align="center" width=30px><img height=9px src=public/images/menu_icon.gif width=9px></td>
          <td><a class=menuchild   href="index.php?controller=admin&action=adminupdate"
            >修改个人信息</a></td></tr>
         <tr height=4px>
          <td colspan=2></td></tr>
     </table>
     <table id=child0 style="display: block" cellspacing=0 cellpadding=0 width=150px>  
        <tr height=20>
          <td align=center width=30px><img height=9 src=public/images/menu_icon.gif width=9px></td>
          <td><a class=menuchild 
            href="javascript:if(confirm('确实要退出系统吗?'))location='index.php?controller=admin&f=logout'"
            target=main>退出系统</a></td></tr>
	</table>
		</td>
		    <td width=1px bgcolor=#d1e6f7></td>
		</tr>
	</table>
</div>
<div class="right" >
<table  cellpadding="0" cellspacing="0" class="subbanner">
<tr >
	<td width=690px class= "">&nbsp;&nbsp;欢迎您：&nbsp; <?php echo $_SESSION['cur_username'];?>！</td>
	<td >今天是：&nbsp;&nbsp;<?php echo date("Y-m-d");?>
	</td>
  </tr>
 </table>
