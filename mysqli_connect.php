<?php
	DEFINE('DB_USER', 'root');
	DEFINE('DB_PASSWORD', '1234');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_NAME', 'trackme');

	
	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	OR die('Could not connect to MySQL ' . mysqli_connect_error());	

?>