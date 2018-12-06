<?php
session_start();
?>
<!DOCTYPE html>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 

	<!-- My Warehouses Functionality -->
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<div class="flex-logo">
					<span class="header-username">[Last Name], [First Name]</span>
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
					<div class="userbox2">
					
					 <?php
                    $servername = "mydb.ics.purdue.edu";
                    $username = "g1090429";
                    $password = "WhereHouse?";
                    $dbname = "g1090429";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
					//Use US monetary values
					setlocale(LC_MONETARY, 'en_US');
                    $user_id = $_SESSION['user_id'];
                        
						//Access SQL
                        $sqlWH1 = "SELECT address_1, city, state, zipcode, warehouse_id, price_per_skid, capacity, size, storage_pref, lowest_temp, highest_temp FROM Warehouse WHERE owner_id = $user_id";
                        $resultWH1 = $conn->query($sqlWH1);
                        
						//print SQL results in seperate divs
						if ($resultWH1->num_rows > 0) {
							
						
						while($row1 = $resultWH1->fetch_assoc()) {
							$address = $row1['address_1'];
							$city = $row1['city'];
							$state = $row1['state'];
							$zipcode = $row1['zipcode'];
							$warehouse = $row1['warehouse_id'];
							$price = $row1['price_per_skid'];
							$rprice = money_format('0%i',$price);
							$capacity = $row1['capacity'];
							$size = $row1['size'];
							$storage = $row1['storage_pref'];
							$lowt = $row1['lowest_temp'];
							$hight = $row1['highest_temp'];
							$x = 1;
							for ($i = 0; $i < count($warehouse); $i++) {
							echo"<div class=\"userbox2\">";
							//echo"Warehouse $x<br><br>";
							echo"<b>Address: </b>$address, $city, $state $zipcode<br>";
							echo"<b>Price-per-skid: </b>\$$rprice<br>";
							echo"<b>Capacity: </b>$capacity skids<br>";
							echo"<b>Size of your warehouse: </b>$size sq-ft<br>";
							echo"<b>Storage capability: </b>$storage<br>";
							echo"<b>Lowest Temperature: </b>$lowt degrees<br>";
							echo"<b>Highest Temperature: </b>$hight degrees<br>";
							echo"</div>";
							$x++;
							}
								
							}
						}
						 else {
							echo "You have no warehouses :(";
						}		
                $conn->close();
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
										<small>This won't be shown to users but is for your own record-keeping purposes</small>

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
									<div class="col-lg-2">
										<label for="temperature-lower-bound">Coldest Sustainable Temperature (&deg;F)</label>
										<input type="number" class="form-control" name="temperature-lower-bound" id="temperature-lower-bound" placeholder="Low &deg;F">
									</div>
									<div class="col-lg-2">
										<label for="temperature-upper-bound">Warmest Sustainable Temperature (&deg;F)</label>
										<input type="number" class="form-control" name="temperature-upper-bound" id="temperature-upper-bound" placeholder="High &deg;F">
									</div>
									<div class="col-lg-2">
										<label style="margin-top:40px; margin-bottom:40px"for="price-per-skid">Price Per Skid</label>
										<input type="number" class="form-control" name="price-per-skid" id="price-per-skid" placeholder="$">
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
										<select type="text" class="form-control" name="warehouse-state" id="warehouse-state">
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
								<button id="submit-warehouse" type="button" class="btn btn-submit">Add Warehouse</button>
								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<div class="footer">Footer</div>
	</body>

	<script type="text/javascript">
		$(document).ready(function(){
			var user_last_name = sessionStorage.getItem("user_last_name");
			var user_first_name = sessionStorage.getItem("user_first_name");
			var user_email = sessionStorage.getItem("user_email");
			var user_id = sessionStorage.getItem("user_id");

			$('.header-username').text(user_last_name+", "+user_first_name);
			
			get_notification_badges();

			$.ajax({
				url:'warehouse_onload.php',
				type: 'post', 
				dataType: 'json',
				data: {user_id: sessionStorage.getItem("user_id")},
				success: function(response){
					console.log(response);
					var id = response['id'];
					var address_1 = 1;
				}
			});
		});


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
			sessionStorage.clear();
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


		$('#submit-warehouse').on('click', function(event){
			var user_id = sessionStorage.getItem("user_id");
			var name = $('#warehouse-name').val();
			var size = $('#warehouse-sqft').val();
			var capacity = $('#warehouse-skids').val();
			var temp_low = $('#temperature-lower-bound').val();
			var temp_high = $('#temperature-upper-bound').val();
			var price_per_skid = $('#price-per-skid').val();
			var address_1 = $('#warehouse-address-1').val();
			var address_2 = $('#warehouse-address-2').val();
			var city = $('#warehouse-city').val();
			var state = $('#warehouse-state').val();
			var zipcode = $('#warehouse-zipcode').val();
			console.log(user_id, name, size, capacity, temp_low, temp_high, price_per_skid, address_1, address_2, city, state, zipcode);
			$.ajax({
				url:'add_warehouse.php',
				type: 'post',
				dataType: 'json',
				data: {price_per_skid: price_per_skid, user_id: user_id, name: name, size: size, capacity: capacity, temp_low, temp_low, temp_high: temp_high, address_1: address_1, address_2: address_2, city: city, state: state, zipcode: zipcode},
				success: function(response){
					var error_response = response['error'];
					if(error_response === 1){
						alert("There was an error inserting your warehouse data into the database. Please try again.");
					}
					else {
						alert("Data submitted successfully");
						location.reload(); //reloads the window to populate the page with the current warehouse that was just added
					}
					console.log(error_response);
				}
			});
		});

		//calls a get to destory the php variable session
		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}

		//function that populates the sidebar with notification icons
		function get_notification_badges() {

			$.ajax({
				url: 'get_notification_badges.php',
				type:'post',
				dataType: 'JSON',
				data:{user_id: sessionStorage.getItem("user_id")}
				succcess: function(response) {
					var num_unchecked_messages = response['num_unchecked_messages'];
					var num_rentals = response['num_rentals'];
					var num_requests = response['num_requests'];
					console.log(response);
					console.log(num_unchecked_messages, num_rentals, num_requests);
					$('.notification-span-rentals').text(num_rentals);
					$('.notification-span-requests').text(num_requests);
					$('.notification-span-messages').text(num_unchecked_messages);

				}
			});
		}



	</script>
</html>
