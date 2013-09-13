
<form action="index.php?controller=editor&action=paperapprove&f=paperListInfoGet&flg=2&paperid=<?php echo $paperinfo["paperid"]; ?>&page=<?php if($page<>''){  echo '&page='.$page; } ?>" method="post">
<table  cellpadding="0" cellspacing="0" class="menu">
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
     <td width=110px class="subtitle">现在状态</td>
     <td width=590px>&nbsp;<?php echo $paperinfo["statusname"]; ?></td>
  </tr>
  <tr>
     <td width=110px class="subtitle">选择新状态</td>
     <td>
         <select class="selectstatus" name="statusid">
   	     </select>
   	</td>
  </tr>
  <tr>
     <td>
    <td><input type="submit" class="submit" value=更改 />
    </td>	
  </tr>

</table>
</form>

 