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
            <section class = "form signup">
                <header>Chat App</header>
                <form acton = "#" enctype="multipart/form-data">
                    <div class="error-txt">Error</div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name = "fname" placeholder="First Name" required >
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name = "lname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label>Email</label>
                        <input type="text" name = "email" placeholder="Email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name = "password" placeholder="Enter Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name = "image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                </form>
                <div class="link">Already signed up? <a href = "login.php">Login now</a></div>
            </section>
        </div>
        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/sign-up.js"></script>
    </body>


</html>