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
    <!-- Title -->
    <title>Top Questions</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/all-questions.css">
    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
    <!-- JavaScript Link -->
    <script src="javascript/script.js"></script>
</head>
<body>
        <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
        <?php
        include "navigation.php";
        ?>
        

<!-- --------------------------------------Main Section Start------------------------------- -->

        <section class="main-section-all-questions">
            <!-- All Questions -->
            
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
                  
                    <!-- Dummy Person Ends -->
                </div>
            </div>





                       
 <div class="all-questions">
                <div class="all-question-heading">
                    <span>
                        All Questions
                    </span>
                    <button>
                        <?php
                          if(isset($_SESSION['logged_username'])){
                                ?>
                                 <a style="color: white; text-decoration: none;" href="index.php">Ask Question</a>
                                <?php
                            }
                            else{
                                ?>
                                 <a style="color: white; text-decoration: none;" href="login-page.php">Login to Ask Question</a>
                                <?php
                            }
                                  
                                ?>
                    </button>
                </div>
                <div class="total-question-detail">
                     <?php 
                      $qasql ="SELECT * from `question`";
                      $qarun=mysqli_query($conn,$qasql);
                       
                      while ($qrow=mysqli_fetch_assoc($qarun))
                        {
                            $qget[]=$qrow['question_id'];
                        }
                        $qcount= count($qget) ;
                       
                      ?>
                    <span>

                      <?php print_r($qcount); ?>  &nbsp;&nbsp;&nbsp;Questions
                    </span>
                </div>
                <?php

                $myquery="SELECT * FROM `question`";
                $run=mysqli_query($conn,$myquery);
                while($row=mysqli_fetch_assoc($run)){
                ?>
                              <?php
                               $id=$row['question_id'];
                              $ansquery="SELECT * FROM `answers` WHERE q_id='$id'";
                              $ansrun=mysqli_query($conn,$ansquery);
                              $ansrow=mysqli_fetch_assoc($ansrun)
                              ?>
                <div class="all-question-cards">
                    <div class="all-question-one-card">
                        <div class="vating-part">
                            <span><?php echo $row['likes'] ?> <i style="color: #B70404;" class="fas fa-heart" id="like"></i></span>
                             <?php 
                             $myqquery= "SELECT * FROM question WHERE question_id='$id'" ;
                              $runnn=mysqli_query($conn,$myqquery);
                              $show=mysqli_fetch_array($runnn);
                               $fettt="SELECT * FROM answers WHERE `q_id`='$id'";
                                $fetch_dd=mysqli_query($conn, $fettt);
                                if($check_dataa= mysqli_num_rows($fetch_dd)>0){
                                  $gett=array(); 
                                while($myroww=mysqli_fetch_assoc($fetch_dd))
                                  {
                                    $gett[]=$myroww['q_id'];
                                  }
                                $q_get= array_count_values($gett);

                               $idq= $show['question_id']; 
                             ?>
                            <span><?php echo $q_get[$idq] ;?> Answers</span>
                            <?php
                                }
                                else{
                                  ?>
                                   <span>0 Answers</span>
                                  <?php
                                }
                                ?>
                                
                        </div>
                        <div class="all-question-crad-detail">
                            
                            <a href="#" class="question-card"><?php echo $row['question'] ?></a>
                             
                            <p>

                               <?php 
                               if($check_dataa= mysqli_num_rows($fetch_dd)>0){
                                echo $ansrow['answer_desc'];
                               }
                               else{
                                echo "<b>Note: </b>No Answer Found";
                               }
                                ?>
                            </p>
                            <?php
                                    $id=$row['question_id'];
                                    $userquery="SELECT * FROM question q INNER JOIN user_iformation u ON q.u_name=u.user_name WHERE question_id='$id'";
                                    $userrun=mysqli_query($conn,$userquery);
                                    $userrow=mysqli_fetch_assoc($userrun)
                                  ?>
                            <div class="all-question-uploader-information">
                                <div class="card-uploader-profile">
                                    <img src="<?php echo $userrow['user_image'] ?>" alt="" class="card-uploader-pic">
                                </div>
                                <span>
                                   <?php if($check_user= mysqli_num_rows($userrun)>0){
                                    ?>
                                    <a href="#" class="card-username"><?php echo $userrow['user_fullname'] ?></a>
                                    <?php

                                   }else{
                                    ?>
                                    <a href="#" class="card-username"> No Image</a>
                                   
                                   <?php
                                   }

                                    ?>
                                    
                                </span>
                            </div>
                        </div>
                    </div>

                   
                </div>
                <?php
                }
                            
               ?>
               
            </div>

               
    
        </section>
        <!-- --------------Main Section Ends----------------- -->




        <!-- ----------------------------------Footer Start ------------------------------->
        <?php
        include "footer.php";
        ?>
</body>
</html>