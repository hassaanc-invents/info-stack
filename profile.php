<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/profile.css">
    <!-- JQuery Link -->
    <script src="javascript/script.js"></script> 
</head>
<body>
     <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
     <nav>
       
        <div class="container">
            <span class="nav-toggle" onclick="addclassmy()"><i class="fa fa-bars" ></i></span>
            <div class="logo">
            </div>
        <div class="res-menu">
            
            <div class="menu-items" id="classadder">
                 
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="extra-top-profile">
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="all-questions.html">Top Questions</a>
                    </li>
                    <li>
                        <a href="contact-us.html">Contact Us</a>
                    </li>
                    <li>
                        <a href="#">Why Us?</a>
                    </li>
                    <li class="extra-top-respondent">
                        <a href="top-informant.html">Top Respondent</a>
                    </li>
                    <li class="extra-signup">
                        <a href="top-informant.html">Signup</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="">
                        <label for="searchbox"><i class="fa fa-search"></i></label>
                        <input type="text" name="searchbox" placeholder="Search">
                    </form>
                </div>
            </div>

            <div class="nav-buttons">
                <a href="login-page.html" class="login">Login</a>
                <a class="signup">Sign Up</a>
            </div>
            </div>
            
        </div>
    </nav>
    <!-- Profile Info -->
    <div class="personnel-information">
        <div class="profile-pic">
            <img src="images/hassaan-dp.jpg" alt="Users-Info">
        </div>
        <div class="user-name">
            <h4>@hassaanmaliq</h4>
        </div>
        <div class="full-name">
            <h3>Hassaan Maliq</h3>
        </div>
        <div class="user-email">
            <span>hassaanmaliq@gmail.com</span>
        </div>
        <div class="button">
            <button>
                Change Information
            </button>
        </div>
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