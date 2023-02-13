<?php
session_start();


include("connection.php");


if(isset($_POST['question_post']))
{
    
    $date=date('d')."-".date('m')."-".date('Y');  
    $question = mysqli_real_escape_string($conn , $_POST['question']);
    $user_email = mysqli_real_escape_string($conn , $_POST['user_email']);
    $user =  "SELECT  * FROM `user_iformation` WHERE user_email = '$user_email'";
    $runn=mysqli_query($conn , $user);
    $fetch= mysqli_fetch_array($runn);
    $u_name=$fetch['user_name']; 
    $user_image=$fetch['user_image'];

    if(!empty($user_email) && !empty($question)){
      $query="INSERT INTO `question`( `user_email`, `u_name`, `question`, `user_image`, `date`) VALUES ('$user_email','$u_name','$question','$user_image','$date')";
    $run = mysqli_query($conn , $query);
    if($run){
     echo "<script>  alert('done')</script>";
    }
    else{
     echo "<script>  alert('not done')</script>";
   
     }

    }
    else{
      
  echo"<script> alert('Plese fill all fields')</script>";
    }
    
}
// answer

?>
<?php 
 
  $n=0;
if (isset($_POST['like_btn']))
{
    $_SESSION;
    $userdata= check_login($conn);

    $currentTime = time();
  if($currentTime> $_SESSION['expire']){
    
    echo "<script> alert('login Required');</script> ";
    header('Refresh: 0.00001; URL=login-page.php');
    session_unset();
    session_destroy();
  }
  else{
     $n=$_POST['likes'];
   $likes=$n+'1';
   $liked_username= @$_SESSION['logged_username'];
   $question_id= $_POST['question_id'];

  $query="INSERT INTO `like_system`( `question_id`, `liked_username`) VALUES ('$question_id','$liked_username')";
   $run=mysqli_query($conn , $query);

   if($run)
   {
      $query="UPDATE  `question` SET `likes`='$likes' WHERE `question_id`='$question_id'";
      $runn=mysqli_query($conn , $query);    
   }
   else{
   echo "<script> alert('Something went wrong') </script>";                       
   }
  }
}
$m=0;
// dislike
if (isset($_POST['dislike_btn']))
{
   $_SESSION;
    $userdata= check_login($conn);

    $currentTime = time();
  if($currentTime> $_SESSION['expire']){
    
    echo "<script> alert('login Required');</script> ";
    header('Refresh: 0.00001; URL=login-page.php');
    session_unset();
    session_destroy();
  }
  else{
    $m=$_POST['dislikes'];
   $dislikes=$m+'1';
   $disliked_username= @$_SESSION['logged_username'];
   $question_id= $_POST['question_id'];

  $query="INSERT INTO `dislike_system`( `question_id`, `disliked_username`) VALUES ('$question_id','$disliked_username')";
   $run=mysqli_query($conn , $query);

   if($run)
   {
      $query="UPDATE  `question` SET `dislikes`='$dislikes' WHERE `question_id`='$question_id'";
      $runn=mysqli_query($conn , $query);
      if($runn){
             echo "<script> alert('disliked') </script>";
      }
    
   }
   else{
   echo "<script> alert('Something went wrong') </script>";                       
   }
  }

   
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
    <title>Info Stack</title>
    <!-- Head Icon -->
    <link rel="icon" href="images/head-logo.png" type="image/png">
    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <!-- JQuery Link -->
    <script src="javascript/script.js"></script> 
</head>
<body>
    <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
    <?php
    include("navigation.php");
    ?>
    <!-- ----------------------------- Navigation Bar Ends ----------------------------- -->

    <!-- ----------------------------- Main Section Start ----------------------------- -->

    <section class="main-section">
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
        <!-- ----------------------Top Question------------------ -->
        <div class="top-questions">
            
            <?php
        
        
         if(isset($_SESSION['logged_username'])){
             include "post-question.php";

        }
              
            ?>
        <!-- Slider -->
        <div class="create-post" id="create-post-id">
            <div class="create-post-heading">
                <h3>Create Post</h3>
                <i class="fa fa-times" onclick="slidercontroller()"></i>
            </div>
            <div class="main-form-holder">
                <form action="" method="post">
                     <div class="post-question-content " style="width: 90% ; margin: 10px;">
                           
                        <input type="email" require placeholder="Enter Your Email" name="user_email" id="">
                   
                </div>
                    <div class="text-field">

                        <textarea name="question" require id="" cols="20" rows="10" placeholder="What is in your mind?"></textarea>
                        <!-- <input type="text" name="user_id" value="" placeholder=""> -->
                    </div>
                    <div class="button">
                        <button name="question_post"  type="submit">Post</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Slider End -->
 
            <!-- Question Start -->
            <?php
                      $fet= "SELECT * FROM question q INNER JOIN user_iformation u ON q.u_name=u.user_name";
                      $fetch_data=mysqli_query($conn, $fet);
                      $row=mysqli_fetch_assoc($fetch_data);
                      $check_data= mysqli_num_rows($fetch_data)>0;
                      if ($check_data) 
                      {
                        while($row=mysqli_fetch_assoc($fetch_data))
                        {
                          ?>

            <section class="question my-section-border">
                <div class="qu-person-detail">
                     <div class="profile-question">  
                             <?php  $user_image = $row['user_image']?>
                  <a href="on-click-user-profile-pic-page.php?id=<?php echo $row['user_id'] ?>">  <img href src="<?php echo $user_image ?>" alt="" class="question-profile"   ></a>
                </div>
                    <span class="qu-name" style="text-transform: uppercase;" ><b><?php echo $row['u_name'] ?>( <span><?php echo $row['date'] ?></span> )</b></span>

                </div>

                <p class="question-content">
                    <?php 
                     echo   $row['question'];
                     
                    ?>
                </p>
              

                <div class="respond">
                 <form action="#" method="post">
                    

                    <span  class="like">
                      <?php
                      $qid=$row['question_id'];
                      $liked_username= @$_SESSION['logged_username'];
                      $checklikequery = "SELECT * FROM like_system WHERE liked_username='$liked_username' AND question_id='$qid' ";
                      $run_liked_query = mysqli_query($conn,$checklikequery);
                      if(mysqli_num_rows($run_liked_query)>0){
                       ?>


                        <button style="font-size: 16px ;color: #66656C; background-color: transparent; border:none; outline: none; box-shadow: none;">  <i style="color: red; margin-right:10px" class="fas fa-heart" id="like"></i><span id="like_loop_<?php echo $row['question_id']?>" ><?php echo $row['likes']?></span>  </button>
                       <?php
                       }
                       else{
                        ?>

                      <?php $qid=$row['question_id'];?>
                      <input type="hidden" name="likes" value="<?php echo $row['likes'] ?>">
                      <input type="hidden" name="question_id" value="<?php echo $row['question_id'] ?>">
                      <?php 
                      $liked_username= @$_SESSION['logged_username'];
                      $usernamecheck = "SELECT * FROM like_system WHERE liked_username='$liked_username'";
                        $useresult = mysqli_query($conn,$usernamecheck );
                        $getrowcount = mysqli_num_rows($useresult); 
                        if ($getrowcount > 0) {
                          ?>
                          <script type="text/javascript">
                            document.querySelectorAll(".fa-heart").style.color="red";
                          </script>

                          <?php
                        } 

                    ?>
                      <button type="submit" name="like_btn"  style="font-size: 16px ;color: #66656C; background-color: transparent; border:none; outline: none; box-shadow: none;">  <i style="margin-right:10px" class="fas fa-heart" id="like"></i><span id="like_loop_<?php echo $row['question_id']?>" ><?php echo $row['likes']?></span>  </button>
                     


                        <?php
                       }
                      ?>


                   </span>
            
                  </form>
                  <form method="post">  

                    <!-- <span class="answer"  style="margin-top: 10px;" ><i class="fas fa-comment"></i> Answers</span> -->

                    <span  class="dislike">

                      <?php
                      $qid=$row['question_id'];
                      $disliked_username= @$_SESSION['logged_username'];
                      $checkdislikequery = "SELECT * FROM dislike_system WHERE disliked_username='$disliked_username' AND question_id='$qid' ";
                      $run_disliked_query = mysqli_query($conn,$checkdislikequery);
                      if(mysqli_num_rows($run_disliked_query)>0){
                      
                      ?>
                      <button style="font-size: 16px ; margin-left: 220px; color: #66656C; background-color: transparent; border:none; outline: none; box-shadow: none;"><i style="color:#fcbb2c; margin-right:10px " class="fas fa-thumbs-down"></i><span ><?php echo $row['dislikes']?></span></button>

                      <?php

                      }
                      else{

                        ?>
                             <?php $qid=$row['question_id'];?>
                        <input type="hidden" name="question_id" value="<?php echo $row['question_id'] ?>">
                        <input type="hidden" name="dislikes" value="<?php echo $row['dislikes'] ?>">
                      <button type="submit" name="dislike_btn" style="font-size: 16px ; margin-left: 220px; color: #66656C; background-color: transparent; border:none; outline: none; box-shadow: none;"><i style="margin-right:10px" class="fas fa-thumbs-down"></i><span id="like_loop_<?php echo $row['question_id']?>" ><?php echo $row['dislikes']?></span></button>
                        <?php

                      }

                       ?>








                      

                    </span>
                
                </form>

                
                <span style="font-size: 13px ; margin-top: 5px; color: #66656C; background-color: transparent; border:none; outline: none; box-shadow: none;">
                 <div class="" >
                    <form action="answer.php"  method="post" class="">
                        <a  href="answer.php?q_id=<?php  echo $row['question_id'] ?>" class="answer-submit"><i style="font-size:20px;" class="fas fa-plus"></i></a> 
                     </form>
                  </div>
                </span>
                </div>
                <div class="uploaded-answer "  >
                      
                      <span class="ans-name"><a href=""><b><?php   ?></a> </b></span>

                      <p class="answer-text">

                        
                       <?php  

                          $qid= $row['question_id'];
                          $data = "SELECT * FROM answers WHERE q_id='$qid'";
                          $run =  mysqli_query($conn, $data);
                          $check_answers_data= mysqli_num_rows($run);
                          if($check_answers_data){
                            while($fetch_ans= mysqli_fetch_array($run)) 
                            {   
  
                                echo "<br> <b> Answer By: ".$fetch_ans["user_email"]." </b><br>".$fetch_ans["answer_desc"]."<br>";
                              
                            }
                          } else echo "<b>Not Answered Yet</b>"
                          
                          ?>
                    </p> 

                </div>
                

               
               

            </section>
           
                          
                          <?php        
                        }
                      }
                      else
                      {
                        echo("No data inserted");
                      }
            ?>
           
                
 
           




            


            

            <!-- Question End -->


        </div>
        <!-- -----------------------Right Suggestions----------------------------- -->
        <div class="suggest-problems">
            <div class="suggested-container">
                <a href="www.eocc.pk" target="_blank">
                    
                </a>
            </div>
        </div>

    </section>
    <!-- --------------Main Section Ends----------------- -->

    <!-- -----------------Footer Start------------------- -->
    <?php
    include("footer.php");
    ?>

     
</body>
</html>