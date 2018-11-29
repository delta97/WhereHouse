<?php
	error_reporting(E_ERROR | E_PARSE);

	require "serverconnect.php";
	$connection = serverConnect();

	$user_id = $_SESSION['user_id'];

	$query = "SELECT * FROM Contract WHERE Lessee_id = $user_id AND Status = 'Terminated'";
	$result = mysqli_query($connection, $query);
	$associative_array = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$contract_id = $associative_array['id'];

	$start_date = $associative_array['start_date'];
	$end_date = $associative_array['end_date'];
	$warehouse_id = $associative_array['WH_id'];
	$total_price = $associative_array['total_price'];
	$num_rentals = sizeof($contract_id);

	echo"<table class=\"table table-white\">
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
							<tbody>";
	for($x = 0; $x < $num_rentals; $x++) {
		echo"
			<tr id=\"past-rentals-table-".$x."\"data-contractID=\"".$contract_id[$x]."\">
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
						<button data-toggle=\"modal\" data-target=\"#rental-view-details\" style=\"margin-right: 5px\" class=\"btn view-details-btn btn-info\">View Details</button>
						<button data-toggle=\"modal\" data-target=\"#rent-again\" class=\"btn btn-primary\">Rent Again</button>
					</td>
				</tr>
			";

	}
	echo"</tbody></table>";
	mysqli_close($connection);

?>