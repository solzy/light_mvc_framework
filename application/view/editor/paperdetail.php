
<table  cellpadding="0" cellspacing="0" class="showinfo">
  <caption  class = "title" >
    <span>编辑详细信息</span>
  </caption>
  <tr>
     <td width=110px class="subtitle">论文编号</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["paperid"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">中文题目</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["cntitle"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">英文题目</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["entitle"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">中文摘要</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["cnabstract"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">英文摘要</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["enabstract"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">中文关键字</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["cnkey"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">英文关键字</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["enkey"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">学院</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["schoolname"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">专业</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["majorname"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">领域</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["fieldname"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">第一作者</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["firstauthor"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">第二作者</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["secondauthor"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">基金</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["fundname"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">投稿日期</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["date"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">编辑用户名</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["edusername"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">专家用户名</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["exusername"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">刊期号</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["issueid"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">用户名</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["wusername"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">稿件状态</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["statusname"]; ?></td>
  </tr>
</table>
<form action="index.php?controller=editor&action=paperapprove&f=paperListInfoGet<?php if($page<>''){  echo '&page='.$page; } ?>" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
     <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="submit" value=返回 /></td></tr>

</table>
</form>


