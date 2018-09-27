<?php
require_once("../inc/function.php");
session_start();
ob_start();
if($_POST["username"]!="" && $_POST["password"]!=""){
	$con=connect();
	$sql="select * from users where email='".trim($_POST["username"])."' and password='".md5(trim($_POST["password"]))."'";
	$i=0;
	$dr=mysqli_query($con, $sql);
	while($rd=mysqli_fetch_array($dr))
	{
		echo $i;
		$_SESSION["name"]=$rd["first_name"]." ".$rd["last_name"];
		$_SESSION["salt"]=MD5($rd["email"]);
		$_SESSION["id"]=$rd["id"];
		$i++;
	}
	disconnect($con);	
	if($i>0)
	{
		$sql="UPDATE users SET last_login_date=now(), last_login_time=now() where id='".$_SESSION["id"]."'";
		execute_query($sql);
		header("Location: ../home");
		exit();
	}
	else
	{
		header("Location: ../?wrong");
		exit();
	}
}
?>