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
////////////////////////////////////////////////////////////////////////////////
			
			$(document).ready(function()){
			var calendar = $('#calendar').fullCalendar({
				editable: true,
				header: {
				left: 'today, prevYear, nextYear',
				center: 'title',
				right: 'prev,next,basicDay,month'
				},
				
				eventSource: ['getEvent.php','profile.php']
				
				});
				});
				
			
			$(document).ready(function()){
				var date =  new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();
				var calendar = $('#calendar').fullCalendar({
					editable: false;
					header: {
						left:'prev,next, today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					events: "http://localhost:80/fullCalendar/getEvent.php"
					eventRender: function(event,element, view){
						if(event.allDay == 'true'){
							event.allDay = true;
						} else {
							event.allDay = false;
						}
						
						selectable: true,
						selectHelper: true,
						select: function(start, end, allDay){
							var title = prompt('Event Title:');
							if(title){
								start = $.fullCalendar.formatDate(start,"yyyy-MM-dd HH:mm:ss");
								end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
								$.ajax({
									url: 'http://localhost:80/fullCalendar/add_events.php',
									data: 'title=' + title + '&start=' + start + '&end='+ end,
									type: "POST",
									success: function(json){
									alert('Add Success');
									}
								});
								calendar.fullCalendar('renderEvent',
								{
									title: title,
									start: start,
									end: end,
									allDay: allDay
								},
									true
								);
							}
							calendar.fullCalendar('unselect');
						},
						editable: true,
						eventDrop: function(event, delta){
							start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
							end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
							$.ajax({
								url: 'http://localhost:80/fullCalendar/add_events.php',
									data: 'title=' + title + '&start=' + start + '&end='+ end,
									type: "POST",
									success: function(json){
									alert('Update Successfull');
									}
								});
							}
						});
					});
							
			*/
			//to set the calendar to today date
			var date = $('#calendar').fullCalendar('today');
			
			$('#calendar').fullCalendar('gotoDate', date);
			
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
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/images/profilePic.jpg" class="navbar-pic" height="20" width="20"><font color = "white">Mark Romantigue </font><span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="profile.html">Profile</a></li>
					<li><a href="accountSettings.html">Account Settings</a></li>
					<li><a href="calendar.html">Calendar</a></li>
					<li><a href="index.html">Log Out</a></li>
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
				<img src="assets/images/profilePic.jpg" class="sidebar-pic" height="40" width="40">
				Mark&nbspGenesis<br><br>
				<b>Age:</b>&nbsp19 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Weight:</b>&nbsp56kg&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Height:</b>&nbsp5'&nbsp4"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Target&nbspWeight:</b>&nbsp54kg&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<b>Current&nbspTraining&nbspSet:</b>&nbspA
			</div>
			
			<div class="col-md-3"><!--form for physical act and food intake-->
				
				<form action='' method="post">
					
					<span class="thumb"><h3>Physical Activity</h3></span>
						<input id="togList1" type="checkbox">
						  <label for="togList1">
							<span><p><span style="color:#AA3939;">ClLICK ME!</span> to add time based activities</p></span>
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list1">
							<ul style="margin-left:-40px;">
								<strong>Activity</strong><span style="margin-left:50px;"><strong>Duration</strong><br>
								<input class="listCont" type="checkbox" name="vehicle" value="running">Running</input> <input name="duration" type="number" style="margin-left:35px;width:50px; height:22px"><br> 
								<input class="listCont" type="checkbox" name="vehicle" value="walking">walking</input> <input name="duration" type="number" style="margin-left:41px;width:50px; height:22px"><br> 
							</ul>
						  </div><!--end of list-->
					
						<input id="togList2" type="checkbox">
						  <label for="togList2">
							<span><p><span style="color:#AA3939;">ClLICK ME</span> to add repetitions and sets based activities</p></span>
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list2">
							<ul style="margin-left:-40px;">
								<strong>Activity</strong><span style="margin-left:50px;"><strong>Reps</strong><span style="margin-left:50px;"><strong>Sets</strong><br>
								<input class="listCont" type="checkbox" name="vehicle" value="pushUp">Push up</input> <input name="duration" type="number" style="margin-left:30px;width:50px; height:22px"> <input name="duration" type="number" style="margin-left:25px;width:50px; height:22px"><br> 
								<input class="listCont" type="checkbox" name="vehicle" value="pullUp">Pull up</input> <input name="duration" type="number" style="margin-left:39px;margin-top:2px;width:50px;height:22px"> <input name="duration" type="number" style="margin-left:25px;width:50px; height:22px"><br> 
							</ul>
						  </div><!--end of list-->
					
					&middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot &middot
					
					<span class="thumb"><h3>Food intake</h3></span>
						<input id="togList3" type="checkbox">
						  <label for="togList3">
							<span><p><span style="color:#AA3939;">ClLICK ME</span> to add food consumed</p></span>
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list3">
							<ul style="margin-left:-40px;">
								<strong>Activity</strong><span style="margin-left:20px;"><strong>Servings & </span><span style="margin-left:2px;">Servings</strong><br>
								<input class="listCont" type="checkbox" name="vehicle" value="egg">Egg</input> 
									<select name="servings_1" style="margin-left:43px; width:45px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="servings_2" style="margin-left:20px; width:45px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice egg-->
								<input class="listCont" type="checkbox" name="vehicle" value="pork">Pork</input> 
									<select name="servings_1" style="margin-left:38.5px; width:45px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="servings_2" style="margin-left:20px; width:45px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice pork-->
								<input class="listCont" type="checkbox" name="vehicle" value="chicken">Chicken</input> 
									<select name="servings_1" style="margin-left:17.3px; width:45px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="servings_2" style="margin-left:20px; width:45px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice chicken-->
								<input class="listCont" type="checkbox" name="vehicle" value="bread">Bread</input> 
									<select name="servings_1" style="margin-left:29.5px; width:45px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="servings_2" style="margin-left:20px; width:45px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice chicken-->
							</ul>
						  </div><!--end of list-->
					
					<input type="submit" value="Submit" style="width:30%; margin-left:65px; margin-top:20px; border-radius:4px; background-color:#AA3939; color:white;">
				</form>
				
			</div>
			
			<div class="col-md-6"> <!--for the calendar-->
				<h1 align="center">MY CALENDAR</h1>
				<div id="calendar"></div>
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
			
			<?php
			$servername = "localhost";
			$username = "username";
			$password = "password";
			$dbname = "myDB";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "INSERT INTO physical_activities_rep_type_table (physical_activity_rep_type)
					VALUES ('')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
		?>
-->