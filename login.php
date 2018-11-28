<?php 

$email = $_POST['email'];
$password = $_POST['password'];

if(session_status() == PHP_SESSION_NONE) {
	session_start();
}

$_SESSION['variable_name'] = 1;

require "serverconnect.php";
$connection = serverConnect();

$email_s = mysqli_real_escape_string($connection, $email);
$password_s = mysqli_real_escape_string($connection, $password);

$query = "SELECT id, first_name, last_name, user_type FROM User WHERE email = '$email';";
$result = mysqli_query($connection, $query);

if($result) {
	$assoc_array = mysqli_fetch_assoc($result);

	if($assoc_array["password"] == $password){
		$user_id = $assoc_array["id"];
		$user_type = $assoc_array["user_type"];
		$user_first_name = $assoc_array["first_name"];
		$user_last_name = $assoc_array["last_name"];
	}
	else {
		//password doesn't match, but email exists
		$user_type = -2;
	}
	
}
else { //The user's email doesn't exist in the database -->they need to make an account still
	$user_type = -1; 
}

$user_type_should_be = 0;


$response = json_encode(array('user_email' => $email, 'sql' => $user_type_should_be, 'user_password' => $password, 'user_id' => $user_id, 'user_type' => $user_type, 'user_first_name' => $user_first_name, 'user_last_name' => $user_last_name));




echo($response);

mysqli_close($connection);


?>