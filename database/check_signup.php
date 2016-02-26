<?php
date_default_timezone_set('PRC');
$link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
mysql_query("set names 'utf8'");

$data = $_GET["data"];
$data = stripslashes($data);
$J=json_decode($data,true);
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

$settime=date("Y-m-d H:i:s",mktime());
// proceed username & password
$sql=mysql_query("insert into user(username,email,pwd,settime)values('$username','$email','$password','$settime')");
//echo $username;
//$a=1;
$sql1=mysql_query("select * from user where email='$username'");
if(mysql_num_rows($sql1)>1){
	
	echo "FAILED";
}
 /* echo "<script>alert('用户名已存在！请重新注册');window.location.href='register.php';</script>";*/
//}
else{
   echo "OK";
}
//mysql_free_result($sql);
//mysql_close($link);
//echo "OK";
//echo "FAILED";

?>