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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List orders</title>
	<link rel="stylesheet" href="adminstyle.css">
	<link rel="stylesheet" href="addstyle.css">
</head>
<body>

<ul>
	<li><a href="list_users.php">Users</a></li>
	<li><a class="active" href="list_orders.php">Orders</a></li>
	<li><a href="list_products.php">Products</a></li>
	<li><a href="edit_categories.php">Categories</a></li>
</ul>

<div style="border:1px solid #ccc">

<h1>Orders</h1>
<hr>
<?php
	include '../connect.php';

	$sql = "SELECT order_id, date, user_id FROM order";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo('<table>
		<tr>
		<th>order_id</th>
		<th>date</th> 
		<th>user_id</th>
		<th>remove</th>
		</tr>');

		while($row = $result->fetch_assoc())
		{
			echo('<tr>');
			echo('<td>'. $row["order_id"].'</td>');
			echo('<td>'. $row["date"].'</td>');
			echo('<td>'. $row["user_id"].'</td>');
			echo('<td><a href="remove_order.php">X</a></td>');
			echo('</tr>');
		}
		echo('</table>');
	} else {
		echo "0 results";
	}
?>
</div>
</body>
</html>