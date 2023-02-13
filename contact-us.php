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

    <div class="main-conatiner">
        <h2>Please Get in touch and our expert support team will answer all your questions.</h2>

        <div class="contact-child-controller">
            <div class="main-contact-data">
                <div class="contact-form">
                    <!-- -------------------------------Form Start------------------------------------------- -->
                    <form action="" method="post">
                        <div class="full-name">
                            <input type="text" name="full_name" id="" class="full-name-input" required placeholder="Enter Your Full Name">
                        </div>                        
                        <div class="email-cont">
                            <input type="text" name="email_cont" id="" class="email-cont-input" required placeholder="Enter Your Email Here">
                        </div>
                        <div class="company">
                            <input type="text" name="company" class="company-input" required placeholder="Your Company Name">
                        </div>
                        <div class="existing-account">
                            <p>
                                Do you have an <b>account</b> on Info Stack
                            </p>
                            
                            <input type="radio" value="1" name="ex_account" id="yes">
                            <label for="yes">Yes</label>
                            
                            <input type="radio" value="0" name="ex_account" id="no">
                            <label for="no">No</label>
                        </div>
                        <div class="message">
                        <textarea name="message" id="" cols="30" rows="15" placeholder="Message..."></textarea>
                        </div>
                        <div class="button">
                            <button type="submit" value="submit" name="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if(isset($_POST['submit'])){
                $contact_detail = array($_POST['full_name'], $_POST['email_cont'], $_POST['company'], $_POST['ex_account'], $_POST['message']);
                include "connection.php";
                $query = "INSERT INTO contact_us(full_name, email, company, account, message)
                VALUES('{$contact_detail[0]}','{$contact_detail[1]}','{$contact_detail[2]}','{$contact_detail[3]}', '{$contact_detail[4]}')";
                $result = mysqli_query($conn, $query) or die("INSERTION FAILD");
            }
            ?>
    
    
            <!-- Location Part Main -->
    
            <div class="location">
                <div class="responsive-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27683.190748584166!2d71.52006484712985!3d29.85276941613821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b137d5d3f99d5%3A0xa4657fa484b88afd!2sBasti%20Malook%2C%20Multan%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1650570528075!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
    </div>
    </div>





    <!-- Footer -->
    <?php
    include "footer.php";
    ?>
</body>
</html>