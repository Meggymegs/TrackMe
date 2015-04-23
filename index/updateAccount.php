<?php
	session_start();
	include '../mysqli_connect.php';
?>


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
		} else if (preg_match('/[\^£$%&*()}{#~?><>|=¬]/', $_GET[$field])){
			$isSpecial = true;
		}
	}
	
	if ($error) {
	    header("location:accountSettings.php?msg=fail&user_id=$user_id");
	} else if ($isSpecial){
		header("location:accountSettings.php?msg=special&user_id=$user_id");
	} else {
	
	
	$firstName = isset($_GET['firstName']) ? $_GET['firstName']: '';
	$lastName = isset($_GET['lastName']) ? $_GET['lastName']: '';
	$email = isset($_GET['email']) ? $_GET['email']: '';
	$sql = "UPDATE users_table ".
		   "SET first_name = '$firstName', last_name = '$lastName', user_email = '$email' ".
		   "WHERE user_id = 3" ;//query for changing user number 3 //needs to be changed to current person logged in
   
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	header("location:accountSettings.php?msg=success&user_id=$user_id");
	
	$conn->close();
	}
?>