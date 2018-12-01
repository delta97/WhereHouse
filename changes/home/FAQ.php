<!DOCTYPE html>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
		<!-- 3rd party footer content -  -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | FAQ</title>

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
			<section>
			<div class="nav">
				<div class="flex-logo">
					<span class="logo-text"><a href="../index.php">WhereHouse</a></span>
				</div>
				<span class="navbar-item"><a href="../index.php">Home</a></span>
				<span class="navbar-item"><a href="about.php">About</a></span>
				<span class="navbar-item"><a href="FAQ.php">FAQ</a></span>
			</div>
			
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
 $(document).ready(function() {
 
    $('.faq_question').click(function() {
 
        if ($(this).parent().is('.open')){
            $(this).closest('.faq').find('.faq_answer_container').animate({'height':'0'},500);
            $(this).closest('.faq').removeClass('open');
 
            }else{
                var newHeight =$(this).closest('.faq').find('.faq_answer').height() +'px';
                $(this).closest('.faq').find('.faq_answer_container').animate({'height':newHeight},500);
                $(this).closest('.faq').addClass('open');
            }
 
    });
 
});
</script>
<style>
/*FAQS*/
.faq_question {
    margin: 0px;
    padding: 0px 0px 3px 20px;
    display: inline-block;
    cursor: pointer;
	font_size: 20px;
	background-color: #f2f2f2;
	width: 100%;
	border: red;
	border-width: 5px 0px 0px 0px;
	vertical_align: center;
}
 
.faq_answer_container {
    height: 0px;
    overflow: hidden;
    padding: 0px 0px 0px 25px;
	display: inline-block;
	width: 100%:
	min-height: 50px;
}
.faq_answer {
	float: left;
	padding-right: 30px;
	padding-bottom: 20px;
}
.text {
  overflow:hidden;
  display: block;
  padding: 5px 5px 5px 5px;
  vertical-align: center;
}
.faq_container {
	width: 100%;
	vertical_align: center;
}
i {
    border: solid black;
    border-width: 0 1px 1px 0;
    display: inline-block;
    padding: 3px
}
.down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
.faq {
	padding: 0px;
}
</style>
<br>
<center><h1> Frequently Asked Questions (FAQ) </h1><br></center>
<div class="faq_container">
   <div class="faq">
      <div class="faq_question"><font size="48" color="fcc02a">Q.</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Can I be both a lessee and owner on the same account?&nbsp;&nbsp;<i class="arrow down"></i></div>
           <div class="faq_answer_container">
              <div class="faq_answer"><font size="40" color="#D3D3D3">A.</font></div>
			  <div class="text">No, if you have a warehouse you'd like to rent space out of, but you'd also like to utilize space in other locations, you should make two different accounts. This will help both us and you better keep track of any transactions.</div>
           </div>        
    </div>
 </div>
<div class="faq_container">
   <div class="faq">
      <div class="faq_question"><font size="48" color="fcc02a">Q.</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;How do payments work?&nbsp;&nbsp;<i class="arrow down"></i></div>
           <div class="faq_answer_container">
              <div class="faq_answer"><font size="40" color="#D3D3D3">A.</font></div>
			  <div class="text">If you are renting out warehouse space, you will need to provide your banking information. If you're renting warehouse space, you'll need to link a credit card to your account.</div>
           </div>        
    </div>
 </div>
 <div class="faq_container">
   <div class="faq">
      <div class="faq_question"><font size="48" color="fcc02a">Q.</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Can I rent out my warehouse to more than one lessee at a time?&nbsp;&nbsp;<i class="arrow down"></i></div>
           <div class="faq_answer_container">
              <div class="faq_answer"><font size="40" color="#D3D3D3">A.</font></div>
			  <div class="text">Yes! As long as you have the space, you can rent out to as many lessees as you want.</div>
           </div>        
    </div>
 </div>
 <div class="faq_container">
   <div class="faq">
      <div class="faq_question"><font size="48" color="fcc02a">Q.</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What if I want to renew my existing storage contract?&nbsp;&nbsp;<i class="arrow down"></i></div>
           <div class="faq_answer_container">
              <div class="faq_answer"><font size="40" color="#D3D3D3">A.</font></div>
			  <div class="text">Once contracts are finalized, they cannot be renewed or changed. Therefore, if you want to continue to utilaze storage at at a facility you just rented rom, you must sign an entirely new contract with them for the desired extended time.</div>
           </div>        
    </div>
 </div>
 <div class="faq_container">
   <div class="faq">
      <div class="faq_question"><font size="48" color="fcc02a">Q.</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What if my warehouse is damaged?&nbsp;&nbsp;<i class="arrow down"></i></div>
           <div class="faq_answer_container">
              <div class="faq_answer"><font size="40" color="#D3D3D3">A.</font></div>
			  <div class="text">Answer here.</div>
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
		$(document).ready(function(event){
			//clear the session caches
			sessionDestroy();
			sessionStorage.clear();
		});
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
