<?php
	if(isset($_GET['msg'])){	
		$msg = $_GET['msg'];
		if ($msg ==  "fail"){
			?> <script> alert("Please fill up all fields!"); </script> <?php
		} else if ($msg ==  "special"){
			?> <script> alert("Special Characters ()!#$%^&* are not allowed!"); </script> <?php
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Track Your Fitness - TrackMe</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">		
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/signup-in-style.css">
	</head>
	<body>

		<nav class="navbar navbar-static-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><img src="assets/images/TRACKME LOGO2.png" alt="Logo" class="logo"></a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="content">
				<form action="createuser.php" method="post">
					<h2>Sign Up</h2>
					<hr>
					First Name: <input type="text" name="first_name" size="50" value="">
					<br><br>
					Last Name: <input type="text" name="last_name" size="50" value="">
					<br><br>
					Email Address: <input type="text" name="email" size="30" value="">
					<br><br>
					Password: <input type="password" name="password" size="20" value="">
					<br><br>
					Re-Type Password: <input type="password" name="repass" size="20" value="">
					<br><br>
				
				
				<div id="bday-content">
					Birthday: <input type="date" name="bday">
				</div>
				
				<input class="btn-danger" type="submit" name="submit" value="Sign up">
				</form>
			</div>
		</div><!-- container -->
	
	</body>
</html>