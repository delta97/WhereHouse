<?php
#serverconnect 
function serverConnect(){
	$servername = "mydb.ics.purdue.edu";
	$username = "g1090429";
	$password = "WhereHouse?";
	$dbname = "g1090429";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection) {
		die("The server connection failed: " . mysqli_connect_error());
   		echo '<h1>Server Error</h1>';
	}
	
	return $connection;
}

?>