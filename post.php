<!doctype html>                                                                      
<html lang="zh">                                                                     
<head>                                                                               
<meta charset="UTF-8">                                                               
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">                       
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>                                                                               
<title>标记提交</title>                                                                  
<script src="http://127.0.0.1/js/js.js"></script>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://webapi.amap.com/maps?v=1.3&key=d3e29720b9c7b676b8b3259a5fbcbf49"></script>
<script src="/js/map.js?v=0.101 " type="text/JavaScript"></script>
<link rel="stylesheet" href="/css/style.css" type="text/css" />                                                                             
</head>
<script type="text/javascript"> 
$('input[id=lefile]').change(function() {  
$('#photoCover').val($(this).val());  
});
$(document).ready(function(){
$("#position").val(lng+','+lat);
});
</script> 
<?php
require 'conn.php';
session_start();
if(empty($_SESSION['username']))
{
	echo '您未登录 请返回登录后再标记';
	exit();	
}
if(!empty($_POST['position'])){
//文件移动操作
$uploaddir = '/home/wwwroot/default/img/';
$uploadfile = $uploaddir . basename($_FILES['imgpath']['name']);
//数据库操作添加
mark($database,$_POST['position'],$uploadfile,$_POST['marktype']);
move_uploaded_file($_FILES['imgpath']['tmp_name'], $uploadfile);

}
?>
<body style="position: absolute;height: 100%;width: 100%;background-color: #0080FF;">
<form enctype="multipart/form-data"  method="POST" action="/post.php">
<div style="text-align: center;position: absolute;height: 100%;width: 100%;background-color: #0080FF;">
<p style="position: absolute;width: 80%;right: 10%;font-size: 20px;" >标记类型：</p>
<br/>
<br/>
<select size="1"  name="marktype" style="position: absolute;position: absolute;width: 80%;right: 10%;height: 50px;border-radius: 15px;top: 10%;">    
	<option value="污染标记">污染标记</option> 
    <option value="发起活动">发起活动</option>    
</select>
<br/>
<div style="top: 20%;position: absolute;text-align: center;width: 80%;right: 10%;">
<p>系统已经自动定位， </p>
<p>请上传活动说明或者污染图片</p>
<p>请刷新页面到下面的输入框中出现经纬度</p>
<input type="text" id="position" name="position" disabled="true" style="border-radius:10px;text-align: center;"value="test"/>
</div>
<br/>
<div style="top:45%;position: absolute;width: 80%;right: 10%;text-align: center;">
<p>请上传图片：</p>
<a  class="a-upload">
<input type="file" accept="image/jpeg" name="imgpath" id="imgpath" style="position: absolute;top:60%;"/>点击这里上传文件
</a>
</div>
<br/>
<input   style="position: absolute;top:60%;width: 80%;right: 10%;height: 30px;border-radius: 15px;" type="submit" value="提交" />
</div>
</form>


</body>
</html>