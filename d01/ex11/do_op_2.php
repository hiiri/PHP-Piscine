#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", trim($str));
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}

function check_valid($arr)
{
	if (count($arr) != 3)
		return 0;
	if (is_numeric($arr[0]) == FALSE || is_numeric($arr[2]) == FALSE)
		return 0;

	$ops = array("*", "/", "%", "+", "-");
	foreach ($ops as $op)
	{
		if (strcmp($arr[1], $op) == 0)
			return 1;
	}
	return 0;
}

if ($argc == 2)
{
	$num = 0;
	$arr = ft_split($argv[1]);

	if (count($arr) != 3)
	{
		$ops = array("*", "/", "%", "+", "-");
		$op_count = 0;
		$found_op = "none";
		foreach ($ops as $op)
		{
			if (strpos($argv[1], $op) && $found_op == "none")
			{
				$found_op = $op;
			}
			$op_count += substr_count($argv[1], $op);
		}
			$arr = explode($found_op, $argv[1]);
			if (!count($arr) == 2)
			{
				exit("Syntax Error\n");
			}
			$arr[0] = trim($arr[0]);
			$arr[2] = trim($arr[1]);
			$arr[1] = $found_op;
	}
	if (!check_valid($arr))
		exit("Syntax Error\n");
	else
	{
		$num1 = $arr[0];
		$op = $arr[1];
		$num2 = $arr[2];
		$res = eval('return '.$num1.$op.$num2.';');
		print "$res\n";
	}
}
else
{
	echo "Incorrect Parameters\n";
}
?>
