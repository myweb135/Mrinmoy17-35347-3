<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tution_managment_system";

$conn = new mysqli($host, $user, $pass, $db);

if($conn -> connect_error){
  die($conn -> error);
}

?>
