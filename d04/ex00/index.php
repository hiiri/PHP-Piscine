<?php

session_start();

if ($_GET['login'] && $_GET['passwd'])
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}

$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];

echo "<html><body>
<form action=\"index.php\" method=\"get\">
	Username: <input type=\"text\" id=\"login\" name=\"login\" value=\"$login\" />
	<br />
	Password: <input type=\"text\" id=\"passwd\" name=\"passwd\" value=\"$passwd\" />
	<input type=\"submit\" name=\"submit\" value=\"OK\" />
</form>
</body></html>
";
?>
