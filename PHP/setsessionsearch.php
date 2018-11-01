<?php 
	//cookie from index search
	$c_zipcode_name = "zipcode";
	$c_zipcode_value = $_GET["zip-search"];

	setcookie($c_zipcode_name, $c_zipcode_value, time() + (86400 * 30), "/"); //expires in 30 days by default
	

?>
