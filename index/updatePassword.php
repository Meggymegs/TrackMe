<?php
	session_start();
	include '../mysqli_connect.php';
	
	$myusername = $_SESSION['myusername'];
	$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
	$row = mysqli_fetch_assoc($result);
	$tempId = $row['user_id'];
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
	
	$required = array('currentPassword', 'newPassword', 'verifyPassword');
	$error = false;
	$isSpecial = false;
	foreach($required as $field) {
		if (empty($_GET[$field])) {
			$error = true;
		} else if (preg_match('/[\^£$%&*()}{#~?><>|=¬]/', $_POST[$field])){ //Check for special characters
			$isSpecial = true;
		}
	}
	
	if ($error) {
	    header("location:accountPassword.php?msg=fail&user_id=$tempId");
	} else if ($isSpecial){
		header("location:accountPassword.php?msg=special&user_id=$tempId");
	} else {
	
	$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); //query for placing current password in database in a variable
					while ($row = mysqli_fetch_assoc($result)) {
						$oldPassword = $row['user_password'];//assigning current password in database to a variable to be used in strcmp
					}
	
	$currentPassword = isset($_GET['currentPassword']) ? $_GET['currentPassword']: '';
	$newPassword = isset($_GET['newPassword']) ? $_GET['newPassword']: '';
	$verifyPassword = isset($_GET['verifyPassword']) ? $_GET['verifyPassword']: '';
	
	$salt = sha1(md5($currentPassword));
	$currentPassword = md5($currentPassword.$salt);//encrypts the input current password to be matched with current password in database
			
	
	if(strcmp ($oldPassword, $currentPassword) == 0){//checking if password in database matches with input current password
		if(strcmp ($newPassword, $verifyPassword) == 0){//checking if new password matches with verify new password
			$salt = sha1(md5($newPassword));
			$newPassword = md5($newPassword.$salt);
		
			$sql = "UPDATE users_table ".
			   "SET user_password = '$newPassword'".//query for updating password
			   "WHERE user_id = '$tempId'" ;//current logged in user_id will be updated
	   
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			header("location:accountPassword.php?msg=success&user_id=$tempId");
		
			$conn->close();
		} else {
			header("location:accountPassword.php?msg=fail&user_id=$tempId");
		}
	} else {
			header("location:accountPassword.php?msg=fail&user_id=$tempId");
		}
	}
	
?>