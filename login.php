<?php 
if(session_status() == PHP_SESSION_NONE) {
	session_start();
}

require "serverconnect.php";
$connection = serverConnect();

$user_email = $_POST['login-modal-email'];
$user_password = $_POST['login-modal-password'];





$query = "SELECT password, user_type, id, first_name, last_name FROM User WHERE email = '".$user_email."'";
$result = mysqli_query($connection, $query);

if($result) {
	$assoc_array = mysqli_fetch_assoc($result);

	if($assoc_array["password"] == $user_password){
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

$var1 = array("sql", "user_id", "user_type", "user_first_name", "user_last_name", "user_email");
$var2 = array($user_type_should_be, $user_id, $user_type, $user_first_name, $user_last_name, $user_email);

$num_el = 5;
for($i = 0; $i < $num_el; $i++){
	echo "<input id='".$var1[i]."'val='".$var2[i]."'></input>";

}


mysqli_close($connection);


?>