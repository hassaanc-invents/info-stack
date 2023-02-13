
<?php 
session_start();
include('connection.php');


if(isset($_POST['question_post']))
{
     $user_email = mysqli_real_escape_string($conn , $_POST['user_email']);
    $question = mysqli_real_escape_string($conn , $_POST['question']);

     if (!empty($user_email) && !empty($question)){
       $userpic = "SELECT user_image FROM user_information WHERE user_email = '$user_email'";

      $query = "INSERT INTO `question`( `user_email`, `question`,`answer`) VALUES('$user_email' ,'$question')";
      $run = mysqli_query($conn , $query);
    if($run){

       header("Location: http://localhost/infostack/index.php");
    }
    else{
      echo "not inserted";
    }
}
else{

  echo"<script> alert('Plese fill all fields')</script>";
}

  

   
}
else{
	
	
	echo "not";
}
// answer








?>