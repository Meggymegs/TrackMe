<?php
	ini_set('display_errors', 1);
	require_once('../mysqli_connect.php');
	require_once('User.php');

	$required = array('first_name', 'last_name', 'email', 'password', 'repass');
	$error = false;
	$isSpecial = false;
	foreach($required as $field) {
		if (empty($_POST[$field]) || ctype_space($_POST[$field])) {
			$error = true;
		} else if (preg_match('/[\^£$%&*()}{#~?><>|=¬]/', $_POST[$field])){ //Check for special characters
			$isSpecial = true;
		}
	}

	if ($error) {
	    header("location:signup.php?msg=fail");
	} else if ($isSpecial){
		header("location:signup.php?msg=special");
	}else{

		$first_name = $last_name = $email = $password = $birthdate = "";

		if(isset($_POST['submit'])) {
			$first_name = test_input($_POST["first_name"]);
			$last_name = test_input($_POST["last_name"]);
			$email = test_input($_POST["email"]);
			$password = test_input($_POST["password"]);
			$birthdate = $_POST['bday'];
		}

		$salt = sha1(md5($password));
		$password = md5($password.$salt);

		$birthdate = date('Y-m-d', strtotime($birthdate));

		$user = new User($first_name, $last_name, $email, $password, $birthdate);

		$query = "INSERT INTO users_table (first_name, last_name, user_email, user_password, user_birthdate, user_profile_pic) VALUES (?, ?, ?, ?, ?, 'assets/images/placeholder.png')";

		$stmt = mysqli_prepare($dbc, $query);

		mysqli_stmt_bind_param($stmt, "sssss", $user->getFirstName(), $user->getLastName(), $user->getUserEmail(),
			$user->getPassword(), $user->getBirthdate());

		mysqli_stmt_execute($stmt);

		$affected_rows = mysqli_stmt_affected_rows($stmt);

		if($affected_rows == 1) {
			echo 'Sign Up successful!';

			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
			session_start();
			$_SESSION['myusername'] = $user->getUserEmail();
			header('location:profile.php');
		} else {
			echo 'Error occured <br />';
			echo mysqli_error($dbc);
			mysqli_close($dbc);

		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
