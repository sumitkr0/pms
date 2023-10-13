<?php
include("global/connection.php");
session_start();
$useremail = $_POST["email"];
$userpassword = $_POST["psswrd"];
$query = "SELECT fname, email, password from users where email = '$useremail'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$hash = $row["password"];
if ($userpassword!= "") {
     $pwdCheck = password_verify($userpassword, $hash);
     print_r($pwdCheck);
    if ($pwdCheck) {
        $_SESSION['login_user'] = $row['fname'];
          header("Location: index.php");
    } else {
        echo 'Incorrect Password!';
        
    }
}
else{
    echo 'Password Required!';
}