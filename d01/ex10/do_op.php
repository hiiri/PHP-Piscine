#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", trim($str));
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}

if ($argc == 4)
{
	$num1 = ft_split($argv[1])[0];
	$operation = ft_split($argv[2])[0];
	$num2 = ft_split($argv[3])[0];

	$res = eval('return '.$num1.$operation.$num2.';');
	print "$res\n";
}
else
{
	echo "Incorrect Parameters\n";
}
?>
