<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];

    if ($outgoing_id == '1037255606'){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id ={$outgoing_id}");
        $output = "";
    }else{
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = 1037255606");
        $output = "";
    }

    if(mysqli_num_rows($sql) == 1){
        $output .= "No users are available to chat";

    }elseif(mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>
