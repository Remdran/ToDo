<?php
    session_start();
    
    $link = mysqli_connect("localhost", "root", "", "todo");

    if(mysqli_connect_errno()) {
        print_r(mysqli_connect_error());
        exit();
    }

    if(array_key_exists("logout", $_GET)) {
        session_unset();
    }
?>
