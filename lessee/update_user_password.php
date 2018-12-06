<?php
	if(!function_exists(serverConnect)){
		require "serverconnect.php";
	}

	$connection = serverConnect();

	$user_id = $_POST['user_id'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];

	$query = "SELECT password FROM User WHERE id = $user_id";
	$result = mysqli_query($connection, $query);
	if($result){
		$password_assoc = mysqli_fetch_assoc($result);
		$user_password = $password_assoc['password'];
		if($old_password == $user_password){
			$query = "UPDATE User SET password = $new_password WHERE id = $user_id";
			$result = mysqli_query($connection, $query);
			if($result){
				echo(2); //it was a success
			}
			else{
				echo(1); //there was a problem inserting the new password into the database so the password remains the old password
			}
		}
		else{
			echo(0); //this means that the old password provided didn't match the password in the database
		}
	}

	mysqli_close($connection);
?>