<?php
if(isset($_POST['submit'])){
    $credentials = array($_POST['username'],$_POST['password']);
    include_once "connection.php";
    $credentialquery = "SELECT * FROM user_iformation WHERE user_name='{$credentials[0]}' AND user_password='{$credentials[1]}'";
    $runloginquery = mysqli_query($conn,$credentialquery) or die ("Incorrect Username or Password");
    if(mysqli_num_rows($runloginquery)>0){
        while($userrow = mysqli_fetch_assoc($runloginquery)){
            session_start();
            $_SESSION['user_id'] = $userrow['user_id'];
            $_SESSION['logged_username'] = $userrow['user_name'];
            $_SESSION['user_password'] = $userrow['user_password'];
            $_SESSION['user_email'] = $userrow['user_email'];
            $_SESSION['name_username'] = $userrow['user_fullname'];
            $_SESSION['user_image_address'] = $userrow['user_image'];
            $_SESSION['status'] = $userrow['status'];
            
                $_SESSION['submit']= true;
                $_SESSION['start'] = time();
                $_SESSION['expire']= $_SESSION['start'] +(86400);
            if(isset($_SESSION['logged_username'])){
            header("Location: http://localhost/infostack/index.php");
            }
        }    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Meta Data -->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Title -->
     <title>Info Stack | Login</title>
     <!-- Head Icon -->
     <link rel="icon" href="images/head-logo.png" type="image/png">
     <!-- FontAwesome Kit -->
     <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
     <!-- CSS Link -->
     <link rel="stylesheet" href="css/login-page.css">
     <!-- JQuery Link -->
     <script src="javascript/script.js"></script> 
</head>
<body>
    <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
    <?php
    include "navigation.php";
    ?>

    <!-- Login Part -->

    <div class="login-container">
        <div class="account-login-title">
            <h2>Account Login</h2>
        </div>
        <div class="login-form-holder">
            <!-- Login Form Start -->
            <form action="" method="post">
                <div class="email-collecter">
                    <input type="text" name="username" id="" class="login-input" placeholder="Username">
                </div>
                <div class="password-collecter">
                    <input type="password" name="password" class="login-input" placeholder="Password...">
                </div>
                <div class="button">
                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>



    <!-- -----------------Footer Start------------------- -->
    <?php
    include "footer.php";
    ?>
</body>
</html>