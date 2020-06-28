<?php
    session_start();
    if ($_POST['value'] === 'Logout') 
    {
        $_SESSION['logged_on_user'] = "";
        unset($_SESSION['basket']);
        echo "<p>You have been logged out.</p>";
        echo 	'</ br>',
        '<a href=index.php>Return to the main page</a>';
    }
?>
