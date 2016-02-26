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
$voteuser = $J["voteuser"];
$votetitle = $J["votetitle"];
$votenum = $J["votenum"];
$content = $J["content"];
$votetime=date("Y-m-d H:i:s",mktime());


//$sql=mysql_query("update votes votes(votenum,votetitle,votetime,voteuser)values('$votenum','$votetitle','$votetime','$voteuser')");
$sql=mysql_query("update comment set votenum ='$votenum' where commentuser='$voteuser' and comtitle='$votetitle' and content='$content'");


	echo "OK";
	
	//echo "FAILED";
	

?>


