<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>

<title>注册账号</title>
<script src="/js/js.js" type="text/JavaScript"></script>


</head>
<?php
//引入数据库操作文件
require 'conn.php';
//检查判断操作
if(!empty($_GET['username1'])&&!empty($_GET['password'])&&!empty($_GET['email']))
  {
   adduser($database,$_GET['username1'],$_GET['password'],$_GET['email']);//引用添加用户方法
   header("Location: /login.php");   //跳转登录页面
  }
?>
<body style="position: absolute;height: 100%;width: 100%;background-color: #0080FF;">
<form enctype="text/plain" style="background-color: #0080FF;" action="reg.php" method="get">
  <div align="center" style="position: absolute;height:100%;width:100%;TEXT-ALIGN: center;">
  <input type="text" name="username1" placeholder="用户名" size="100" style="position: absolute; height: 30px;width: 90%;top: 10%;right:5%;border-radius:15px ;text-align: center;" />
  </br>
  <input type="password" name="password"placeholder="密码" size="100"style="position: absolute;height: 30px;width: 90%;top: 30%;right: 5%;border-radius:15px ;text-align: center;" />
  </br>
  <input type="password" name="repassword" placeholder="确认密码" size="100"style="position: absolute;height: 30px;width: 90%;top: 50%;right: 5%;border-radius:15px ;text-align: center;" />
  </br>
  <input type="text" name="email"placeholder="邮件" size="100"style="position: absolute;height: 30px;width: 90%;top: 70%;right: 5%;border-radius:15px ;text-align: center;" />
  <input type="submit" value="注册" style="position: absolute;top:90%; width: 90%;height: 40px;right:5%;border-radius:15px ;text-align: center;"/>
  
  

  </div>
</form>

</body>
</html>