<!DOCTYPE html>
<html>
	<head>
		<title>Lessee Registration</title>
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
							<h1 id="lessee-registration-title">Choose Your Log In Email and Password</h1>
							<div class="progress lessee-reg-progress">
								<div class="progress-bar progress-bar-striped bg-info" role="progressbar progress-bar " style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<form id="lessee-form" name="form-type" value="1" onSubmit="../../PHP/submit_data.php" method="post">
								<div class="form-row form-spacing">
									<div class="col">
										<label for="user-email">Email</label>
										<input type="text" class="form-control" name="user-email" id="user-email" aria-describedby="enterEmail" placeholder="user@email.com">
										<small id="emailPrompt" class="form-text text-muted">Remember this! You'll use it to log in.</small>
									</div>
									<div class="col">
										<label for="user-password">Password</label>
										<input type="password" class="form-control" name="user-password" id="user-password" aria-describedby="userPassword" placeholder="enter password">
										<small id="password-constraints" class="form-text text-muted">Your password must be at least 8 characters long and include at least one special character.</small>
									</div>
									<div class="col">
										<label for="password-confirmation">Confirm Your Password</label>
										<input type="password" class="form-control" name="user-password-confirm" id="user-password-confirm" aria-describedby="Confirm User Password" placeholder="re-enter password">
										<small id="password-confirm-reminder" class="form-text text-muted">This must match your password from earlier.</small>
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
		<script type="text/javascript">
			var user_email = $("#user-email").val();
			var user_password = $("#user-password-confirm").val();
			sessionStorage.setItem("user_email", user_email);
			sessionStorage.setItem("user_password", user_password);
			
		</script>
	</body>
</html>