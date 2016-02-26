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

//user_ziji
$user_ziji = $J["user_ziji"];
$commentuser = $J["user"];
$content = $J["content"];
$comtitle = $J["title"];
$commentnum = $J["commentnum"];
$type = $J["type"];
$comcontent = $J["comcontent"];
$createtime=date("Y-m-d H:i:s",mktime());

if ($type==0) {
//echo $commentuser;
$sql=mysql_query("insert into comment(comtitle,content,createtime,commentuser,commentnum)values('$comtitle','$content','$createtime','$commentuser','$commentnum') ");
}
else{

$sql1=mysql_query("insert into comment(comtitle,content,createtime,commentuser,commentnum)values('$comtitle','$content','$createtime','$commentuser','$commentnum') ");
$sql2=mysql_query("insert into post(title,content,posttime,postuser,type)values('$comcontent','$content','$createtime','$user_ziji','$type') ");

}
if(mysql_affected_rows())
echo "OK";
	
else echo "FAILED";
	

?>


