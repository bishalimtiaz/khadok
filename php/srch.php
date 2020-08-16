<?php

	$name = $_REQUEST["nm"];

	$option = $_REQUEST["opn"];

	/*$cookie_name1 = "src";

	setcookie($cookie_name1, $name, time() + (86400 * 30),"/");

	$cookie_name2 = "opt";

	setcookie($cookie_name2, $option, time() + (86400 * 30),"/");*/

	$_SESSION["opt"] = $option;
	$_SESSION["src"] = $name ;

	echo "session set";

?>