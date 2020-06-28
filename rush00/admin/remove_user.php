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

	/*
	if (!isset($_SESSION['logged_in_user'])) {
		
		header("Location: google.com");
		die;
	}*/

	//teskkaa onko admin

	$user_id = $_GET['user_id'];

    /*
	$sql = mysqli_query($conn, "SELECT * FROM `product`");
	while ($row = mysqli_fetch_array($sql)) {
		if ($row['name'] == $name) {
			echo "Productname is already in use";
			die;
		}
	}*/
	
	$sql = "DELETE FROM `user` WHERE user_id='$user_id'";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		header('Location: list_users.php');
	}
	else
	{
		echo "ERROR\n";
	}
?>