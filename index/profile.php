<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['myusername'])){ //if login in session is not set
    header("Location:signin.php");
	
	include '../mysqli_connect.php';
}
?>

<!doctype html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href='css/fullcalendar/fullcalendar.css' />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.theme.min.css">
		<link rel="stylesheet" href="css/profile.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<script src='js/lib/jquery.min.js'></script>
		<script src="js/bootstrap.min.js"></script>
		<script src='js/lib/moment.min.js'></script>
		<script src='js/fullcalendar.js'></script>
		<script type="text/javascript" src="js/bmicalc.js"></script>
		<script>
		$(document).ready(function() {
			// page is now ready, initialize the calendar...
				
				$('#calendar').fullCalendar({
				defaultDate: '2015-02-12',
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: [
					{
						title: 'All Day Event',
						start: '2015-02-01',
						backgroundColor: '#FF4000',
						borderColor: '#FF4000'
					},
					{
						title: 'Long Event',
						start: '2015-02-07',
						end: '2015-02-10',
						backgroundColor: '#FF4000',
						borderColor: '#FF4000'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2015-02-09T16:00:00',
						backgroundColor: '#ED1317',
						borderColor: '#ED1317'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2015-02-16T16:00:00',
						backgroundColor: '#ED1317',
						borderColor: '#ED1317'
					},
					{
						title: 'Conference',
						start: '2015-02-11',
						end: '2015-02-13',
						backgroundColor: '#A901DB',
						borderColor: '#A901DB'
					},
					{
						title: 'Meeting',
						start: '2015-02-12T10:30:00',
						end: '2015-02-12T12:30:00',
						backgroundColor: '#A901DB',
						borderColor: '#A901DB'
					},
					{
						title: 'Meeting',
						start: '2015-02-12T14:30:00',
						backgroundColor: '#A901DB',
						borderColor: '#A901DB'
					},
					{
						title: 'Happy Hour',
						start: '2015-02-13T17:30:00',
						backgroundColor: '#04B404',
						borderColor: '#04B404'
					},				
					{
						title: 'Click for Google',
						url: 'http://google.com/',
						start: '2015-02-28'
					}
				],
		
			});
				
			/*
				$('#calendar').fullCalendar({
				
				dayClick: function(date, jsEvent, view) {
					
						alert('Clicked on: ' + date.format() + '\nCoordinates: ' 
						+ jsEvent.pageX + ',' + jsEvent.pageY + '\nCurrent view: ' + view.name);
					
					// change the day's background color just for fun
					$(this).css('background-color', '#5FB404');
					
					}
			
				});
			*/
		});
		
		</script>
	</head>
	<body style="background-color:#2d3e50;">
		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="profile.html">
				<img class="logo" src="assets/images/trackmelogo.png">
			  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				  
						<img src="
							<?php
							$myusername = $_SESSION['myusername'];
							include '../mysqli_connect.php';
							$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
							while ($row = mysqli_fetch_assoc($result)) {
								echo $row['user_profile_pic'];
							}
							?>
						" class="navbar-pic" height="20" width="20"><font color = "white">
						
					<?php
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['first_name']. " " . $row['last_name'];
					}
					?>
				  </font><span class="caret"></span></a>
				  
				  <ul class="dropdown-menu" role="menu">
					<li><a href="profile.html">Profile</a></li>
					<li><a href="accountSettings.html">Account Settings</a></li>
					<li><a href="calendar.html">Calendar</a></li>
					<li><a href="logout.php">Log Out</a></li>
					<li class="divider"></li>
					<li><a href="#">Help</a></li>
					<li><a href="#">Report a problem</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="container">
			<div class="col-md-2"> <!--for the user info -->
			
				<img src="
					<?php
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['user_profile_pic'];
					}
					?>
				" class="sidebar-pic" height="40" width="40">
				
				<?php
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['first_name'];
					}
				?><br><br>
				<b>Age:</b>&nbsp19 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Weight:</b>&nbsp56kg&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Height:</b>&nbsp5'&nbsp4"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Target&nbspWeight:</b>&nbsp54kg&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Current&nbspTraining&nbspSet:</b>&nbspA
			</div>
			
			<div class="col-md-3"><!--form for physical act and food intake-->
				
				<form>
					<h3>Physical Activity</h3>
					Activity: <select style="margin-left:30px; width:100px;">
						<option value="running">Running</option>
						<option value="walking">Walking</option>
					</select><br><br>
					Duration: <select style="margin-left:20px; width:100px;">
						<option value="10">10 mins</option>
						<option value="15">15 mins</option>
						<option value="20">20 mins</option>
						<option value="25">25 mins</option>
						<option value="30">30 mins</option>
					</select>
					<br><br>
					Activity: <select style="margin-left:30px; width:100px;">
						<option value="pushUp">Push up</option>
						<option value="pullUp">Pull up</option>
					</select>
					<br><br>
					Repetition: <select style="margin-left:10px; width:100px;">
						<option value="10">10 reps</option>
						<option value="15">15 reps</option>
						<option value="20">20 reps</option>
						<option value="25">25 reps</option>
						<option value="30">30 reps</option>
					</select>
					
					<h3>Food Intake</h3>
					Food: <select style="margin-left:40px; width:100px;">
						<option value="eggs">Eggs</option>
						<option value="pancake">Pancake</option>
						<option value="rice">Rice</option>
						<option value="chicken">Chicken</option>
					</select><br><br>
					Servings: <select style="margin-left:18px;">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					& <select>
						<option value="0">0</option>
						<option value=".5">1/2</option>
						<option value=".33">1/3</option>
						<option value=".25">1/4</option>
						<option value=".2">1/5</option>
						<option value=".17">1/6</option>
					</select>
					<input type="submit" value="Submit" style="width:30%; margin-left:65px; margin-top:20px; border-radius:4px; background-color:#AA3939; color:white;">
				</form>
				
			</div>
			
			<div class="col-md-6"> <!--for the calendar-->
				<div id="calendar">
				</div>
			</div>
			
		</div>
	</body>
</html>

<!--
<div class="col-md-6"> 
			<h1>Training Set A</h1>
			<br>
			<br>
			<img src="assets/images/situp.gif" width="100%" height="100%">
			<img src="assets/images/situp2.gif" width="100%" height="100%">
			<br><br>
			<h1>Your Guide to Getting Enough Omega-3 Fatty Acids</h1>
			"Omega-3s are healthy polyunsaturated fats, and an essential part of a heart-healthy diet," explains Suzanne Steinbaum, DO, founding member of the Global Nutrition and Health Alliance (GNHA) and director and attending cardiologist of the Women and Heart Disease Center at Lenox Hill Hospital. "They've been shown to decrease cholesterol, lower inflammation, and prevent clotting." Research has linked omega-3 fatty acids to improved cognition and a reduced risk of depression, Alzheimer's disease, and even sudden death. But more than half of Americans questioned if they were getting enough in their diets, finds a recent GNHA poll. Here five ways to up your intake.
			</div>
			
			<center>
			<form><table border="0" width="100%" height="300" align="center" style="border:1px solid #000"><thead><tr><th colspan="2">Body Mass Index</th></tr></thead><tbody><tr><td colspan="2" align="center"><label for="d1"><input type="radio" id="d1" name="d" value="1,1">cm/kg</label><label for="d2"><input type="radio" id="d2" name="d" value="2.54,2.2">in/lb</label></td></tr><tr><td align="right"><label for="h">Height:</label></td><td align="left"><input type="text" id="h" name="h" size="6"></td></tr><tr><td align="right"><label for="w">Weight:</label></td><td align="left"><input type="text" id="w" name="w" size="6"></td></tr><tr><td colspan="2" align="center"><input type="button" value="Calculate" onclick="calc(this.form);return false;"></td></tr><tr><td align="right"><label for="f">BMI:</label></td><td align="left"><input type="text" id="f" name="f" size="6" readonly="readonly"></td></tr></tbody></table></form>
			</center>
-->