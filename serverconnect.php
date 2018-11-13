<?php
#serverconnect 
function serverConnect(){
	$servername = "mydb.ics.purdue.edu";
	$username = "g1090429";
	$password = "WhereHouse?";
	$dbname = "g1090429";

	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if (!$connection) {
		die("The server connection failed: " . mysqli_connect_error());
   		echo '<h1>Server Error</h1>';
	}
	
	$query = "SELECT Last_name FROM User WHERE id = 1";
    $result =  mysqli_query($connection, $query, MYSQLI_STORE_RESULT);

    if (mysqli_num_rows($result) > 0) { //basically, "if the server returned a table that isn't empty"
	    while($row = mysqli_fetch_assoc($result)) { //it goes through the array until !$row, meaning it is null since you have reached the end of the array.
	        echo "<h1>The Last Name Is: " . $row["Last_name"] . "</h1>"; //since it is an associative array, you reference the index by the name of the column the data is stored in in the sql.
	    }
	} 
	else {
    	echo "0 results";
	}
	mysqli_free_result($result); //frees the memory associated with $result, so if you were to echo $result again, it would not have anything stored in it.
	mysqli_close($connection);
}
serverConnect();

?>