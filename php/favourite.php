<?php
require 'config.php';

	$fid = $_REQUEST["fid"];
	$uid="";
	$username=$_SESSION['user'];

	$password=$_SESSION['pass'];

	$select_query="select user_id from userinfo where userName='$username' and password='$password'";
	$select_query_run=mysqli_query($con,$select_query);
	if(mysqli_num_rows($select_query_run)>0){
			while ($row = mysqli_fetch_assoc($select_query_run)) {
				$uid=$row["user_id"];
				/*echo $uid;*/
			}
	}

	else{
		echo mysqli_error($con);
	}


	$select_check="select * from favourite where user_id='$uid' and food_id='$fid'";
	$select_check_run=mysqli_query($con,$select_check);
	if(mysqli_num_rows($select_check_run)>0){
			/*while ($row = mysqli_fetch_assoc($select_query_run) {
				$uid=$row["user_id"];
				
			}*/

			echo "You Already Added This Food To Your Favourite List";
	}


	else{
		$insert="insert into favourite(user_id,food_id) values('$uid','$fid')";
		$insert_query=mysqli_query($con,$insert);

		if($insert_query){
			echo "This Food Is Added To Your Favourite List";
		}

		else{
			echo mysqli_error($con);
		}
	}




?>