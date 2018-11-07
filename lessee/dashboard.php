<!DOCTYPE html>
<html>
	<head>
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | Lessee Dashboard</title>

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
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
					<span class="logo-text"><a href="index.php">WhereHouse</a></span>
				</div>
				<div class="flex-logo">
					<span class="header-username">Welcome, *name*</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard-btn" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text"><i class="fas fa-tachometer-alt"></i> Dashboard</span>
					</div>
					<div id="rentals-btn" class="sidebar-btn">
						<span class="sidebar-btn-text"><i class="fas fa-warehouse"></i> Your Rentals</span>
					</div>
					<div id="requests-btn" class="sidebar-btn">
						<span class="sidebar-btn-text"><i class="far fa-envelope"></i> Manage Requests</span>
					</div>
					<div id="inbox-btn" class="sidebar-btn">
						<span class="sidebar-btn-text"><i class="fas fa-mail-bulk"></i> Inbox</span>
					</div>
				<div class="page-content flexbox-dashboard">
					<div id="user-information" class="dashboard-tile">
						<div class="dashboard-tile-header">User Information</div>		
						<div class="dashboard-tile-content">
							<div id="user-name"><b>Name:</b> John Doe</div>
							<div id="user-email"><b>Email:</b> <a href="mailto:jdoe@purdue.edu">jdoe@purdue.edu</a></div>
							<div id="billing-address"><b>Billing Address:</b> 400 McCutcheon Dr.<br>West Lafayette, IN 47906</div>
							<div id="user-phone-num"><b>Phone Number:</b> (123) 456-7890</div>
							<div id="user-rating"><b>User Rating:</b> -6 Stars</div>
							<div id=""></div>
							<div class="dashboard-btn-flex">
								<button class="btn btn-primary dashboard-tile-edit" data-toggle="modal" data-target="#edit-information-modal">Edit</button>
							</div>
						</div>
					</div>
					<div id="user-rentals" class="dashboard-tile dashboard-tile-clickable">
						<div class="dashboard-tile-header">Your Rentals</div>
						<div class="dashboard-tile-content">
							<div id="warehouse-1" class="rented-warehouse">
								<span><b>Warehouse Name</b></span> <br>
								&nbsp; &nbsp;<span id="contract-from-1"><b>From: </b>August 23</span> <br>
								&nbsp; &nbsp;<span id="contract-to-1"><b>To: </b> September 14</span>
							</div>
						</div>
					</div>
					<div id="personalized-search" class="dashboard-tile dashboard-tile-clickable">
						<div class="dashboard-tile-header">Warehouse Search Tailored For You!</div>
						<div class="dashboard-tile-content">
							<div class="personalized-search-results">Result 1</div>
						</div>
					</div>
					<div id="current-requests" class="dashboard-tile dashboard-tile-clickable">
						<div class="dashboard-tile-header">Pending Requests</div>
						<div class="dashboard-tile-content">
							<div id="request-1"><b>Warehouse Name</b></div>
							<div id="request-1-date">August 16, 2018</div>
							<div id="request-time">8:52 PM</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Edit Information Modal, toggled on clicking the edit button -->
			<div class="modal fade" id="edit-information-modal" tabindex="-1" role="dialog" aria-labelledby="edit-information-modal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered flex-center" role="document">
					<div class="modal-content edit-info-modal">
						<div class="modal-header">
							<h4 class="modal-title" id="registration-modal-title">Edit Account Information</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-first-name">First Name</label>
										<input type="text" class="form-control" name="user-first-name" id="user-first-name" aria-describedby="enter first name" value="User First Name From Server">
									</div>
									<div class="col">
										<label for="user-last-name">Last Name</label>
										<input type="text" class="form-control" name="user-last-name" aria-describedby="enter last name" value="User Last Name From Server">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-address-line1">Address Line 1</label>
										<input type="text" class="form-control" name="user-address-line1" id="user-address-line1" value="User Address Line 1 From Server">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-address-line2">Address Line 2</label>
										<input type="text" class="form-control" name="user-address-line2" id="user-address-line2" value="User Address Line 2 From Server">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-city">City
										</label>
										<input type="text" class="form-control" name="user-city" id="user-city" value="User City From Server">
									</div>
									<div class="col">
										<label for="user-state">
										State</label>
										<select type="text" class="form-control" name="user-state" id="user-state">
											<option value="null">User State From Server</option>
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
										<label for="user-zip">Zip Code
										</label>
										<input type="text" class="form-control" name="user-zip" id="user-zip" value="User Zipcode From Server">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-phone">Phone Number
										</label>
										<input type="text" class="form-control" name="user-phone" id="user-phone" value="User Phone From Server">
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-submit" onclick="../../PHP/edit_userinfo_lessee.php">Submit</button>
								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">Footer</div>
	</body>

	<script type="text/javascript">
		$("#dashboard-btn").click(function(event) {
			window.location = "dashboard.php";
		});
		$("#rentals-btn").click(function(event) {
			window.location = "rentals.php";
		});
		$("#requests-btn").click(function(event) {
			window.location = "requests.php";
		});
		$("#inbox-btn").click(function(event) {
			window.location = "inbox.php";
		});
		$(".logout-button").click(function(event) {
		

			window.location = "../index.php";
		});


		//my rentals redirect
		$("#user-rentals").on("click", function(event) {
			window.location = "rentals.php";
		});
	</script>
</html>