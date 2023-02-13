<?php


$conn = mysqli_connect("localhost","root","","infostack");


function check_login($conn)
    {
      if(isset($_SESSION['logged_username']))
      {
          $id= $_SESSION['user_id'];
          $query = "SELECT * FROM user_iformation WHERE user_id = '$id' LIMIT 1";
          
          $result= mysqli_query($conn , $query);
          
          if($result && mysqli_num_rows($result) >0)
          {
           $userdata = mysqli_fetch_assoc($result);
       
           return $userdata;
          }

      }
      header('Location:login-page.php');
      die;
  }






?>