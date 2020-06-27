<?php

session_start();

function auth($login, $passwd)
{
	$passwd_path = '../private/passwd';
	$hash_algorithm = 'sha512';

	$data = unserialize(file_get_contents($passwd_path));

	if (!$data)
		return FALSE;
	foreach ($data as $user)
	{
		if ($user['login'] === $login)
		{
			if ($user['passwd'] === hash($hash_algorithm, $passwd))
			{
				return TRUE;
			}
		}
	}
	return FALSE;
}

$login = $_POST['login'];
$passwd = $_POST['passwd'];

if (auth($login, $passwd))
{
	$_SESSION['logged_on_user'] = $login;
	echo "<p>Welcome, ".$login.".</p>";
}
else
{
	$_SESSION['logged_on_user'] = "";
	echo "<p>Username or password is incorrect.</p>";
}
echo 	'</ br>',
		'<a href=index.php>Return to the main page</a>';
?>
