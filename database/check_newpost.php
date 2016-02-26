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
$title = $J["title"];
//$tags = $J["tags"];
$content = $J["content"];
$posttime=date("Y-m-d H:i:s",mktime());
$postuser= $_COOKIE['username'];

$sql=mysql_query("insert into post(title,content,posttime,postuser)values('$title','$content','$posttime','$postuser') ");
//$sqll=mysql_query("insert into comment(comtitle)values('$title')");
//$sql1=mysql_query("select postid from post");
//if(mysql_num_rows($sql1)>1){
	echo "OK";
//}else{
//   echo "FAILED";
//}

