<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Track Your Fitness - TrackMe</title>
		<meta charset="UTF-8">
		<meta name="veiwport" content="wdith=device-width, initial-scale=1.0">
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
				<form action="adminCheckLogin.php" method="post">
					<h2>Admin Sign In</h2>
					<hr>
					Email Address: <input type="text" name="myusername" placeholder="Email Address" id="myusername"/>
					<br /><br />
					Password: <input type="password" name="mypassword" placeholder="Password" id="mypassword"/>
					<br /><br />
					<button class="btn-danger">Submit</button>
				</form>
		<?php
	    if(isset($_GET['message'])){
	    $msg = $_GET['message'];
	    echo $msg;
	    
	    }
		?>
			</div>
		</div>

	
	</body>
</html>