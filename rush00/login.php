<?php
session_start();
include 'connect.php';
include_once 'functions.php';

$hash_algorithm = 'whirlpool';


function auth($username, $password)
{
	/* Get hashed password for user from database */
	include 'connect.php';
	$query = 'SELECT PASSWORD FROM user where USERNAME="' . $username . '"';
	$result = mysqli_query($conn, $query);

	$stored_password = mysqli_fetch_array($result, MYSQLI_ASSOC)['PASSWORD'];

	if ($password === $stored_password)
		return TRUE;
	return FALSE;
}

$username = $_POST['login'];
$password = hash($hash_algorithm, $_POST['password']);

if (is_logged_in())
{
	die("<p>Already logged in.</p>");
}

if (auth($username, $password))
{
	$_SESSION['logged_on_user'] = $username;
	echo "<p>Welcome, ".$username.".</p>";
}
else
{
	$_SESSION['logged_on_user'] = "";
	echo "<p>Username or password is incorrect.</p>";
}
echo 	'</ br>',
		'<a href=index.php>Return to the main page</a>';
?>
