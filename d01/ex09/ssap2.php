#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", trim($str));
	sort($arr, SORT_NATURAL);
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}

function ft_sort_comparison($a, $b)
{
	$a = strtolower($a);
	$b = strtolower($b);
	$a_len = strlen($a);
	$b_len = strlen($b);

	$i = 0;
	while ($i < $a_len - 1 && $i < $b_len - 1 && $a[$i] == $b[$i])
		$i++;
	$a_ascii = ord($a[$i]);
	$b_ascii = ord($b[$i]);
	if (!ctype_alpha($a[$i]))
		$a_ascii += 1000;
	if (!ctype_alnum($a[$i]))
		$a_ascii += 2000;
	if (!ctype_alpha($b[$i]))
		$b_ascii += 1000;
	if (!ctype_alnum($b[$i]))
		$b_ascii += 2000;
	return($a_ascii - $b_ascii);
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
	usort($arr, 'ft_sort_comparison');
	foreach($arr as $elem)
	{
		echo "$elem\n";
	}
}
?>
