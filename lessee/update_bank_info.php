<?php
require "serverconnect.php";
$connection = serverConnect();


$user_id = $_POST['user_id'];
$credit_card = $_POST['cc_number'];
$expiration_month = $_POST['expiration_month'];
$expiration_year = $_POST['expiration_year'];
$CVC = $_POST['cvc'];

$query = "UPDATE Lessee SET credit_card_num = $credit_card, expiration_month = $expiration_month, expiration_year = $expiration_year, CVC = $CVC WHERE lessee_id = $user_id";
$result = mysqli_query($connection, $query);

if(!$result){
	echo(1);
}
else{
	echo(0);
}

mysqli_close($connection);


?>
