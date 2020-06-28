<?php
if (isset($_POST['submit']) && $_POST['submit'] == 'OK')
{
	if (isset($_POST['server']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['dbname']))
	{
		$servername = $_POST['server'];
		$username = $_POST['user'];
		$password =  $_POST['pass'];
		$dbname = $_POST['dbname'];
		
		$conn = mysqli_connect($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		else {

			//Create database
			$sql = "CREATE DATABASE IF NOT EXISTS ".$dbname.";";
			if (mysqli_query($conn, $sql)) {
				echo "";
			} else {
				echo "Error creating database: " . mysqli_error($conn);
			}
			mysqli_close($conn);
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			//Create tables

			//Add settings 
			file_put_contents('settings.php',
				'<?php' . "\n" .
				'$db_servername = "' . $servername . '";' . "\n" .
				'$db_username = "' . $username . '";' . "\n" .
				'$db_passsword = "' . $password . '";' . "\n" .
				'$db_name = "' . $dbname . '";' . "\n" .
				'?>');
		//	unlink("install.php");
			header('Location: index.php');
			die;
		}
	}
}

?> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Install</title>
</head>
<body>
<form method="POST" action="install.php">
			Server: <input type="text" name="server"><br />
			User: <input type="text" name="user"><br />
			Password: <input type="password" name="password"><br />
			Database: <input type="text" name="dbname"><br />
			<input type="submit" name="submit" value="OK">
		</form>
</body>
</html>