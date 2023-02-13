<?php
if(isset($_POST['submit'])){
    $signupdetail = array($_POST['fullname'],$_POST['fullemail'],$_POST['username'],$_POST['password'],$_FILES['file']);
    include "connection.php";
    $usernamecheck = "SELECT * FROM user_iformation WHERE user_name='$signupdetail[2]'";
    $useresult = mysqli_query($conn,$usernamecheck );
    $getrowcount = mysqli_num_rows($useresult); 
    if ($getrowcount > 0) {
        echo "<script>alert('Username Alread Exist. Please Change it.')</script>";
        mysqli_close($conn);
        header("Location: http://localhost/infostack/signup-page.php");
    } else 
    { 
        $filedetail = array($signupdetail[2].$signupdetail[4]['name'],$signupdetail[4]['error'],$signupdetail[4]['tmp_name']);
        $filtype=explode('.',$filedetail['0']);
        
        $filtypedown = strtolower(end($filtype));
        $destinationaddress = "user-profile-pictures/".$filedetail[0];
        move_uploaded_file($filedetail[2],$destinationaddress);
        $uniqueid = uniqid();
        $insertuserdata = "INSERT INTO user_iformation(user_id,user_name,user_fullname,user_email,user_password,user_image)
        VALUES('{$uniqueid}','{$signupdetail[2]}','{$signupdetail[0]}','{$signupdetail[1]}','{$signupdetail[3]}','{$destinationaddress}')";
        $datainsertionacomp = mysqli_query($conn, $insertuserdata);
        mysqli_close($conn);
        header("Location: http://localhost/infostack/signup-page.php");
    }
}
?>