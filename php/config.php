<?php
    $conn = mysqli_connect("localhost", "root", "" , "chat");
    if(!$conn){
        echo "databade connected" . mysqli_connect_error();
    }
    
?>