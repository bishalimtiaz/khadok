<?php

require 'config.php';

	$q = $_REQUEST["q"];
	$sg=$_REQUEST["sg"];
	$hint = "";
	/*$a[]=array();*/


	if($sg=="food"){
		$select="select * from food";
		$selct_query=mysqli_query($con,$select);

		if(mysqli_num_rows($selct_query)>0){
			while ($row = mysqli_fetch_assoc($selct_query)) {
				$a[]=$row["foodName"];
				
			}
		}
	}

	else if ( $sg=="resturant") {
		$select="select * from resturant";
		$selct_query=mysqli_query($con,$select);
		if(mysqli_num_rows($selct_query)>0){
			while ($row = mysqli_fetch_assoc($selct_query)) {
				$a[]=$row["resturantName"];
				
			}
		}
	}

	if ($q !== "") {
	    $q = strtolower($q);
	    $len=strlen($q);
	    foreach($a as $name) {
	    	$length=strlen($name);

	    	for($i=0;$i<$length;$i++){
	    		if (stristr($q, substr($name, $i, $len))) {

		            if ($hint === "") {
		                $hint = $name;
		                break;
		            } else {
		                $hint .= ", $name";
		                break;
		            }
		        }
	    	}

	        
	    }
	}
 
echo $hint === "" ? "Not Found" : $hint;

	
?>