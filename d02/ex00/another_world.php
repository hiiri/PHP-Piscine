#!/usr/bin/php
<?php
function ft_split($str)
{
	$arr = explode(" ", trim($str, " \t"));
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}

if ($argc != 1)
{
	$i = 0;
	$arr = ft_split($argv[1]);
	$word_count = count($arr);
	foreach($arr as $elem)
	{
		echo "$elem";
		if (++$i !== $word_count)
			echo " ";
	}
	echo "\n";
}
?>
