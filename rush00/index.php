<?php
    $is_admin = FALSE;
    include_once 'connect.php';
	session_start();
	$sql = "SELECT username, is_admin FROM user";
	$result = $conn->query($sql);
	$authorized = FALSE;
	foreach ($result as $user)
	{
		if ($_SESSION['logged_on_user'] === $user['username'] && $user['is_admin'] == 1)
		{
			$is_admin = TRUE;
		}
	}
?>
<?php
	
session_start();
include('functions.php');
include_once 'connect.php';
# Data management

# User management
	
# Basket

# Categories and products

# Admin section

?>

<!-- Landing page -->
<!DOCTYPE HTML>
<html>
<head>
	<title>ft_minishop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<p id="shop-name"><a href=".">ft_minishop</a></p>
	
		</br></br>
	<?php
	
		if (!is_logged_in()) 
		{
			# user is not logged in
			# show login and register forms
			echo '<div id="login-register-forms">';
			echo '<div id="login-form">Login';
			?>
				<form action="login.php" method="POST">
					Username: <input type="text" id="login" name="login" value="" />
					<br />
					Password: <input type="text" id="passwd" name="password" value="" />
					<input type="submit" name="submit" value="OK" />
				</form>
			<?php
			echo '</div>';
			echo '<a style="display:inline-table;" href="register.html">Register</a>';
			echo '</div>';
		}
		else 
		{
            if ($is_admin)
            {
                echo "<a href=\"admin/\"> <br>Admin section</a>";
            }
			# user is logged in
			$username = $_SESSION['logged_on_user'];
			echo "<p>Hello $username.</p>";
			
			echo '<div id="logout">';
			?>
				<form action="logout.php" method="POST">
					<button id="logout" name="value" value="Logout">Logout</button>
				</form>
			<?php
			echo '</div>';
		}
	?>
	<div id="menu">
	<ul id="nav">
			<li><a href="#">Menu 1</a>
				<ul>
					<?php
					/*Get categories from database */
						$sql =  "SELECT category_id, name FROM categories";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc())
							{
								echo '<li><a href="?category='.$row["category_id"].'">'.$row["name"].'</a></li>';
							}
						}
					?> 
				</ul>
			</li>
		</ul>
	</div>
	<?php
		/* Get all products from database */
		$query = "SELECT * FROM PRODUCT ORDER by PRODUCT_ID";
		$items = mysqli_query($conn, $query);
	?>
	<div class="product-list">
		<?php
			if (isset($_GET["category"]))
				$selected_category = strtolower(trim(htmlspecialchars($_GET["category"])));
			else
				$selected_category = 'all';
			echo '<h2>'.ucfirst($_GET["category"]).'</h2>';
			foreach ($items as $item)
			{
				$item_category = strtolower(trim($item['CATEGORY']));
				if ($selected_category !== 'all' && $item_category !== $selected_category)
					continue;
				$image_path = "./images/hammer.jpeg";
				echo
				'<div class="product-box">',
					'<img src='.$image_path.' alt="'.$item['NAME'].'">',
					'<p>'.$item['NAME']." ".$item['PRICE'].'€</p>',
					'<form action="handle_basket.php" method="POST">',
						'<button name="add" value="' . $item['PRODUCT_ID'] . '">Add to basket</button>',
					'</form>',
				'</div>';
			}
		?>
	</div>
	<div class="basket">
			Basket
			<?php
/*foreach($_SESSION['basket'] as $product)
{
	echo $product;
}*/
            $total_price = 0;
            $query = "SELECT name, price, product_id FROM PRODUCT";
            $basket = mysqli_query($conn, $query);
            echo "<div>";
            foreach ($basket as $key=>$value) {
                # Do something for each product in basket
                $key++;
                if ($_SESSION['basket'][$key] > 0)
                {
                    print_r($value['name']." ");
                    print_r($value['price'] * $_SESSION['basket'][$key]."€<br>");
                    $total_price += $value['price'] * $_SESSION['basket'][$key];
                }
            }
            echo "</div>";
            echo "<b>Total: </b>" . $total_price . "€";
			?>
			<a href="checkout.php"> <br>checkout</a>

	</div>
	</body>
</html>
