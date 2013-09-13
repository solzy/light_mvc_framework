<form class="paperstatus" method="">
    <table  cellpadding="0" cellspacing="0" class="showinfo">
        <caption  class = "title" >
            <span> 稿件状态</span>
        </caption>
    	<tbody>
            <tr class="header">
                <!-- <td>&nbsp;#</td> -->
                <td>&nbsp;论文编号</td>
                <td>&nbsp;标题</td>
                <td>&nbsp;投稿日期</td>
                <td>&nbsp;状态</td>
                <td>&nbsp;投稿作者</td>
                <td>&nbsp;操作</td>
            </tr>
            <?php 
                $count = sizeof($paperstatus);

                for ($i = 0; $i < $count; $i++) {
                    echo "<tr>\n";
                        $num = $i+1;
                        //echo "<td>&nbsp;$num</td>\n";
                        echo "<td>&nbsp;";
                            echo $paperstatus[$i]['paperid'];
                        echo "</td>\n";
                        echo "<td>&nbsp;";
                            echo $paperstatus[$i]['cntitle'];
                        echo "</td>\n";
                        echo "<td>&nbsp;";
                            echo $paperstatus[$i]['date'];
                        echo "</td>\n";
                        echo "<td>&nbsp;";
                            echo $paperstatus[$i]['statusname'];
                        echo "</td>\n";
                        echo "<td>&nbsp;";
                            echo $paperstatus[$i]['wusername'];
                        echo "</td>\n";
                        echo "<td>\n";
 /*                           echo "<a href=\"index.php?controller=writer&action=paperRegister&f=paperInfoUpdate&paperid=";
                            echo $paperstatus[$i]['paperid'];
                            echo "\">修改稿件信息</a>\n";
  */
               				echo "<a href=\"index.php?controller=writer&action=paperupload&f=paperFileUpdate&paperid=";
                            echo $paperstatus[$i]['paperid'];
                            echo "\">上传修改稿</a>\n";
                        echo "</td>\n";
                    echo "</tr>\n";
            }?>
         </tbody>
     </table>
 </form>
