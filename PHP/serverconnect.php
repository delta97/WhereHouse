<?php
#serverconnect 
function serverConnect(){
	$servername = "g1040924";
	$username = "g1040924";
	$password = "*password*";
	$dbname = "g1040924";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection) {
		die("The server connection failed: " . mysqli_connect_error());
   		echo '<script>console.log("Connection to server failed...")</script>';
	}
	$query = "SELECT ";
	$result = mysqli_query($query);
	
	echo "The query returned: " . $result;
	
}

?>