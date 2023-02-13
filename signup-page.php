<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Signup | Info Stack</title>
    <!-- Head Icon -->
    <link rel="icon" href="images/head-logo.png" type="image/png">
    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/signup.css">
    <!-- JQuery Link -->
    <script src="javascript/script.js"></script> 
</head>
<body>
     <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
    <?php 
      include 'navigation.php';
    ?>
    <!-- Signup Main Container -->
    <div class="signup-main-container">
        <div class="signup-heading">
            <h3>
                Signup
            </h3>
        </div>
        <form method="post" action="signup-backend.php" enctype="multipart/form-data">
        <div class="full-name">
            <input type="text" name="fullname" id="" placeholder="Full Name">
        </div>
        <div class="full-email">
            <input type="email" name="fullemail" id="" placeholder="Email">
        </div>
        <div class="username">
            <input type="text" name="username" id="" placeholder="Username">
        </div>
        <div class="password">
            <input type="password" name="password" id="" placeholder="Password">
        </div>
        <div class="user-image">
            <input type="file" name="file" class="custom-file-input" required>
        </div>
        <div class="button">
            <button type="submit" name="submit">Signup</button>
         
        </div>
       </form>
    </div>





















<!-- -----------------Footer Start------------------- -->
<footer class="my-footer-border">
    <div class="footer-child">
     <div class="footer-limited">
         <span>
             Info Stack @ International Limited
         </span>
     </div>
     <div class="footer-logos">
         <i class="fa fa-twitter"></i>
         <i class="fa fa-facebook"></i>
         <i class="fa fa-linkedin"></i>
         <i class="fa fa-pinterest"></i>
         <i class="fa fa-instagram"></i>
     </div>
    </div>
 </footer>

</body>
</html>