
<?php
if(isset($_COOKIE['username'])){
	setcookie('username','',time()-3600);	
	echo "<script>alert('logout success!');window.location.href='login.php';</script>";

}
else{
	echo "<script>alert('You didn't login!');window.location.href='main_before.php';</script>";
}

?>