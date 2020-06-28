<?php
	include 'connect.php';

	$username = $_POST['username'];
	$password = hash('whirlpool', $_POST['password']);
	$realname = $_POST['realname'];
	$email = $_POST['email'];

	/*
	if (!isset($_SESSION['logged_in_user'])) {
		
		header("Location: google.com");
		die;
	}*/

	$sql = mysqli_query($conn, "SELECT * FROM `user`");
	while ($row = mysqli_fetch_array($sql)) {
		if ($row['username'] == $username) {
			echo "Username is already in use";
			die;
		}
	}
	
	$sql = "INSERT INTO `user` (username, password, realname, email) VALUES ('$username', '$password', '$realname', '$email')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	//	$_SESSION['logged_in_user'] = $login;
		echo "OK\n";
		header('Location: index.php');
	}
	else
	{
		echo "ERROR\n";
	}
?>