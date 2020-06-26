<?php

session_start();

if ($_GET['login'] && $_GET['passwd'] && $_GET['passwd'] !== "")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
	if (!file_exists('/private/passwd'))
	{
		mkdir("/private/");
		
	}
}
else
{
	echo "ERROR\n";
}

#$login = $_SESSION['login'];
#$passwd = $_SESSION['passwd'];

?>
