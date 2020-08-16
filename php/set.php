<?php

require 'config.php';


$tp = $_REQUEST["tp"];

if ($tp=="uname") {


	$ups=$_REQUEST["ups"];
	$unm=$_REQUEST["unm"];

	$update="update userinfo set userName='$unm' where password='$ups'";
	$update_query=mysqli_query($con,$update);

	if ($update_query) {
		$_SESSION['user']=$unm;
		echo "Username updated Successfully";
	}
}


else if ($tp=="fname") {

	$ups=$_REQUEST["ups"];
	$unm=$_REQUEST["unm"];

	$update="update userinfo set fullName='$unm' where password='$ups'";
	$update_query=mysqli_query($con,$update);

	if ($update_query) {
		echo "Fullname updated Successfully";
	}
}

else if ($tp=="chngps") {
	$ups=$_REQUEST["ups"];
	$nps=$_REQUEST["nps"];

	$update="update userinfo set password='$nps' where password='$ups'";
	$update_query=mysqli_query($con,$update);

	if ($update_query) {
		$_SESSION['pass']=$nps;
		echo "Password updated Successfully";
	}
}

?>