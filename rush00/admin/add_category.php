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
	include 'connect.php';

	$name = $_POST['name'];
	$is_root  = $_POST['is_root'];
	$parent_id = $_POST['parent_id'];

	$sql = mysqli_query($conn, "SELECT * FROM `categories`");
	while ($row = mysqli_fetch_array($sql)) {
		if ($row['name'] == $name) {
			echo "Categoryname is already in use";
			die;
		}
	}
	
	$sql = "INSERT INTO `categories` (name, is_root, parent_id) VALUES ('$name', '$is_root', '$parent_id')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	}
	else
	{
		echo "ERROR\n";
	}
?>