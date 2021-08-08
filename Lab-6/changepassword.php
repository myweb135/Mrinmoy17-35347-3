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
include "../lib/db_connect.php";
$id = $username = $pass = $cpass = $message = "";




$id = $_SESSION['userid'];
$sql = "SELECT * FROM admin where id=$id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {

?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="contact.css" media="screen" />
            <title>Dashboard Page</title>
        </head>

        <body>



            <div class="header">
                <p class="home">
                    <a href="1 home.html">
                        <font color="#00ff00" size="5">&#8918;HOME
                    </a>
                </p>
                </font>




                <span class="name">
                    <font color="#32174d" size="8"> Tuition/Tutor Care</font>
                    </p>
                </span>

            </div>

            <section class="contSec">

                <div class="contBox">

                    <fieldset style="width: 40%">

                        <legend>
                            <font size="5"><b>CHANGE PASSWORD</b>
                        </legend>
                        </font>
                        <p align="center">
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                            <table>
                                <td>Id</td>
                                <td>:</td>
                                <td><input type="number" name="id" value=<?php echo $rows['id']; ?> readonly></td>

                                <tr>
                                    <td colspan="5">
                                        <hr />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <hr />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td><input type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td>ConfirmPassword</td>
                                    <td>:</td>
                                    <td><input type="password" name="cpassword"></td>
                                </tr>
                            </table>

                            <br /><br />
                            <input type="submit" name="submit" value="Submit">
                        </form>
                        

                    </fieldset>
                    </p>


                </div>

            </section>








            <section class="footerSec">
                <div class="footer">
                    <br />
                    <p align=center><b>Copyright <span>&#169;</span>2021</footer></b></p>
                </div>
            </section>


<?php
    }
} else {
    header("location:../dashboard.php");
}

if (isset($_POST["submit"])) {

    $id = $_POST['id'];
    $pass =md5( $_POST['password']);
    $cpass = md5($_POST['cpassword']);

    
    if ($pass == $cpass) {
        $sql = "UPDATE admin
                    SET password='$pass'
                    where id=$id";
        if ($conn->query($sql)) {
            header("location:../dashboard.php");
        } else {
            die($conn->error);
        }
    } else {
        $message = "Password not matched";
        
        echo $message;
    }
}
?>