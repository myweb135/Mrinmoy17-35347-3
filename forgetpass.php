<?php

    //session_start(); 

    if(isset($_POST['email'])){
        $fEmail = $_POST['email'];

        if(!empty($fEmail)){
            echo "Please wait while we send you an OTP";
        }
    }
    else{
        echo "Error occured";
    }


?>
