<?php
    include("functions.php");

    if($_GET['action'] == 'loginSignup') {
        $error = "";

        /*
         *  CHECK THAT THE REQUIRED FIELDS ARENT LEFT BLANK / ARE VALID ENTRIES
         */
         if(!$_POST['email']) {
             $error .= "Please enter your email address";
         } else if(!$_POST['password']) {
             $error .= "Please enter a password";
         } else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "Please enter a valid email address";
         }

        if($error != "") {
            echo $error;
            exit();
        } else {
            echo "1";
        }





    }

?>