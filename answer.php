<?php  

  include('connection.php');
    session_start();
    $_SESSION;
    $userdata= check_login($conn);

    $currentTime = time();
  if($currentTime> $_SESSION['expire']){
    
    echo "<script> alert('login Required');</script> ";
    header('Refresh: 0; URL=login-page.php');
    session_unset();
    session_destroy();
  }
   

    $q_id = $_GET['q_id'];

   $uid=@$_SESSION["name_username"];
   $user_id_query = "SELECT * FROM user_iformation WHERE user_fullname ='$uid'";
   $data =  mysqli_query($conn, $user_id_query);
   $user= mysqli_fetch_assoc($data);
   
        if(isset($_POST['answer']))
        {   
            $q_id =  $q_id; 
            $u_id=@$_SESSION['user_id'];
            $user_image=@$_SESSION['user_image_address'];
            $answerr= $_POST['answer_desc'];
            $answer_desc = implode(",",$answerr);
            $user_email =$user['user_email'];
            $query= "INSERT INTO `answers`(`q_id`,  `u_id`, `answer_desc`,`user_email`) VALUES ('$q_id','$u_id','$answer_desc','$user_email')";
            $runn = mysqli_query($conn , $query);
          if($runn){
            echo "<script>  alert('Answer Recieved')</script>";
            header( "refresh:0;url=index.php" );
          }
          else{
            echo "<script>  alert('Answer Failed')</script>";
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
    <link rel="stylesheet" href="css/contact-us.css">
    <!-- JQuery Link -->
    <script src="javascript/script.js"></script> 
</head>
<body>
     <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
     <?php
     include "navigation.php";
     ?>

    <!-- ----------------------------- Navigation Bar Ends ----------------------------- -->

    <!-- ------------ Main Contac Us Start------------------------- -->

    <div class="main-conatiner" >
        <h2>Add Your Answer here.</h2>

        <div class="contact-child-controller" >
            <div class="main-contact-data" style="margin-left: auto;margin-right: auto;">
                <div class="contact-form">
                    <!-- -------------------------------Form Start------------------------------------------- -->
                    <form enctype="multipart/form-data" action="#" method="post">
                       <div class="full-name">
                        <?php 
                        $q_query="SELECT * FROM question WHERE question_id='$q_id'";
                        $q_run= mysqli_query($conn, $q_query);
                        $row= mysqli_fetch_array($q_run);
                        
                        ?>
                          <h3>Question : <?php echo $row['question']?> ? </h3>
                        
                        </div>                   
                        <div class="message">
                        <textarea name="answer_desc[]" id="" cols="30" rows="15" placeholder="Answer..."></textarea>
                        </div>
                        <div class="button">
                            <button type="submit" name="answer">Answer!</button>
                        </div>
                    </form>
                </div>
            </div>
    
    
            <!-- Location Part Main -->
    </div>
    </div>

<!-- 
 <div class="qu-person-detail">
                            <div class="profile-question">
                              
                             <?php 
                          // $user_ans_name=$fetch_ans['user_id'];
                           // $user_name= "SELECT * FROM user_iformation WHERE user_id= '$user_ans_name'";
                           // $run = mysqli_query($conn , $user_name);
                            // $fetch_username= mysqli_fetch_array($run);
                          ?>

                             // <?php  $user_image = $fetch_username['user_image']?>
                             // <img src="<?php echo $user_image ?>" alt="" class="question-profile"   >
                          </div>
                                                    <span class="qu-name" style="text-transform: uppercase;" ><b><?php print_r($fetch_username['user_name'])  ?>( <span><?php echo $row['date'] ?></span> )</b></span>

                        </div>  -->


    <!-- Footer -->
    <?php
    include "footer.php";
    ?>
</body>
</html>