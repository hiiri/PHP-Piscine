<?php
	include '../connect.php';
	session_start();
	$sql = "SELECT username, is_admin FROM user";
	$result = $conn->query($sql);
	$authorized = FALSE;
	foreach ($result as $user)
	{
		if ($_SESSION['logged_on_user'] === $user['username'] && $user['is_admin'] == 1)
		{
			$authorized = TRUE;
		}
	}
	if ($authorized === FALSE)
		die("User not authorized");
?>
<?php
	include '../connect.php';

	$product_id = $_GET['product_id'];

    /*
	$sql = mysqli_query($conn, "SELECT * FROM `product`");
	while ($row = mysqli_fetch_array($sql)) {
		if ($row['name'] == $name) {
			echo "Productname is already in use";
			die;
		}
	}*/
	
	$sql = "DELETE FROM `product` WHERE product_id='$product_id'";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		header('Location: list_products.php');
	}
	else
	{
		echo "ERROR\n";
	}
?>