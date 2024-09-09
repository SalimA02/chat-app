<!--Chat Application with GPT4 api-->

<?php            
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location:login.php");
    }
?>

<?php           
// session_start();
include_once "header.php";

?>

    <body>
        <div class = "wrapper">
            <section class = "chat-area">
                <header>

                    <?php
                        include_once "php/config.php";
                        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                        
                        if(mysqli_num_rows($sql)>0){
                            $row = mysqli_fetch_assoc($sql);

                            }
                        
                    ?>

                    <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="php/imgs/<?php echo $row['img']?>" alt="">
                    <div class="content">
                        
                        <div class="details">
                            <span> <?php echo $row['fname'] . " " . $row['lname'] ?> </span>
                            <p></p>
                        </div>
                    </div>
                </header>

                <div class="chat-box">

                

                </div>

                <form action="#" class="typing-area" autocomplete="off">
                    <input type="text" name = "outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" name = "incoming_id" value="<?php echo $user_id; ?>" hidden >
                    
                    <input type="text" name = "message" class = "input-field" placeholder="Type Message">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>
        
        <script src = "javascript/text.js" ></script>

    </body>


</html>