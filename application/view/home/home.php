<div class="contr">
	<div class="summary">
		<div class="summaryt"><strong>&nbsp;&nbsp;大连工业大学网络期刊信息平台简介</strong></div>
		<div class="summaryc">
		<img  style="float: left; padding:5px 6px" src="public/images/cover.png"/>
		<p  style="text-indent: 2em;">大连工业大学网络学刊是大连工业大学研究生院在学校领导的支持下创办的校级刊物。学刊致力于提高研究生培养的素质和水平，解决研究生论文撰写困难、不规范和不善于利用论文表述科研观点的问题，
		并随着研究生教育培养模式的变化及时反映研究生的培养状态，从而为研究生教育改革奠定基础。几年来，
		随着研究生招生人数的增加，网络学刊在全校范围内逐渐得到关注，稿件处理工作日益增多。
		传统的手工流程进行稿件处理的方式不再适合网刊编辑，为了提高大连工业大学网络学刊编辑工作效率，
		为硕士研究生提供方便、快捷的学术交流、论文发表的平台，项目组与大连工业大学研究生院领导及网刊编辑沟通，
		确定开发大连工业大学网络学刊项目。</p>
		</div>
	</div>
	<div class="issue">
		<div class="issuet">
			<strong style="float:left;"> &nbsp;&nbsp;期刊浏览</strong>
			<strong  style="float:right;color:green">更多>>&nbsp;</strong >
		</div>
		<div class="issuec">
			<table  cellpadding="0" cellspacing="0"  style="line-height:1.4; border:1px solid #CFCFCF; margin:0px 0px;">
 				 <tr style="line-height:1.3; border-bottom:0px dashed #CFCFCF;">
 				  	<th width=170px  >投稿用户</th>				 	
  					  <th width=340px  >稿件名称</th>
  					  <th width=170px  >投稿日期</th>
 				 </tr>
 				 <?php 
 				 	for( $i = 0 ; $i < 10 ; $i++){
						echo "<tr>\n";
						while( $element = each($paperinfo[$i])){
							if( $element['key'] == 'wusername' || $element['key'] == 'cntitle' || $element['key'] == 'date'){
								$value = $element['value'];
								echo "<td> $value </td>\n";
							}
							else contine;
						} 				 		
						echo "</tr>\n";
 				 	}
 				 
 				 ?>
			</table>
			
		</div>
	</div>
</div>
<div class="cright">
	<div class="bulletind">
		<div class="bulletintop">	
		<strong style="float:left;"> &nbsp;&nbsp;公告</strong>
		<strong  style="float:right;color:green">更多>>&nbsp;</strong >
		</div>
		<div class="bulletinc">
			<ul>
			<?php 
				for( $i=0 ; $i < 8 ; $i++){
					$value ='';
					while( $element = each($bulletininfo[$i])){
						if( $element['key'] == 'subject'  ){
							$value .='&nbsp;◆&nbsp;&nbsp;';
							$value .= $element['value'];
						}
						if(  $element['key'] == 'date' ){
							$value .= "   [ ".$element['value'].' ]';
						}
						else contine;
					}
					if( $value != ''){
						echo"<li> $value</li>\n" 	;
					}
				}
			?>
			</ul>
		</div>
	</div>
	<div class="contact">
		<div class="contactc">
			<span> 电话：&nbsp; 0000-00000000</span></br>
			<span> 手机：&nbsp; 00000000000</span></br>
			<span> 邮箱：&nbsp; 0000-00000000</span></br>
			<span> 地址：&nbsp;大连市甘井子区轻工苑1号</span></br>
			
		</div>
	</div>
</div>

	
