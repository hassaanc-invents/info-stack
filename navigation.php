<nav>
        <div class="container">
            <span class="nav-toggle" onclick="addclassmy()"><i class="fa fa-bars" ></i></span>
            <div class="logo">
            </div>
        <div class="res-menu">
            
            <div class="menu-items" id="classadder">
                 
                <ul>
                
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="all-questions.php">Top Questions</a>
                    </li>
                    <li>
                        <a href="contact-us.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="why-us.php">Why Us?</a>
                    </li>
                    <li class="extra-top-respondent">
                        <a href="top-informant.php">Top Respondent</a>
                    </li>
                    <li class="extra-signup">
                        <a href="top-informant.php">Signup</a>
                    </li>
                     
                </ul>
                <div class="search">
                    <form action="">
                        <label for="searchbox"><i class="fa fa-search"></i></label>
                        <input type="text" name="searchbox" placeholder="Search">
                    </form>
                </div>
            </div>

            <div <?php echo 'class="nav-buttons"'; ?>>
                
                <?php
                if(isset($_SESSION['user_image_address'])){
                    echo '<a href="logout.php" class="login">Logout</a>';
                     if($_SESSION['status']==0){
                    echo ' <a href="user-profile.php" class="signup">Profile</a>';
                    }
                     else if($_SESSION['status']==1){
                        echo ' <a href="dashboard.php" class="signup">Admin</a>';
                     } 
                   
                } else {

                    echo '<a href="login-page.php" class="login">Login</a>';
                    echo ' <a href="signup-page.php" class="signup">signup</a>';
                }
                                
                

                ?>
               
            </div>

            </div>
            
        </div>
    </nav>