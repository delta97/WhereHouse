<!DOCTYPE html>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >

		<!-- 3rd party footer content -  -->
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | About Us</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
.team{
  display: inline-block;
  width: calc(100%);
  margin: 0 -2px;
  padding: 25px;
  box-sizing: border-box;
  cursor: pointer;
  transition: 0.4s;
}
.team:hover{
  background: #ddd;
}
.team i{
  color: #fbb413;
  font-size: 34px;
  margin-bottom: 20px;
}
.team p{
  color: gray;
  font-size: 15px;
  font-weight: 500;
}
@media screen and (max-width: 800px) {
  .service{
    width: 50%;
  }
  .team{
	  width: 50%;
  }
}
@media screen and (max-width: 500px) {
  .service{
    width: 100%;
  }
  .team{
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
								  <p>Gain access to tailored search features, 
								  secure partnerships, detailed analytics, and an optimized user interface.</p>
								</div>

								<div class="service">
								  <i class="fas fa-file-signature"></i>
								  <h2>Benefits to Owners</h2>
								  <p>Maintain revenue even in off seasons or when long term storage contracts aren't reaching your warehouse capacity. 
								  </p>
								</div>

								<div class="service">
								  <i class="fas fa-users"></i>
								  <h2>Benefits to Lessees</h2>
								  <p>Avoid steep premiums charged by other companies for short term or small scale agreements.</p>
								</div>

								<div class="service">
								  <i class="fas fa-dollar-sign"></i>
								  <h2>Affordable Membership</h2>
								  <p>A commission based fee structure makes it is easy to register as a warehouse owner no matter
								  the scale of your business.</p>
								</div>

								<div class="service">
								  <i class="fas fa-lightbulb"></i>
								  <h2>Machine Learning</h2>
								  <p>Warehouse Inc benefits both owners and lessees by recommending warehouse solutions based 
								  on individual user's search and preference history.</p>
								</div>

								<div class="service">
								  <i class="fas fa-user-lock"></i>
								  <h2>Security</h2>
								  <p>Never worry about the security of your data, payments, or assets thanks to detailed security 
								  measurments put in place throughout the website.</p>
								</div>
							  </div>
							  
							  <br><h1>The Team</h1><br>
							  <div class="team">
							  <i class="fas fa-child"></i> <i class="fas fa-child"></i> <i class="fas fa-child"></i> <i class="fas fa-child"></i> <i class="fas fa-child"></i> <i class="fas fa-child"></i> <i class="fas fa-child"></i>
							  <p>Amanda Crowe, Cole Parsons, Collin Jewett, Kayla Parker, Michael Campbell, Shriya Das, Utkuhan Genc</p>
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
</html>
