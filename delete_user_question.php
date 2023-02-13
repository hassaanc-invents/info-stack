<?php 
include("connection.php");
session_start();

$id = $_GET['id'];
// echo $del;

$query= "DELETE FROM question where question_id='$id'";
$run= mysqli_query($conn, $query);
 if($run)
 {
 	header("location:user-profile.php");

 }
else{
	echo"error";
}






?>