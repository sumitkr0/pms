<?php
include("global/session.php");
include("global/connection.php");
session_destroy();
header("Location: http://localhost/pms/login.php");
exit();
?>