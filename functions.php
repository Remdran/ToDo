<?php
//
//
//    $link = mysqli_connect("localhost", "root", "", "todo");
//
//    if(mysqli_connect_errno()) {
//        print_r(mysqli_connect_error());
//        exit();
//    }
//
//    // if(array_key_exists("logout", $_GET)) {
//    //     session_unset();
//    // }
//
//
//    /*
//     *  RETRIEVE EVERYTHING WHERE USER ID OF THE TASK LIST DATABASE = OUR USERS ID
//     *  THEN DISPLAY IT
//     */
//    function displayList()
//    {
//        global $link;
//         $query = "SELECT * FROM list WHERE `userid` = ".mysqli_real_escape_string($link, session_id());
////       $query = "SELECT * FROM list WHERE `userid` = 2"; //Test different users list doesnt get pulled back with ours
//         $result = mysqli_query($link, $query);
//
//        if(mysqli_num_rows($result) == 0) {
//            echo "You haven't created a task yet";
//        } else {
//            while($row = mysqli_fetch_assoc($result)) {
//                echo "<p data-id='".$row['id']."' contenteditable='true' class='tasks'>
//                        <span class='listTitle'>".$row['title']."</span>
//                        <span class='listCont'>".$row['description']."</span>
//                        <button class='deleteBtn' data-id='".$row['id']."'>&#10060;</button>
//                    </p>";
//            }
//        }
//    }
//
//?>
