<?php

include "../login/lib/db_connect.php";
$name = $email = $subject = $comments  = $message = "";

if (isset($_POST["submit"])) {

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $comments = $_POST['comment'];



     
        
            
       
            $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `comments`) 
            VALUES ('$name','$email','$subject','$comments')";

            if ($conn->query($sql)) {
                $message = "Your message have been send please wait for the reply";
                echo '<script>alert("' . $message . '")</script>';
            } else {
                die($conn->error);
            }
        }
        


?>