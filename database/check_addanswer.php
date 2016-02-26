<?php

date_default_timezone_set('PRC');
$link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
mysql_query("set names 'utf8'");

$data = $_GET["data"];
$data = stripslashes($data);
$J=json_decode($data,true);

$commentuser = $J["commentuser"];
$content = $J["content"];
$creattime=date("Y-m-d H:i:s",mktime());
$comtitle= $_COOKIE['username'];

$sql=mysql_query("insert into post(title,content,posttime,postuser)values('$title','$content','$posttime','$postuser') ");

	echo "OK";


?>