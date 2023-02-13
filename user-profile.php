<?php

include("connection.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/user-profile.css">
    <!-- JQuery Link -->
      <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script> 
    <style type="text/css">
        a{
            text-decoration: none;
            color: red;
        }
        .my-profile{
            display: flex;
            width: 90%;
            height:auto;
            margin: 10vh auto;
        }
        .personnel-information{
            float: left;
            width: 20%;

        }
        .table{
                float: right;
                width: 75%;
                height: auto;
                margin: auto; 
                margin-top: 20px;  
        }
        table
        {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
              color: grey;
              /*scroll-behavior: auto;*/
              /*overflow-x: auto;*/
        }

        td, th 
        {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
        }

        tr:nth-child(even) 
        {
              background-color: #dddddd;
        }
        h2{
            padding-bottom: 30px;

        }
       @media only screen and (max-width: 600px){

             .personnel-information{
                display: none;

             }
             .table{
                width: 100%;
             }
             
        }
    </style>
</head>

<body>
     <!-- ----------------------------- Navigation Bar Start ----------------------------- -->
    <?php 
           include('navigation.php');
     ?>
   <div class="my-profile">
        <!-- Profile Info -->
     <div class="personnel-information">
            <?php
             $name= @$_SESSION['logged_username'];
            $uquery = "SELECT * FROM user_iformation  WHERE user_name='$name'";
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
     <div class="table">
        <table>
            <h2>Your Questions </h2>
            <thead>
                <th >question</th>
                 <th >likes</th>
                <th >Delete</th>
            </thead>
            <tbody>
                <?php 
                     $mysql="SELECT * FROM question WHERE u_name='$name'";
                     $run=mysqli_query($conn,$mysql);
                     while($row=mysqli_fetch_assoc($run)){
                        ?>
                     <tr>
                       <td><?php echo $row['question']; ?></td>
                       <td><?php echo $row['likes']; ?></td>
                       <td><a href="delete_user_question.php?id=<?php echo $row['question_id'] ?>">DELETE</a></td>
                     </tr>
                        <?php


                     }
                ?>
               
                
            </tbody>
        </table>
        <!-- answers -->
         <table>
            <h2 style="padding-top: 20px;"> Your Answers</h2>
            <thead>
                <th >question</th>
                <th >Answers</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                $id=$_SESSION['user_id'];
                     $mysql="SELECT * FROM answers WHERE u_id ='$id'";
                     $run=mysqli_query($conn,$mysql);
                     while($row=mysqli_fetch_assoc($run)){
                        ?>
                     <tr>
                        <?php
                        $qq=$row['q_id'];
                        $wsql="SELECT * FROM question WHERE question_id ='$qq'";
                       $wrun=mysqli_query($conn,$wsql);
                       $qdesc=mysqli_fetch_assoc($wrun);
                       ?>
                       <td><?php echo $qdesc['question']; ?></td>
                       <td><?php echo $row['answer_desc']; ?></td>
                       <td><a href="delete_user_answer.php?id=<?php echo $row['id'] ?>">DELETE</a></td>
                     </tr>
                        <?php


                     }
                ?>
               
                
            </tbody>
        </table>
         
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