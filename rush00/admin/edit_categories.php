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
	<title>List categories</title>
	<link rel="stylesheet" href="adminstyle.css">
	
</head>
<body>

<ul>
  <li><a href="list_users.php">Users</a></li>
  <li><a href="list_orders.php">Orders</a></li>
  <li><a href="list_products.php">Products</a></li>
  <li><a class="active" href="edit_categories.php">Categories</a></li>
</ul>

<div  style="border:1px solid #ccc">

<h1>Edit categories</h1>
<hr>
<a href="add_category.html">Add new</a>
<?php
	include '../connect.php';

	$sql = "SELECT category_id, name, is_root, parent_id FROM categories";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo('<table>
		<tr>
		<th>category_id</th>
		<th>name</th> 
		<th>is_root</th>
		<th>parent_id</th>
		<th>remove</th>
		</tr>');

		while($row = $result->fetch_assoc())
		{
			echo('<tr>');
			echo('<td>'. $row["category_id"].'</td>');
			echo('<td>'. $row["name"].'</td>');
			echo('<td>'. $row["is_root"].'</td>');
			echo('<td>'. $row["parent_id"].'</td>');
			echo('<td><a href="remove_category.php">X</a></td>');
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