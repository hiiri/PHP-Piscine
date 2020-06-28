<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List users</title>
	<link rel="stylesheet" href="adminstyle.css">
	
</head>
<body>

<ul>
  <li><a class="active" href="list_users.php">List users</a></li>
  <li><a href="#news">List orders</a></li>
  <li><a href="#contact">Edit stock</a></li>
  <li><a href="add_product.html">Add product</a></li>
</ul>


<div >

<h1>Edit users</h1>
<?php
	include '../connect.php';

	$sql = "SELECT user_id, username, realname, email, is_admin FROM user";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo('<table>
		<tr>
		<th>user_id</th>
		<th>username</th> 
		<th>realname</th>
		<th>email</th>
		<th>is admin</th>
		<th>remove</th>
		</tr>');

		while($row = $result->fetch_assoc())
		{
			echo('<tr>');
			echo('<td>'. $row["user_id"].'</td>');
			echo('<td>'. $row["username"].'</td>');
			echo('<td>'. $row["realname"].'</td>');
			echo('<td>'. $row["email"].'</td>');
			echo('<td>'. $row["is_admin"].'</td>');
			echo('<td><a href="remove_user.php">X</a></td>');
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