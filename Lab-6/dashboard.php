<?php
session_start();
if(isset($_SESSION['auth'])){
    if($_SESSION['auth']!=1){
        header("location:Adminlogin.html");
    }
}
else{
    if(isset($_COOKIE['auther'])){
        if($_COOKIE['auther']!=true){
            header("location:Adminlogin.html");
        }
    }
    else{
        header("location:Adminlogin.html");
    }
}
include "lib/db_connect.php";
$id = $username  = $message = "";

$id = $_SESSION['userid'];
$sql = "SELECT * FROM admin where id=$id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $username= $rows['username'];
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dashboard.css" media="screen"/>
    <title>Dashboard Page</title>
</head>
<body>
    <form>
        
        
            <fieldset class="header">

<font color="white" size="6"> <b>Tuition/Tutor Care</b></font></p>

           <p align="right">   <font color="white" > Logged in as <?php echo $username; ?>

                <?php if (isset($_SESSION["userName"])) {
                    echo $_SESSION["userName"];
                }

 



 ?>

                <a href="logout.php">| Logout</a> </font></p>




                
</fieldset>
                

 <p align="center"><font size="10" color="#31aad9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> ADMIN PANNEL</b> </font></p>

<fieldset class="tbl" ;style="width: 10%;height: 60%; position: absolute;" >
<font color="white"><hi> Account </hi></font>
<hr style="border: 0.2px solid white;">
<p>
            <ul><br>




 <tr>
            




            <tr>
                <td><li><a href="student/student.php"> <font color="#00ff00" size="5">STUDENT</font></li></a></td>
            </tr><br><br>
            <tr>
                <td><li><a href="teacher/teacher.php"> <font color="#00ff00" size="5">TEACHER</font></li></a></td>
            </tr><br><br>
            
            <tr>
                <td><li><a href="payment/payment.php"> <font color="#00ff00" size="5">ACCOUNT</font></a></li></td>
            </tr><br><br>
            
            <tr>
                <td><li><a href="registration/registration.php"> <font color="#00ff00" size="5"> REGISTRATION </font></li></a></td>
            </tr><br><br>


            <tr>
                <td><li><a href="contact/contact.php"> <font color="#00ff00" size="5"> CONTACT </font></li></a></td>
            </tr><br><br>


            <tr>
                <td><li><a href="editProfile/viewprofile.php"> <font color="#00ff00" size="5">View Profile </font></li></a></td>
            </tr><br><br>
            <tr>
                <td><li><a href="editProfile/editprofile.php"> <font color="#00ff00" size="5">Edit Profile </font></li></a></td>
            </tr><br><br>

            <tr>
                <td><li><a href="editProfile/changepassword.php"> <font color="#00ff00" size="5">CHANGE PASSWORD </font></li></a></td>
            </tr><br><br>

            <tr>
                <td><li><a href="logout.php"> <font color="#00ff00" size="5"> LOGOUT </font></li></a></td>
            </tr></ul></p>
</fieldset>

</table>

           
   
    </form>
   
</body>
<div class="footer">
 <footer><p align=center>Copyright <span>&#169;</span>2021</footer></p>
</div>
 <style>


</style>
</html>

