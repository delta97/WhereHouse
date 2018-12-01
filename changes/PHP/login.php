<?php 

require "serverconnect.php";
$connection = serverConnect();

$user_email = $_POST["login-modal-email"];
$user_password = $_POST["login-modal-password"];

$query = "SELECT password, User_type FROM User WHERE Email = '$user_email'";
$result = mysqli_query($connection, $query);

$assoc_array = mysqli_fetch_assoc($result);

if($assoc_array["password"] == $user_password){
	$_SESSION['user_email'] = $user_email;
	$_SESSION['user_password'] = $user_password;

	if($assoc_array["User_type"] == 1) {
		$_SESSION['user_type'] = 1;
	}
	else {
		$_SESSION['user_type'] = 1;
	}
}
else {
	$_SESSION['user_type'] = -1;
}


mysqli_close($connection);


?>