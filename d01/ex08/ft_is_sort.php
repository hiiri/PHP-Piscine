<?php
function ft_is_sort($tab)
{
	$temp = array_values($tab);
	sort($temp);
	if ($temp === $tab)
		return (true);
	return (false);
}
?>
