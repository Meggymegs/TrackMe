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
			var calendar = $('#calendar').fullCalendar({
				defaultView: 'month',
				events: {
					url: 'http://localhost/TrackMe/events.php',
					type: 'POST', // Send post data
					error: function() {
						alert('There was an error while fetching events.');
					}
				}
			});
			
			var date = $('#calendar').fullCalendar('today');
			
			$('#calendar').fullCalendar('gotoDate', date);
		});//end of fullCalendar
		
		 
		 /*
		 $(document).ready(function() {
			  var date = new Date();
			  var d = date.getDate();
			  var m = date.getMonth();
			  var y = date.getFullYear();

			  var calendar = $('#calendar').fullCalendar({
			   editable: true,
			   header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			   },
			   
			   events: "http://localhost/TrackMe/events.php",
			   
			   // Convert the allDay from string to boolean
			   eventRender: function(event, element, view) {
				if (event.allDay === 'true') {
				 event.allDay = true;
				} else {
				 event.allDay = false;
				}
			   },
			   selectable: true,
			   selectHelper: true,
			   select: function(start, end, allDay) {
			   var title = prompt('Event Title:');
			   var url = prompt('Type Event url, if exits:');
			   if (title) {
			   var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
			   var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
			   $.ajax({
			   url: 'http://localhost:8888/fullcalendar/add_events.php',
			   data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
			   type: "POST",
			   success: function(json) {
			   alert('Added Successfully');
			   }
			   });
			   calendar.fullCalendar('renderEvent',
			   {
			   title: title,
			   start: start,
			   end: end,
			   allDay: allDay
			   },
			   true // make the event "stick"
			   );
			   }
			   calendar.fullCalendar('unselect');
			   },
			   
			   editable: true,
			   eventDrop: function(event, delta) {
			   var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			   var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			   $.ajax({
			   url: 'http://localhost:8888/fullcalendar/update_events.php',
			   data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
			   type: "POST",
			   success: function(json) {
				alert("Updated Successfully");
			   }
			   });
			   },
			   eventResize: function(event) {
			   var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			   var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			   $.ajax({
				url: 'http://localhost:8888/fullcalendar/update_events.php',
				data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
				type: "POST",
				success: function(json) {
				 alert("Updated Successfully");
				}
			   });

			}
			   
			  });
			  
		});//end of fullCalendar
		*/
		/////////////////////////////////////////////////////////////
		/*
		$(document).ready(function() {
			var calendar = $('#calendar').fullCalendar({
				defaultView: 'month',
				events: {
					url: 'http://localhost/TrackMe/events.php',
					type: 'POST', // Send post data
					error: function() {
						alert('There was an error while fetching events.');
					}
				}
			});
			
			var date = $('#calendar').fullCalendar('today');
			
			$('#calendar').fullCalendar('gotoDate', date);
		});//end of fullCalendar
		*/
				/*
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
				////////////////////////////////////////////////////////////////////////////
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
		//});//end of fullcalendar
		
		//responsible for checking all checkboxes with class name 'TimeAct'
		function checkAllTimeAct(ele) {
			 var checkboxes = document.getElementsByClassName("TimeAct");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
		 //responsible for checking all checkboxes with class name 'RepSetAct'
		 function checkAllRepSetAct(ele) {
			 var checkboxes = document.getElementsByClassName("RepSetAct");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
		 
		 //responsible for checking all checkboxes with class name 'food'
		 function checkAllFood(ele) {
			 var checkboxes = document.getElementsByClassName("food");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
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
				
				<form action="submitActivities.php" method="post">
					
					<span class="thumb"><h3>Physical Activity</h3></span>
						<input id="togList1" type="checkbox">
						  <label for="togList1">
							<span><p>Add time based activities<img src="res/addButton.png" style="margin-left:28px;" width="20px" height="20px"></p></span>
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list1" style="border:1px solid #E0E0E0; width: 260px; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Activity</strong><span style="margin-left:50px;"><strong>Hours</strong><span style="margin-left:20px;"><strong>Mins</strong><span style="margin-left:20px;"><strong>KM</strong><br>
								<input class="TimeAct" type="checkbox" name="running" value="running">Running</input> 
								<input name="run_hrs" type="number" min="0" max="24" style="margin-left:35px;width:35px; height:22px; margin-bottom:3px;"></input>
								<input name="run_mins" type="number" min="0" max="59" style="margin-left:18px;width:35px; height:22px; margin-bottom:3px;"></input>
								<input name="run_dist" type="number" min="0" max="1" style="margin-left:10px;width:35px; height:22px; margin-bottom:3px;"></input>
								<br> 
								
								<input class="TimeAct" type="checkbox" name="walking" value="walking">Walking</input> 
								<input name="walk_hrs" type="number" min="0" max="24" style="margin-left:41px;width:35px; height:22px; margin-bottom:3px;"></input>
								<input name="walk_mins" type="number" min="0" max="59" style="margin-left:18px;width:35px; height:22px; margin-bottom:3px;"></input>
								<input name="walk_dist" type="number" min="0" max="1" style="margin-left:10px;width:35px; height:22px; margin-bottom:3px;"></input>
								<br> 
								
								<input class="TimeAct" type="checkbox" name="jogging" value="jogging">Jogging</input> 
								<input name="jog_hrs" type="number" min="0" max="24" style="margin-left:38px;width:35px; height:22px; margin-bottom:3px;"></input>
								<input name="jog_mins" type="number" min="0" max="59" style="margin-left:18px;width:35px; height:22px; margin-bottom:3px;"></input>
								<input name="jog_dist" type="number" min="0" max="1" style="margin-left:10px;width:35px; height:22px; margin-bottom:3px;"></input>
								<br> 
								<!--check all-->
								<input type="checkbox" onchange="checkAllTimeAct(this)" name="chk[]" value="all" />All
							</ul>
						  </div><!--end of list-->
						<br>
						<input id="togList2" type="checkbox">
						  <label for="togList2">
							<span><p>Add rep/set based activities<img src="res/addButton.png" style="margin-left:10px;" width="20px" height="20px"></p></span>
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list2" style="overflow-y:scroll; height:100px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Activity</strong><span style="margin-left:55px;"><strong>Reps</strong><span style="margin-left:45px;"><strong>Sets</strong><br>
								<input class="RepSetAct" type="checkbox" name="pushUp" value="pushUp">Push up</input> 
								<input name="pushReps" type="number" min="0" style="margin-left:32.5px;width:50px; height:22px"> 
								<input name="pushSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
								
								<input class="RepSetAct" type="checkbox" name="pullUp" value="pullUp">Pull up</input> 
								<input name="pullReps" type="number" min="0" style="margin-left:41.5px;margin-top:2px;width:50px;height:22px"> 
								<input name="pullSets" min="0" type="number" style="margin-left:25px;width:50px; height:22px; margin-bottom:3px;"><br> 
								
								<input class="RepSetAct" type="checkbox" name="benchPress" value="benchPress">Bench press</input> 
								<input name="benchReps" type="number" min="0" style="margin-left:5.5px;width:50px; height:22px"> 
								<input name="benchSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
								
								<input class="RepSetAct" type="checkbox" name="curlUps" value="curlUps">Curl ups</input> 
								<input name="curlReps" type="number" min="0" style="margin-left:32px;margin-top:2px;width:50px;height:22px"> 
								<input name="curlSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
								
								<input class="RepSetAct" type="checkbox" name="legPress" value="legPress">Leg press</input> 
								<input name="legReps" type="number" min="0" style="margin-left:22px;margin-top:2px;width:50px;height:22px">
								<input name="legSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
								
								<input class="RepSetAct" type="checkbox" name="latPulldown" value="latPulldown">Lat pulldown</input>
								<input name="latReps" type="number" min="0" style="margin-left:4.5px;margin-top:2px;width:50px;height:22px"> 
								<input name="latSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
								
								<input class="RepSetAct" type="checkbox" name="lyingLegCurl" value="lyingLegCurl">Lying leg curl</input>
								<input name="lyingReps" type="number" min="0" style="margin-left:.5px;margin-top:2px;width:50px;height:22px">
								<input name="lyingSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
								<!--check all-->
								<input type="checkbox" onchange="checkAllRepSetAct(this)" name="chk[]" />All
							</ul>
						  </div><!--end of list--><br>
					
					&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot
					
					<span class="thumb"><h3>Food intake</h3></span>
						<input id="togList3" type="checkbox">
						  <label for="togList3">
							<span><p>Add food consumed<img src="res/addButton.png" style="margin-left:60px;" width="20px" height="20px"></p></span><!--<p>Click <span style="color:#AA3939;">ME</span> to add food consumed</p>-->
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list3" style="overflow-y:scroll; height:100px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Food</strong><span style="margin-left:40px;"><strong>Servings & </span><span style="margin-left:2px;">Servings</strong><br>
								<input class="food" type="checkbox" name="food" value="egg">Fried Eggs</input> 
									<select name="egg_srvng1" value="egg_srvng1" style="margin-left:6px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="egg_srvng2" value="egg_srvng2" style="margin-left:20px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice egg-->
								<input class="food" type="checkbox" name="food" value="beef">Beef</input> 
									<select name="beef_srvng1" value="beef_srvng1" style="margin-left:45.5px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="beef_srvng2" value="beef_srvng2" style="margin-left:20px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice pork-->
								<input class="food" type="checkbox" name="food" value="chicken">Chicken</input> 
									<select name="chicken_srvng1" value="chicken_srvng1" style="margin-left:24.3px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="chicken_srvng2" value="chicken_srvng2" style="margin-left:20px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice chicken-->
								<input class="food" type="checkbox" name="food" value="bread">Bread</input> 
									<select name="bread_srvng1" value="bread_srvng1" style="margin-left:36.5px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="bread_srvng2" value="bread_srvng2" style="margin-left:20px; width:45px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice chicken-->
									
									<!--check all-->
									<input type="checkbox" onchange="checkAllFood(this)" name="chk[]" />All
							</ul>
						  </div><!--end of list-->
					
					<input type="submit" name="submit" value="Submit" style="width:30%; margin-left:80px; margin-top:50px; margin-bottom:8px; border-radius:4px; background-color:#AA3939; color:white;"/>
				</form>
				
				
				
			</div>
			
			<div class="col-md-6"> <!--for the calendar-->
				<h1 align="center">MY CALENDAR</h1>
				<div id="calendar"></div>
			</div>
			
		</div>
	</body>
</html>