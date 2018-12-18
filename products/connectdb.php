<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = '18php06_demo';
	$connect = mysqli_connect($server, $username, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect! ".mysqli_connect_error();
	}
	
	mysqli_set_charset($connect, "utf8");
 ?>