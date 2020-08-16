<?php
require 'config.php';


$tp = $_REQUEST["tp"];

if($tp=="firstSign"){
	$username = $_REQUEST["unm"];
	$fullname = $_REQUEST["fnm"];
	$userpass = $_REQUEST["ups"];

	$select="select * from userinfo where userName='$username' and password='$userpass'";
	$select_query=mysqli_query($con,$select);

	if(mysqli_num_rows($select_query)>0){

		echo "User Already Exists";
	}

	else{
		$insert="insert into userinfo(userName,password,fullName) values('$username','$userpass','$fullname')";
		$insert_query=mysqli_query($con,$insert);

		if ($insert_query) {
			echo "Successfully insert";
		}
	}
}

if ($tp=="secondSign") {
	$upass = $_REQUEST["ups"];
	$uname = $_REQUEST["unm"];
	$mail = $_REQUEST["mail"];
	$home = $_REQUEST["home"];
	$bday = $_REQUEST["bday"];
	$gndr = $_REQUEST["gndr"];

	$update="update userinfo set email='$mail',gender='$gndr',Hometown='$home',Birthday='$bday' where password='$upass' and userName='$uname'";
	$update_query=mysqli_query($con,$update);

	if ($update_query) {
		$_SESSION['user']=$uname;
		$_SESSION['pass']=$upass;
		$_SESSION['logged_in']=1;

		echo "User Created";
	}

	else{
		echo mysqli_error($con);
	}
}

?>