<!DOCTYPE html>
<html>
	<head>
		<title>Success!</title>
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
			<div class="flexbox-wrapper-success body max-height">
				<div class="success">
					<h1>Congrats, you are now a registered member of <span class="logo-text">WhereHouse Inc.</span></h1>
					<h2>Return to the home page to log in with your credentials</h2>
					<div class="success-buttons">
						<button type="button" class="btn success-home-btn">Return Home</button>

						<script type="text/javascript">
							$(".success-home-btn").on("click",function(event) {
								window.location = "../../index.php";
							});				
						</script>
						
						<button type="button" class="btn success-login-btn" data-toggle="modal" data-target="#login-modal">Log In</button>
					</div>
				</div>
			</div>
			<!-- login modal -->
			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h2 class="modal-title" id="login-modal-title">Log In</h2>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="post">
									<div class="form-group">
								    	<label for="login-modal-email">Email address</label>
								    	<input type="text" name="login-modal-email" class="form-control" id="login-modal-email" aria-describedby="enterEmail" placeholder="Enter email">
								  	</div>
								  	<div class="form-group">
								    	<label for="login-modal-password">Password</label>
								    	<input name="login-modal-password" type="password" class="form-control" id="login-modal-password" placeholder="Password">
								  </div>
								</form>
								
							</div>
							<div class="modal-footer">
   								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
   								<button type="button" class="btn btn-next" id="btn-login-lessee">Log In Lessee</button>
   								<button type="button" class="btn btn-next" id="btn-login-owner">Log In Owner</button>
 							</div>
						</div>
					</div>
				</div>
			<div class="footer">
			</div>
		</div>
	</body>
	
</html>