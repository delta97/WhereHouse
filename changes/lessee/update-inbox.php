<?php
	require "serverconnect.php";
	$connection = serverConnect();



	$recipient_id = $_SESSION['user_id'];

	$query = "SELECT * FROM Messages WHERE recipient_id = '$recipient_id';";
	$result = $mysqli_query($connection, $query);
	

?>