<?php
//数据库配置文件
//引入框架文件
require  'medoo.php';
//数据库连接
$database = new medoo([
    // 必须配置项
    'database_type' => 'mysql',
    'database_name' => 'mark',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '*****',
    'charset' => 'utf8',
 
    // 可选参数
    'port' => 3306,
]);
//添加用户操作

function adduser($database,$username,$password,$email)
{
	 $adduser= $database->insert("user", [
        "username" => $username,
        "password" => $password,
        "email" => $email
    ]);
}


//验证用户
function checkuser($database,$username,$password){
 $tmpusername=$database->select("user", "username", [
    "password" => $password
]);
	if($tmpusername[0]==$username)
	{
		return 2;
	}
	else{
		return 0;
	}
}


//mark标记操作
function mark($database,$position,$imgpath,$marktype){
	$addmark=$database->insert("mark",[
		"position"=>$position,
		"imgpath"=>$imgpath,
		"type"=>$marktype
	]
		
	);
}

?>
