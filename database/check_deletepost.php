<?php
date_default_timezone_set('PRC');
$link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
mysql_query("set names 'utf8'");

$data = $_GET["data"];
$data = stripslashes($data);
$J=json_decode($data,true);

$postname = $J["postuser"];
$title = $J["posttitle"];

$sql=mysql_query("delete from post where title='$title' and postuser='$postname'");



if ($sql) {
	echo "OK";
}

else 
	echo "FAILED";


?>