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
  <link rel="stylesheet" type="text/css" href="contact.css" media="screen" />
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


      <input type="text" name="" id="myInput" onkeyup="myFunction()">
      <table id="myTable" style="width: 200px;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Comments</th>
            <th scope="col">Reply</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM contact";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          ?>
            <?php while ($rows = $result->fetch_assoc()) { ?>

              <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['subject']; ?></td>
                <td><?php echo $rows['comments']; ?></td>
                <td><?php echo $rows['Reply']; ?></td>
                <td>
                  <a class="btn btn-outline-light" href="reply.php?id=<?php echo $rows['id']; ?>">Reply</a>
                  <a class="btn btn-outline-light" href="delete.php?id=<?php echo $rows['id']; ?>">Delete</a>
                </td>
              </tr>

            <?php } ?>
          <?php } else { ?>
            <tr>
              <td colspan="4">No data Found</td>
            </tr>
          <?php } ?>

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
    function myFunction() {
      var input, filter, table, tr, td0, td1, td2, td3, td4, td5, i, txtValue0, txtValue1, txtValue2, txtValue3, txtValue4, txtValue5;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td0 = tr[i].getElementsByTagName("td")[0];
        td1 = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];
        td3 = tr[i].getElementsByTagName("td")[3];
        td4 = tr[i].getElementsByTagName("td")[4];
        td5 = tr[i].getElementsByTagName("td")[5];
        if (td0 || td1) {
          txtValue0 = td0.textContent || td0.innerText;
          txtValue1 = td1.textContent || td1.innerText;
          txtValue2 = td2.textContent || td2.innerText;
          txtValue3 = td3.textContent || td3.innerText;
          txtValue4 = td4.textContent || td4.innerText;
          txtValue5 = td5.textContent || td5.innerText;
          if (txtValue0.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>


</body>