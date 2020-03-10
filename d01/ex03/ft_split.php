<?php
function ft_split($str)
{
	$arr = explode(" ", trim($str));
	sort($arr);
	$arr = array_filter(array_map('trim',$arr),'strlen');
	$arr = array_values($arr);
	return ($arr);
}
?>
