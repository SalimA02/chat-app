<?php 

session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password   = mysqli_real_escape_string($conn, $_POST['password']);

// echo "Hello"

if(!empty($email) && !empty($password)){ // check entry not empty

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'"); // select all instances of pair

    if(mysqli_num_rows($sql) > 0){ //valid match
        $row = mysqli_fetch_assoc($sql);
        $status = "Active now";

        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' 
            WHERE unique_id = {$row['unique_id']}");

        if($sql2){
            $_SESSION['unique_id'] = $row['unique_id']; // using user id for session in other php file
            echo "success";
             
        }

    }else{
        echo "Email and/or Password invalid";
    }
}else{
    echo "All input fields are required";
}
?>