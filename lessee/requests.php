<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='../favicon.ico' type='image/x-icon'/ >
		
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

		<title>Wherehouse | My Requests</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<!-- AJAX -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
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
					<div id="dashboard-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Dashboard</span>
					</div>
					<div id="rentals-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Your Rentals</span>
					</div>
					<div id="requests-btn" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Manage Requests</span>
					</div>
					<div id="inbox-btn" class="sidebar-btn">
						<span class="sidebar-btn-text">Inbox</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content-requests">
					<h1>Pending Requests</h1>
					<div class="request-flex">
						<div id="pending-requests" class="userbox2">
						
						
						<!-- Start Query -->
						<?php
						$servername = "mydb.ics.purdue.edu";
						$username = "g1090429";
						$password = "WhereHouse?";
						$dbname = "g1090429";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 
							$user_id = $_SESSION['user_id'];	
							$sqlWH = "SELECT contract_id, num_skids, storage_pref, total_price FROM Contract WHERE lessee_id = $user_id AND status = \"Pending\"";
							$resultWH = $conn->query($sqlWH);
							if ($resultWH->num_rows > 0) {
								// output data of each row
								while($row = $resultWH->fetch_assoc()) {
									for ($i = 0; $i < count($row["contract_id"]); $i++) {
									echo "<div class=\"attribute\">" . "<h4>Contract ID: " . $row["contract_id"]. " </h4> " . "<b>Number of Skids: </b>" . $row["num_skids"].  "<br> " . "<b>Storage Type: </b> " . $row["storage_pref"]. "<br>" . "<b>Total Price:</b> $" . $row["total_price"]. "<br><br> </div>";
									}
								}
							} else {
								echo "It looks like you currently have no pending requests! If you are in need of a storage solution, please initiate a new search.";
							}	
					
					
					echo "</div>"; 
					echo "</div>"; 
					echo "<h1>Accepted Requests</h1>
					<div class=\"request-flex\">
						<div id=\"accepted-requests\" class=\"userbox2\">";
						
						$user_id = $_SESSION['user_id'];	
							$sqlWH = "SELECT contract_id, num_skids, storage_pref, total_price FROM Contract WHERE lessee_id = $user_id AND status = \"Accepted\"";
							$resultWH = $conn->query($sqlWH);
							if ($resultWH->num_rows > 0) {
								// output data of each row
								while($row = $resultWH->fetch_assoc()) {
									for ($i = 0; $i < count($row["contract_id"]); $i++) {
									echo "<div class=\"attribute\">" . "<h4>Contract ID: " . $row["contract_id"]. " </h4> " . "<b>Number of Skids: </b>" . $row["num_skids"].  "<br> " . "<b>Storage Type: </b> " . $row["storage_pref"]. "<br>" . "<b>Total Price:</b> $" . $row["total_price"]. "<br><br> </div>";
								}
								}
							} else {
								echo "It looks like you currently have no accepted requests! If you are in need of a storage solution, please initiate a new search.";
							}	
					
						echo "</div>";
						echo "</div>"; 						
					echo "<h1>Declined Requests</h1>
					<div class=\"request-flex\">
						<div id=\"declined-requests\" class=\"userbox2\">";
						
						$user_id = $_SESSION['user_id'];	
							$sqlWH = "SELECT contract_id, num_skids, storage_pref, total_price FROM Contract WHERE lessee_id = $user_id AND status = \"Declined\"";
							$resultWH = $conn->query($sqlWH);
							if ($resultWH->num_rows > 0) {
								// output data of each row
								while($row = $resultWH->fetch_assoc()) {
									for ($i = 0; $i < count($row["contract_id"]); $i++) {
									echo "<div class=\"attribute\">" . "<h4>Contract ID: " . $row["contract_id"]. " </h4> " . "<b>Number of Skids: </b>" . $row["num_skids"].  "<br> " . "<b>Storage Type: </b> " . $row["storage_pref"]. "<br>" . "<b>Total Price:</b> $" . $row["total_price"]. "<br><br> </div>";
								}
								}
							} else {
								echo "It looks like you currently have no declined requests! If you are in need of a storage solution, please initiate a new search.";
							}	
					
						echo "</div>"; 
						echo "</div>"; 
					
					
						$conn->close();
						?>
						
						
						

						
						
						
						
						
						
						
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
					<a href="https://www.facebook.com/kayla.parker.90260403"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="https://www.instagram.com/wherehouse.8.inc/"><i class="fa fa-instagram"></i></a>
					<!-- Add a link to instagram... replace # with actual links> -->
				</div>
			</div>
		</footer>

	<script type="text/javascript">
		$("#dashboard-btn").click(function() {
			window.location = "dashboard.php";
		});
		$("#rentals-btn").click(function() {
			window.location = "rentals.php";
		});
		$("#requests-btn").click(function() {
			window.location = "requests.php";
		});
		$("#inbox-btn").click(function() {
			window.location = "inbox.php";
		});
		$(".logout-button").click(function() {
			window.location = "../index.php";
			sessionStorage.clear();
			sessionDestory();
		});
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});
		$('#zip-search').on('click', function(event) {
			window.location = "warehouse-search.php";
		});


		$(document).ready(function(event){
			$('.header-username').text(sessionStorage.getItem("user_last_name")+ ", "+sessionStorage.getItem("user_first_name"));

			//getting table for 
			$.ajax(console.log("ajax called"),{
				type:'post', 
				dataType:'json', 
				url:'get_pending_requests.php',
				data: {user_id: sessionStorage.getItem("user_id")},
				success: function(response){
					console.log(typeof(response));
					var contract_id = response.contract_id;
					console.log(contract_id);
					var start_date = response['start_date'];
					var end_date = response['end_date'];
					var total_price = response['total_price'];
					var num_skids = response['num_skids'];
					var storage_pref = response['storage_pref'];
					var deposit = response['deposit'];
					var status = response['status'];
					var warehouse_id = response['warehouse_id'];
					var error = response['error'];
					var num_rows = contract_id.length;
					var index = 0;
					if(error === false){
						$('#pending-requests').append("<table class=\"table table-white table-hover\"><thead><tr><th>Contract ID</th><th scope='col'>Warehouse ID</th><th scope='col'>Requested Duration</th><th scope='col'>Price</th><th scope='col'>Status</th></tr></thead><tbody>");
						while(index < num_rows){
							$('#pending-requests').append("<tr><td scope='col'>"+contract_id[index]+"</td><td scope='col'>"+warehouse_id[index]+"</td><td scope='col'>"+start_date[index]+" - "+end_date[index]+"</td><td scope='col'>$"+total_price[index]+"</td><td scope='col'>"+status[index]+"</td></tr>");
							index++;
						}
						$('#pending-requests').append("</tbody></table>");
					}
					else {
						alert("There has been an error");
					}
				}
			}); //end ajax call for pending requests
			
		}); //end document.ready
		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}

		
		
	</script>
</html>
