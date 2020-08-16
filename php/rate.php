<?php
require 'config.php';

	$rt = $_REQUEST["rt"];

	$id = $_REQUEST["id"];

	$fn = $_REQUEST["fn"];

	$username=$_SESSION['user'];

	$password=$_SESSION['pass'];

	$fid="";
	$uid="";
	$rtg="";


	$select="select food_id from food where foodName='$fn' and resturant_id='$id'";

	$select_run=mysqli_query($con,$select);

	if(mysqli_num_rows($select_run)>0){

			while ($row = mysqli_fetch_assoc($select_run)) {
				$fid=$row["food_id"];
				
			}
	}

	else{
		echo mysqli_error($con);
	}

	$select_query="select user_id from userinfo where userName='$username' and password='$password'";
	$select_query_run=mysqli_query($con,$select_query);
	if(mysqli_num_rows($select_query_run)>0){
			while ($row = mysqli_fetch_assoc($select_query_run)) {
				$uid=$row["user_id"];
				
			}
	}

	else{
		echo mysqli_error($con);
	}


	$select_check="select * from rate where user_id='$uid' and food_id='$fid'";
	$select_check_run=mysqli_query($con,$select_check);
	if(mysqli_num_rows($select_check_run)>0){
			/*while ($row = mysqli_fetch_assoc($select_query_run) {
				$uid=$row["user_id"];
				
			}*/

			echo "You Already Rate This Food";
	}

	else{

		$select_rt="select foodRating from food where foodName='$fn' and resturant_id='$id'";
		$select_rt_run=mysqli_query($con,$select_rt);
		if(mysqli_num_rows($select_rt_run)>0){
				while ($row = mysqli_fetch_assoc($select_rt_run)) {
					$rtg=$row["foodRating"];
					
				}
		}

		if($rtg!=""){
			$rtg=($rtg+$rt)/2;
		}

		else{
			$rtg=$rt;
		}

		


		$insert="insert into rate(user_id,food_id,rating) values('$uid','$fid','$rtg')";
		$insert_query=mysqli_query($con,$insert);

		if($insert_query){
			$update="update food set foodRating='$rtg' where foodName='$fn' and resturant_id='$id'";
			$update_query=mysqli_query($con,$update);

			if ($update_query) {
				echo $rtg;
			}

			else{
				echo mysqli_error($con);
			}


		}

		else{
			echo mysqli_error($con);
		}
	}

?>