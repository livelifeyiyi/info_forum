<?php
date_default_timezone_set('PRC');
$link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
mysql_query("set names 'utf8'");

$data = $_GET["data"];
$data = stripslashes($data);
$J=json_decode($data,true);
$username = $J["username"];
$postuser = $J["postuser"];
$posttitle = $J["posttitle"];

$sql1=mysql_query("select * from bookmarks where posttitle='$posttitle'");
if(mysql_num_rows($sql1)>=1){
//  echo "<script>alert('you had bookmarked this post!');window.location.href='./bookmarks.php';</script>";
  echo "FAILED";
}
else{
	
$sql=mysql_query("insert into bookmarks(username,postuser,posttitle)values('$username','$postuser','$posttitle') ");


//if ($sql) {
	echo "OK";

//}

//else
//	echo "FAILED";
	
}

?>