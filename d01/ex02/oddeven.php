#!/usr/bin/php
<?php

while (true)
{
	echo "Enter a number: ";
	$stdin = fopen('php://stdin', r);
	$input = fgets($stdin);
	if ($input == NULL)
	{
		echo "\n";
		break;
	}
	$input = trim($input);


	if (!is_numeric($input))
	echo "'".$input."' is not a number\n";
	else if ($input % 2 == 0)
	echo "The number ".$input." is even\n";
	else if ($input % 2 == 1)
	echo "The number ".$input." is odd\n";
	fclose ($stdin);
}
?>
