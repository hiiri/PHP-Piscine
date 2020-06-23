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

function ft_comparison($a, $b)
{
    $shortest_len = (strlen($a) > strlen($b)) ? strlen($b) : strlen($a);

	# Make case insensitive
	$a = strtolower($a);
	$b = strtolower($b);

	for ($i = 0; $i < $shortest_len; $i++)
		if ($a[$i] != $b[$i])
			break;


	$a_char = ($i == strlen($a)) ? chr(0) : $a[$i];
    $b_char = ($i == strlen($b)) ? chr(0) : $b[$i];

	# Compare first differing character
	$a_value = ord($a_char);
	$b_value = ord($b_char);
    if ($a_value == 0 || $b_value == 0)
        return ($a_value - $b_value);
    if (!ctype_alpha($a_char))
        $a_value += 1000;
    if (!ctype_alnum($a_char))
        $a_value += 2000;
    if (!ctype_alpha($b_char))
        $b_value += 1000;
    if (!ctype_alnum($b_char))
        $b_value += 2000;
    return ($a_value - $b_value);
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
	usort($arr, 'ft_comparison');
	foreach($arr as $elem)
	{
		echo "$elem\n";
	}
}
?>
