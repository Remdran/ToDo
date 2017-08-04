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
        }

        /*
        * LOGINACTIVE == 0 IS SIGNUP PAGE 
        * SO CHECK THAT THE EMAIL ADDRESS ISN'T ALREADY IN USE
        */
        if($_POST['loginActive'] == "0") {
            $query = "SELECT * FROM users WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) > 0) {
                $error = "That email address is already in use";
            } else { 
                /*
                 *  IT IS A NEW EMAIL SO ADD HIM INTO THE DATABASE
                 */
                $query = "INSERT INTO users (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."',
                     '".mysqli_real_escape_string($link, $_POST['password'])."')";

                if(mysqli_query($link, $query)) {
                    /*
                    * HASH THE PASSWORD
                    */
                    $_SESSION['id'] = mysqli_insert_id($link);
                    $query = "UPDATE users SET `password` = '".md5(md5($_SESSION['id']).$_POST['password'])."' WHERE id = ".$_SESSION['id']." LIMIT 1";

                    mysqli_query($link, $query);

                    echo 1;
                } else {
                    $error = "Couldn't sign you up";
                }
            }
        } else {
            /*
            * LOGINACTIVE == 1 IS LOG IN PAGE 
            * RETRIEVE USER ID FROM EMAIL FIRST FOR THE HASH, CHECK IF HASHED PASSWORDS MATCH, LOGIN USER
            */
            $query = "SELECT * FROM users WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_assoc($result);

            if($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                $_SESSION['id'] = $row['id'];
                echo 1;
            } else {
                $error = "Incorrect email or password";
            }
        }

        if($error != "") {
            echo $error;
            exit();
        }

    }


    /*
     * RECIEVE DETAILS, CURRENTLY FROM FORM, AND ADD NEW ITEM TO THE DATABASE
     */
    if($_GET['action'] == 'newTask') {
        //Check if title or content are empty and are not too long
        if(!$_POST['title']) {
            echo "Please enter a title for your task";
        } else if(!$_POST['desc']) {
            echo "Please enter a description for your task";
        } else if(strlen($_POST['desc']) > 100) {
            echo "Your description is too long";
        } else if(strlen($_POST['title']) > 100) {
            echo "Your title is too long";
        } else {
            $query = "INSERT INTO list (`userid`, `title`, `description`) VALUES ('".mysqli_real_escape_string($link, $_SESSION['id'])."', 
                '".mysqli_real_escape_string($link, $_POST['title'])."', '".mysqli_real_escape_string($link, $_POST['desc'])."')";
            mysqli_query($link, $query);

            echo "1";
        }
    }

    if($_GET['action'] == 'deleteTask') {
        $query = "DELETE FROM list WHERE id = ".mysqli_real_escape_string($link, $_POST['taskId']). " LIMIT 1";
        mysqli_query($link, $query);
    }

    if($_GET['action'] == 'editTask') {
        

    }

?>