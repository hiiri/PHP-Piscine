<?php
    session_start();
    
    function is_logged_in()
    {
        $username = $_SESSION['logged_on_user'];
        if (empty($username))
            return FALSE;
        else
            return TRUE;
    }

    function add_to_basket($item)
    {
        if (is_logged_in())
        {
            return TRUE;
        }
        else
        {
            return TRUE;
        }
        return FALSE;
    }
?>