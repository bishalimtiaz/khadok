<?php
	require 'config.php';

	$tp = $_REQUEST["tp"];
	

	if ($tp=="offerDelete") {
		$id = $_REQUEST["id"];
		$offerid = $_REQUEST["offerid"];

		$delete="delete from offer where offer_id='$offerid' and resturant_id='$id'";
		$delete_run=mysqli_query($con,$delete);

		if ($delete_run) {
			echo "Offer Successfully Deleted";
		}
	}

	else if ($tp=="foodDelete") {
		$id = $_REQUEST["id"];
		$foodid = $_REQUEST["foodid"];
		$delete="delete from food where food_id='$foodid' and resturant_id='$id'";
		$delete_run=mysqli_query($con,$delete);

		if ($delete_run) {
			echo "Food Successfully Deleted";
		}
	}

	else if ($tp=="favDelete") {
		$foodid = $_REQUEST["foodid"];
		$uid=$_REQUEST["uid"];


		$delete="delete from favourite where food_id='$foodid' and user_id='$uid'";
		$delete_run=mysqli_query($con,$delete);

		if ($delete_run) {
			echo "Food Successfully Removed From Your favourite List";
		}

		else{
			echo mysqli_error($con);
		}
	}

	else if ($tp=="resDelete") {

		$rid = $_REQUEST["rid"];

		$delete="delete from resturant where resturant_id='$rid'";
		$delete_run=mysqli_query($con,$delete);

		if ($delete_run) {
			echo "admin";
		}
	}
	
?>