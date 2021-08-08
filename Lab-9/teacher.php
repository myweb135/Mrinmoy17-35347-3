<?php

session_start();
if (isset($_SESSION['auth'])) {
  if ($_SESSION['auth'] != 1) {
    header("location:../Adminlogin.html");
  }
} else {
  if (isset($_COOKIE['auther'])) {
    if ($_COOKIE['auther'] != true) {
      header("location:../Adminlogin.html");
    }
  } else {
    header("location:../Adminlogin.html");
  }
}

include "../lib/db_connect.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../contact/contact.css" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <title>Contact Page</title>
</head>

<body>



  <div class="header">
    <p class="home">





      <span class="name">
        <font color="#32174d" size="8"> Tuition/Tutor Care</font>
    </p> </span>

  </div>

  <section class="contSec">

    <div class="contBox">

      <center>
        <h1>Contact Database</h1>
      </center>



      <table class="table table-dark table-striped table-hover text-center">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Gender</th>
            <th scope="col">Current_Institution</th>
            <th scope="col">Department</th>
            <th scope="col">DOB</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="table">



        </tbody>
      </table>






    </div>

  </section>








  <section class="footerSec">
    <div class="footer">
      <br />
      <p align=center><b>Copyright <span>&#169;</span>2021</footer></b></p>
    </div>
  </section>

  <script>
    $.ajax({
      url: "View_ajax.php",
      type: "POST",
      cache: false,
      success: function(data) {
        alert(data);
        $('#table').html(data);
      }
    });
  </script>