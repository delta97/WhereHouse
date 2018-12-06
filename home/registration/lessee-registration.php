<!DOCTYPE html>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'>
		<title>Lessee Registration</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<!-- Link to the style sheet -->
		<link rel="stylesheet" href="../../style.css"> 
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<!-- Robin Herbots's (jQuery) Inputmask -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
	</head>
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../../index.php"><img class="logo" src="../../logo.png"></a></span>
				</div>
			</div>
			<div class="nav">
				<div class="flex-logo">
					<span class="logo-text"><a href="../../index.php">WhereHouse</a></span>
				</div>
				<span class="navbar-item"><a href="../../index.php">Home</a></span>
				<span class="navbar-item"><a href="../about.php">About</a></span>
				<span class="navbar-item"><a href="../FAQ.php">FAQ</a></span>
			</div>
			<div class="body max-height">
				<div class="container max-height">
					<div class="row max-height">
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0 .red-left">
						</div>
						<div class="col-lg-8 col-md-10 col-sm-10 col-xs-12 white">
							<h1 id="lessee-registration-title">WhereHouse Lessee Contact Information</h1>
							<div class="progress lessee-reg-progress">
								<div class="progress-bar progress-bar-striped bg-info" role="progressbar progress-bar " style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<form id="lessee-form" name="submit_lessee_registration.php">
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-first-name">First Name</label>
										<input type="text" class="form-control capitalize" name="user-first-name" id="user-first-name" aria-describedby="enterFirstName" placeholder="First Name">
									</div>
									<div class="col">
										<label for="user-last-name">Last Name</label>
										<input type="text" class="form-control capitalize" name="user-last-name" id="user-last-name" aria-describedby="enterLastName" placeholder="Last Name">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-email">Email</label>
										<input type="email" class="form-control" name="user-email" id="user-email" aria-describedby="enterEmail" placeholder="Email"/>
										<small id="emailPrompt" class="form-text text-muted">Remember this! You'll use it to log in.</small>
									</div>
									<div class="col">
										<label for="user-phone">Phone Number</label>
										<input type="text" class="form-control" name="user-phone" id="user-phone" aria-describedby="enterPhone" placeholder="Phone Number"/>
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-password">Password</label>
										<input type="password" class="form-control" name="user-password" id="user-password" aria-describedby="enter password" placeholder="Password"/>
										<small id="password-prompt" class="form-text text-muted">Passwords must be between 8 and 20 characters and contain at least one capital letter and one special character.</small>
									</div>
									<div class="col">
										<label for="user-password-confirm">Confirm Password</label>
										<input type="password" class="form-control" name="user-password-confirm" id="user-password-confirm" aria-describedby="re enter your password" placeholder="Confirm Your Password"/>
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-dob">Birth Date</label>
										<input type="date" class="form-control" name="user-dob" id="user-dob" aria-describedby="enterDateOfBirth">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-street-1">Address Line 1</label>
										<input type="text" class="form-control" name="user-street-1" id="user-street-1" aria-describedby="enterStreetAddress1" placeholder="Address Line 1">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-street-2">Address Line 2</label>
										<input type="text" class="form-control" name="user-street-2" id="user-street-2" aria-describedby="enterStreetAddress2" placeholder="Address Line 2">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-city">City</label>
										<input type="text" class="form-control" name="user-city" id="user-city" aria-describedby="enterCity" placeholder="City">
									</div>
									<div class="col">
										<label for="user-state">State</label>
										<select type="select" class="form-control" name="user-state" id="user-state" aria-describedby="enterState" placeholder="State">
											<option value="null">Select State</option>
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
										<label for="user-zip">Zipcode</label>
										<input type="text" class="form-control" name="user-zip" id="user-zip" aria-describedby="enterZip" placeholder="Zipcode"></input>
									</div>
								</div>
								<h2>Payment Information</h2>
								<div class="form-row form-spacing flex-center">
									<div class="col-lg-6 col-md-6">
										<label for="cc_num">Credit Card Number</label>
										<input type="number" class="form-control" name="cc_num" id="cc_num" placeholder="Credit Card Number">
									</div>
									<div class="col-lg-2 col-md-2">
										<label for="exp-month">Expiration Month</label>
										<input class="form-control" type="number" maxlength="2" name="exp-month" id="exp-month" placeholder="MM">
									</div>
									<div class="col-lg-2 col-md-2">
										<label for="exp-year">Expiration Year</label>
										<input type="number" class="form-control" maxlength="4" name="exp-year" id="exp-year" placeholder="YYYY">
									</div>
									<div class="col-lg-2 col-md-2">
										<label for="CVC">CVC</label>
										<input type="number" class="form-control" id="CVC" name="CVC" placeholder="CVC">

									</div>
								</div>
								<small style="margin-bottom: 5px"class="form-text text-muted">This information will be used to pay for rented warehouse space.</small>
								<div class="form-row form-spacing">
									<div class="col-auto">
										<button id="form-submit-btn" class="btn btn-submit">Submit</button>
									</div>
								</div>
								<div class="form-row form-spacing">
									<div id="submit-div" class="col-auto">
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-0 .red-right">
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
			</div>
		</div>
	</body>
		<script type="text/javascript">
		//input mask for the phone number field
	

		$("#user-phone").inputmask({"mask": "(999) 999 - 9999"});
			
		function validation(){
			var password = $('#user-password').val();
			var password_confirm = $('#user-password-confirm').val();
			if(password.length >= 8 && password.length <= 20){
				console.log("user_password.length " + user_password.length);
				console.log("user_password_confirm.length " + user_password_confirm.length);
				var special_char = false; //false means there are no special characters in the password
				var capital_letter = false; //false means there are no capital letters in the password
				var i = 0;
				while (i < user_password.length) {
					var letter = user_password.charAt(i);
					if(letter === '!' || letter ==='@' || letter === '#' || letter === '$' || letter  === '%' || letter === '^' || letter === '&' || letter === '*'){
						special_char = true;
					}
					else if(!(letter === '!' || letter ==='@' || letter === '#' || letter === '$' || letter  === '%' || letter === '^' || letter === '&' || letter === '*')) {
						if(letter.toUpperCase() === letter){
						capital_letter = true;
						}
					}
					i++;
			}
			if(special_char === false) {
				$("#submit-div").append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\">Make sure your password has at least one of the following characters: <strong>!, @, #, $, %, ^, &, or *</strong>.</div>");
			}
			if(capital_letter === false){
				$("#submit-div").append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\">Make sure your password has <strong>at least one capital leter</strong>.</div>");
			}
			if(verifyFilled() === false) {
				$("#submit-div").append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\"><strong>All fields are required. Make sure you didn't miss any!</strong></div>");
			}
			if(!(password === password_confirm)){
				$("#submit-div").append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\"><strong>Your passwords must match!</strong></div>");
			}
			if(capital_letter === true && special_char === true && verifyFilled() === true){
				

				$.ajax({
				type: 'POST', 
				url: 'submit_lessee_registration.php', 
				data: $('#lessee-form').serialize(), 
				success: function(response) {
					var first_name = response['first_name'];
					var last_name = response['last_name'];
					var user_id = response['user_id'];
					var cc_num = response['cc_num'];
					var exp_month = response['exp_month'];
					var exp_year = response['exp_year'];
					var cvc = response['cvc'];

					sessionStorage.setItem("user_first_name", first_name);
					sessionStorage.setItem("user_last_name", last_name);
					sessionStorage.setItem("user_id", user_id);
					window.location = "registration_success.php";
					$.ajax({
						url:'submit_lessee_portion.php',
						type: 'post',
						dataType: 'json',
						data: {user_id: user_id, cc_num: cc_num, exp_month: exp_month, exp_year: exp_year, cvc:cvc},
						success: function(response){
							var error = response['error'];
							if(error === 1){
								$('#submit-div').append("<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\">There was an error inserting your information into the database. Please register again.</div>");
							}
							else {
								$('#submit-div').append('<div style=\"margin: 10px;\" class=\"alert alert-danger\" role=\"alert\">There already exists a user with that email. Please register again with a different email.</div>');
							}
						}
					});
				}
			});

			}
		}
			

		//checking to make sure the password is between 8 and 20 characters
			
					
		function verifyFilled() {
			var first_name = $('#user-first-name').value;
			var last_name = $('#user-last-name').value;
			var email = $('#user-email').value;
			var phone_num = $('#user-phone').value;
			var password = $('#user-password').value;
			var birth_date = $('#user-dob').value;
			var address1 = $('#user-street-1').value;
			var address2 = $('#user-street-2').value;
			var city = $('#user-city').value;
			var state = $('#user-state').value;
			var zipcode = $('#user-zip').value;
			var cc_num = $('#cc_num').value;
			var exp_month = $('#exp-month').value;
			var exp_year = $('#exp-year').value;
			var CVC = $('#CVC').value;



			if((first_name === null || first_name === "" || first_name === " ") || (last_name === null || last_name === "" || last_name === " ") || (email === null || email === "" || email === " ") || (phone_num === null || phone_num === "" || phone_num === " ") || (password === null || password === "" || password === " ") || (birth_date === null || birth_date === "" || birth_date === " ") || (address1 === null || address1 === "" || address1 === " ") || (address2 === null || address2 === "" || address2 === " ") || (city === null || city === "" || city === " ") || (state === null || state === "" || state === " ") || (zipcode === null || zipcode === "" || zipcode === " ") || (cc_num === null || cc_num === "" || cc_num === " ") || (exp_month === null || exp_month === "" || exp_month === "") || (exp_year === null || exp_year === "" || exp_year === "") || (CVC === null || CVC === "" || CVC === "")){
				var submit_okay = false;
			}
			else {
				submit_okay = true;
			}
			return submit_okay;
		}

		

		
		$('#lessee-form').on('submit', function(event) {
			event.preventDefault();
			$('#submit-div').empty();
			validation();
		});

		//password validation function

		
		
		function validation() {
			var password = $("#user-password").val();
			var password_confirm = $("#user-password-confirm").val();
			var special_char = false;
			var i = 0;
			var caps = false;
			var equivalent = false;
			

			//Form Variable Checking
			var first_name = document.getElementById("user-first-name").value;
			var last_name = document.getElementById("user-last-name").value;
			var email = document.getElementById("user-email").value;
			var phone = document.getElementById("user-phone").value;
			var password = document.getElementById("user-password").value;
			var password_confirm = document.getElementById("user-password-confirm").value;
			var DOB = document.getElementById("user-dob").value;
			var address1 = document.getElementById("user-street-1").value;
			var address2 = document.getElementById("user-street-2").value;
			var city = document.getElementById("user-city").value;
			var state = document.getElementById("user-state").value;
			var zipcode = document.getElementById("user-zip").value;

			console.log(first_name);
			console.log(last_name);
			console.log(email);
			console.log(phone);
			console.log(password);
			console.log(password_confirm);
			console.log(DOB);
			console.log(address1);
			console.log(address2);
			console.log(city);
			console.log(state);
			console.log(zipcode);

			//searches for at least one special character in the password
		
			while((!special_char && !caps) || i <= length(password)){ 
				var placemark = String(password[i]);
				if(placemark == "!" || placemark == "@" || placemark == "#" || placemark == "$" || placemark == "%" || placemark == "^" || placemark == "&" || placemark == "*"){
					special_char = true;
				}
				if(placemark == placemark.toUpperCase()){
					caps = true;
				}
				i++;
			}
			if(password == password_confirm){
				equivalent = true;
				console.log("The password is equivalaent");
			}
			if(!caps){
				//validation action in the form
				console.log("Password requires at least one capital letter.");
			}
			if(!special_char){
				console.log("Password requires at least one special character: !, @, #, $, %, ^, &, or *.");
			}
			if(!equivalent){
				console.log("Your password confirmation must match the first password.");
			}
			if(caps && special_char && equivalent){
				console.log("password works");
			}
		} 

	</script>
		
</html>