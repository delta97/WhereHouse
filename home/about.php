<!DOCTYPE html>
<html>
	<head>
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | About Us</title>

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
		
		
		<!-- Meet Team 
		<meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
		<style>
		body{
  margin: 0;
  padding: 0;
  font-family: 'Roboto Condensed', sans-serif;
}
.services{
  background: #ffffff;
  text-align: center;
}
.services h1{
  display: inline-block;
  text-transform: uppercase;
  border-bottom: 4px solid #e75d20;
  font-size: 20px;
  padding-bottom: 10px;
  margin-top: 40px;
}
.cen{
  max-width: 1200px;
  margin: auto;
  overflow: hidden;
  padding: 20px;
}
.service{
  display: inline-block;
  width: calc(100% / 3);
  margin: 0 -2px;
  padding: 25px;
  box-sizing: border-box;
  cursor: pointer;
  transition: 0.4s;
}
.service:hover{
  background: #ddd;
}
.service i{
  color: #fbb413;
  font-size: 34px;
  margin-bottom: 20px;
}
.service h2{
  font-size: 18px;
  text-transform: uppercase;
  font-weight: 500;
  margin: 0;
}
.service p{
  color: gray;
  font-size: 15px;
  font-weight: 500;
}
@media screen and (max-width: 800px) {
  .service{
    width: 50%;
  }
}
@media screen and (max-width: 500px) {
  .service{
    width: 100%;
  }
}
		</style>
	
	</head>	
	
	
	<body>
		<div class="flexbox-wrapper">
			<div class="header">
				<div class="flex-logo">
					<span><a href="../index.php"><img class="logo" src="../images/logo.png"></a></span>
				</div>
				<div class="search">
					<input type="text" class="search-input form-control w-100" placeholder="Search Warehouses By Zipcode" aria-label="Search">
				</div>
				<div class="flex-logo">
					<div class="login-button" id="login" data-toggle="modal" data-target="#login-modal"><span class="login-button-text">Log in</span></div>
					<div class="login-button" id="register" data-toggle="modal" data-target="#registration-modal"><span class="login-button-text">Register</span></div>
				</div>
			</div>
			<div class="nav">
				<div class="flex-logo">
					<span class="logo-text"><a href="../index.php">WhereHouse</a></span>
				</div>
				<span class="navbar-item"><a href="../index.php">Home</a></span>
				<span class="navbar-item"><a href="about.php">About</a></span>
				<span class="navbar-item"><a href="FAQ.php">FAQ</a></span>
			</div>
			<div class="body">
					
					
					
							<div class="services">
							  <h1>Our Services</h1>
							  <div class="cen">
								<div class="service">
								  <i class="fas fa-box-open"></i>
								  <h2>Storage Solutions</h2>
								  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>

								<div class="service">
								  <i class="fab fa-android"></i>
								  <h2>Service Name</h2>
								  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>

								<div class="service">
								  <i class="fab fa-angellist"></i>
								  <h2>Service Name</h2>
								  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>

								<div class="service">
								  <i class="fas fa-apple-alt"></i>
								  <h2>Service Name</h2>
								  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>

								<div class="service">
								  <i class="fas fa-archway"></i>
								  <h2>Service Name</h2>
								  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>

								<div class="service">
								  <i class="far fa-angry"></i>
								  <h2>Service Name</h2>
								  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							  </div>
							</div>	
								
								
		
		
		
								
						
						
						
				<!-- registration modal -->
				<div class="modal fade" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registration-modal-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h4 class="modal-title" id="registration-modal-title">Are you leasing or renting through WhereHouse?</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group flex-center">
									<button type="button" class="btn btn-next" id="btn-register-lessee">I want to lease a warehouse</button>
   									<button type="button" class="btn btn-next" id="btn-register-owner">I want to rent my warehouse</button>
								</div>
							</div>
							<div class="modal-footer">
   								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
 							</div>
						</div>
					</div>
				</div>
			<!-- Login Modal -->
				<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-title" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-formatting">
							<div class="modal-header">
								<h4 class="modal-title" id="login-modal-title">Existing User? Login</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
								    	<label for="login-modal-email">Email address</label>
								    	<input type="text" class="form-control" id="login-modal-email" aria-describedby="enterEmail" placeholder="Enter email">
								  	</div>
								  	<div class="form-group">
								    	<label for="login-modal-password">Password</label>
								    	<input type="password" class="form-control" id="login-modal-password" placeholder="Password">
								  </div>
							</div>
							<div class="modal-footer">
   								<button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
   								<button type="button" class="btn btn-next" id="btn-login-lessee">Log In Lessee</button>
   								<button type="button" class="btn btn-next" id="btn-login-owner">Log In Owner</button>
 							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="footer">HELLO FOOTER
			
			
			
			
			
			</div>
		</div>
		<script type="text/javascript">
			$("#home").on('click touch', function() {
				window.location = "../index.php";
			});
			$("#about").on('click touch', function() {
				window.location = "about.php";
			});
			$("#FAQ").on('click touch', function() {
				window.location = "FAQ.php";
			});
			$("#btn-login-lessee").on('click touch', function() {
				window.location = "../lessee/dashboard.php";
			});
			$("#btn-login-owner").on('click touch', function() {
				window.location = "../owner/dashboard.php";
			});
			$("#btn-register-owner").on('click touch', function() {
				window.location = "./registration/owner-registration.php";
			});
			$("#btn-register-lessee").on('click touch', function() {
				window.location = "./registration/lessee-registration.php";
			});
		</script>

	</body>
</html>
