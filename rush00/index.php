<?php
    
session_start();

# Data management

# User management
    $username = $_SESSION['logged_on_user'];
# Basket

# Categories and products

?>

<!-- Landing page -->
<!DOCTYPE HTML>
<html>
<head>
    <title>ft_minishop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p id="shop-name">ft_minishop</p>
    
        </br></br>
    <?php
        if (empty($username)) 
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
            echo '<div id="register-form">Register';
            ?>
                <form action="register.php" method="POST">
                    Username: <input type="text" id="login" name="login" value="" />
                    <br />
                    Password: <input type="text" id="passwd" name="passwd" value="" />
                    <input type="submit" name="submit" value="OK" />
                </form>
            <?php
            echo '</div>';
            echo '</div>';
        }
        else 
        {
            # user is logged in
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
    <ul id="nav">
            <li><a href="#">Menu 1</a>
                <ul>
                    <li><a href="https://google.com">Item 1</a></li>
                    <li><a href="https://google.com">Item 2</a></li>
                    <li><a href="https://google.com">Item 3</a></li>
                    <li><a href="https://google.com">Item 4</a></li>
                </ul>
            </li>

            <li><a href="#">Menu 2</a>
                <ul>
                    <li><a href="https://google.com">Item 1</a></li>
                    <li><a href="https://google.com">Item 2</a></li>
                    <li><a href="https://google.com">Item 3</a></li>
                    <li><a href="https://google.com">Item 4</a></li>
                </ul>
            </li>

            <li><a href="#">Menu 3</a>
                <ul>
                    <li><a href="https://google.com">Item 1</a></li>
                    <li><a href="https://google.com">Item 2</a></li>
                    <li><a href="https://google.com">Item 3</a></li>
                    <li><a href="https://google.com">Item 4</a></li>
                </ul>
            </li>

            <li><a href="#">Menu 4</a>
                <ul>
                    <li><a href="https://google.com">Item 1</a></li>
                    <li><a href="https://google.com">Item 2</a></li>
                    <li><a href="https://google.com">Item 3</a></li>
                    <li><a href="https://google.com">Item 4</a></li>
                    <li>Submenu item
                    <ul>
                        <li><a href="https://google.com">Menu item 1</a>
                        <li><a href="https://google.com">Menu item 2</a>
                        <li><a href="https://google.com">Menu item 3</a>
                        <li><a href="https://google.com">Menu item 4</a>
                    </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#">Menu 5</a>
                <ul>
                    <li><a href="https://google.com">Item 1</a></li>
                    <li><a href="https://google.com">Item 2</a></li>
                    <li><a href="https://google.com">Item 3</a></li>
                    <li><a href="https://google.com">Item 4</a></li>
                    <li>Submenu item
                    <ul>
                        <li><a href="https://google.com">Menu item 1</a>
                        <li><a href="https://google.com">Menu item 2</a>
                        <li><a href="https://google.com">Menu item 3</a>
                        <li><a href="https://google.com">Menu item 4</a>
                            <li>Submenu item
                                <ul>
                                    <li><a href="https://google.com">Menu item 1</a>
                                    <li><a href="https://google.com">Menu item 2</a>
                                    <li><a href="https://google.com">Menu item 3</a>
                                    <li><a href="https://google.com">Menu item 4</a>
                                </ul>
                                </li>
                    </ul>
                    </li>
                </ul>
            </li>
        </ul>
</body>
</html>