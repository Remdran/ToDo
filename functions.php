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


    function displayList() {
        global $link;

        $query = "SELECT * FROM list WHERE `userid` = ".mysqli_real_escape_string($link, $_SESSION['id']); 
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) == 0) {
            echo "You haven't created a task yet";
        } else {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<p class='tasks'><span class='listTitle'>".$row['title'].":</span> ".$row['description']."</p>";
            }
        }

    }
?>
