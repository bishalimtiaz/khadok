<?php
	$tp = $_REQUEST["tp"];
	$id = $_REQUEST["id"];

	if ($tp=="gores"){
		/*unset($_COOKIE["rid"]);
		$res=setcookie("rid", "", time() - 36000000,"/");*/
		

		$cookie_name = "goo";

		setcookie($cookie_name, $id, time() + (86400 * 30),"/");

		echo "Complete";
	}

	else{
		echo "string";
	}
?>