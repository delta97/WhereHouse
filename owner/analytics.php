<?php
session_start();
?>

<!DOCTYPE html>
<!-- owner dashboard -->
<html>
	<head>
		<!-- add favicon -->
		<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
		<!-- Righteous Font -->
		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		<!-- Roboto Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- Roboto Condensed Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<title>Wherehouse | Lessee Dashboard</title>

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

		<!-- javascript click functions -->
		<script src="../javascript/click_functions.js"></script>
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
					<div id="analytics" class="sidebar-btn active-btn">
						<span class="sidebar-btn-text">Analytics Portal</span>
					</div>
					<div id="account-info" class="sidebar-btn">
						<span class="sidebar-btn-text">Account Information</span>
					</div>
				</div>
				<div class="page-content">
					<h1>Analytics Portal</h1><br>
					
					<div class="userbox2">
<h3>Your Contracts</h3>
					

    <!-- Printing From R -->            
                
					<div class="graphic">
					<table class="conTable">
							<thead>
								<tr>
									<th>Contract Status</th>
									<th>Number of Contracts</th>
								</tr>
							</thead>
							<tbody>
							
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
                        
                        $sqlWH1 = "SELECT status, COUNT(status) FROM Contract WHERE owner_id = $user_id GROUP BY status";
                        $resultWH1 = $conn->query($sqlWH1);
					
						if ($resultWH1->num_rows > 0) {
							
						
						while($row1 = $resultWH1->fetch_assoc()) {
							$status = $row1['status'];
							$countstat = $row1['COUNT(status)'];
								for ($i = 0; $i < count($status); $i++) {
									echo"<tr>";
									echo"<td>$status</td>";
									echo"<td>$countstat</td>";
									echo"</tr>";
								}
							
								
							} 	
						}
						 else {
							echo "You have no contracts to show :(";
						}	
					

                
					echo "</tbody>
				</table>
			</div> </div>
                    
						<!-- Skids Per Contract -->
				<div class=\"userbox2\">
					<h3>Quantity of Skids per Contract</h3><p> This information may help you plan for the future by assisting in forecasting.</p>
					<div class=\"graphic\">";
					
					
						
						if ($user_id > 0 ){
						$sqlRating = "SELECT owner_id FROM Warehouse WHERE owner_id = $user_id";
						$resultRating = $conn->query($sqlRating);
						$rowRating = $resultRating->fetch_assoc();
						$answRating = $rowRating['owner_id'];
						
						
						
						$outtry = shell_exec("Rscript --verbose testR.R $answRating 2>&1");
							echo "<img src='http://web.ics.purdue.edu/~g1090429/owner/try.png'>";		
						
						}
							
						else {
							echo "Please log in with a user account. "; 
						}
						
																	
				echo "</div>
				</div>	
				
				
				
				
				
				
				
	<!-- Capacity -->
				<div class=\"userbox2\">
					<h3>Review Your Current Overall Capacity</h3><p> This plot displays the current capacity vs. current vacancies of your warehouses as a whole. </p>
					<div class=\"graphic\">";
					
					
						
						if ($user_id > 0 ){
						$sqlRating1 = "SELECT owner_id FROM Warehouse WHERE owner_id = $user_id";
						$resultRating1 = $conn->query($sqlRating1);
						$rowRating1 = $resultRating1->fetch_assoc();
						$answRating1 = $rowRating1['owner_id'];
						
						
						
						$outtry = shell_exec("Rscript --verbose capacityR.R $answRating1 2>&1");
							echo "<img src='http://web.ics.purdue.edu/~g1090429/owner/capacityPlot.png'>";		
						
						}
							
						else {
							echo "Please log in with a user account. "; 
						}
						
																
				echo "</div>
				</div>
				
				
				
				
	<!-- Rev -->
				<div class=\"userbox2\">
					<h3>Revenue Analytics</h3><p> This information may help you plan for the future </p>
					<div class=\"graphic\">";
					
				
						
						if ($user_id > 0 ){
						$sqlRating4 = "SELECT owner_id FROM Warehouse WHERE owner_id = $user_id";
						$resultRating4 = $conn->query($sqlRating4);
						$rowRating4 = $resultRating4->fetch_assoc();
						$N = $rowRating4['owner_id'];
						
						
						
						$outtry = shell_exec("Rscript --verbose analytics.R $N 2>&1");
							echo "<img src='http://web.ics.purdue.edu/~g1090429/owner/myplot2.png'>";		
						
						}
							
						else {
							echo "Please log in with a user account. "; 
						}
						
					$conn->close();
					?>												
				</div>
				</div>
				
				
					

					
					
					
					
					
					
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
		$("#account-info").click(function(event) {
			window.location = "account_info.php";
		});

		$(document).ready(function(event){
			var user_last_name = sessionStorage.getItem("user_last_name");
			var user_first_name = sessionStorage.getItem("user_first_name");
			var user_email = sessionStorage.getItem("user_email");
			var user_id = sessionStorage.getItem("user_id");
			get_notification_badges();
			$('.header-username').text(user_last_name+", "+user_first_name);
		});
		//calls a get to destory the php variable session
		function sessionDestroy() {
			$.get('sessiondestroy.php', function(response) {
				console.log(response);
			});
		}

		//function that populates the sidebar with notification icons
		function get_notification_badges() {

			$.ajax({
				url: 'get_notification_badges.php',
				type:'post',
				dataType: 'JSON',
				data:{user_id: sessionStorage.getItem("user_id")}
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
	</script>
</html>
