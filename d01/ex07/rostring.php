#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", trim($str));
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}

if ($argc != 1)
{
	$first = true;
	$arr = ft_split($argv[1]);
	foreach($arr as $word)
	{
		if ($first)
		{
			$first = false;
			continue;
		}
		echo "$word ";
	}
	echo "$arr[0]";
	echo "\n";
}
?>
