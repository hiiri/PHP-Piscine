<?php

$passwd_path = '../private/passwd';
$hash_algorithm = 'sha512';
$user_exists = FALSE;

if ($_POST['newpw'] && $_POST['submit'] == "OK")
{
	if (!file_exists($passwd_path))
	{
		echo "ERROR\n";
		return;
	}
	$data = unserialize(file_get_contents($passwd_path));

	if ($data)
	{
		foreach ($data as &$user)
		{
			if ($user['login'] === $_POST['login'])
			{
				$user_exists = TRUE;
				if ($user['passwd'] === hash($hash_algorithm, $_POST['oldpw']))
				{
					$user['passwd'] = hash($hash_algorithm, $_POST['newpw']);
					break;
				}
				else
				{
					echo "ERROR\n";
					return;
				}
			}
		}
		if ($user_exists === FALSE)
		{
			echo "ERROR\n";
			return;
		}
	}
	$serialized = serialize($data);
	file_put_contents($passwd_path, $serialized);
	echo "OK\n";
}
else
{
	echo "ERROR\n";
}
?>
