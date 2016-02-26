<?php
date_default_timezone_set('PRC');
$link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
mysql_query("set names 'utf8'");

$data = $_GET["data"];
$data = stripslashes($data);
$J=json_decode($data,true);
#$username = $J->"email";
#$password = $J->"password";
$email = $J["email"];
$password = $J["password"];
$length=strlen($email);
$username="";
$i=0;

while ($i<=$length && $email[$i]!="@")
{
	
	$username=$username.$email[$i];
	$i=$i+1;
}
// proceed username & password
$sql=mysql_query("select userid from user where email='$email' and pwd='$password'");

if(mysql_num_rows($sql)>0)
{
	setcookie("username",$username,time()+3600);
	/*echo "<script>alert('登录成功');window.location.href='main.php';</script>";*/
	echo "OK";
	//echo $_COOKIE['username'];
	//setcookie("visittime",date("y-m-d H:i:s"),time()+60*10);
	exit();	
}
else
{
	echo "FAILED";
	/*echo "<script>alert('登录失败，用户名或密码错误');window.location.href='login.php';</script>";*/
	
}

?>


