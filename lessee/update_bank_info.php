<?php
require "serverconnect.php";
$connection = serverConnect();

$user_email = $_SESSION['user_email'];

$bank_acc = $_POST['bank-acc'];
$routing_num = $_POST['routing-num'];

$query = "UPDATE User SET bank_acc = '".$bank_acc."',routing_num = '".$routing_num."' WHERE email = '".$user_email."'";

$result = mysqli_query($connection, $query);

if(!$result) {
echo Please enter a routing/account number
}
else {
$success = true;
echo $success;
}
mysqli_close($connection);
?>