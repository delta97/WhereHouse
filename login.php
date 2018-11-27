<?php 
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST['data']);
$email = obj.email;
$password = obj.password;

if(session_status() == PHP_SESSION_NONE) {
	session_start();
}

require "serverconnect.php";
$connection = serverConnect();



$query = "SELECT password, user_type, id, first_name, last_name FROM User WHERE email = '".$email."'";
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

$response = json_encode(array("sql" => $user_type_should_be, "user_id" => $user_id, "user_type" => $user_type, "user_first_name" => $user_first_name, "user_last_name" => $user_last_name, "user_email" => $email, "user_password" => $password));


echo $response;

mysqli_close($connection);


?>