<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>

<title>登录</title>
<script src="/js/js.js" type="text/JavaScript"></script>

<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body style="position: absolute;height: 100%;width: 100%;background-color: #0080FF;">
  <?php
  //引入数据库文件
  require 'conn.php';
  //验证用户名和密码
  
  if(!empty($_GET['name2'])&&!empty($_GET['password2']))
  {
  if(checkuser($database,$_GET['name2'],$_GET['password2']))
  {
    //进行session 创建
    session_start();
    $_SESSION['username']=$_GET['name2'];
    header("Location: /index.php"); 
  }
  else{
   echo '不存在此用户或者密码错误，请返回重新登录';
   exit();
  }
  }
  
  ?>
<form enctype="text/plain" style="background-color: #0080FF;" action="login.php" method="GET">
  <div align="center" style="position: absolute;height:100%;width:100%;TEXT-ALIGN: center;">
  <input  type="text" name= "name2" placeholder="用户名" size="100" style="position: absolute; height: 30px;width: 90%;top: 10%;right:5%;border-radius:15px ;text-align: center;" />
  </br>
  <input type="password" name="password2" placeholder="密码" size="100"style="position: absolute;height: 30px;width: 90%;top: 30%;right: 5%;border-radius:15px ;text-align: center;" />
  </br>
  <input type="submit" value="登录" style="position: absolute;top:50%; width: 90%;height: 40px;right:5%;border-radius:15px ;text-align: center;"/>
  
  

  </div>
</form>

<button style="position: absolute;top:70%; width: 90%;height: 40px;right:5%;border-radius:15px ;">忘记密码</button>
<button onClick="toreg()"  style="position: absolute;top:90%; width: 90%;height: 40px;right:5%;border-radius:15px ;" >没有帐号？来注册呀</button>

</body>
</html>
