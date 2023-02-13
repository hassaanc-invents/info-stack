<?php
// session_start();


include("connection.php");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e4abb3cfa3.js" crossorigin="anonymous"></script>
    <title>Welcome On Baord</title>
     <!-- CSS Link -->
    <link rel="stylesheet" href="css/dashboard-page.css">
     <link rel="stylesheet" type="text/css" href="css/alldetail.css">
     <!-- JQuery Link -->
     <script src="javascript/script.js"></script> 
      <link rel="stylesheet" href="css/media-queries.css">
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style type="text/css">
    
</style>
<body>
    <!-- Navbar Start -->
 
    <!-- User Information -->

    <div class=" section-one ">
      <?php 
      $sql1 ="SELECT * from `answers`";
      $run1=mysqli_query($conn,$sql1);
       
      while ($myrow=mysqli_fetch_assoc($run1))
        {
            $get[]=$myrow['id'];
        }
        $count_get= count($get) ;
       
      ?>
      
      <div class="row ">
     <div class="col-lg-2 col-sm-12 sidebar" >
        <h4 class="text-center "><a class="heading-panel"  href="">WELCOME</a></h4>
        <ul class="sidebar-list">
          <li><a class="links" href="dashboard.php">Dashboard Page</a></li>
          <li><a class="links" href="register-admins.php">Registered Admin</a></li>
          <li><a class="links" href="registered_user.php">Registered users</a></li>
          <li><a class="links" href="posted_question.php">Questions Posted</a></li>
          <li><a class="links" href="posted_answer.php">Answers Posted</a></li>

        </ul>
      </div>
      <div class="col-lg-10 col-sm-12 table-responsive" >
         <h1 class="headingone"><?php   print_r($count_get);?> Answers</h1>
        <table class="table table-striped  mb-5" >
                  <thead>
                    <tr>
                      <th >Username  </th>
                      <th >Question ID</th>
                      <th >Answer</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     <?php
                     
                      // user count check

                        
                     $fett="SELECT * FROM answers a INNER JOIN question q ON a.q_id=q.question_id INNER JOIN user_iformation u ON a.u_id=u.user_id" ;
                       $fetch_d=mysqli_query($conn, $fett);
                       $check_data= mysqli_num_rows($fetch_d)>0;
                        while($row=mysqli_fetch_assoc($fetch_d))
                        {  
                               
                              
                              
                    
                                        
                                      ?>
                                <tr>
                                  <td> <?php echo $row['user_fullname'] ; ?> </td>
                                  <td> <?php echo $row['question_id'] ; ?> </td>

                                  <td><?php echo $row['answer_desc'] ; ?></td>
                                </tr>
                          <?php
                        
                     }

                    ?>
                    
                  </tbody>
            </table>
      </div>  
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