<?php
include("global/connection.php");
session_start();
$useremail = $_POST["email"];
$userpassword = $_POST["psswrd"];
$logindata = "SELECT fname, email, password from users where email = '$useremail'";
$result = $conn->query($logindata);
$row = $result->fetch_assoc();
$hash = $row["password"];
if ($row["password"] != "") {
     $pwdCheck = password_verify($password, $row['password']);
    if ($pwdCheck) {
        $_SESSION['login_user'] = $row['fname'];
           header("Location: index.php");
    } else {
        echo 'Incorrect Password!';
    }
}
