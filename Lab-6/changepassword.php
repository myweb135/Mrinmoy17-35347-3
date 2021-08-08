<?php
include "../lib/db_connect.php";
$id = $username = $pass = $cpass = $message = "";

if (isset($_GET["submit"])) {


    $id = $_GET['username'];
    $sql = "SELECT * FROM admin where username='$id'";

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
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" name="pass" onsubmit="return validateForm()" method="post">

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
                                <input type="submit" name="sub" value="Submit">
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
                <script>
                    function validateForm() {
                        var pass = document.forms["pass"]["password"].value;
                        var cpass = document.forms["pass"]["cpassword"].value;
                        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                        if (pass == "" && cpass == "") {
                            alert("Fillup all data");
                            return false;
                        } else if (document.forms["pass"]["password"].length < 5) {
                            alert("Pass less then 5");
                            return false;
                        }else if (pass != cpass) {
                            alert("Pass not matched");
                            return false;
                        } else {
                            if (strongRegex.test(pass)) {
                                return true;
                            } else {

                                alert("least");
                                return false;
                            }
                        }
                    }
                </script>





    <?php
        }
    } else {
        $message = "Please Confirm the username";
        echo '<script>alert("' . $message . '")</script>';
        //header("location:../3forgetpass.html");
    }
} else {
    header("location:../3forgetpass.html");
}

if (isset($_POST["sub"])) {

    $id = $_POST['id'];
    $pass = md5($_POST['password']);
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