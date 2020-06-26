<?php

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
?>
