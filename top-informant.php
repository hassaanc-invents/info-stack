<?php
session_start();


include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Head Icon -->
    <link rel="icon" href="images/head-logo.png" type="image/png">
    <!-- Title -->
    <title>Top Informant</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/top-informant.css">
    <!-- JQuery Link -->
    <script src="javascript/script.js"></script> 
    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigation -->
    <?php
    include "navigation.php";
    ?>
    <!-- Top Informant -->

       <!------------------------ Top Rated--------------------- -->
        <div class="top-rated">
            <div class="top-informant">
                <div class="top-informant-heading">
                    <i class="fa fa-microphone"></i>
                    <span>Top Informant</span>
                </div>
                 <?php
                     
                      // user count check

                        
                     $fett="SELECT * FROM answers a INNER JOIN user_iformation u ON a.u_id=u.user_id ";
                       // $fett= "SELECT * FROM answers";
                       $fetch_d=mysqli_query($conn, $fett);
                       $check_data= mysqli_num_rows($fetch_d)>0;
                       $get=array();
                        while($row=mysqli_fetch_assoc($fetch_d))
                        {  
                               
                              
                              
                              while ($myrow=mysqli_fetch_assoc($fetch_d))
                              {
                                $get[]=$myrow['user_fullname'];
                              }
                                 $count_get= array_count_values($get) ;
                                  // print_r($count_get);

                                  echo "<br>";
                                  arsort($count_get);
                                  foreach($count_get as $x => $x_value) {
                                      ?>
                              <div class="top-informant-person">
                                    <div class="informant-profile">
                                      <?php
                                        $myquery= "SELECT * FROM user_iformation WHERE `user_fullname`='$x' ";
                                        $runnn=mysqli_query($conn,$myquery);
                                        $show=mysqli_fetch_array($runnn);
                                        
                                      ?>
                                        <img src="<?php echo $show['user_image']?>" alt="" class="informant-profile-pic">
                                    </div>
                                   <div class="informant-name">
                                     <a href="#"> <?php    echo $x ?>
                                        
                                     </a>
                                     </div>
                               </div>
      
                                
                                    
                                  
                        
                          
                           <?php
                              echo "<br>";
                                  }
                                   // print_r(arsort($count_get));
                                     
                          

                      }

                          ?>
                </div>
        </div>

    <!-- Footer -->
    <?php
    include "footer.php";
    ?>
</body>
</html>