#!/usr/bin/php
<?php
$first = true;
foreach($argv as $elem)
{
	if ($first)
	{
		$first = false;
		continue;
	}
	echo ("$elem\n");
}
?>
