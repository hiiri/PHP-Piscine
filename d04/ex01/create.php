<?php

$passwd_path = '../private/passwd';

if ($_POST['passwd'] && $_POST['passwd'] !== "" && $_POST['submit'] == "OK")
{

	if (!file_exists($passwd_path))
	{
		mkdir("../private/", 0777); # maybe change this to 0600
	}
	$data = unserialize(file_get_contents($passwd_path));
	if ($data)
	{
		foreach ($data as $user)
		{
			if ($user['login'] === $_POST['login'])
			{
				echo "ERROR\n";
				return;
			}
		}
	}
	$data[] = array(
		"login" => $_POST['login'], "passwd" => hash('sha512', $_POST['passwd'])
	);

	$serialized = serialize($data);
	file_put_contents($passwd_path, $serialized);
	echo "OK\n";
}
else
{
	echo "ERROR\n";
}
?>
