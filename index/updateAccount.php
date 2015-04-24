<?php
	session_start();
	include '../mysqli_connect.php';
	
	$myusername = $_SESSION['myusername'];
	$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
	$row = mysqli_fetch_assoc($result);
	$tempId = $row['user_id']; //current logged in user_id will be used
	
	if(isset($_GET['msg'])){	
		$msg = $_GET['msg'];
		if ($msg == "success"){
			?> <script> alert("Food added Successfully"); </script> <?php
		} else if ($msg ==  "fail"){
			?> <script> alert("Food not found. Please select one from our suggestions."); </script> <?php
		}
	}
	
	
?>

<script src='js/lib/jquery.min.js'></script>

<?php
			
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "trackme";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$user_id = isset($_GET['user_id']) ? $_GET['user_id']: '';
	
	$required = array('firstName', 'lastName', 'email');
	$error = false;
	$isSpecial = false;
	foreach($required as $field) {
		if (empty($_GET[$field])) {
			$error = true;
		} else if (preg_match('/[\^£$%&*()}{#~?><>|=¬]/', $_GET[$field])){//checking for special characters
			$isSpecial = true;
		}
	}
	
	if ($error) {
	    header("location:accountSettings.php?msg=fail&user_id=$tempId");
	} else if ($isSpecial){
		header("location:accountSettings.php?msg=special&user_id=$tempId");
	} else {
	
	
	$firstName = isset($_GET['firstName']) ? $_GET['firstName']: '';
	$lastName = isset($_GET['lastName']) ? $_GET['lastName']: '';
	$email = isset($_GET['email']) ? $_GET['email']: '';
	$sql = "UPDATE users_table ".
		   "SET first_name = '$firstName', last_name = '$lastName', user_email = '$email' ". //query for updating account details
		   "WHERE user_id = '$tempId'" ;//current logged in user_id will be updated
   
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}	
	$_SESSION['myusername'] = $email;
	header("location:accountSettings.php?msg=success&user_id=$tempId");
	
	$conn->close();
	}
?>