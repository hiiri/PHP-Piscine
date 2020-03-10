#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", trim($str));
	sort($arr);
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}

if ($argc != 1)
{
	$first = true;
	$arr = array();
	foreach($argv as $arg)
	{
		if ($first)
		{
			$first = false;
			continue;
		}
		$cur = ft_split($arg);
		foreach($cur as $word)
			array_push($arr, $word);
	}
	sort($arr);
	foreach($arr as $elem)
	{
		echo "$elem\n";
	}
}
?>
