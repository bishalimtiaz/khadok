<?php
require 'config.php';

$username = $_REQUEST["unm"];
$userpass = $_REQUEST["ups"];

$select="select * from userinfo where userName='$username' and password='$userpass'";

$select_query=mysqli_query($con,$select);

	if(mysqli_num_rows($select_query)>0){

		$_SESSION['user']=$username;
		$_SESSION['pass']=$userpass;
		$_SESSION['logged_in']=1;

		echo "Go To Homepage";
	}

	else{
		echo "User Doesn't Exists";
	}
?> 