<!DOCTYPE html>
<html>
	<head>
		<title>Owner Registration</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!-- AJAX -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
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
							<h1 id="owner-registration-title">WhereHouse Owner Registration</h1>
							<form>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-first-name">First Name</label>
										<input type="text" class="form-control" id="user-first-name" aria-describedby="enterFirstName" placeholder="First Name">
									</div>
									<div class="col">
										<label for="user-last-name">Last Name</label>
										<input type="text" class="form-control" id="user-last-name" aria-describedby="enterLastName" placeholder="Last Name">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-email">Email</label>
										<input type="email" class="form-control" id="user-email" aria-describedby="enterEmail" placeholder="Email"/>
									</div>
									<div class="col">
										<label for="user-phone">Phone Number</label>
										<input type="text" class="form-control" id="user-phone" aria-describedby="enterPhone" placeholder="Phone Number"/>
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-dob">Birth Date</label>
										<input type="date" class="form-control" id="user-dob" aria-describedby="enterDateOfBirth">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-street-1">Address Line 1</label>
										<input type="text" class="form-control" id="user-street-1" aria-describedby="enterStreetAddress1" placeholder="Address Line 1">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-street-2">Address Line 2</label>
										<input type="text" class="form-control" id="user-street-2" aria-describedby="enterStreetAddress2" placeholder="Address Line 2">
									</div>
								</div>
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-city">City</label>
										<input type="text" class="form-control" id="user-city" aria-describedby="enterCity" placeholder="City">
									</div>
									<div class="col">
										<label for="user-state">State</label>
										<select type="select" class="form-control" id="user-state" aria-describedby="enterState" placeholder="State">
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
								</div>
								<div class="form-row form-spacing">
									<div class="col-auto">
										<button type="submit" class="btn btn-submit">Submit</button>
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
		$("#user-phone").inputmask({"mask": "(999) 999-9999"});

	</script>
</html>