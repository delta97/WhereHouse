<!DOCTYPE html>
<html>
	<head>
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>John Doe | Account Information</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../style.css"> 
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
					<div id="manage-warehouses" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Warehouses</span>
					</div>
					<div id="inbox" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="analytics" class="sidebar-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn  active-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content-account-info flex-center-account-info">
					<h1 class="dashboard-header">Account Information</h1>
					<div id="save-notifications"></div>
					<div class="account-info">
						<form id="edit-information-form">
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
							<div class="button-center">
								<div class="login-button-invert" id="general-information-save"><span class="login-button-text-invert">Save</span></div>
							</div>
						</form>	
					</div>
					<h1 class="dashboard-header">Payment Information</h1>
					<div class="account-info flex-center-account-info">
						<form id="financial-information">
							<div class="form-row form-spacing">
								<div class="col">
									<label for="bank-routing-number">Bank Routing Number</label>
									<input type="number" class="form-control" name="bank-routing-number" id="bank-routing-number" placeholder="Routing Number">
								</div>
								<div class="col">
									<label for="bank-account-number">Bank Account Number</label>
									<input type="number" class="form-control" name="bank-account-number" id="bank-account-number" placeholder="Account Number">
								</div>
							</div>
							<div class="button-center">
								<div class="login-button-invert" id="banking-information-save"><span class="login-button-text-invert">Save</span></div>
							</div>
						</form>
					
					<h1 class="dashboard-header">Reset Your Password</h1>
					<div class="account-info account-info-password">
						<form id="password-reset" class="field-center">
							<div class="form-row form-spacing align-center ">
								<div class="col password-col">
									<label for="current-password">Current Password</label>
									<input type="password" class="form-control" name="current-password" id="currrent-password" placeholder="Current Password">
								</div>
							</div>
							<div class="form-row form-spacing align-center">
								<div class="col password-col">
									<label for="new-password">New Password</label>
									<input type="password" class="form-control" name="new-password" id="new-password" placeholder="New Password">
								</div>
							</div>
							<div class="form-row form-spacing align-center">
								<div class="col password-col">
									<label for="new-password-confirm">Confirm New Password</label>
									<input class="form-control" type="password" name="new-password-confirm" id="new-password-confirm" placeholder="Confirm New Password">
								</div>
							</div>
							<div class="button-center">
								<div class="update-password-btn" id="banking-information-save"><span class="login-button-text-invert">Update Password</span></div>
							</div>
						</form>
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
	</script>
</html>