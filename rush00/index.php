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
                    Password: <input type="text" id="passwd" name="passwd" value="" />
                    <input type="submit" name="submit" value="OK" />
                </form>
            <?php
            echo '</div>';
            echo '<a style="display:inline-table;" href="register.html">Register</a>';
            echo '</div>';
        }
        else 
        {
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
                    /* Get categories from database */
                        #$query = "SELECT * FROM CATEGORY ORDER by CATEGORY_ID";
                        #$categories = mysqli_query($conn, $query);

                        $categories = ['Mice', 'Tools', 'Keyboards'];
                        echo '<li><a href="."</a><b>All</b></li>';
                        foreach ($categories as $category)
                        {
                            echo '<li><a href="?category='.trim(strtolower($category)).'">'.$category.'</a></li>';
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
                echo 
                '<div class="product-box">',
                    '<img src="./images/hammer.jpeg" alt="'.$item['NAME'].'">',
                    '<p>'.$item['NAME']." ".$item['PRICE'].'€</p>',
                    '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">',
                        '<button value="Add to basket">Add to basket</button>',
                    '</form>',
                '</div>';
            }
        ?>
    </div>
    </body>
</html>
