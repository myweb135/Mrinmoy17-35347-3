<?php

session_start();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] == 1) {
        header("location:dashboard.php");
    }
} else {
    if (isset($_COOKIE['auther'])) {
        if ($_COOKIE['auther'] == true) {
            header("location:dashboard.php");
        }
    }
}

include "lib/db_connect.php";
$userName = $upass = $remember = $message = "";

if (isset($_POST["submit"])) {

    $userName = $_POST['userName'];
    $upass = md5($_POST['password']);
    $remember = isset($_POST['remember']) ? 1 : 0;

    $sql = "SELECT * FROM admin WHERE username='$userName' AND password='$upass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($rows = $result->fetch_assoc()) {
            $id = $rows['id'];
        }
        $_SESSION['userid'] = $id;

        $_SESSION['auth'] = 1;
        if ($remember == 1) {
            setcookie('auther', true, time() + (60 * 60 * 24 * 10), '/');
        }
        header("location:dashboard.php");
    } else {
        $message = "Invalid Username or Password";
        echo '<script>alert("'.$message.'")</script>';
        // header("location:Adminlogin.html");
    }
}

?>