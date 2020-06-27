<?php

session_start();

$passwd_path = '../private/passwd';

if ($_POST['passwd'] && $_POST['passwd'] !== "" && $_POST['submit'] == "OK")
{

	if (!file_exists($passwd_path))
	{
		mkdir("../private/", 0777);
	}
	$data = unserialize(file_get_contents($passwd_path));
	if ($data)
	{
		foreach ($data as $user)
		{
			if ($user['login'] === $_POST['login'])
			{
				echo '<p>Username <i>'.$_POST['login'].'</i> is already taken.</p>';
				echo 	'</ br>',
						'<a href=index.php>Return to the main page</a>';
				return;
			}
		}
	}
	$data[] = [
		"login" => $_POST['login'], "passwd" => hash('sha512', $_POST['passwd'])
	];

	$serialized = serialize($data);
	file_put_contents($passwd_path, $serialized);
	echo '<p>User <i>'.$_POST['login'].'</i> created. You can now log in.</p>';
}
else
{
	echo "<p>Password cannot be empty.</p>";
}
echo 	'</ br>',
		'<a href=index.php>Return to the main page</a>';
?>
