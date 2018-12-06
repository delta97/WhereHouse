<?php
	// error_reporting(E_ERROR | E_PARSE);

	
	$connection = serverConnect();

	$user_id = $_SESSION['user_id'];
	$user_id = 10350;

	$query = "SELECT * FROM Contract WHERE lessee_id = $user_id AND status = 'Terminated'";
	$result = mysqli_query($connection, $query);

	if($result){
		$contract_assoc = array(array());
		$error = false;
		$index = 0;
		while($row = mysqli_fetch_assoc($result)){
			$contract_assoc[$index] = $row;
			$index++;
		}
		$num_rentals = sizeof($contract_assoc);
		$index = 0;
		while($index < $num_rentals){
			$contract_id[$index] = $contract_assoc[$index]['contract_id'];
			$start_date[$index] = $contract_assoc[$index]['start_date'];
			$end_date[$index] = $contract_assoc[$index]['end_date'];
			$warehouse_id[$index] = $contract_assoc[$index]['warehouse_id'];
			$total_price[$index] = $contract_assoc[$index]['total_price'];
			$index++;
		}
	}
	else {
		$error = true;
	}

	

	echo("<table class=\"table table-white\">
							<thead>
								<tr>
									<th style=\"width: 25%\" class=\"text-center\" scope=\"col\">
										Warehouse Rented
									</th>
									<th style=\"width: 25%\" class=\"text-center\" scope=\"col\">
										Rental Duration
									</th>
									<th style=\"width: 25%\" class=\"text-center\" scope=\"col\">
										Cost Total
									</th>
									<th style=\"width: 25%\" class=\"text-center\" scope=\"col\">
										View Current Availability
									</th>
								</tr>
							</thead>
							<tbody>");
	for($x = 0; $x < $num_rentals; $x++) {
		if($num_rentals == 0 || $num_rentals == NULL || $num_rentals == "" || $num_rentals == "null") {
			echo("<div class=\"no-rentals-message\"><h2>Oh no! You don't have any past rentals. <span class=\"search-redirect-button\">Click here</span> to go look for more facilities to rent.</h2></div>");
		}
		else {
			echo("<tr id=\"past-rentals-table-".$x."\"data-contractID='".$contract_id[$x]."'>
					<td style=\"width: 25%\" class=\"text-center\">
						".$warehouse_id[$x]."
					</td>
					<td style=\"width: 25%\" class=\"text-center\">
						".$start_date[$x]." - ".$end_date[$x]."
					</td>
					<td style=\"width: 25%\" class=\"text-center\">
						".$total_price[$x]."
					</td>
					<td style=\"width: 25%\" class=\"text-center\">
						<button id='view-details' data-toggle=\"modal\" data-target=\"#rental-view-details\" style=\"margin-right: 5px\" class=\"btn view-details-btn btn-info\">View Details</button>
						<button id='rent-again-btn' data-toggle=\"modal\" data-target=\"#rent-again\" class=\"btn btn-primary\">Rent Again</button>
					</td>
				</tr>
			");

		}

	}
	echo"</tbody></table>";
		
	mysqli_close($connection);

?>