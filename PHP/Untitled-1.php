<?php
include "serverconnect.php";
$connection = serverConnect();

//query to get the user's id
$id_query = "SELECT id FROM User WHERE Email = '".$_SESSION['user_email']."'";

$result = mysqli_query($connection, $id_query);
$assoc_array = mysqli_fetch_assoc($result);
$user_id = $assoc_array["id"];
 
echo $user_id;
?>

