<?php
    while($row = mysqli_fetch_assoc($sql)){
        // $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);/
        $outgoing_id = $_SESSION['unique_id'];

        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        
        if(mysqli_num_rows($query2)> 0 ){
            $result = $row2['msg'];
        }else{
            $result = "No message available";
        }

        # truncate message
        (strlen($result) > 28) ?  $msg = substr($result, 0 , 28) :  $msg = $result;
        $msg .= '...';


        // # adding you if last message from user
        if($row2 == null){
            $you = "";
        }elseif($outgoing_id == $row2['outgoing_msg_id']){
            $you = "You : ";
        }else{
            $you = "";
        }

        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "Online now" ; 

        $output .= '<a href="text.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                            <img src="php/imgs/'.$row['img'].'" alt="">
                            <div class="details">
                                <span>'. $row['fname']. " " . $row['lname'] .'</span>
                                <p>'. $you . $msg.'</p>
                            </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
     }
?>