
$(function( ){
			$(".right").Validform({
				tiptype:2,
				datatype:{
					"*6-20": /^[^\s]{6,20}$/,
					"z2-4" : /^[\u4E00-\u9FA5\uf900-\ufa2d]{2,4}$/,
					"username":function(gets,obj,curform,regxp){
						//参数gets是获取到的表单元素值，obj为当前表单元素，curform为当前验证的表单，regxp为内置的一些正则表达式的引用;
						var reg1=/^[\w\.]{4,16}$/,
							reg2=/^[\u4E00-\u9FA5\uf900-\ufa2d]{2,8}$/;
			 
						if(reg1.test(gets)){return true;}
						if(reg2.test(gets)){return true;}
						return false;
			 
						//注意return可以返回true 或 false 或 字符串文字，true表示验证通过，返回字符串表示验证失败，字符串作为错误提示显示，返回false则用errmsg或默认的错误提示;
					}
				}
			});
});

$(document).ready(function(){
		$.ajax({
			type: 'post',
			url:'tmp/cache/majorjson.php',
			dataType: 'json',
			success: function(data){
				for( var i= 0 ; i < data.length ; i++){
					$('.querymajor').append("<option value = "+ data[i]['majorid'] +">"+ data[i]['majorname'] + "</option>");
				}
			},
		});
		$.ajax({
			type: 'post',
			url:'tmp/cache/schooljson.php',
			dataType: 'json',
			success: function(data){
				for( var i= 0 ; i < data.length ; i++){
					$('.selectschool').append("<option value = "+ data[i]['schoolid'] +">"+ data[i]['schoolname'] + "</option>");
				}
			},
		});
		$.ajax({
			type: 'post',
			url:'tmp/cache/fundjson.php',
			dataType: 'json',
			success: function(data){
				for( var i= 0 ; i < data.length ; i++){
					$('.selectfund').append("<option value = "+ data[i]['fundid'] +">"+ data[i]['fundname'] + "</option>");
				}
			},
		});
		$.ajax({
			type: 'post',
			url:'tmp/cache/fieldjson.php',
			dataType:'json',
			success: function(data){
				for( var i = 0 ; i < data.length ; i++){
					$('.selectfield').append("<option value = "+ data[i]['fieldid'] +">"+ data[i]['fieldname'] + "</option>");
				}
			}
		});
		$.ajax({
			type: 'post',
			url:'tmp/cache/statusjson.php',
			dataType: 'json',
			success: function(data){
				for( var i= 0 ; i < data.length ; i++){
					$('.selectstatus').append("<option value = "+ data[i]['statusid'] +">"+ data[i]['statusname'] + "</option>");
				}
			},
		});
		$.ajax({
			type: 'post',
			url:'tmp/cache/expertjson.php',
			dataType: 'json',
			success: function(data){
				for( var i= 0 ; i < data.length ; i++){
					$('.selectexpertbyfield').append("<option value = "+ data[i]['exusername'] +">"+ data[i]['name'] + "</option>");
				}
			},
		});		
		$('.selectschool').change(function(){
			var school = $('.selectschool').val();
			$('.selectmajor option ').remove('.major');
			$.ajax({
				type: 'post',
				url:'tmp/cache/majorjson.php',
				dataType: 'json',
				success: function(data){
					for( var i= 0 ; i < data.length ; i++){
						if(data[i]['majorid'].substring(0 , 4) == school){
				//			alert(data[i]['majorid'].substring(0 , 4) + 'school' + school);
							$('.selectmajor').append("<option class='major' value = "+ data[i]['majorid'] +">"+ data[i]['majorname'] + "</option>");
						}else{
							continue;
						}
							
					}
				},
			});
		});			
});
