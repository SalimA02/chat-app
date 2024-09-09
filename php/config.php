<?php

    $server = "sql200.infinityfree.com";
    $username = "if0_34619932";
    $password = "4bhX9ZMFSuX";
    $dbname = "if0_34619932_chat";

    $conn = mysqli_connect($server, $username , $password , $dbname);
    if(!$conn){
        echo "database connected" . mysqli_connect_error();
    }


    // $conn = mysqli_connect("localhost", "root", "" , "chat");
    // if(!$conn){
    //     echo "databade connected" . mysqli_connect_error();
    // }
    
?>