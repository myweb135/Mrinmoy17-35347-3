<?php
    session_start();
    if(isset($_SESSION['auth'])){
        if($_SESSION['auth']!=1){
            header("location:../Adminlogin.html");
        }
    }
    else{
        if(isset($_COOKIE['auther'])){
            if($_COOKIE['auther']!=true){
                header("location:../Adminlogin.html");
            }
        }
        else{
            header("location:../Adminlogin.html");
        }
    }


    include "../lib/db_connect.php";
    $src="";
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        


        $sql = "DELETE FROM contact WHERE id = $id";

        if($conn -> query($sql)){
            header("location:contact.php");
        }
        else{
            die($conn -> error);
        }
    }
    else{
        header("location:../contact.php");
    }

?>