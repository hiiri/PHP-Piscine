<?php
	include 'settings.php';

	$conn =  mysqli_connect($db_servername, $db_username, $db_password, $db_name);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>