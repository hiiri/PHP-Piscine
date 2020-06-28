<?php
	session_start();
	include_once 'connect.php';
	include_once 'functions.php';

	#if (isset($_POST['value']))
	$product_id = $_POST["add"];
	
	if (!is_logged_in())
	{
		$_SESSION['basket'][$product_id] += 1;
		echo "Added to basket";
		header('Location: index.php');
	}
	else if (is_logged_in())
	{
		$_SESSION['basket'][$product_id] += 1;
		# add session basket to database
		echo "Added to basket";
		header('Location: index.php');
	}
?>