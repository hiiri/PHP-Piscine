#!/usr/bin/php
<?php

function replace_accents($str) {
	$str = htmlentities($str, ENT_COMPAT, "UTF-8");
	$str = preg_replace('/&([a-zA-Z])(acute|grave|circ);/','$1',$str);
	return html_entity_decode($str);
}

function validate_date($date) {

}

setlocale(LC_ALL, 'fr_FR');
header('Content-Type: text/html; charset=ISO-8859-1');
date_default_timezone_set('Europe/Paris');

if ($argc != 1)
{
	$regex = "/^(([lL]undi)|([mM]ardi)|([mM]ercredi)|([jJ]eudi)|([vV]endredi)|([sS]amedi)|([dD]imanche)) \d{1,2} .{3,9} \d{4} \d{2}:\d{2}:\d{2}$/";
	if (!preg_match($regex, $argv[1]))
	{
		echo "Wrong Format\n";
		return;
	}

	$date_arr = explode(" ", $argv[1]);
	array_shift($date_arr);
	$months = array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
	$months = array_map("replace_accents", $months);
	$date_arr[1] = replace_accents($date_arr[1]);

	unset($months[0]);

	$match = array_search(strtolower($date_arr[1]), $months);
	$date_arr[1] = $match;
	$copy = $date_arr;
	$time = array_pop($copy);

	$date_arr = implode("-", $copy);
	$formatted = $date_arr." ".$time;

	if (strtotime($formatted) === FALSE)
		echo "Wrong Format\n";
	else
	{
		echo strtotime($formatted);
		echo "\n";
	}
}
?>
