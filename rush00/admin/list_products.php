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
	<title>List users</title>
	<link rel="stylesheet" href="adminstyle.css">
	
</head>
<body>

<ul>
	<li><a href="list_users.php">Users</a></li>
	<li><a href="list_orders.php">Orders</a></li>
	<li><a class="active" href="list_products.php">Products</a></li>
	<li><a href="edit_categories.php">Categories</a></li>
</ul>


<div style="border:1px solid #ccc">

<h1>Products</h1>
<hr>
<a href="add_product.html">Add new</a>
<?php
	include '../connect.php';

	$sql = "SELECT product_id, name, description, price, category FROM product";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo('<table>
		<tr>
		<th>product_id</th>
		<th>name</th> 
		<th>description</th>
		<th>price</th>
		<th>category</th>
		<th>remove</th>
		</tr>');

		while($row = $result->fetch_assoc())
		{
			echo('<tr>');
			echo('<td>'. $row["product_id"].'</td>');
			echo('<td>'. $row["name"].'</td>');
			echo('<td>'. $row["description"].'</td>');
			echo('<td>'. $row["price"].'</td>');
			echo('<td>'. $row["category"].'</td>');
			echo('<td><a href="remove_product.php?product_id='.$row["product_id"].' ":>X</a></td>');
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