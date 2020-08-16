<?php
require 'config.php';




$tp = $_REQUEST["tp"];



if ($tp=="first") {

	$ps = $_REQUEST["ps"];
	$id = $_REQUEST["id"];
	$nm = $_REQUEST["nm"];
	$un=$_SESSION['user'];
	$uid="";


	$res_query="select * from resturant where resturant_id='$id'";
	$res_query_run=mysqli_query($con,$res_query);

	if(mysqli_num_rows($res_query_run)>0){

		echo "Resturant Id must be unique";
	}

	else{

		$select_query="select user_id from userinfo where userName='$un' AND password='$ps'";
		$select_query_run=mysqli_query($con,$select_query);

		if(mysqli_num_rows($select_query_run)>0){
			while ($row = mysqli_fetch_assoc($select_query_run)) {
				$uid=$row["user_id"];
				
			}
			
			$insert_query="insert into resturant(user_id,resturantName,resturant_id) values('$uid','$nm','$id')";
			$insert_query_run=mysqli_query($con,$insert_query);

			if ($insert_query_run) {
				echo "ok";
			}

			else{
				echo "Something Went Wrong.Please Try Again ";

			}
			
		}

		else{
			echo "Something Went Wrong.Please Try Again ";
		}
	}
	# code...
}




else if ($tp=="second"){
	$pn = $_REQUEST["pn"];
	$id = $_REQUEST["id"];
	$lc = $_REQUEST["lc"];


	$sql="update resturant set resturantLocation ='$lc',phoneNumber ='$pn' where resturant_id='$id'";
	$sql_query=mysqli_query($con,$sql);
	if ($sql_query) {
		echo "finish";
	}
}


else if ($tp=="fourth"){
	$fn = $_REQUEST["fn"];
	$id = $_REQUEST["id"];
	$fc = $_REQUEST["fc"];
	$fp = $_REQUEST["fp"];
	$mr = $_REQUEST["mr"];
	$img="";

	


	if(!isset($_COOKIE["fd"])) {


		$select="select * from food where resturant_id='$id' and foodName='$fn'";
		$select_query=mysqli_query($con,$select);

		if(mysqli_num_rows($select_query)>0){
			
			echo "Your resturant already has this food item";
		}

		else{
			$sql="insert into food(resturant_id,foodName,foodCategory,price) values('$id','$fn','$fc','$fp')";
			$sql_query=mysqli_query($con,$sql);
			if ($sql_query) {

				echo "yes";
			
			}
		}
	}



	else{

		$img=$_COOKIE["fd"];


	    $select="select * from food where resturant_id='$id' and foodName='$fn'";
		$select_query=mysqli_query($con,$select);
		if(mysqli_num_rows($select_query)>0){
			
			echo "Your resturant already has this food item";
		}

		else{
			$sql="insert into food(resturant_id,foodName,foodCategory,price) values('$id','$fn','$fc','$fp')";
			$sql_query=mysqli_query($con,$sql);
			if ($sql_query) {

				$update="update food set food_image='$img' where resturant_id='$id' and foodName='$fn'";
				$update_query=mysqli_query($con,$update);
				if ($update_query) {
					unset($_COOKIE["fd"]);
					$res=setcookie("fd", "", time() - 36000000,"/");
					echo "yes";
				}
				else{
					echo mysqli_error($con);
				}
			
			}
			else{
					echo mysqli_error($con);
			}
		}


		
	}

	if($mr=="One"){

		unset($_COOKIE["goo"]);
		$res=setcookie("goo", "", time() - 36000000,"/");

		$cookie_name = "rid";

		setcookie($cookie_name, $id, time() + (30),"/");
	}

	
}


if ($tp=="myres") {
	$rid = $_REQUEST["rid"];
	$up = $_REQUEST["uid"];
	$uid="";

	$user="select user_id from userinfo where password='$up'";
	$user_run=mysqli_query($con,$user);

	if (mysqli_num_rows($user_run)>0) {
		while ($row = mysqli_fetch_assoc($user_run)) {
				$uid=$row["user_id"];
				
			}
	}


	$select="select * from resturant where resturant_id='$rid' and user_id='$uid'";
	$select_query=mysqli_query($con,$select);

	if(mysqli_num_rows($select_query)>0){
		$cookie_name = "rid";

		setcookie($cookie_name, $rid, time() + (30),"/");
			
		echo "Go To Your Resturant";
	}

	else{
		echo "Resturant Id Doesn't Match";
	}


}


?> 