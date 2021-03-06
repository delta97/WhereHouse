<!DOCTYPE html>

<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
		<!-- 3rd party footer content -  -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Account Information</title>

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
					<span class="logo-text"><a href="../index.php">WhereHouse</a></span>
				</div>
				<div class="search">
					<button id="zip-search" class="search-button-home" aria-label="Search"><span class="login-button-text">Search Available Warehouses by Zipcode</span></button>
				</div>
				<div class="flex-logo">
					<span class="header-username">[Last Name], [First Name]</span>
					<div class="logout-button" id="logout"><span class="login-button-text">Log Out</span></div>
				</div>
			</div>
			<div class="body dashboard-flex">
				<div class="sidebar">
					<div id="dashboard-btn" class="sidebar-btn ">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="rentals-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Rentals<span class="notification-span-rentals"></span>
					</div>
					<div id="requests-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Manage Requests<span class="notification-span-requests"></span>
					</div>
					<div id="inbox-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox<span class="notification-span-messages"></span>
						
					</div>
					<div id="account-info" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content-account-info flex-center-account-info">
					<h1 class="dashboard-header">Account Information</h1>
					<div id="save-notifications"></div>
					
					<div class="account-info">
						<form id="edit-information-form" action="update_general_information.php" target="#submit-redirect" method="post">
							<div class="form-row form-spacing">
								<div class="col">
									<label for="user-first-name">First Name</label>
									<input type="text" class="form-control" name="user-first-name" id="user-first-name" aria-describedby="enter first name" placeholder="User First Name From Server">
								</div>
								<div class="col">
									<label for="user-last-name">Last Name</label>
									<input type="text" class="form-control" id="user-last-name" name="user-last-name" aria-describedby="enter last name" placeholder="User Last Name From Server">
								</div>
							</div>
							<div class="form-row form-spacing">
								<div class="col">
									<label for="user-address-line1">Address Line 1</label>
									<input type="text" class="form-control" name="user-address-line1" id="user-address-line1" placeholder="User Address Line 1 From Server">
								</div>
							</div>
							<div class="form-row form-spacing">
								<div class="col">
									<label for="user-address-line2">Address Line 2</label>
									<input type="text" class="form-control" name="user-address-line2" id="user-address-line2" placeholder="User Address Line 2 From Server">
								</div>
							</div>
							<div class="form-row form-spacing">
								<div class="col">
									<label for="user-city">City
									</label>
									<input type="text" class="form-control" name="user-city" id="user-city" placeholder="User City From Server">
								</div>
								<div class="col">
									<label for="user-state">
									State</label>
									<select type="text" class="form-control" name="user-state" id="user-state">
										<option value="null">Select a State</option>
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
									<input type="number" class="form-control" name="user-zip" id="user-zip" placeholder="User Zipcode From Server">
								</div>
							</div>
							<div class="form-row form-spacing flex-center">
								<div style="display:flex; flex-direction: column; align-content: center; align-items: center"class="col-lg-4 col-md-4">
									<label for="user-phone">Phone Number</label>
									<input type="number" class="form-control" name="user-phone" id="user-phone" placeholder="User Phone From Server">
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
							<div class="form-row form-spacing flex-center">
								<div class="col-lg-5 col-md-5">
									<label for="cc-number">Credit Card Number</label>
									<input type="number" class="form-control" name="cc-number" id="cc-number" placeholder="Credit Card Number">
								</div>
								<div class="col-lg-2 col-md-2">
									<label for="expiration-year">Expiration Month</label>
									<input type="number" class="form-control" name="expiration-month" id="expiration-month" placeholder="MM" maxlength="2">
								</div>
								<div class="col-lg-2 col-md-2">
									<label for="expiration-year">Expiration Year</label>
									<input type="number" class="form-control" name="expiration-year" id="expiration-year" placeholder="YYYY" maxlength="4">
								</div>
								<div class="col-lg-2 col-md-2">
									<label for="cvc">CVC</label>
									<input type="number" class="form-control" name="cvc" id="cvc" placeholder="CVC" maxlength="3">
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
								<div class="update-password-btn" id="update-password-save"><span class="login-button-text-invert">Update Password</span></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
		</div>
	</body>
	<footer style="margin-top: 0px;"class="footer-distributed">

			<div class="footer-left">
				<span class="company-name">WhereHouse INC. </span> <br>
				<p class="footer-company-name">IE332 Team Project &copy; 2018</p>
			</div>
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>610 Purdue Mall</span> West Lafayette, IN 47907</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123 4567</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:wherehouse.8.inc@gmail.com">wherehouse.8.inc@gmail.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span>Connect With Us</span>
					Keep up to date with innovations happening at WhereHouse Inc. by connecting with us on our socials! 
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="https://www.instagram.com/wherehouse.8.inc/"><i class="fab fa-instagram"></i></a>
					<!-- Add a link to instagram... replace # with actual links> -->
				</div>
			</div>
		</footer>
	<script type="text/javascript">
		//onload of the page
		$(document).ready(function(event) {
			//populate the sidebar with notification icons as needed
			get_notification_badges();
			populate_account_information();
			$('.header-username').text(sessionStorage.getItem("user_last_name")+ ", "+sessionStorage.getItem("user_first_name"));

		});




		//on click functions for linking divs
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
			sessionDestroy();
			sessionStorage.clear();
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
		$('#zip-search').on('click', function(event) {
			window.location = "warehouse-search.php";
		});

		//submits an ajax request to the php server file 'update_general_information.php'
		$('#general-information-save').on('click', function(event) {
			var user_first_name = $('#user-first-name').value;
			var user_last_name = $('#user-last-name').value;
			var user_address_1 = $('#user-address-line1').value;
			var user_address_2 = $('#user-address-line2').value;
			var user_city = $('#user-city').value;
			var user_state = $('#user-state').value;
			var user_zipcode = $('#user-zip').value;
			var user_phone_num = $('#user-phone').value;
			var user_id = sessionStorage.getItem("user_id");


			
			console.log(serializedGeneralInformation);
			$.ajax({
				url: 'update_general_information.php',
				type: 'post', 
				data: {user_id: user_id, user_first_name: user_first_name, user_last_name: user_last_name, user_address_1: user_address_1, user_address_2: user_address_2, user_city: user_city, user_state: user_state, user_zipcode: user_zipcode, user_phone_num: user_phone_num},
				dataType: 'json',
				success: function(response){
					var message = response;
					if(message === 0) {
						alert("General User Information has been updated.");
					}
					else if(message === 1) {
						alert("There was an error updating the General User Information.");
					}
				}
			});
		});

		$('#banking-information-save').on('click', function(event){
			var credit_card = $('#cc-num').val();
			var expiration_month = $('#expiration_month').val();
			var expiration_year = $('#expiration_year').val();
			var CVC = $('#cvc').val();
			var user_id = sessionStorage.getItem("user_id");


			$.ajax({
				url: 'update_bank_info.php',
				type: 'post',
				dataType: 'json',
				data: {user_id: user_id, cc_number: credit_card, expiration_month: expiration_month, expiration_year: expiration_year, cvc: CVC},
				success: function(response) {
					var message = response;
					if(message === 1){
						alert("There was an error updating the Financial Information section.");
					}
					else{
						alert("Financial Information has been updated.");
					}
				}
			});
		});


		$('#update-password-save').on('click', function(event){
			var old_password = $('#current-password').value;
			var new_passwowrd_1 = $('#new-password').value;
			var new_password_2 = $('#new-password-confirm').value;
			var user_id = sessionStorage.getItem("user_id");

			if(new_password_1 === new_password_2){
				$.ajax({
					url: 'update_user_password.php',
					type:'post',
					dataType:'json',
					data: {old_password: old_password, new_password: new_password_2, user_id: user_id},
					success: function(response){
						if(response === 2){
							alert("Your password has been changed.");
						}
						else if(response === 1){
							alert("There was a problem inserting your new password into the database. Your password remains the old password.");

						}
						else {
							alert("The password you provided didn't match the password in our database. Please make sure your 'old password' matches your currently used password.");
						}
					}
				});
			}
			else{
				alert("Your new passwords must match.");
			}
		});

		//function that populates the sidebar with notification icons
		function get_notification_badges() {

			$.ajax({
				url: 'get_notification_badges.php',
				type:'post',
				dataType: 'JSON',
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
		//calls a get to destory the php variable session
		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}


		//populates the placeholders of each of the account information fields
		function populate_account_information(){
			$.ajax({
				type: 'post',
				url:'populate_account_information.php',
				data: {user_id: sessionStorage.getItem("user_id")},
				dataType: 'json', 
				success: function(response){
					var first_name = response['first_name'];
					var last_name = response['last_name'];
					var error_general = response['error_general'];
					var error_banking = response['error_banking'];
					var email = response['email'];
					var address_1 = response['address_1'];
					var address_2 = response['address_2'];
					var city = response['city'];
					var state = response['state'];
					var zipcode = response['zipcode'];
					var cc_num = response['credit_card_num'];
					var exp_month = response['expiration_month'];
					var exp_year = response['expiration_year'];
					var CVC = response['cvc'];
					var phone_num = response['user_phone'];

					console.log(error_banking);
					if(address_2 === "0"){
						address_2 = "N/A";
					}

					//general information
					$('#user-first-name').attr("value", first_name);
					$('#user-last-name').attr("value", last_name);
					$('#user-address-line1').val(address_1);
					$('#user-address-line2').val(address_2);
					$('#user-city').val(city);
					$('#user-state').val(state);
					$('#user-zip').val(zipcode);
					$('#user-phone').val(phone_num);

					//financial information
					$('#cc-number').val(cc_num);
					$('#expiration-month').val(exp_month);
					$('#expiration-year').val(exp_year);
					$('#cvc').val(CVC);
					return;
				}
			});
		}


		function notNull(value) {
			if(value === null || value === "null"){
				var not_null = "";
			}
			return not_null;
		}
	</script>
</html>
