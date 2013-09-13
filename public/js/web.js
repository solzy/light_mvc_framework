

/***********control login layer************/

 // writer = $('#leftnav').contents().find("#writer");
 // expert = $('#leftnav').contents().find("#expert");
 //editor = $('#leftnav').contents().find("#editor");

writer = $("#writer");
expert = $("#expert");
editor = $("#editor");
$(function(){
	$.blockUI.defaults.css = {};
		$(document).ready(function(){
		writer.live('click' , function(){
			$('#userflags').val("1");
			$('#register').show();
			$('#editorsort').hide();			
			$.blockUI({ message: $(".loginform")});
//			$('.blockOverlay').attr('title','单击关闭').click($.unblockUI); 	
			$('.close').click($.unblockUI);    
		});
		expert.live('click' , function(){
			$('#userflags').val("3");
			$('#editorsort').hide();
			$('#register').remove();
			$.blockUI({ message: $(".loginform")});
			$('.close').click($.unblockUI);    
		});
		editor.live('click' ,function(){
			$('#userflags').val("2");
			$('#editorsort').show();
			$('#register').remove();
			$.blockUI({ message: $(".loginform")});
			$('.close').click($.unblockUI);    
		});
		});
		$('.content .right  .issuec  tr:even').addClass('odd');
});


//$(document).ready(function(){
//	$('#submit').click(function(){
//		if($('#username').val() == ''){
//			alert('用户名不能为空！');
//		}else if($('#password').val() == ''){
//			alert('密码不能为空！');
//		}else if($('.inputverify').val() == ''){
//			alert('验证码不能为空！');
//		}	
//	});
//});


/************导航栏效果***************/
function expand(el){
	
	childObj = document.getElementById("child" + el);
	if (childObj.style.display == 'none')
	{
		childObj.style.display = 'block';
	}
	else
	{
		childObj.style.display = 'none';
	}
	return;
}


// 编辑显示页JS函数
function loadselectschool(){
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
	
}

function checkall(){
	
//    $("input[@type='checkbox']").each(function(){  
//        $(this).attr("checked",true);  
//    }); 
    $("input[type='checkbox']").each(function(){
    	$(this).attr('checked',true);
    });
}

function recheck(){
	$("input[type='checkbox']").each(function(){
		if($(this).attr('checked')){
			$(this).attr('checked',false);
		}else{
			$(this).attr('checked' , true);
		}
	});
}

function confirm_del() {

	var msg = "确实要删除吗?"; 
	if (confirm(msg)==true){ 
		return true; 
	}else{ 
		return false; 
	}
} 


/*//专业信息ＵＰＤＡＴＥ激活button
function activatemajor( line ){
	schoolname=".lineinput"+line+3;
	Obj = document.getElementById(line).getElementsByTagName("input");
	for(var i = 0 ; i < Obj.length ; i++){
		Obj[i].removeAttribute('disabled');
		Obj[i].setAttribute("style" , "border:1px solid black");
		Obj[i].style.background= '#FFE7E7';
	}
	//if($('.submit').attr("disabled")==true)
//	$(".submit").attr("disabled","");
	$(".submit").removeAttr("disabled");
	loadselectschool();
	$(schoolname).replaceWith("<select class='selectschool selectschool"+line+"' name='school' datatype='*'><option value='0'>请选择所在学院</option></select>");
}

//专业信息更新的ajax操作
function majorsubmit(line,oldid){
	schoolid='selectschool'+line;
	majorname = "lineinput"+line+2;
	majorid="lineinput"+line+1;
	 $.ajax({
	   type:"post",
	   url:"index.php?controller=adeditor&f=majorInfoUpdate",
	   data:"oldmajorid="+oldid+"&majorid="+$('.'+majorid).val()+"&majorname="+$('.'+majorname).val()+"&schoolid="+$('.'+schoolid).val(),
	   success:function(msg){
		    input = document.getElementById(line).getElementsByTagName("input");	    
		    for(var i = 0 ; i < input.length ; i++){
		    	input[i].setAttribute("disabled","disabled");
		    	input[i].setAttribute("style" , "border:0px");
		    	input[i].style.background= "white";
		    } 
		    if( msg.search(/update fail!/ig) == -1 ){
		    	location.href="index.php?controller=adeditor&action=majorinfoshow&f=MajorInfoShow";
		    	alert("修改成功！");
		    }else{
		    	alert("编号重复或信息有误！");
		    }
	   },
	   error:function(){
		   alert("编号重复或信息有误！");
	   }
	  });	
}

//学院信息ＵＰＤＡＴＥ激活button
function activateschool( line ){
	Obj = document.getElementById(line).getElementsByTagName("input");
	for(var i = 0 ; i < Obj.length ; i++){
		Obj[i].removeAttribute('disabled');
		Obj[i].setAttribute("style" , "border:1px solid black");
		Obj[i].style.background= '#FFE7E7';
	}
	$(".submit").removeAttr("disabled");	
}

//学院信息更新的ajax操作
function schoolsubmit(line, oldid){
	if(oldid == 0){
		oldid = '0000'; 
	}
	mail="lineinput"+line+3;
	schoolname = "lineinput"+line+2;
	schoolid="lineinput"+line+1;
	 $.ajax({
	   type:"post",
	   url:"index.php?controller=adeditor&f=schoolInfoUpdate",
	   data:"oldschoolid="+oldid+"&schoolid="+$('.'+schoolid).val()+"&schoolname="+$('.'+schoolname).val()+"&mail="+$('.'+mail).val(),
	   success:function(msg){
		    input = document.getElementById(line).getElementsByTagName("input");	    
		    for(var i = 0 ; i < input.length ; i++){
		    	input[i].setAttribute("disabled","disabled");
		    	input[i].setAttribute("style" , "border:0px");
		    	input[i].style.background= "white";
		    } 
		    if( msg.search(/update fail!/ig) == -1 ){
		    	location.href="index.php?controller=adeditor&action=schoolinfoshow&f=schoolInfoShow";
		    	alert("修改成功！");
		    }else{
		    	alert("编号重复或信息有误！");
		    }
	   },
	   error:function(){
		   alert("编号重复或信息有误！");
	   }
	  });	
}

//基金信息ＵＰＤＡＴＥ激活button
function activatefund( line ){
	Obj = document.getElementById(line).getElementsByTagName("input");
	for(var i = 0 ; i < Obj.length ; i++){
		Obj[i].removeAttribute('disabled');
		Obj[i].setAttribute("style" , "border:1px solid black");
		Obj[i].style.background= '#FFE7E7';
	}
	$(".submit").removeAttr("disabled");	
}

//学院信息更新的ajax操作
function fundsubmit(line, oldid){
	if(oldid == 0){
		oldid = '0000'; 
	}
	fundcategory="lineinput"+line+3;
	fundname = "lineinput"+line+2;
	fundid="lineinput"+line+1;
	 $.ajax({
	   type:"post",
	   url:"index.php?controller=adeditor&f=fundInfoUpdate",
	   data:"oldfundid="+oldid+"&fundid="+$('.'+fundid).val()+"&fundname="+$('.'+fundname).val()+"&fundcategory="+$('.'+fundcategory).val(),
	   success:function(msg){
		    input = document.getElementById(line).getElementsByTagName("input");	    
		    for(var i = 0 ; i < input.length ; i++){
		    	input[i].setAttribute("disabled","disabled");
		    	input[i].setAttribute("style" , "border:0px");
		    	input[i].style.background= "white";
		    } 
		    if( msg.search(/update fail!/ig) == -1 ){
		    	location.href="index.php?controller=adeditor&action=fundinfoshow&f=fundInfoShow";
		    	alert("修改成功！");
		    }else{
		    	alert("编号重复或信息有误！");
		    }
	   },
	   error:function(){
		   alert("编号重复或信息有误！");
	   }
	  });	
}*/

