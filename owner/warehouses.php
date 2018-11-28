 <!DOCTYPE html>

 <?php 
 	include "serverconnect.php";
 	$connection = serverConnect();

 	//query to get the user's id
 	$id_query = "SELECT id FROM User WHERE Email = '".$_SESSION['user_email']."'";

 	$result = mysqli_query($connection, $id_query);
	$assoc_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$user_id = $assoc_array["id"];

 	//query to get the warehouses that correspond to that user id
	$query = "SELECT id FROM Warehouse WHERE owner_id = '".$user_id."'";
	$result = mysqli_query($connection, $query);
	$_SESSION["owner_warehouse_ids"] = mysqli_fetch_all($result, MYSQLI_NUM);
	$num_ids = count($_SESSION['owner_warehose_ids']);

	mysqli_close($connection);
 ?>
<!-- owner dashboard -->
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Manage Warehouses</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 

		<!-- javascript click functions -->
		<script src="../javascript/click_functions.js"></script>

		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<div class="flex-logo">
					<span class="header-username">Doe, John</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard" class="sidebar-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="renters" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Renters</span>
					</div>
					<div id="manage-warehouses" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content">
					<div class="flex-row jc-space-around">
						<h1>Manage Your Warehouses</h1>
						<button type="button" class="btn btn-primary add-warehouse-btn" data-toggle="modal" data-target="#add-warehouse-modal">Add a Warehouse</button>
					</div>
					<div class="warehouse-tiles">
						<div class="warehouse">
							helo
							
						</div>
						<?php 
							$connection = serverConnect();
							$index = 0;
							$query = "SELECT address_1, address_2, city, [state], zip, Price_per_skid, sq_footage, cap, Temp_control FROM Warehouse WHERE id = '" . $_SESSION['owner_warehouse_ids'] . "';";
							
							$result = mysqli_query($connection, $query);

							if(!$result) {
								echo "You have no warehouses. Add one.";
							}
							else {
								$assoc_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
								$address_1 = $assoc_array["address_1"];
								$address_2 = $assoc_array["address_2"];
								$city = $assoc_array["city"];
								$state = $assoc_array["state"];
								$zip = $assoc_array["zip"];
								$price_per_skid = $assoc_array["Price_per_skid"];
								$sq_footage = $assoc_array["sq_footage"];
								$capacity = $assoc_array["cap"];
								$temp_control = $assoc_array["Temp_control"];
								 
								while($index < $num_ids) {
									$current_warehouse = array("address_1" => $address_1[$index], "address_2" => $address_2[$index], "city" => $city[$index],"state" => $state[$index], "zip" => $zip[$index], "price_per_skid" => $price_per_skid[$index], "sq_footage" => $sq_footage[$index], "capacity" => $capacity[$index], "temp_control" => $temp_control[$index]);
									$index++;
									/*echo " this is the code that will create a new div*/
								}
							}
							$warehouse_index = 0;
							while($warehouse_index < $num_ids) {

							}
						?>
					</div>
				</div>
			</div>
			<!-- Add warehouse modal -->
			<div class="modal fade" id="add-warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="add-warehouse-modal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered flex-center" role="document">
					<div class="modal-content edit-info-modal">
						<div class="modal-header">
							<h4 class="modal-title" id="registration-modal-title">Add Warehouse</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="warehouse-name">Warehouse Name</label>
										<input type="text" class="form-control" name="warehouse-name" id="warehouse-name" aria-describedby="enter warehouse name" placeholder="Warehouse Name">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="warehouse-sqft">Warehouse Size (Square Feet)</label>
										<input class="form-control" type="number" name="warehouse-sqft" id="warehouse-sqft" placeholder="Square Footage">
									</div>
									<div class="col">
										<label for="warehouse-skids">Number of Skids (40 in. x 48 in. x 48 in.)</label>
										<input type="number" class="form-control" id="warehouse-skids" name="warehouse-skids" placeholder="# of Skids">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label class="checkbox" for="temperature-controlled">Does your warehouse have temperature control capabilities?</label>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="temperature-yes" id="temperature-yes" value="true" checked="true">
										  <label class="form-check-label" for="temperature-yes">
										   Yes
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="temperature-no" id="temperature-no" value="false">
										  <label class="form-check-label" for="temperature-no">
										    No
										  </label>
										</div>
									</div>
									<div class="col">
										<label for="temperature-lower-bound">Coldest Sustainable Temperature (&deg;F)</label>
										<input type="number" class="form-control" name="temperature-lower-bound" id="temperature-lower-bound" placeholder="Lowest Sustainable Temperature">
									</div>
									<div class="col">
										<label for="temperature-upper-bound">Warmest Sustainable Temperature (&deg;F)</label>
										<input type="number" class="form-control" name="temperature-upper-bound" id="temperature-upper-bound" placeholder="Warmest Sustainable Temperature">
									</div>
								</div>
								<h3>Address Information</h3>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="warehouse-address-1">Address Line 1</label>
										<input type="text" class="form-control" name="warehouse-address-1" id="warehouse-address-1" placeholder="Address Line 1">
									</div>
									<div class="col">
										<label for="warehouse-address-2">Address Line 2</label>
										<input class="form-control" type="text" name="warehouse-address-2" id="warehouse-address-2" placeholder="Address Line 2">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="warehouse-city">City</label>
										<input type="text" class="form-control" name="warehouse-city" id="warehouse-city" placeholder="City">
									</div>
									<div class="col">
										<label for="warehouse-state">State</label>
										<select type="text" class="form-control" name="user-state" id="user-state">
											<option value="null">Choose a State</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District Of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
									<div class="col">
										<label for="warehouse-zip">Zipcode</label>
										<input type="number" class="form-control" name="warehouse-zipcode" id="warehouse-zipcode" placeholder="Zipcode">
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
								<button type="submit" class="btn btn-submit">Add Warehouse</button>
								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<div class="footer">Footer</div>
	</body>

	<script type="text/javascript">
		$("#dashboard").click(function() {
			window.location = "dashboard.php";
		});
		$("#renters").click(function() {
			window.location = "renters.php";
		});
		$("#manage-warehouses").click(function() {
			window.location = "warehouses.php";
		});
		$("#inbox").click(function() {
			window.location = "inbox.php";
		});
		$("#analytics").click(function() {
			window.location = "analytics.php";
		});
		$(".logout-button").click(function() {
			window.location = "../index.php";
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
		$('#temperature-yes').on('click', function() {
			$('#temperature-yes').prop('checked', true);
			$('#temperature-no').prop('checked', false);
			$('#temperature-lower-bound').prop('disabled', false);
			$('#temperature-upper-bound').prop('disabled', false);
		});
		$('#temperature-no').on('click', function(event){
			$('#temperature-yes').prop('checked', false);
			$('#temperature-no').prop('checked', true);
			$('#temperature-lower-bound').prop('disabled', true);
			$('#temperature-upper-bound').prop('disabled', true);
		});

		function reloadOnSubmit() {
			window.location = "warehouses.php";
			document.location.reload();
		}
	</script>
</html>
