<?php
if(isset($_POST["submit"])){
	$username=$_POST["username"];
	$pwd=$_POST["pwd"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';


	login_user($conn,$username,$pwd);
	exit();
}
else
{
	header("location: ../login/login.php");
	exit();
}