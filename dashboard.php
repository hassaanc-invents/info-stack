<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome On Baord</title>
     <!-- CSS Link -->
     <link rel="stylesheet" href="css/dashboard-page.css">
     <!-- JQuery Link -->
     <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
     <!-- JavaScript Link -->
     <script src="javascript/script.js"></script> 
      <link rel="stylesheet" href="css/media-queries.css">
</head>
<style type="text/css">

    .Details
    { color: #666562;
      text-decoration: none;

    }
    .fa-arrow-right{
        margin-left: 20px;
    }
</style>
<body>
    <!-- Navbar Start -->
    <?php
    include("navigation.php");
    ?>
    <!-- User Information -->

    <div class="dashboard-information">
        <div class="personnel-information">
            <?php
             $uquery="SELECT * FROM `user_iformation` WHERE `status`=1";
             $urun=mysqli_query($conn, $uquery);
             $row=mysqli_fetch_assoc($urun);
            ?>
            <div class="profile-pic">
                <img src="<?php echo $row['user_image'] ?>" alt="Users-Info">
            </div>
            <div class="user-name">
                <h4>@<?php echo $row['user_name'] ?></h4>
            </div>
            <div class="full-name">
                <h3><?php echo $row['user_fullname'] ?></h3>
            </div>
            <div class="user-email">
                <span><?php echo $row['user_email'] ?></span>
            </div>
            <div class="button">
                <button>
                    Change Information
                </button>
            </div>
        </div>
        <div class="dashboard-anaylytics">
            <div class="row-1">
                <?php 
                    $adminsql ="SELECT * from `user_iformation` WHERE `status`=1";
                    $adminrun=mysqli_query($conn,$adminsql);
                    while ($adminrow=mysqli_fetch_assoc($adminrun))
                      {
                          $get[]=$adminrow['user_id'];
                      }
                      $admincount= count($get) ;
                    ?>
                <div class="registered-admins">
                    <div class="heading">
                        <h3>Registered Admins</h3>
                    </div>
                    <p>

                        <h3><?php print_r($admincount) ?>Admin</h3>
                        
                    </p>
                    <span><a class="Details" href="register-admins.php">View Details<i class="fa fa-arrow-right"></i></a></span>
                </div>
                <?php 
                    $sql1 ="SELECT * from `user_iformation`";
                    $run1=mysqli_query($conn,$sql1);
                     
                    while ($myrow=mysqli_fetch_assoc($run1))
                      {
                          $get[]=$myrow['user_id'];
                      }
                      $count_get= count($get) ;
                     
                    ?>
                <div class="registered-users">
                    <div class="heading">
                        <h3>Registered Users</h3>
                    </div>
                    <p>
                        <h3><?php   print_r($count_get);?> Users</h3>
                    </p>
                    <span><a class="Details" href="registered_user.php">View Details<i class="fa fa-arrow-right"></i></a></span>
                </div>
               
                
            </div>
            <?php 
              $qsql ="SELECT * from `question`";
              $qrun=mysqli_query($conn,$qsql);
               
              while ($qrow=mysqli_fetch_assoc($qrun))
                {
                    $qget[]=$qrow['question_id'];
                }
                $qcount= count($qget) ;
               
              ?>
            <div class="row-2">
                 <div class="question-posted">
                    <div class="heading">
                        <h3>Questions Posted</h3>
                    </div>
                    <p>
                        <h3><?php print_r($qcount); ?> Questions</h3>
                    </p>
                    <span><a class="Details" href="posted_question.php">View Details<i class="fa fa-arrow-right"></i></a></span>
                </div>
                <div class="answer-posted">
                    <?php 
                    $asql ="SELECT * from `answers`";
                    $arun=mysqli_query($conn,$asql);
                     
                    while ($arow=mysqli_fetch_assoc($arun))
                      {
                          $get[]=$arow['id'];
                      }
                      $acount= count($get) ;
                     
                    ?>
                    <div class="heading">
                        <h3>Answers Posted</h3>
                    </div>
                    <p>
                        <h3><?php print_r($acount) ?> Ans</h3>
                    </p>
                    <span><a class="Details" href="posted_answer.php">View Details<i class="fa fa-arrow-right"></i></a></span>
                </div>
               
                
            </div>
        </div>
    </div>
    <!-- -----------------Footer Start------------------- -->
<?php
include "footer.php";
?>
</body>
</html>