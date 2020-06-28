<?php
	include 'connect.php';

	/*
	if (!isset($_SESSION['logged_in_user'])) {
		
		header("Location: google.com");
		die;
	}*/

	//teskkaa onko admin

	$productname = $_POST['productname'];
	$description  = $_POST['description'];
	$price = $_POST['price'];
	$category = $_POST['category'];

	$sql = mysqli_query($conn, "SELECT * FROM `product`");
	while ($row = mysqli_fetch_array($sql)) {
		if ($row['name'] == $productname) {
			echo "Productname is already in use";
			die;
		}
	}
	
	$sql = "INSERT INTO `product` (name, description, price, category) VALUES ('$productname', '$description', '$price', '$category')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	//	header('Location: index.php');
	}
	else
	{
		echo "ERROR\n";
	}
?>