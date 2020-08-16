<?php
require 'config.php';




$tp = $_REQUEST["tp"];



if ($tp=="first") {

	/*$ps = $_REQUEST["ps"];*/
	$id = $_REQUEST["id"];
	$pn = $_REQUEST["pn"];
	$uid="";


	$update="update resturant set phoneNumber='$pn' where resturant_id='$id'";
	$update_run=mysqli_query($con,$update);

	if ($update_run) {
		echo "Contact Number Updated Successfully";
	}

	else{
		echo "not success";
	}
	
}


else if ($tp=="fourth"){
	$fn = $_REQUEST["fn"];
	$id = $_REQUEST["id"];
	$fc = $_REQUEST["fc"];
	$fp = $_REQUEST["fp"];
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
			
			}
		}


		
	}

	
}

else if ($tp=="third") {

	/*$ps = $_REQUEST["ps"];*/
	$id = $_REQUEST["id"];
	$nid = $_REQUEST["nid"];
	$uid="";


	$update="update resturant set resturant_id='$nid' where resturant_id='$id'";
	$update_run=mysqli_query($con,$update);

	if ($update_run) {
		$cookie_name = "rid";

		setcookie($cookie_name, $nid, time() + (86400 * 30),"/");
		echo "Resturant Id Updated Successfully";
	}

	else{
		echo "not success";
	}
	
}









else if ($tp=="second"){
	$of = $_REQUEST["of"];
	$id = $_REQUEST["id"];
	$img="";

	


	if(isset($_COOKIE["od"])) {
		$img=$_COOKIE["od"];

		$dt=date("Y-m-d");


		$sql="insert into offer(resturant_id,txt,offer_image,offerDate) values('$id','$of','$img','$dt')";
			$sql_query=mysqli_query($con,$sql);
			if ($sql_query) {

				unset($_COOKIE["od"]);
				$res=setcookie("od", "", time() - 36000000,"/");

				echo "Offer Is Given Successfully";
			
			}
	}



	else{

		echo "Something Went Wrong";


		
	}

	
}




/*else if ($tp=="second"){
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
			
			}
		}


		
	}

	if($mr=="One"){
		$cookie_name = "rid";

		setcookie($cookie_name, $id, time() + (86400 * 30),"/");
	}

	
}*/


?> 