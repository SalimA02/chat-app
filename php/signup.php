<?php
    session_start();

    include_once "config.php";
    

    // $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    // $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $password   = mysqli_real_escape_string($conn, $_POST['password']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($password)){
        // input validation


        //check email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //is email valid
            // does email already exist
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){//email already exists
                echo "$email - already exists!";
            }else{
                if(isset($_FILES['image'])){//if file uploaded
                    $img_name = $_FILES['image']['name']; // get file name
                    $img_type = $_FILES['image']['type']; // get file type
                    $tmp_name = $_FILES['image']['tmp_name']; // tmp used to save file in our folder
                    // echo $img_name; 
                    
                    //explode image and get extension

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); // gets extension

                    $extensions = ['png', 'jpg', 'jpeg', 'JPG', 'PNG']; // valid extensions
                    
                    if(in_array($img_ext, $extensions) === true){ // if in array then valid
                        $time = time(); // for storing file
                        
                        $new_img_name = $time.$img_name;
                        // echo $new_img_name;
                        
                        if(move_uploaded_file($tmp_name, "imgs/" . $new_img_name)){ // if true == successful
                            $status = "Active Now"; // once signed up, status is active
                            $random_id = rand(time(), 1000000); // create random id
                            // echo $random_id;
                            

                            //insert data to table

                            $sql2 = mysqli_query($conn, "INSERT INTO  users (unique_id, fname, lname, email, password, img, status) 
                                VALUES  ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if($sql){ // if data inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'" );
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using user id for session in other php file
                                    echo "success";
                                }
                            }else{
                                echo "  SQL insert went wrong, please try again!";
                            }
                        }

                    }else{
                        echo "Please select a valid image file - png, jpg, jpeg!";
                    }
                }else{
                        echo "Please select an image file!";
                    }
            }
        }else{
            echo "$email - is not a valid email";
        }

    
    }else{
        if(empty($fname)){
            echo "no first name".$fname;
        }
        if(empty($lname)){
            echo " no last name".$fname;
        }
        if(empty($password)){
            echo " no password".$fname;
        }

        echo " All inputs are required!".$fname;
    }
?>