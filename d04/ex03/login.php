<?php
include 'auth.php';

session_start();

if ($_GET['login'] && $_GET['passwd'])
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}

$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];

if (auth($login, $passwd))
{
	$_SESSION['loggued_on_user'] = $login;
	echo "OK\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>
