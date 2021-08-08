<?php

    session_start();
    if(isset($_SESSION['auth']) || isset($_COOKIE['auther'])){
        session_destroy();
        if(isset($_COOKIE['auther'])){
            setcookie('auther', '', time()-3600,'/');
        }
        header("location:Adminlogin.html");
    }
    else{
        header("location:Adminlogin.html");
    }

?>