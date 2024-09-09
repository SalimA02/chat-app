<!--Chat Application with GPT4 api-->
<?php 

    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: users.php");
    }

?>
<?php
                
// session_start();
include_once "header.php";

?>
    <body>
        <div class = "wrapper">
            <section class = "form login">
                <header>Login</header>
                <form acton = "#" autocomplete="off">
                    <div class="error-txt"></div>
                    
                    <div class="field input">
                        <label>Email</label>
                        <input type="text" name = "email" placeholder="Email">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name = "password" placeholder="Enter Password">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                </form>
                <div class="link ">New user? <a href = "index.php">Sign up now</a></div>
            </section>
        </div>
        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>
    </body>


</html>